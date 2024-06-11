@extends('front3.index')
@section('content')
<div class="container" class="container container-fluid bg-light" style="padding:15px;direction:ltr">
    <div class="row" style="direction:">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb" style="float:right;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">لیست رزرو شده ها</li>
                    <li class="breadcrumb-item"><a href="{{Route('servicer.show.profile')}}">خانه</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div id="content" class="col-lg-8 col-md-9 col-sm-6 col-xs-12"
            style="direction:rtl;height:800px;overflow-y:scroll">
            <div class="row">
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    شماره نوبت
                                </th>
                                <th>
                                    نام
                                </th>
                                <th>
                                    ایمیل
                                </th>
                                <th>
                                    تاریخ
                                </th>
                                <th>
                                    ساعت
                                </th>
                                <th>
                                    مشاهده
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($turns as $turn)
                            <tr class="table-info">
                                <td>
                                    {{$turn->id}}
                                </td>
                                <td>
                                    {{$turn->name}}
                                </td>
                                <td>
                                    {{$turn->email}}
                                </td>
                                <td>
                                    {{$turn->date}}
                                </td>
                                <td>
                                    {{$turn->time}}
                                </td>
                                <td>
                                    <a href="{{Route('show.user.reserved',$turn->id)}}">مشاهده</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('front3.servicer-panel.sidebar')
    </div>
</div>
@endsection