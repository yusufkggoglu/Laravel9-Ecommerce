<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShopCart;
use App\Models\Stock;
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
        $stock=Stock::where('product_id',$productID)->where('kind',$kind)->first();
        $stockID=$stock->id;
        if(!$product){
            return back()->withError('Ürün Bulunamadı !');
        }
        $cartItem = session('cart',[]);
        if(array_key_exists($stockID,$cartItem)){
            $cartItem[$stockID]['quantity'] += $quantity;
        }
        else{
            $cartItem[$stockID]=[
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
    public function remove($id,$slug)
    {
        $stock=Stock::where('product_id',$id)->where('kind',$slug)->first();
        $stockID=$stock->id;
        $cart = session('cart',[]);
        unset($cart[$stockID]);
        session(['cart'=>$cart]);
        return redirect()->route('shop_cart');
    }
    public function removeall(Request $request)
    {

        $request->session()->flush();
        return back()->withSuccess('Sepet Boşaltıldı !');

    }
    public function update(Request $request,$id,$slug)
    {
        $quantity = $request->input('quantity');
        $cart = session('cart',[]);
        $stock=Stock::where('product_id',$id)->where('kind',$slug)->first();
        $stockID=$stock->id;
        $cart[$stockID]['quantity'] =$quantity;
        session(['cart'=>$cart]);
        return redirect()->route('shop_cart');
    }
}
