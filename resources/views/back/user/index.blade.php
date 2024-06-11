@extends('back.index')
@section('content')
@include('layouts.messages')
<div class="d-flex justify-content-between align-items-start">
    <div>
        <h4 class="card-title card-title-dash">صفحه مدیریت کاربران </h4>
    </div>
    <div>
        <a onclick="submitForm()" type="button" class="btn btn-primary btn-lg text-white mb-0 me-0"
            style="background:red"><i class="mdi mdi-account-plus"></i>حذف</a>
    </div>
</div>

<div class="table-responsive  mt-1">
    <table class="table select-table">
        <thead>
            <tr>
                </th>
                <th>کد</th>
                <th>نام</th>
                <th>ایمیل</th>
                <th>تلفن</th>
                <th>مدیریت</th>
            </tr>
        </thead>
        <tbody>
            <form action="{{Route('admin.user.destroy')}}" method="get">
                @csrf
                @foreach($users as $user)
                <tr>
                    <td>
                        {{$user->id}}
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->created_at}}
                    </td>
                    <td>
                        <div class="form-check form-check-flat mt-0">
                            <label class="form-check-label">
                                <input type="checkbox" name="ids[]" value="{{$user->id}}" aria-checked="false"
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