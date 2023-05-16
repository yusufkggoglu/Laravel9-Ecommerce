@extends('layouts.home')

@section('title','Sepet | '.$setting->title)
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('icon',Storage::url($setting->icon))

@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Anasayfa</a>
                    <span>Sepet</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Fotoğraf</th>
                                <th class="p-name">Ürün Adı</th>
                                <th>Beden</th>
                                <th>Fiyat</th>
                                <th>Adet</th>
                                <th>Toplam Tutar</th>
                                <th><i class="ti-close"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cartItem)
                            @foreach($cartItem as $cart)
                            <br><br>
                            <tr>
                                <a href="/product/{{$cart['productID']}}"><td class="cart-pic"><img src="{{Storage::url($cart['image'])}}" style="width: 100px; height:100px ;" alt=""></td></a>
                                <td class="cart-title">
                                    <h5>{{$cart['name'] ?? ''}} </h5>
                                </td>
                                <td>{{$cart['kind'] ?? ''}}</td>
                                <td>{{$cart['price']}}₺</td>
                                <td class="qua-col">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="quantity" value="{{$cart['quantity']}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="p-price">{{$cart['price'] * $cart['quantity']}}₺</td>
    
                                <a href="/shopcart/remove({{$cart['productID']}}"><td class="close-td"><i class="ti-close"></i></td></a>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <a href="/shop" class="primary-btn continue-shop">Alışverişe devam et</a>
                            <!-- <a href="#" class="primary-btn up-cart">Sepeti Boşalt</a> -->
                        </div>
                        <div class="discount-coupon">
                            <h6>İndirim Kodu</h6>
                            <form action="#" class="coupon-form">
                                <input type="text" placeholder="Kodu giriniz...">
                                <button type="submit" class="site-btn coupon-btn">Gönder</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Sepet <span>{{$totalPrice}}₺</span></li>
                                <li class="subtotal">Kargo <span>20₺</span></li>
                                <li class="cart-total">Toplam <span>{{$totalPrice+20}}₺</span></li>
                            </ul>
                            <a href="#" class="proceed-btn">Ödeme Yap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection