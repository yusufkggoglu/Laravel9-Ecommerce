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
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Login</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Giriş</h2>
                     @include('admin.messages')
                    <form method="post" action="{{route('loginusercheck')}}">
                        @csrf
                        <div class="group-input">
                            <label for="username">Email</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="group-input">
                            <label for="pass">Şifre</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <a href="#" class="forget-pass">Şifremi Unuttum</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Giriş Yap</button>
                    </form>
                    <div class="switch-login">
                        <a href="./register.html" class="or-login">Kayıt Ol</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
@endsection