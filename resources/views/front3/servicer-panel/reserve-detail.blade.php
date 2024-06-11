@extends('front3.index')
@section('content')
<div class="container" class="container container-fluid bg-light" style="padding:15px;direction:ltr">
<div class="row" style="direction:">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb" style="float:right;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">جزئیات رزرو</li>
                    <li class="breadcrumb-item"><a href="{{Route('servicer.show.profile')}}">خانه</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-9 col-sm-6 col-xs-12 grid-margin stretch-card" style="margin:100px;text-align:rtl">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">مشخصات نوبت</h4>
                    <div class="table-responsive">
                        <table class="table" style="border:1px solid">
                            <tbody>
                                <tr>
                                    <td>نام رزرو کننده</td>
                                    <td>نام سرویس</td>
                                    <td>شماره تماس رزرو کننده</td>
                                    <td>ساعت</td>
                                    <td>تاریخ</td>
                                </tr>
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$service->worker}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$turn->time}}</td>
                                    <td>{{$date}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{Route('servicer.show.profile')}}">بازگشت به صفحه ی اصلی</button>
                    </div>
                </div>
            </div>
        </div>
        @include('front3.servicer-panel.sidebar')
    </div>
</div>
@endsection