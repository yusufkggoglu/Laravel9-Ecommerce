@extends('layouts.home')

@section('title',$setting->title)
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('icon',Storage::url($setting->icon))

@section('content')

<!-- Hero Section Begin -->
@include('home.elements._slider')
<!-- Hero Section End -->

<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            @foreach($collections as $rs)
            <div class="col-lg-6">
                <a href="/shop/collection/{{$rs->id}}">
                    <div class="single-banner">
                        <img src="{{Storage::url($rs->yatayimage)}}" alt="{{$rs->title}}">
                        <div class="inner-text">
                            <h4>{{$rs->title}}</h4>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Banner Section End -->

@foreach($collections as $rs)
<!-- Women Banner Section Begin -->
<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="{{Storage::url($rs->dikeyimage)}}">
                    <h2>{{$rs->title}}</h2>
                    <a href="/collection/{{$rs->id}}">Daha Fazla Keşfet</a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                    <li class="active">{{$rs->title}}</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                @foreach(\App\Http\Controllers\HomeController::getProducts($rs->id) as $temp)
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{Storage::url($temp->image)}}" alt="">
                            <div class="sale">Yeni</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="/product/{{$temp->id}}"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="/product/{{$temp->id}}">+ Görüntüle</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$temp->category->title}}</div>
                            <a href="#">
                                <h5>{{$temp->title}}</h5>
                            </a>
                            <div class="product-price">
                                {{$temp->price}} ₺
                                <!-- <span>$35.00</span> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Women Banner Section End -->
@endforeach
<!-- Deal Of The Week Section Begin-->
<!-- <section class="deal-of-week set-bg spad" data-setbg="{{asset('assets')}}/home/img/time-bg.jpg">
    <div class="container">
        <div class="col-lg-6 text-center">
            <div class="section-title">
                <h2>Deal Of The Week</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                    consectetur adipisicing elit </p>
                <div class="product-price">
                    $35.00
                    <span>/ HanBag</span>
                </div>
            </div>
            <div class="countdown-timer" id="countdown">
                <div class="cd-item">
                    <span>56</span>
                    <p>Days</p>
                </div>
                <div class="cd-item">
                    <span>12</span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span>40</span>
                    <p>Mins</p>
                </div>
                <div class="cd-item">
                    <span>52</span>
                    <p>Secs</p>
                </div>
            </div>
            <a href="#" class="primary-btn">Shop Now</a>
        </div>
    </div>
</section> -->
<!-- Deal Of The Week Section End -->


<!-- Instagram Section Begin -->
<!-- <div class="instagram-photo">
    <div class="insta-item set-bg" data-setbg="{{asset('assets')}}/home/img/insta-1.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{asset('assets')}}/home/img/insta-2.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{asset('assets')}}/home/img/insta-3.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{asset('assets')}}/home/img/insta-4.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{asset('assets')}}/home/img/insta-5.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{asset('assets')}}/home/img/insta-6.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
</div> -->
<!-- Instagram Section End -->
@endsection