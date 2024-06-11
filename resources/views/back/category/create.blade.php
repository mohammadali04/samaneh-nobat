@extends('back.index')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">صفحه ی افزودن دسته</h4>
        <p class="card-description">

        </p>
        <form class="forms-sample" action="{{Route('admin.category.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">نام دسته</label>
                <input name="title">
            </div>
            <div class="form-group">
                <label for="title">صفت</label>
                <input name="attribute">
            </div>
            <div class="form-group">
                <label for="name">توضیحات</label>
                <textarea class="form-control" name="detail" id="summernote"
                    class="form-control @error('detail') is-invalid @enderror">{{old('description')}}</textarea>
            </div>
            <div class="form-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="icone" value="{{old('icone')}}"
                    class="form-control @error('img') is-invalid @enderror">
            </div>
            <button class="btn btn-primary me-2" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection