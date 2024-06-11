@extends('front3.index')
@section('content')
<div class="container" class="container container-fluid bg-light" style="padding:15px;direction:ltr">
    <div class="row" style="direction:">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb" style="float:right;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">ویرایش اطلاعات
                    </li>
                    <li class="breadcrumb-item"><a href="{{Route('servicer.show.profile')}}">خانه</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-9 col-md-6 col-xs-12 grid-margin stretch-card pull-left"
            style="padding:15px;direction:rtl">
            <div class="card">
                <div class="card-body">
                    <h class="card-title" style="margin:20px 0">فرم ثبت کالری ارائه دهنده خدمات</h>
                    <p class="card-description" style="margin:20px 0">
                        اطلاعات خود را وارد کنید
                    </p>
                    <form class="forms-sample" action="{{Route('servicer.update.gallery',$gallery->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="service_id" value="{{$service->id}}">
                        <select name="category_id" class="form-select form-select-lg mb-3 w-25"
                            aria-label=".form-select-lg example">
                            <option selected>دسته ها</option>
                            @foreach($gallery_categories as $row)
                            @php
                            $x='';
                            if($gallery->category_id==$row->id){ $x='selected';}

                            @endphp
                            <option value="{{$row->id}}" {{$x}}>{{$row->title}}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="exampleInputUsername1">عنوان </label>
                            <input type="text" class="form-control" name="title" value="{{$gallery->title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">جزئیات</label>
                            <textarea class="form-control" name="detail" id="summernote"
                                class="form-control @error('detail') is-invalid @enderror">{{$gallery->detail}}</textarea>
                        </div>
                        <div class="form-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="img" value="{{$gallery->img}}"
                                class="form-control @error('img') is-invalid @enderror">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        @include('front3.servicer-panel.sidebar')
    </div>
</div>
@endsection