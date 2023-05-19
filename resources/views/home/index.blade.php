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
                @foreach(\App\Http\Controllers\HomeController::getProductsByCollectionID($rs->id) as $temp)
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
<!-- Instagram Section Begin -->
<div class="instagram-photo">
    <div class="insta-item set-bg" data-setbg="{{asset('assets')}}/home/img/insta-1.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="{{$setting->instagram}}">colorlib_Collection</a></h5>
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
</div>
<!-- Instagram Section End -->

<section class="latest-blog spad">
        <div class="container">
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{asset('assets')}}/home/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Ücretsiz kargo</h6>
                                <p>200₺ üzeri siparişler için</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{asset('assets')}}/home/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Zamanında Teslim</h6>
                                <p>2-3 gün içerisinde</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{asset('assets')}}/home/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Güvenli Ödeme</h6>
                                <p>Sanal Post</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection