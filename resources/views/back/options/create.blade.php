@extends('back.index')
@section('content')
    <div class="card" id="option-content">
        <div class="card-body">
            <h4 class="card-title">صفحه ی افزودن گزینه</h4>
            <p class="card-description">

            </p>
            <form id="option-form" class="forms-sample" action="{{Route('admin.store.option')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">گزینه</label>
                    <textarea class="form-control" name="option[]"
                        class="option-value form-control"></textarea>
                </div>
              </form>
              <button class="btn btn-primary me-2" onclick="submitForm()">Submit</button>
              <button id="insert-option" class="btn btn-primary me-2" style="margin:15px 15px;background:blue" onclick="addComponent('option')">افزودن گزینه ی جدید</button>
        </div>
    </div>
@endsection
