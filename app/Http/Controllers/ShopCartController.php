<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShopCart;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
    public function shopcart()
    {
        $cartItem = session('cart',[]);
        $totalPrice= 0;
        foreach ($cartItem as $cart) {
            $totalPrice += $cart['price'] * $cart['quantity'];
        }
        // return $cartItem;
        return view('home.shopcart',compact('cartItem','totalPrice'));        
    }
    public function add(Request $request)
    {
        $productID=$request->product_id;
        $quantity=$request->quantity;
        $kind=$request->kind;
        $product=Product::find($productID);
        if(!$product){
            return back()->withError('Ürün Bulunamadı !');
        }
        $cartItem = session('cart',[]);
        if(array_key_exists($productID,$cartItem)){
            $cartItem[$productID]['quantity'] += $quantity;
        }
        else{
            $cartItem[$productID]=[
                'productID' => $product->id,
                'image' => $product->image,
                'name' => $product->title,
                'price' => $product->price,
                'quantity' => $quantity,
                'kind' => $kind,
            ];
        }
        
        //return $cartItem;
        session(['cart'=>$cartItem]);
        return back()->withSuccess('Ürün Sepete Eklendi !');
    }
    public function remove(Request $request)
    {

    }//back()->withSucces('Ürün Silindi !')

    // public static function getShopCart($user_id){
    //     $shopCart=ShopCart::where('user_id',$user_id)->get();
    //     $products=Product::where('id',$shopCart->product_id)->get();
    //     return $products;
    // }
    // public static function getShopCartProducts($product_id){
    //     $products=Product::where('id',$product_id)->get();
    //     return $products;
    // }
}
