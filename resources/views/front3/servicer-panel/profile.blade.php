@extends('front3.index')
@section('content')
<div class="container container-fluid bg-light" style="padding:15px;direction:ltr">

    <div class="row" style="margin-top:20px">

        <div id="content" class="col-lg-8 col-md-9 col-sm-6 col-xs-12 pull-left" style="text-align:center;padding:5px">
            <div class="row">
                <p style="text-align: right;">سلام {{Auth::user()->name}}</p>
            </div>
            <div class="row" style="margin:15px 0">
                <a href="" style="text-align:left;text-decoration:none"> بازگشت به صفحه ی اصلی</a>
            </div>
          
            <div class="row justify-content-around">
                <div class="col-md-3 col-sm-12 bg-light shadow p-3 mb-5 rounded">
                    <svg class="bg-primary rounded-pill " xmlns="http://www.w3.org/2000/svg" width="100%" height="120px"
                        fill="white" class="bi bi-badge-ad" viewBox="0 0 16 16">
                        <path
                            d="m3.7 11 .47-1.542h2.004L6.644 11h1.261L5.901 5.001H4.513L2.5 11zm1.503-4.852.734 2.426H4.416l.734-2.426zm4.759.128c-1.059 0-1.753.765-1.753 2.043v.695c0 1.279.685 2.043 1.74 2.043.677 0 1.222-.33 1.367-.804h.057V11h1.138V4.685h-1.16v2.36h-.053c-.18-.475-.68-.77-1.336-.77zm.387.923c.58 0 1.002.44 1.002 1.138v.602c0 .76-.396 1.2-.984 1.2-.598 0-.972-.449-.972-1.248v-.453c0-.795.37-1.24.954-1.24z" />
                        <path
                            d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z" />
                    </svg>
                    <p>تعداد تبلیغات من</p>
                    <h3 class="h3 h3-block">14</h3>
                </div>
                <div class="col-md-3 col-sm-12 bg-light shadow p-3 mb-5 rounded">
                    <svg class="bg-warning rounded-pill" xmlns="http://www.w3.org/2000/svg" width="100%" height="120px"
                        fill="white" class="bi bi-bank" viewBox="0 0 16 16">
                        <path
                            d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72l-.25-1Z" />
                    </svg>
                    <p>امور مالی</p>
                    <h3 class="h3 h3-block">14</h3>
                </div>
                <div class="col-md-3 col-sm-12 bg-light shadow p-3 mb-5 rounded">
                    <svg class="bg-primary rounded-pill " xmlns="http://www.w3.org/2000/svg" width="100%" height="120px"
                        fill="white" class="bi bi-cake2" viewBox="0 0 16 16">
                        <path
                            d="m3.494.013-.595.79A.747.747 0 0 0 3 1.814v2.683c-.149.034-.293.07-.432.107-.702.187-1.305.418-1.745.696C.408 5.56 0 5.954 0 6.5v7c0 .546.408.94.823 1.201.44.278 1.043.51 1.745.696C3.978 15.773 5.898 16 8 16c2.102 0 4.022-.227 5.432-.603.701-.187 1.305-.418 1.745-.696.415-.261.823-.655.823-1.201v-7c0-.546-.408-.94-.823-1.201-.44-.278-1.043-.51-1.745-.696A12.418 12.418 0 0 0 13 4.496v-2.69a.747.747 0 0 0 .092-1.004l-.598-.79-.595.792A.747.747 0 0 0 12 1.813V4.3a22.03 22.03 0 0 0-2-.23V1.806a.747.747 0 0 0 .092-1.004l-.598-.79-.595.792A.747.747 0 0 0 9 1.813v2.204a28.708 28.708 0 0 0-2 0V1.806A.747.747 0 0 0 7.092.802l-.598-.79-.595.792A.747.747 0 0 0 6 1.813V4.07c-.71.05-1.383.129-2 .23V1.806A.747.747 0 0 0 4.092.802l-.598-.79Zm-.668 5.556L3 5.524v.967c.311.074.646.141 1 .201V5.315a21.05 21.05 0 0 1 2-.242v1.855c.325.024.659.042 1 .054V5.018a27.685 27.685 0 0 1 2 0v1.964c.341-.012.675-.03 1-.054V5.073c.72.054 1.393.137 2 .242v1.377c.354-.06.689-.127 1-.201v-.967l.175.045c.655.175 1.15.374 1.469.575.344.217.356.35.356.356 0 .006-.012.139-.356.356-.319.2-.814.4-1.47.575C11.87 7.78 10.041 8 8 8c-2.04 0-3.87-.221-5.174-.569-.656-.175-1.151-.374-1.47-.575C1.012 6.639 1 6.506 1 6.5c0-.006.012-.139.356-.356.319-.2.814-.4 1.47-.575ZM15 7.806v1.027l-.68.907a.938.938 0 0 1-1.17.276 1.938 1.938 0 0 0-2.236.363l-.348.348a1 1 0 0 1-1.307.092l-.06-.044a2 2 0 0 0-2.399 0l-.06.044a1 1 0 0 1-1.306-.092l-.35-.35a1.935 1.935 0 0 0-2.233-.362.935.935 0 0 1-1.168-.277L1 8.82V7.806c.42.232.956.428 1.568.591C3.978 8.773 5.898 9 8 9c2.102 0 4.022-.227 5.432-.603.612-.163 1.149-.36 1.568-.591m0 2.679V13.5c0 .006-.012.139-.356.355-.319.202-.814.401-1.47.576C11.87 14.78 10.041 15 8 15c-2.04 0-3.87-.221-5.174-.569-.656-.175-1.151-.374-1.47-.575-.344-.217-.356-.35-.356-.356v-3.02a1.935 1.935 0 0 0 2.298.43.935.935 0 0 1 1.08.175l.348.349a2 2 0 0 0 2.615.185l.059-.044a1 1 0 0 1 1.2 0l.06.044a2 2 0 0 0 2.613-.185l.348-.348a.938.938 0 0 1 1.082-.175c.781.39 1.718.208 2.297-.426Z" />
                    </svg>
                    <p>جشنواره ها</p>
                    <h3 class="h3 h3-block">12</h3>
                </div>
            </div>
            <div class="row justify-content-around" style="margin-top:10px">
                <div class="col-md-8 col-sm-12 bg-light shadow p-3 mb-5 rounded">
                    <svg class="bg-info rounded-pill " xmlns="http://www.w3.org/2000/svg" width="100%" height="120px"
                        fill="white" class="bi bi-camera-video" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z" />
                    </svg>
                    <p>سرویس ها محتوایی</p>
                    <h3 class="h3 h3-block"> 12</h3>
                </div>
                <div class="col-md-3 col-sm-12 bg-light shadow p-3 mb-5  rounded">
                    <svg class="bg-success rounded-pill" xmlns="http://www.w3.org/2000/svg" width="100%" height="120px"
                        fill="white" class="bi bi-chat-square-text" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path
                            d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                    </svg>
                    <p>نظرات کاربران</p>
                    <h3 class="h3 h3-block">18</h3>
                </div>
            </div>
            <div class="row justify-content-center" style="color: white;">
                <div class="row bg-success rounded col-sm-11">
                    <p>همین حالا بهترین تخفیف ها را از ما دریافت کنید</p>
                </div>
                <div class="row bg-info rounded col-sm-11" style="margin-top: 10px;">
                    <p>قابلیت تصب محصولات با یک کلیک به سایت اضافه شد</p>
                </div>
            </div>
        </div>
        @include('front3.servicer-panel.sidebar')
    </div>

    <div class="row" id="footer"></div>
</div>
@endsection