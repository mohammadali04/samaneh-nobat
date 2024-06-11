@extends('front3.index')
@section('content')
<div class="container" class="container container-fluid bg-light" style="padding:15px;direction:ltr">
<div class="row" style="direction:">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb" style="float:right;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">نمایش ساعت</li>
                    <li class="breadcrumb-item"><a href="{{Route('servicer.show.profile')}}">خانه</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-9 col-sm-6 col-xs-12 stretch-card" style="margin:50px 0">
            <form action="{{Route('update.day.time',$turn->id)}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive pt-3 input-content">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            بازه ی زمانی
                                        </th>
                                        <th>
                                          روز
                                        </th>
                                        <th>
                                            ورودی
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-info">
                                        @php
                                        $x='';
                                        @endphp
                                        @switch($turn->day_id)
                                        @case (1)
                                        @php
                                        $x='شنبه';
                                        @endphp
                                        @break
                                        @case (2)
                                        @php
                                        $x='یکشنبه';
                                        @endphp
                                        @break
                                        @case (3)
                                        @php
                                        $x='دوشنبه';
                                        @endphp
                                        @break
                                        @case (4)
                                        @php
                                        $x='سه شنبه';
                                        @endphp
                                        @break
                                        @case (5)
                                        @php
                                        $x='چهار شنبه';
                                        @endphp
                                        @break
                                        @case (6)
                                        @php
                                        $x='پنج شنبه';
                                        @endphp
                                        @break
                                        @case (7)
                                        @php
                                        $x='جمعه';
                                        @endphp
                                        @break
                                        @endswitch
                                        <td>
                                            <input type="text" name="time" value="{{$turn->time}}">
                                        </td>
                                        <td>
                                        {{$x}}
                                        </td>
                                        <td>
                                            <input type="text"  data-jdp name="date" value="{{$turn->date}}">
                                        </td>
                                        <td>
                                            <button>ویرایش</button>
                                        </td>
                                    </tr>
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