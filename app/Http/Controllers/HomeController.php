<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Size;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function product(Request $request, $id)
    {
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
        ]);
    }
    public function shop(Request $request)
    {
        $color = $request->color ?? null;
        $category_id = $request->category_id ?? null;
        $collection_id = $request->collection_id ?? null;
        $min = $request->min ?? null;
        $max = $request->max ?? null;

        $product = Product::where('status', 'True')
            ->where(function ($query) use ($color, $category_id, $collection_id, $min, $max) {
                if (!empty($color)) {
                    $query->where('color', $color);
                }
                if (!empty($category_id)) {
                    $query->where('category_id', $category_id);
                }
                if (!empty($collection_id)) {
                    $query->where('collection_id', $collection_id);
                }
                if (!empty($max)) {
                    $query->whereBetween('price', [$min, $max]);
                }
                return $query;
            })->SimplePaginate(9);

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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
