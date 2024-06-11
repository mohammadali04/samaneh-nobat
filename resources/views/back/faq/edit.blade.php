@extends('back.index')
@section('content')
    <div class="card" id="option-content">
        <div class="card-body">
            <h4 class="card-title">صفحه ی افزودن faq</h4>
            <p class="card-description">

            </p>
            <form id="question-form" class="forms-sample" action="{{Route('admin.faq.update',$faq->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">سوال</label>
                    <textarea class="form-control" name="question"
                    class="option-value form-control">{{$faq->question}}</textarea>
                    <label for="name">جواب</label>
                    <textarea class="form-control" name="answer"
                        class="option-value form-control">{{$faq->answer}}</textarea>
                </div>
              </form>
              <button class="btn btn-primary me-2" onclick="submitForm()">Submit</button>
        </div>
    </div>
@endsection
