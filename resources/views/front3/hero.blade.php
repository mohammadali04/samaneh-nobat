<section id="hero" class="clearfix">
  @php
use App\Models\Banner;
$banner=Banner::find(1);
  @endphp
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-lg-6 intro-info order-lg-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2>راه حل ساده<br>برای <span>بیزینس شما</span></h2>
          <!-- <div>
            <a href="#about" class="btn-get-started scrollto">شروع کنید</a>
          </div> -->
        </div>
        @include('layouts.messages')
        <div class="col-lg-6 intro-img order-lg-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{$banner->img}}" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </section>