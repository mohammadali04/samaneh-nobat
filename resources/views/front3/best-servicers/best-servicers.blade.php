<section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

        <header class="section-header">
          <h3>بهترین سرویس ها</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">
                @foreach($best_services as $service)
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <img src="{{asset('/main-files/assets/img/testimonial-1.jpg')}}" class="testimonial-img" alt="">
                    <h3>{{$service->worker}}</h3>
                    <h4>{{$service->title}}</h4>
                    <p>
                      {{$service->detail}}
                    </p>
                  </div>
                </div><!-- End testimonial item -->
                @endforeach
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>

      </div>
    </section>