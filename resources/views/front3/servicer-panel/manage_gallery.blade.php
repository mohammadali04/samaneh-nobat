@extends('front3.index').
@section('content')
<div class="container container-fluid bg-light" style="padding:15px;direction:ltr">
    <div class="row">
        <div id="content" class="col-lg-8 col-md-9 col-md-6 col-xs-12 grid-margin stretch-card pull-left"
            style="direction:rtl;overflow-y:scroll;height:800px">
            <button class="btn btn-danger" onclick="submitForm()">حذف</button>
            <a class="btn btn-primary" href="{{Route('servicer.add.gallery',$service->id)}}">افزودن</a>
            <form id="form" action="{{Route('servicer.destroy.gallery')}}" method="get">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            ردیف
                                        </th>
                                        <th>
                                            نام
                                        </th>
                                        <th>
                                            نام دسته </th>
                                        <th>
                                            تصویر </th>
                                        <th>
                                            ویرایش
                                        </th>
                                        <th>
                                            انتخاب
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($galleries as $gallery)
                                    <tr class="table-info">
                                        <td>
                                            {{$gallery->id}}
                                        </td>
                                        <td>
                                            {{$gallery->title}}
                                        </td>
                                        @php
                                        $category=$gallery->category()->first();
                                        @endphp
                                        <td>
                                            {{$category->title}}
                                        </td>
                                        <td>
                                            <img class="w-50 h-" src="{{$gallery->img}}">

                                        </td>
                                        <td>
                                            <a href="{{Route('servicer.edit.gallery',$gallery->id)}}">ویرایش</a>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="ids[]" value="{{$gallery->id}}">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @include('front3.servicer-panel.sidebar')
    </div>
</div>
@endsection