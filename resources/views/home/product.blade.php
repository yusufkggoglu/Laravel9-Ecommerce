@extends('layouts.home')

@section('title',$data->title)
@section('description',$data->description)
@section('keywords',$data->keywords)
@section('icon',Storage::url($setting->icon))

@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="/"><i class="fa fa-home"></i> Anasayfa</a>
                    <a href="/shop">Alışveriş</a>
                    <span>{{$data->title}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            @if(session()->get('success'))
                            <div class="alert alert-success">{{session()->get('success')}}</div>
                            @endif
                        </div>
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="{{Storage::url($firstimage->image)}}" alt="">
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                @foreach($images as $rs)
                                <div class="pt" data-imgbigurl="{{Storage::url($rs->image)}}">
                                    <img src="{{Storage::url($rs->image)}}" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span>{{$data->color}}</span>
                                <h3>{{$data->title}}</h3>
                                <a href="/favourite/add/{{$data->id}}" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                            <div class="pd-desc">
                                <p>{!! $data->description !!}</p>
                                <h4>{{$data->price}} ₺</h4>
                            </div>
                            <div class="pd-color">
                                <h6>Renk</h6>
                                <div class="pd-color-choose">
                                    @foreach($sameproducts as $rs)
                                    <div class="cc-item">
                                        <a href="/product/{{$rs->id}}">
                                            <label for="cc-black" style="background-color:<?= $rs['color_hex_code']; ?>"></label>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <form action="{{route('shop_cart_add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$data->id}}">
                                <div class="filter-widget">
                                    <h4 class="fw-title">Beden</h4>
                                    <div class="fw-size-choose">
                                        @foreach($stock as $rs)
                                        <div class="sc-item">
                                            <input type="radio" name="kind" value="{{$rs->kind}}" id="{{$rs->kind}}-size">
                                            <label for="{{$rs->kind}}-size">{{$rs->kind}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="quantity" value="1">
                                    </div>
                                    <button type="submit" class="primary-btn pd-cart">Sepete Ekle</button>
                                </div>
                            </form>
                            <ul class="pd-tags">
                                <li><span>Kategori :</span> {{$data->category->title}}</li>
                            </ul>
                            <div class="pd-share">
                                <div class="p-code">Ürün Kodu :{{$data->product_code}}</div>
                                <div class="pd-social">
                                    <a href="{{$setting->facebook}}"><i class="ti-facebook"></i></a>
                                    <a href="{{$setting->twitter}}"><i class="ti-twitter-alt"></i></a>
                                    <a href="{{$setting->instagram}}"><i class="ti-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#tab-1" role="tab">Açıklama</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-2" role="tab">Özellik</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-3" role="tab">Yorum</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <h5>Giriş</h5>
                                            <p>{!! $data->description !!}</p>
                                            <h5>Özellik</h5>
                                            <p>{!! $data->detail !!}</p>
                                        </div>
                                        <div class="col-lg-5">
                                            <img src="img/product-single/tab-desc.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="specification-table">
                                    <table>
                                        <tr>
                                            <td class="p-catagory">Müşteri Değendirmesi</td>
                                            <td>
                                                <div class="pd-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <span>(5)</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Fiyat</td>
                                            <td>
                                                <div class="p-price">{{$data->price}} ₺</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Sepet</td>
                                            <td>
                                                <div class="cart-add">+ Ekle</div>
                                            </td>
                                        </tr>
                                        @foreach($stock as $rs)
                                        <tr>
                                            <td class="p-catagory">{{$rs->kind}}</td>
                                            <td>
                                                <div class="p-stock">{{$rs->stock}} adet</div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="p-catagory">Renk</td>
                                            <td><span class="cs-color" style="background-color:<?= $data['color_hex_code']; ?>;"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Ürün Kodu
                                            </td>
                                            <td>
                                                <div class="p-code">{{$data->product_code}}</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="customer-review-option">
                                    <h4>Yorum ({{$comment->count('id')}})</h4>
                                    <div class="comment-option">
                                        @foreach($comment as $rs)
                                        <div class="co-item">
                                            <div class="avatar-pic">
                                                <img src="{{asset('assets')}}/home/img/user.png" alt="">
                                            </div>
                                            <div class="avatar-text">
                                                <div class="at-rating">
                                                    <!-- <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i> -->
                                                </div>
                                                <h5>{{$rs->user->name}} <span>{{$rs->created_at}}</span></h5>
                                                <div class="at-reply">{{$rs->comment}}</div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="leave-comment">
                                        <h4>Yorum yazıp fikirlerinizi paylaşabilirsiniz...</h4>
                                        <form action="{{route('storecomment')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <input class="input" type="hidden" name="product_id" value="{{$data->id}}">
                                                <div class="col-lg-12">
                                                    <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5" placeholder="Yorumunu bu alana yazabilirsin ..."></textarea>
                                                    <input class="btn btn-main btn-round-full" type="submit" id="submit" value="Gönder">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Related Products Section End -->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Benzer Ürünler</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($relationproduct as $rs)
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{Storage::url($rs->image)}}" alt="">
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
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
                            {{$rs->price}} ₺
                            <!-- <span>$35.00</span> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Related Products Section End -->

@endsection