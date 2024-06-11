<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{Route('index')}}">آسان رزرو</a></h1>
      <form class="d-flex" role="search" style="height:auto" action="{{Route('do.search')}}" method="post">
      @csrf
                      <input class="form-control me-2" type="search" name="keyword" placeholder="جست و جو" aria-label="Search" value="@php if(isset($keyword)){echo $keyword;} @endphp">
                      <button class="btn btn-outline-success" type="submit">جستجو</button>
                    </form>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="{{Route('index')}}">خانه</a></li>
          <li><a class="nav-link scrollto" href="#about">درباره ی ما</a></li>
          <li class="dropdown"><a href="#"><span>سایر منو ها</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">منو ها</a></li>
              <li class="dropdown"><a href="#"><span>سایر</span> <i class="bi bi-chevron-right"></i></a>
              @auth
                <ul>
                  <li><a href="{{Route('user.reserved.list')}}">مشاهده لیست رزرو های من</a></li>
                  <li><a href="{{Route('user.favorite.list')}}">مشاهده سرویس های مورد علاقه</a></li>
                  @if(Auth::user()->role()->first()->id==3)
                  <li><a href="{{Route('servicer.show.profile')}}">مشاهده پنل</a></li>
                  @endif
                  @if(Auth::user()->role()->first()->id==4)
                  <li><a href="{{Route('servicer.add.info')}}">ثبت سرویس</a></li>
                  @endif
                  <li><a href="{{Route('logout')}}">خروچ</a></li>
                </ul>
                  @else
                  <ul>
                  <li><a href="{{Route('login')}}">ورود</a></li>
                  <li><a href="{{Route('register')}}">ثبت نام</a></li>
                </ul>
                  @endauth
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#footer">ارتباط با ما</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>

    </div>
  </header><!-- End Header -->