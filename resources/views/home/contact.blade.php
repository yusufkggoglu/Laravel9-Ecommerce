@extends('layouts.home')

@section('title','İletişim | '.$setting->title)
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
                    <span>İletişim</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Map Section Begin -->
<div class="map spad">
    <div class="container">
        <div class="map-inner">
            {!! $setting->googlemaps !!}
        </div>
    </div>
</div>
<!-- Map Section Begin -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-title">
                    <h4>Biz Kimiz ?</h4>
                    <p>{!! $setting->contact !!}</p>
                </div>
                <div class="contact-widget">
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="ci-text">
                            <span>Adres:</span>
                            <p>{{$setting->address}}</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <span>Telefon:</span>
                            <p>{{$setting->phone}}</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="ci-text">
                            <span>Email:</span>
                            <p>{{$setting->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1" id="contact">
                <div class="contact-form">
                    <div class="leave-comment">
                        <h4>İletişim Formu</h4>
                        <p>Yardıma mı ihtiyacın var ? Bizimle buradan iletişime geçebilirsin.</p>
                        @include('home.messages')

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <strong style="text-transform: capitalize">{{$error}}</strong>
                                </div>
                            @endforeach
                        @endif
                        <form action="{{route('storemessage')}}" method="post" class="comment-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" name="name" placeholder="Ad Soyad">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="email" placeholder="Email">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="phone" placeholder="Telefon">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="Mesaj"></textarea>
                                    <button type="submit" class="site-btn">Gönder</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
@endsection