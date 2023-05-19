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
                    <span>Alışveriş</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <form class="form" action="/shop">
                    @csrf
                    <div class="filter-widget">
                        <h4 class="fw-title">Koleksiyon</h4>
                        <div class="fw-brand-check">
                            @foreach($collections as $rs)
                            <div class="bc-item">
                                <label>
                                    {{$rs->title}}
                                    <input type="radio" name="collection_id" value="{{$rs->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Kategori</h4>
                        <div class="fw-brand-check">
                            @foreach($categories as $rs)
                            <div class="bc-item">
                                <label>
                                    {{$rs->title}}
                                    <input type="radio" name="category_id" value="{{$rs->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Fiyat</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" name="min" id="minamount">
                                    <input type="text" name="max" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="0" data-max="1000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Renk</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" name="color" value="Siyah" id="cs-black">
                                <label class="cs-black" for="cs-black">Siyah</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="color" value="Mor" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">Mor</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="color" value="Mavi" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">Mavi</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="color" value="Sarı" id="cs-yellow">
                                <label class="cs-yellow" for="cs-yellow">Sarı</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="color" value="Kırmızı" id="cs-red">
                                <label class="cs-red" for="cs-red">Kırmızı</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="color" value="Yeşil" id="cs-green">
                                <label class="cs-green" for="cs-green">Yeşil</label>
                            </div>
                        </div>
                        <button type="submit" class="filter-btn">Filtrele</button>
                    </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="select-option">
                                <select name="sort" class="sorting">
                                    <option value="asc">Artan Fiyat</option>
                                    <option value="desc">Azalan Fiyat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                            <p>{{$product->count()}} Ürün</p>
                        </div>
                    </div>
                </div>
                </form>
                <div class="product-list">
                    <div class="row">
                        @foreach($product as $rs)
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{Storage::url($rs->image)}}" alt="">
                                    <div class="sale pp-sale">Satın Al</div>
                                    <div class="icon">
                                            <form method="POST" action="{{route('favourite_add')}}">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$rs->id}}">
                                                <button type="submit" class="icon_heart_alt"></i>
                                            </form>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="/product/{{$rs->id}}"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="/product/{{$rs->id}}">+ Görüntüle</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{$rs->category->title}}</div>
                                    <a href="#">
                                        <h5>{{$rs->title}}</h5>
                                    </a>
                                    <div class="product-price">
                                        {{$rs->price}}₺
                                        <!-- <span>$35.00</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="loading-more">
                    {{ $product->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
@endsection