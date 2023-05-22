@extends('layouts.home')

@section('title',$setting->title)
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('icon',Storage::url($setting->icon))

@section('content')
 <!-- Shopping Cart Section Begin -->
 <section class="checkout-section spad">
        <div class="container">
            <form action="{{route('checkout_post')}}" method="POST" class="checkout-form">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <h4>İletişim Bilgileri</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">Ad<span>*</span></label>
                                <input type="text" name="firstName" id="fir">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Soyad<span>*</span></label>
                                <input type="text" name="lastName" id="last">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Adres<span>*</span></label>
                                <input type="text"  name="address" id="street"  class="street-first">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Şehir<span>*</span></label>
                                <input type="text" name="city" id="town">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email<span>*</span></label>
                                <input type="text" name="email" id="email">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Telefon<span>*</span></label>
                                <input type="text" name="phone" id="phone">
                            </div>
                        </div>
                        <h4>Ödeme Bilgileri</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="fir">Kart Sahibinin Adı Soyadı<span>*</span></label>
                                <input type="text" name="cartNameSurname" id="fir">
                            </div>
                            <div class="col-lg-12">
                                <label for="fir">Kart Numarası<span>*</span></label>
                                <input type="text" name="cartCode" id="fir">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Son Kullanım Ay<span>*</span></label>
                                <input type="text" name="cartMonth" id="last">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Son Kullanım Yıl<span>*</span></label>
                                <input type="text" name="cartYear" id="last">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">CVC<span>*</span></label>
                                <input type="text" name="cartCvc" id="town">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">
                            <h4>Sipariş</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Ürün <span>Tutar</span></li>
                                    @foreach($cartItem as $rs)
                                    <li class="fw-normal">{{$rs['name']}} , {{$rs['quantity']}} adet - {{$rs['kind']}}<span>{{$rs['price']}}</span></li>
                                    @endforeach
                                    <li class="fw-normal">Kargo <span>20₺</span></li>
                                    <li class="total-price">Toplam <span>{{$totalPrice+20}}₺</span></li>
                                </ul>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Sipariş ver</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection