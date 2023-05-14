<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    {{$setting->email}}
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    {{$setting->phone}}
                </div>
            </div>
            <div class="ht-right">
                @guest()
                <a href="/loginuser" class="login-panel"><i class="fa fa-user"></i>Giriş yap</a>
                @endguest()
                @auth()
                <a class="login-panel"><i class="fa fa-user"></i>{{Auth::user()->name}}</a>
                @endauth()
                <div class="lan-selector">
                    <select class="language_drop" name="countries" id="countries" style="width:300px;">
                        <option value='yt' data-image="{{asset('assets')}}/home/img/flag-1.jpg" data-imagecss="flag yt" data-title="English">English</option>
                        <option value='yu' data-image="{{asset('assets')}}/home/img/flag-2.jpg" data-imagecss="flag yu" data-title="Bangladesh">German </option>
                    </select>
                </div>
                <div class="top-social">
                    <a href="{{$setting->facebook}}"><i class="ti-facebook"></i></a>
                    <a href="{{$setting->twitter}}"><i class="ti-twitter-alt"></i></a>
                    <a href="{{$setting->instagram}}"><i class="ti-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="/">
                            <img src="{{asset('assets')}}/home/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">Tüm Kategori</button>
                        <div class="input-group">
                            <input type="text" placeholder="Ne ihtiyacınız var">
                            <button type="button"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <li class="cart-icon">
                            <a href="#">
                                <i class="icon_bag_alt"></i>
                                <span>3</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="si-pic"><img src="{{asset('assets')}}/home/img/select-product-1.jpg" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>$60.00 x 1</p>
                                                        <h6>Kabino Bedside Table</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="si-pic"><img src="{{asset('assets')}}/home/img/select-product-2.jpg" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>$60.00 x 1</p>
                                                        <h6>Kabino Bedside Table</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5>$120.00</h5>
                                </div>
                                <div class="select-button">
                                    <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price">$150.00</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>Kategoriler</span>
                    <ul class="depart-hover">
                        @foreach($categories as $rs)
                            <li><a href="/shop/category/{{$rs->id}}">{{$rs->title}}</a></li>
                        @endforeach 
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li class="active"><a href="/">Anasayfa</a></li>
                    <li><a href="/shop">Alışveriş</a></li>
                    <li><a href="/contact">İletişim</a></li>
                    <li><a href="/faq">FAQ</a></li>
                    <!-- <li><a href="">Koleksiyon</a>
                        <ul class="dropdown">
                            @foreach($collections as $rs)
                                <li><a href="/shop/collection/{{$rs->id}}">{{$rs->title}}</a></li>
                            @endforeach
                        </ul>
                    </li> -->
                    @guest()
                    <li><a href="/loginuser">Giriş</a>
                    </li>
                    @endguest()
                    @auth()
                    <li><a href="">Hesap</a>
                        <ul class="dropdown">
                            <li><a href="">{{Auth::user()->name}}</a></li>
                            <li><a href="/logoutuser">Çıkış Yap</a></li>
                        </ul>
                    </li>
                    @endauth()
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>