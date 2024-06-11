<section id="add-comment-section" style="background-color: #d94125;direction:ltr">
            <style>
            ul {
                float: right;
                height: 32px !important;
                padding: 0;
            }

            ul .star-li {
                width: 32px !important;
                height: 32px !important;
                float: right;
                margin: 2px;
                list-style: none;
                margin-bottom: 3px;
            }

            ul li .far {
                width: 32px !important;
                height: 32px !important;
                display: block;
                background: url('/images/star.png')no-repeat;
            }

            ul li .far.active {
                width: 32px !important;
                height: 32px !important;
                display: block;
                background: url('/images/star-2.png')no-repeat;
            }
            </style>
            <form action="{{Route('user.add.comment')}}" method="POST">
                @csrf
                <div class="container my-5 py-5 text-dark">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-6">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="d-flex flex-start w-100">
                                        <img class="rounded-circle shadow-1-strong me-3"
                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp"
                                            alt="avatar" width="65" height="65" />
                                        <div class="w-100">
                                            <h5>اضافه کردن کامنت</h5>
                                            <ul class="rating mb-3 w-100" data-mdb-toggle="rating">
                                                <li class="star-li">
                                                    <i class="far fa-star fa-sm text-danger" title="Bad"></i>
                                                </li>
                                                <li class="star-li">
                                                    <i class="far fa-star fa-sm text-danger" title="Poor"></i>
                                                </li>
                                                <li class="star-li">
                                                    <i class="far fa-star fa-sm text-danger" title="OK"></i>
                                                </li>
                                                <li class="star-li">
                                                    <i class="far fa-star fa-sm text-danger" title="Good"></i>
                                                </li>
                                                <li class="star-li">
                                                    <i class="far fa-star fa-sm text-danger" title="Excellent"></i>
                                                </li>
                                            </ul>
                                            <input id="stars-score" type="hidden" name="score" value="">
                                            <input type="hidden" name="service_id"
                                                value="{{$service->id}}">
                                            <div class="form-outline">
                                                <textarea class="form-control" id="textAreaExample" rows="4"
                                                    name="body"></textarea>
                                                <label class="form-label" for="textAreaExample">دیدگاه خود را
                                                    بنویسید</label>
                                            </div>
                                            <div class="d-flex justify-content-end mt-3">
                                                <button type="submit" class="btn btn-success">ارسال</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>