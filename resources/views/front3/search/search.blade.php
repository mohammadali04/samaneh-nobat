@extends('front3.index')
@section('content')
<div class="container bg-light">
    <style>
    .row .parent-favorite-icone {
        position: relative;
    }

    .row .child-favorite-icone {
        position: absolute;
        width: 25px;
        height: 25px;
        background: url('/images/slices.png') no-repeat scroll -1095px -499px;
        bottom: 0;
        left: 0;
        display: block;
        cursor: pointer;
    }

    .row .child-favorite-icone.active {
        background: url('/images/slices.png') no-repeat scroll -1095px -539px;
    }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="font-family:yekan">سرویس ها
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{Route('index')}}">خانه</a>
                </li>
                <li class="active">سرویس ها</li>
            </ol>
        </div>
    </div>
    <div class="row justify-content-around" style="position:relative">
        @if (session('warning'))
        <div class="alert alert-danger">
            {{session('warning')}}
        </div>
        @else
        @foreach($services as $service)
        <div class="card col-lg-4 col-md-4 shadow" style="width:18rem">
            <img src="{{$service->img}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$service->title}}</h5>
                <p class="card-text">@php
                    echo mb_substr(strip_tags($service->detail),0,50,'utf-8').'....';
                    @endphp
                </p>
            </div>
            <ul class="list-group list-group-flush">
                @php
                $address=$service->address()->pluck('address');
                @endphp
                <li class="list-group-item">@php
                    echo mb_substr(strip_tags($address[0]),0,50,'utf-8').'....';
                    @endphp
                </li>
                <!-- <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li> -->
            </ul>
            <div class="card-body">
                <a href="{{Route('show.service.detail',$service->id)}}" class="card-link">بیشتر</a>
                <i class="child-favorite-icone @php if($service->active==1){echo 'active';} @endphp" class="add-link"
                    onClick="addToFavorite({{Auth::user()->id}},{{{$service->id}}},this)">
                </i>
            </div>
        </div>
        @endforeach
        <div style="margin:10px 300px">{{$services->links()}}</div>
    </div>
    @endif
</div>

@endsection
<script>
function addToFavorite(user_id, service_id, tag) {
    var data = {
        '_token': '{{csrf_token()}}',
        'user_id': user_id,
        'service_id': service_id
    };
    var url = '{{Route('add.to.favorite')}}';
    $.post(url, data, function(msg) {
        $(tag).toggleClass('active');
    });
}
</script>