@extends('front3.index')
@section('content')
<div class="container">
<style>
#content {
    direction: rtl;
    width: 700px;
    float: right;
    padding: 20px;
    margin: 20px;
}

#content #top-content {
    float: right;
    width: 100%;

}

#content #top-contenut ul li {
    margin: 10px 0;


}

#content #top-contenut ul li span {
    float: right;
    display: block;
    width: auto;
    height: 30px;
    padding: 5px;
    text-align: center;
}

#content #top-contenut ul li .value {
    margin-right: 20px;
}

#content #bottom-content {
    float: right;
}

.table tr tbody td {
    color: white;
}

#turn-table {}

#turn-table a {
    width: 100%;
    height: 100%;
}
</style>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">صفحه جزئیات
            <small>سرویس</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.html">خانه</a>
            </li>
            <li class="active">سرویس</li>
        </ol>
    </div>
</div>
<div class="row">

    <div class="col-md-8">
        <table class="table" id="turn-table" style="border-collapse:separate;border-spacing:5px;">

            <tbody>

                @foreach($days as $key => $day)
                
                <tr>
                    
                    <td> {{$key}}<input type="hidden" name="currentTime" value="@php if(day==0){echo 'تعیین نشده';}else{echo $day[0]->date;} @endphp"> </td>
                    @foreach($day as $time)
                    @if($day==0)
                    <td style="background:gray">تعیین نشده</td>
                    @else
                    <td style="background:@if($time->active==1){{'red'}}@else{{'green'}}@endif">
                        <a class="user-turn-form" href="{{url('search/bookTurn/'.$time->id.'/1')}}">
                            <input type="hidden" name="user_id" value="1">
                            <input type="hidden" name="time" value="{{$time->time}}">
                            {{$time->time}}
                        </a>
                    </td>
                    @endif
                    @endforeach

                </tr>
                @endforeach
            </tbody>
        </table>
        <button onclick="showNextWeek()">هقته ی بعد</button>
    </div>

    <script>
        function showNextWeek(){
            var currentTime=$('#turn-table tr:last-child input').val();
        var data={'_token': '{{csrf_token()}}','currentTime':currentTime};
        var url='{{Route('show.next.week')}}';
        $.post(url,data,function (msg){
            $('#turn-table').html('');
            $.each(index,value){
                $('#turn-table').append('<tr><input type="hidden" name="currentTime" value="'+value[0]['date']+'"><td>'+index+'</td>');
                value.each(index2,value2){
                    alert(value2);
                }
            $('#turn-table').append('</tr>');
            }
        });
        }
        </script>
    <div class="col-md-4">
        <img style="width:100px;height:100px;border-radius:50%" src="{{$service->img}}">
        <h3>{{$service->title}}</h3>
        <p>{{$address->address}}</p>
        <h3>ویژگی های بارز</h3>
        <ul>
            <li>کیفیت در خدمات</li>
            <li>بدون معطلی</li>
            <li>محیطی کاملا امن</li>
            <li>اعتماد مشتریان</li>
        </ul>
    </div>

</div>
</div>
@endsection