<nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">پنل مدیریت</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{Route('admin.index')}}">خانه</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('index')}}">صقحه اصلی سایت</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{Route('logout')}}" role="button">
                                    خروج
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                            </li>
                        </ul>
                        <div class="d-flex">
                            <h5>پنل مدیریت</h5>
                        </div>
                    </div>
                </div>
            </nav>