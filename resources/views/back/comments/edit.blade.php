@extends('back.index')
@section('content')
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">صفحه ی ویرایش  نظر</h4>
                  <p class="card-description">
                    
                  </p>
                  <form class="forms-sample" action="{{Route('admin.comment.update',$comment->id)}}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                    <label for="name">بدنه</label>

                    <textarea class="form-control" name="body" id="summernote" class="form-control @error('body') is-invalid @enderror">{{$comment->body}}</textarea>

                </div>                
                    <button class="btn btn-primary me-2" type="submit">Submit</button>
                  </form>
                </div>
              </div>
@endsection