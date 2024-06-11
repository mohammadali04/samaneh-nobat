<script src="{{asset('/js/jquery-3.6.0.min.js')}}"></script>
<link href="{{asset('/main-files/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<div class="container container-fluid bg-light justify-content-center" style="padding:15px;direction:rtl">
@include('layouts.messages')
    <div class="row">
        <div class="col-lg-8 col-md-9 col-md-6 col-xs-12 grid-margin stretch-card" style="padding:15px;direction:rtl">
            <div class="card">
                <div class="card-body">
                    <h class="card-title" style="margin:20px 0">فرم ثبت اطلاعات ارائه دهنده خدمات</h>
                    <p class="card-description" style="margin:20px 0">
                        اطلاعات خود را وارد کنید
                    </p>
                    <form class="forms-sample" action="{{Route('servicer.store.info')}}" method="POST">
                        @csrf
                        <div class="form-group">
                        <label for="exampleInput">دسته ها</label>
                           <select name="category_id">
                            دسته ها
                            @foreach($categories as $category)
                                        <option class="dropdown-item" value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">نام صاحب سرویس</label>
                            <input type="text" class="form-control" name="worker" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone">شماره تماس</label>
                            <input type="text" class="form-control" name="phone" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">عنوان سرویس</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">آدرس</label>
                            <textarea type="text" class="form-control" name="address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">تصویر</label>
                            <input type="text" class="form-control" name="img">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">توضیحات</label>
                            <textarea type="text" class="form-control" name="detail"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">ارسال</button>
                        <button class="btn btn-light">لغو</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="{{asset('/main-files/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
