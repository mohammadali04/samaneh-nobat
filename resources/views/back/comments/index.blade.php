@extends('back.index')
@section('content')
                @include('layouts.messages')
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">صفحه مدیریت دسته ها</h4>
                        </div>
                        <div>
                            <a onclick="submitForm()" type="button"
                                class="btn btn-primary btn-lg text-white mb-0 me-0"><i
                                    class="mdi mdi-account-plus"></i>حذف</a>
                        </div>
                    </div>

                    <div class="table-responsive  mt-1">
                        <style>
                            .item-img{
                                width:50px;
                                height:50px;
                            }
                            </style>
                        <table class="table select-table">
                            <thead>
                                <tr>
                                    </th>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>بدنه</th>
                                    <th>ویرایش</th>
                                    <th>انتخاب</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{Route('admin.comment.destroy')}}" method="get">
                                    @csrf
                                    @foreach($comments as $comment)
                                    <tr>
                                        <td>
                                            {{$comment->id}}
                                        </td>
                                        <td>
                                            {{$comment->name}}
                                        </td>
                                        <td>
                                            {{$comment->email}}
                                        </td>
                                        <td>
                                        {{mb_substr(strip_tags($comment->body),0,50)}}
                                        </td>
                                        <td><a href="{{Route('admin.comment.edit',$comment->id)}}">ویرایش</a></td>
                                        <td>
                                            <div class="form-check form-check-flat mt-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="ids[]" value="{{$comment->id}}"
                                                        aria-checked="false" class="form-check-input"><i
                                                        class="input-helper"></i></label>
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