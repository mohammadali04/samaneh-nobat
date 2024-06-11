@extends('front3.index')
@section('content')
<div class="container" class="container container-fluid bg-light" style="padding:15px;direction:ltr">
<div class="row" style="direction:">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb" style="float:right;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">افزودن نوبت</li>
                    <li class="breadcrumb-item"><a href="{{Route('servicer.show.profile')}}">خانه</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <style>
        #content {
            width: ;
            height: auto;
            float: right;
        }

        #content .row {
            width: auto;
            height: 40px;
            border-bottom: 1px solid;
            margin: 50px 0;
        }

        #days .day {
            background: aqua;
        }
        </style>
        <div id="content" class="col-lg-8 col-md-9 col-sm-6 col-xs12" style="overflow-y:scroll">
            <form action="{{Route('servicer.store.table')}}" method="POST" style="col-md-8">
                @csrf
                <div class="row">
                    <input id="days" data-jdp name="date" style="width:">
                </div>
                <div class="row input-content">
                    <input class="time-input" name="time[]" style="width:">
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-success">اجرای عملیات</button>
                    <button type="button" id="add-component" class="btn btn-secondary">اضافه کردن ساعت</button>
                </div>
            </form>
            <script>
            jalaliDatepicker.startWatch(days);
            $('#add-component').click(function() {
                $('#content .input-content').append('<input type="text" class="time-input" name="time[]">');
            });
            </script>
        </div>
        @include('front3.servicer-panel.sidebar')
    </div>
</div>

@endsection