@extends('back.index')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">صفحه ی افزودن دسته</h4>
        <form class="forms-sample" action="{{Route('admin.update.settings',$settings->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">نام دسته</label>
                <input name="address" value="{{$settings->address}}" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="title">صفت</label>
                <input name="phone" value="{{$settings->phone}}" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="title">صفت</label>
                <input name="email" value="{{$settings->email}}" class="form-control" type="text">
            </div>
            <button class="btn btn-primary me-2" type="submit">Submit</button>
            <a class="btn btn-primary" href="{{Route('admin.index')}}">بازگشت به صفحه اصلی</a>

        </form>
    </div>
</div>
@endsection