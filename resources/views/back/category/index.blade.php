@extends('back.index')
@section('content')
@include('layouts.messages')
<div class="d-sm-flex justify-content-between align-items-start">
    <div>
        <h4 class="card-title card-title-dash">صفحه مدیریت دسته ها</h4>
    </div>
    <div>
        <a href="{{Route('admin.category.create')}}" type="button"
            class="btn btn-primary btn-lg text-white mb-0 me-0"><i class="mdi mdi-account-plus"></i>افزودن دسته ی
            جدید</a>
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
            <form action="{{Route('admin.category.destroy')}}" method="get">
                @csrf
                @foreach($categories as $category)
                <tr>
                    <td>
                        {{$category->id}}
                    </td>
                    <td>
                        {{$category->title}}
                    </td>
                    <td>
                        {{$category->attribute}}
                    </td>
                    <td>
                        {{mb_substr(strip_tags($category->description),0,50)}}
                    </td>
                    <td>
                        <img class="item-img" src="{{$category->img}}">
                    </td>
                    <td><a href="{{Route('admin.category.edit',$category->id)}}">ویرایش</a></td>
                    <td>
                        <div class="form-check form-check-flat mt-0">
                            <label class="form-check-label">
                                <input type="checkbox" name="ids[]" value="{{$category->id}}" aria-checked="false"
                                    class="form-check-input"><i class="input-helper"></i></label>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>


@endsection
<script>
function submitForm() {
    $('form').submit();
}
</script>