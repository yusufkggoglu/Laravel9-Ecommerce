<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Faq;
use App\Models\Favourite;
use App\Models\Image;
use App\Models\Message;
use App\Models\Product;
use App\Models\ShopCart;
use App\Models\Size;
use App\Models\Slider;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HomeController extends Controller
{
    protected $appends=[
        'getProductsByCollectionID',
        'getProducts'
    ];
    public static function getProductsByCollectionID($collection_id){
        $product=Product::where('collection_id',$collection_id)->with('category')->limit(8)->orderBy('id', 'desc')->get();
        return $product;
    }
    public static function getProducts($id){
        $product=Product::find($id)->with('category')->get();
        return $product;
    }
    public function index()
    {
        $sliders = Slider::all();
        return view('home.index',[
            'sliders' => $sliders
        ]);
        
    }
    public function favourite()
    {
        $user_id=Auth::id();
        $data=Favourite::where('user_id',$user_id)->get();
        return view('home.favourite',[
            'data' => $data
        ]);
    }
    public function favourite_add(Request $request,$id)
    {
        $product=Product::find($id);
        $user_id=Auth::id();
        $temp=Favourite::where('user_id',$user_id)->where('product_id',$product->id)->first();
        if(!$temp)
        {
            $data = new Favourite();
            $data->user_id=$user_id;
            $data->product_id=$product->id;
            $data->title=$product->title;
            $data->image=$product->image;
            $data->save();
        }
        if($temp)
        {
            Favourite::find($temp->id)->delete();
        }

        return back();
    }
    public function product($id)
    {
        $comment = Comment::where('product_id',$id)->where('status','True')->get();

        $stock = Stock::where('product_id', $id)
            ->where('stock', '>', 0)
            ->get();
        $data = Product::find($id);
        $sameproducts = Product::where('product_code', $data->product_code)->get();
        $firstimage = Image::where('product_id', $id)->first();
        $images = Image::where('product_id', $id)->get();
        $relationproduct = Product::with('category')
            ->where('status', 'True')
            ->where('category_id', $data->category_id)
            ->where('id','!=',$data->id)
            ->limit(4)
            ->get();
        return view('home.product', [
            'relationproduct' => $relationproduct,
            'data' => $data,
            'images' => $images,
            'firstimage' => $firstimage,
            'stock' => $stock,
            'sameproducts' => $sameproducts,
            'comment' => $comment,
        ]);
    }
    public function shop(Request $request)
    {
        $color = $request->color ?? null;
        $category_id = $request->category_id ?? null;
        $collection_id = $request->collection_id ?? null;
        $min = $request->min ?? null;
        $max = $request->max ?? null;
        $sort = $request->sort ?? 'asc';

        $product = Product::where('status', 'True')
            ->where(function ($query) use ($color, $category_id, $collection_id, $min, $max,$sort) {
                if (!empty($color)) {
                    $query->where('color', $color);
                }
                if (!empty($category_id)) {
                    $query->where('category_id', $category_id);
                }
                if (!empty($max)) {
                    $query->whereBetween('price', [$min, $max]);
                }
                if (!empty($collection_id)) {
                    $query->where('collection_id', $collection_id);
                }
                if (!empty($price) && $price='desc') {
                    $query->orderBy('price','desc');
                }
                return $query;
            })->orderBy('price',$sort)->SimplePaginate(10);

        return view('home.shop', [
            'product' => $product,
        ]);
    }
    public function collectionfilter($id)
    {
        $product = Product::where('status', 'True')
            ->where('collection_id', $id)
                ->with('category')
                ->simplePaginate(12);
        return view('home.shop', [
            'product' => $product,
            'collectionid' => $id,
        ]);
    }
    public function categoryfilter($id)
    {
        $product = Product::where('status', 'True')
            ->where('category_id', $id)
            ->with('category')
            ->simplePaginate(12);
        return view('home.shop', [
            'product' => $product,
            'categoryid' => $id,
        ]);
    }
    public function contact()
    {
        return view('home.contact');
    }
    public function faq()
    {
        $faq=Faq::where('status','True')->get();
        return view('home.faq',[
            'faq' => $faq,
        ]);
    }
    public function storemessage(Request $request)
    {        
        //dd($request);
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50|email',
            'phone' => 'required|max:20',
            'message' => 'required|max:500',
        ]);
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->message = $request->input('message');
        $data->ip = $request->ip();
        $data->save();

        return redirect()->to('/contact#contact')->with('success', 'Mesajınız gönderildi , Teşekkürler.');
    }

    public function storecomment(Request $request)
    { 
        // dd($request);
        $data = new Comment();
        $data->user_id = Auth::id();
        $data->product_id = $request->input('product_id');
        $data->comment = $request->input('comment');
        $data->ip = request()->ip();
        $data->save();

        $user = User::find(Auth::id());
        $product = Product::find($request->product_id);

        return redirect()->route('product',['id' => $request->input('product_id')])->with('success', 'Yorum yaptığınız için teşekkürler !');
    }

    public function loginadmincheck(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }
        return back()->withErrors([
            'error' => 'Erişim izniniz bulunmamaktadır.',
        ])->onlyInput('email');
    }
    public function loginusercheck(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
