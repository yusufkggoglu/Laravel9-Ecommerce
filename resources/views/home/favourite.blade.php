@extends('layouts.home')

@section('title',$setting->title)
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('icon',Storage::url($setting->icon))

@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Anasayfa</a>
                    <span>Favorilerim</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        @if($data)
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">

                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                            <p>{{$data->count()}} Favori</p>
                        </div>
                    </div>
                </div>
                <div class="product-list">
                    <div class="row">
                        @foreach($data as $rs)
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <a href="/product/{{$rs->product_id}}">

                                        <img src="{{Storage::url($rs->image)}}" alt="">
                                    </a>
                                    <div class="sale pp-sale">Satın Al</div>
                                    <div class="icon">
                                        <form method="POST" action="{{route('favourite_add')}}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$rs->product_id}}">
                                            <button type="submit" class="icon_heart_alt"></i>
                                        </form>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="/product/{{$rs->product_id}}"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="/product/{{$rs->product_id}}">+ Görüntüle</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <a href="/product/{{$rs->product_id}}">
                                        <h5>{{$rs->title}}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        @endif
        @if($data)
        <h3 style="text-align: center;">Beğenilen Ürünler Bulunamadı !</h3>
        <br><br>
        <div class="col-lg-12">
            <div class="cart-buttons" style="text-align: center;">
                <a href="/shop" class="primary-btn up-cart">Alışverişe devam et</a>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection