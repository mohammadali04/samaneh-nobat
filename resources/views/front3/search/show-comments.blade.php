<section style="background-color: #ad655f;">
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="card text-dark">
                    <div class="card-body p-4">
                        <h4 class="mb-0">نظرات کاربران</h4>
                        <p class="fw-light mb-4 pb-2">آخرین نظرات</p>
                        @foreach($comments as $comment)
                        <div class="card-body p-4">
                            <div class="d-flex flex-start">
                                <div>
                                    <h6 class="fw-bold mb-1">{{$comment->name}}</h6>
                                    <div class="d-flex align-items-center mb-3">
                                        <p class="mb-0">
                                            {{$comment->updated_at}}
                                            <span class="badge bg-success">Approved</span>
                                        </p>
                                        <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                        <a href="#!" class="text-success"><i class="fas fa-redo-alt ms-2"></i></a>
                                        <a href="#!" class="link-danger"><i class="fas fa-heart ms-2"></i></a>
                                    </div>
                                    <p class="mb-0">
                                        {{$comment->body}}
                                    </p>
                                    <style>
                                    #show-score {
                                        width: 160px;
                                        height: 32px;
                                        margin: 10px 0;
                                        float: left;
                                    }

                                    #show-score ul {
                                        float: left;
                                        width: 160px;
                                        height: 32px;
                                        padding: 0;
                                        margin: 0;
                                        list-style: none;
                                    }

                                    #show-score ul li {
                                        float: left;
                                        width: 32px;
                                        height: 32px;
                                        padding: 0;
                                        margin: 0;

                                    }

                                    #show-score ul li span {
                                        display: block;
                                        width: 32px;
                                        height: 32px;
                                        background: url('/images/star.png');
                                    }

                                    #show-score ul li span.full {
                                        background: url('/images/star-2.png') !important;
                                    }
                                    </style>
                                    <div id="show-score" style="">
                                        <ul>
                                            <?php
                                             $score=$comment->score()->first()->score;
                                            
                                    for ($i = 0;
                                         $i < $score;
                                         $i++) {
                                        ?>
                                            <li>
                                                <span class="full"></span>
                                            </li>
                                            <?php } ?>
                                            <?php
                                    for ($i = 0;
                                         $i < 5 - $score;
                                         $i++) {
                                        ?>
                                            <li>
                                                <span></span>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" style="height: 1px;" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>