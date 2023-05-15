 <!-- Footer Section Begin -->
 <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="{{asset('assets')}}/home/img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Adres: {{$setting->address}}</li>
                            <li>Telefon: {{$setting->phone}}</li>
                            <li>Email: {{$setting->email}}</li>
                        </ul>
                        <div class="footer-social">
                            <a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a>
                            <a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Sayfalar</h5>
                        <ul>
                            <!-- @foreach($categories as $rs)
                                <li><a href="#">{{$rs->title}}</a></li>
                            @endforeach -->
                            <li><a href="/contact">İletişim</a></li>
                            <li><a href="/shop">Alışveriş</a></li>
                            <li><a href="/faq">SSS</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Hesap</h5>
                        <ul>
                            @auth()
                            <li><a href="/">Sepet</a></li>
                            <li><a href="/">Siparişlerim</a></li>
                            <li><a href="/">Beğendiklerim</a></li>
                            <li><a href="/">Ayarlar</a></li>
                            @endauth()
                            @guest()
                            <li><a href="/loginuser">Giriş</a></li>
                            <li><a href="/registeruser">Kayıt Ol</a></li>
                            @endguest()
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Şimdi Abone Olun</h5>
                        <p>En son mağazamız ve özel tekliflerimiz hakkında e-posta güncellemelerini alın.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="E-mail adresinizi giriniz...">
                            <button type="button">Abone Ol</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |     <a href="www.taykyazilim.com" target="_blank">Tayk Yazılım</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="{{asset('assets')}}/home/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('assets')}}/home/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('assets')}}/home/js/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/home/js/jquery-ui.min.js"></script>
    <script src="{{asset('assets')}}/home/js/jquery.countdown.min.js"></script>
    <script src="{{asset('assets')}}/home/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('assets')}}/home/js/jquery.zoom.min.js"></script>
    <script src="{{asset('assets')}}/home/js/jquery.dd.min.js"></script>
    <script src="{{asset('assets')}}/home/js/jquery.slicknav.js"></script>
    <script src="{{asset('assets')}}/home/js/owl.carousel.min.js"></script>
    <script src="{{asset('assets')}}/home/js/main.js"></script>