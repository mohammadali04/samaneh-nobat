@extends('front3.index')
@section('content')
<div class="container bg-light shadow rounded">
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
        margin: 32px 0;


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

        <div class="" id="turn-content">
            @if(count(array_keys($days))==1 && key($days)=='no day')
            <p style="color:red">
                @php
                $msg='برای این سرویس نوبتی وجود ندارد';
                echo $msg;
                @endphp
            </p>
            @else
            <input class="srvc_id" type="hidden" name="service_id" value="{{$service->id}}">
            <input id="today-time" type="hidden" name="today" value="{{$today}}">
            <input id="start-time" type="hidden" name="startTime" value="">
            <input id="end-time" type="hidden" name="endTime" value="{{$friday}}">
            <style>
            #turn-table td:first-child {
                background: aqua;
            }
            </style>
            <table class="table" id="turn-table" style="border-collapse:separate;border-spacing:5px;color:white">

                <tbody>
                    @foreach($days as $key => $day)

                    <tr>

                        <td class="bg-primary"> {{$key}}</td>

                        @if(count($day)==0)
                        <td>
                            <p style="color:red;margin:0">{{'تعیین نشده'}}</p>
                        </td>
                        @else
                        @foreach($day as $time)
                        <td style="background:@if($time->active==1){{'red'}}@else{{'green'}}@endif">
                            @if($time->active==1)
                            {{$time->time}}
                            @else
                            <a class="user-turn-form" href="{{url('search/bookTurn/'.$time->id.'/'.Auth::user()->id)}}">
                                <input type="hidden" name="user_id" value="1">
                                <input type="hidden" name="time" value="{{$time->time}}">

                                {{$time->time}}
                            </a>
                            @endif
                        </td>
                        @endforeach
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button id="next-week-button" onclick="showNextWeek()" class="btn btn-primary" style="color:white">هفته ی
                بعد</button>
            @endif
        </div>


    </div>
    <div class="row">
        @include('front3.search.portfolio');
    </div>
    <div class="row">
        @include('front3.search.add-comment');
    </div>
    <div class="row">
        @include('front3.search.show-comments')
    </div>
</div>
<script>
                            var user_id='{{Auth::user()->id}}';
                function showNextWeek() {
                    
            var service_id = $('#turn-content .srvc_id').val();
            var endTime = $('#end-time').val();
            var data = {'_token': '{{csrf_token()}}','service_id':service_id,'endTime': endTime};
            var url = '{{Route('show.next.week')}}';
            $.post(url, data, function(msg) {
                var i = 1;
                $('#end-time').val(msg[1]);
                $('#start-time').val(msg[2]);
                $('#turn-table').html('');
                $.each(msg[0], function(index, value) {
                    console.log(value);
                    $('#turn-table').append('<tr class="tr' + i +'"><td class="bg-primary">' + index + '</td></tr>');
                    if(value.length==0){$('#turn-table .tr' + i + '').append('<td><p style="color:red;margin:0">تعیین نشده</p></td>');}
                            $.each(value, function(index2, value2) {
                        var color = '';
                        if (value2['active'] == 1) {
                            color = 'red';
                        } else {
                            color = 'green';
                        }
                        $('#turn-table .tr' + i + '').append('<td style="background:' + color +'"><a class="user-turn-form" href="/search/bookTurn/' + value2['id'] +'/'+user_id+'"><input type="hidden" name="user_id" value="1"><input type="hidden" name="time" value="' + value2['time'] + '">' + value2['time'] + '</a></td>');
                    });
                    i++;
                });
                $('#previouse-week-button').remove();
                $('#turn-content').append('<button id="previouse-week-button" button onclick="showPreviouseWeek()" class="btn btn-primary" style="color:white">هفته ی قبل</button>');
                if (msg[3]==1) {
                    $('#next-week-button').remove();
                    $('#previouse-week-button').remove();
                    $('#turn-content').append('<a href="/search/show-service-detail/' + service_id +'">بازگشت به صفحه ی اول</a>');
                }
            });
        }

        function showPreviouseWeek() {
            var service_id = $('#turn-content .srvc_id').val();
            var startTime = $('#start-time').val();
            var today=$('#today-time').val();
            var data = {'_token': '{{csrf_token()}}','service_id':service_id,'startTime': startTime};
            var url = '{{Route('show.previouse.week')}}';
            $.post(url, data, function(msg) {
                var i = 1;
                $('#end-time').val(msg[1]);
                $('#start-time').val(msg[2]);
                $('#turn-table').html('');
                if(msg[3]=='stop'){
                    $('#previouse-week-button').remove();
                }
                $.each(msg[0], function(index, value) {
                    $('#turn-table').append('<tr class="tr' + i +'"><td class="bg-primary">' + index + '</td></tr>');
                    if(value.length==0){$('#turn-table .tr' + i + '').append('<td><p style="color:red;margin:0">تعیین نشده</p></td>');}
                    $.each(value, function(index2, value2) {
                        var color = '';
                        if (value2['active'] == 1) {
                            color = 'red';
                        } else {
                            color = 'green';
                        }
                        $('#turn-table .tr' + i + '').append('<td style="background:' + color +'"><a class="user-turn-form" href="/search/bookTurn/' + value2['id'] +'/'+user_id+'"><input type="hidden" name="user_id" value="1"><input type="hidden" name="time" value="' + value2['time'] + '">' + value2['time'] + '</a></td>');
                    });
                    i++;
                });
            });
        }
        </script>
         <script>
//for the add score
$('.rating li').click(function() {
    var index = $(this).index();
    var i = 0;
    $('.rating li').find('i').removeClass('active');
    while (i < index + 1) {
        $('.rating li').eq(i).find('i').addClass('active');
        i++;
    }
    $('#stars-score').val(index + 1);
    var x = 0;
    $('.rating li').find('i').removeClass('active');
    while (x < index + 1) {
        $('.rating li').eq(x).find('i').addClass('active');
        x++;
    }
});
</script>
@endsection