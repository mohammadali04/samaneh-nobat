@extends('front3.index')
@section('content')
<div class="container container-fluid bg-light" style="padding:15px;direction:ltr">
    <div class="row">
    <div id="content" class="col-lg-8 col-md-9 col-md-6 col-xs-12 grid-margin stretch-card pull-left"
            style="direction:rtl;overflow-y:scroll;height:800px">
            <button class="btn btn-danger" onclick="submitForm()">حذف</button>
            <a class="btn btn-primary" href="{{Route('servicer.create.table',$service->id)}}">افزودن</a>
            <form action="{{Route('servicer.store.table')}}" method="POST">
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
                                            روز
                                        </th>
                                        <th>
                                            مشاهده ساعت ها
                                        </th>
                                        <th>
                                            صاعت
                                        </th>
                                        <th>
                                            انتخاب
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($turns as $turn)
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
                                    <tr class="table-info">
                                        <td>
                                            {{$turn->id}}
                                        </td>
                                        <td>
                                            {{$x}}
                                        </td>
                                        <td>
                                            <a href="{{Route('show.day.hours',$turn->id)}}">مشاهده</a>

                                        </td>
                                        <td>
                                            {{$turn->time}}
                                        </td>
                                        <td>
                                            <input type="checkbox">
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