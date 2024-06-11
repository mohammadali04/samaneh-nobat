<section id="about" class="about">

<div class="container" data-aos="fade-up">
  <div class="row">

    <div class="col-lg-5 col-md-6">
      <div class="about-img" data-aos="fade-right" data-aos-delay="100">
        <img src="{{$about->img}}" alt="">
      </div>
    </div>

    <div class="col-lg-7 col-md-6">
      <div class="about-content" data-aos="fade-left" data-aos-delay="100">
        <h3>درباره ی ما</h3>
        <h2>{{$about->title}}</h2>
        <p>{{$about->detail}}</p>
        <ul>
          @foreach($options as $option)
          <li><i class="bi bi-check-circle"></i>{{$option->option}}</li>
          @endforeach
          
        </ul>
      </div>
    </div>
  </div>
</div>

</section>