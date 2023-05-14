<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
    @foreach($sliders as $rs)
        <div class="single-hero-items set-bg" data-setbg="{{Storage::url($rs->image)}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>{{$rs->tag}}</span>
                        <h1>{{$rs->title}}</h1>
                        <p>{!! $rs->description !!}</p>
                        <a href="/shop" class="primary-btn">Alışverişe Başla</a>
                    </div>
                </div>
                <!-- <div class="off-card">
                    <h2><br>İndirim</h2>
                </div> -->
            </div>
        </div>
    @endforeach
</section>
<!-- Hero Section End -->