@extends('front3.index')
@section('content')
<div class="container">
    <div class="col-lg-10 grid-margin stretch-card" style="margin:100px;text-align:rtl">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">لیست مورد علاقه من</h4>
                <div class="table-responsive">
                    <table class="table" style="border:1px solid">
                        <tbody>
                            <tr>
                                <td>نام ارائه دهنده خدمات</td>
                                <td>نام سرویس</td>
                                <td>آدرس</td>
                                <td>مشاهده سرویس</td>
                            </tr>
                            @foreach($services as $service)
                            <tr>
                                @php
                                $address=$service->address()->first();
                                @endphp
                                <td>{{$service->worker}}</td>
                                <td>{{$service->title}}</td>
                                <td>{{$address->address}}</td>
                                <td><a href="{{Route('show.service.detail',$service->id)}}">مشاهده</a></td>                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn-primary" href="{{Route('index')}}">بازگشت به صفحه ی اصلی</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection