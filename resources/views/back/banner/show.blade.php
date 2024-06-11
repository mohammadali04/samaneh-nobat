@extends('back.index')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">صفحه ی افزودن بنر</h4>
        <form class="forms-sample" action="{{Route('admin.update.banner',$banner->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">عنوان</label>
                <input name="title" class="form-control" type="text" value="{{$banner->title}}">
            </div>
            <div class="form-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="img" value="{{$banner->img}}">
                <img src="{{$banner->img}}" class="w-50 h-50">
            </div>
            <button class="btn btn-primary me-2" type="submit">Submit</button>
            <a class="btn btn-primary" href="{{Route('admin.index')}}">بازگشت به صفحه اصلی</a>
        </form>
    </div>
</div>
@endsection