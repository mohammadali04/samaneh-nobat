<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h3>دسته ها</h3>
            <p>سرویس ها فعال در سامانه ی آسان رزرو.</p>
        </header>
<style>
    .category-icones{
        width:64px;
        height:64px;
        display:block;
        position:relative;
        left:15px;
        right:0;
        margin:auto;
    }
</style>
        <div class="row g-5">
          @foreach($categories as $category)
          <div class="col-md-6 col-lg-4 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                <div class="box">
                    <i class="category-icones"
                            style="background:url('{{$category->icone}}')no-repeat scroll 0 15px;color: #ff689b;"></i>
                    <h4 class="title"><a href="{{Route('show.category.service',$category->id)}}">{{$category->title}}</a></h4>
                    <p style="text-align:center" class="description">{{strip_tags($category->detail)}}</p>
                </div>
            </div>
            @endforeach
    </div>

    </div>
</section>