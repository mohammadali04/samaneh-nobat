@extends('back.index')
@section('content')
@include('layouts.messages')
<div class="d-sm-flex justify-content-between align-items-start">
    <div>
        <h4 class="card-title card-title-dash">صفحه مدیریت گزینه ها</h4>
    </div>
    <div>
        <a href="{{Route('admin.option.create')}}" type="button" class="btn btn-primary btn-lg text-white mb-0 me-0"><i
                class="mdi mdi-account-plus"></i>افزودن گزینه ی جدید</a>
        <a onclick="submitForm()" type="button" class="btn btn-primary btn-lg text-white mb-0 me-0"><i
                class="mdi mdi-account-plus"></i>حذف</a>
    </div>
</div>

<div class="table-responsive  mt-1">
    <style>
    .item-img {
        width: 50px;
        height: 50px;
    }
    </style>
    <table class="table select-table">
        <thead>
            <tr>
                </th>
                <th>ردیف</th>
                <th>نام</th>
                <th>صفت</th>
                <th>توضیحات</th>
                <th>تصویر</th>
                <th>ویرایش</th>
                <th>انتخاب</th>
            </tr>
        </thead>
        <tbody>
            <form action="{{Route('admin.option.destroy')}}" method="get">
                @csrf
                @foreach($options as $option)
                <tr>
                    <td>
                        {{$option->id}}
                    </td>
                    <td>
                        {{$option->option}}
                    </td>
                    <td>
                        {{mb_substr(strip_tags($option->description),0,50)}}
                    </td>
                    <td>
                        <img class="item-img" src="{{$option->img}}">
                    </td>
                    <td><a href="{{Route('admin.option.edit',$option->id)}}">ویرایش</a></td>
                    <td>
                        <div class="form-check form-check-flat mt-0">
                            <label class="form-check-label">
                                <input type="checkbox" name="ids[]" value="{{$option->id}}" aria-checked="false"
                                    class="form-check-input"><i class="input-helper"></i></label>
                        </div>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection
<script>
function submitForm() {
    $('form').submit();
}
</script>