@extends('back.index')
@section('content')
    <div class="card">
        <div class="card-body">
            @include('layouts.messages')
            <h4 class="card-title">Default form</h4>
            <p class="card-description">
                Basic form layout
            </p>
            <form class="forms-sample" action="{{Route('admin.bio.update',$about->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان اول</label>
                    <input name="title" value="{{$about->title}}">
                </div>
                <div class="form-group">
                    <label for="name">توضیحات</label>
                    <textarea class="form-control" name="description" id=""
                        class="form-control @error('description') is-invalid @enderror">{{$about->description}}</textarea>
                </div>
                <div class="form-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="img" value="{{$about->img}}"
                        class="form-control @error('img') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input class="form-control" type="text" name="site_banner" value="{{$about->site_banner}}"
                        class="form-control @error('img') is-invalid @enderror">
                </div>
                <button class="btn btn-primary me-2" type="submit">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
@endsection