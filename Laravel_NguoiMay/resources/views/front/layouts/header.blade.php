<!DOCTYPE html>
<html class="no-js" lang="en_AU" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Đồng Hồ Xịn</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />

    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />

    <meta property="og:locale" content="en_AU" />
    <meta property="og:type" content="website" />
    <meta property="fb:admins" content="" />
    <meta property="fb:app_id" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="" />
    <meta property="og:image:height" content="" />
    <meta property="og:image:alt" content="" />

    <meta name="twitter:title" content="" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:image:alt" content="" />
    <meta name="twitter:card" content="summary_large_image" />


    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/video-js.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/style.css') }}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="#" />
</head>

<body data-instant-intensity="mousedown">

    <div class="bg-light top-header" style="background-color: #000000 !important;">
        <div class="container">
            <div class="row align-items-center py-3 d-none d-lg-flex justify-content-between">

                <div class="col-lg-3 logo">
                    <a href="{{ route('front.home') }}" class="text-decoration-none">
                        <img src="{{ asset('images/logo.png') }}" alt="" style="width: 240px" ;>
                    </a>
                </div>

                <div class="col-lg-3">
                    <form action="" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-3 col-3 text-left  d-flex justify-content-end align-items-center">
                    @if (Auth::check())
                    <span class="mr-3 text-white">Chào, {{ auth()->user()->Ten }}</span>
                    <a href="{{ route('front.auth.logout') }}" class="nav-link text-white">Đăng xuất</a>
                    @else
                    <a href="{{ route('front.auth.showLogin') }}" class="nav-link text-white">Đăng nhập</a>
                    @endif

                </div>

                <div class="col-lg-3 col-3 text-left  d-flex justify-content-end align-items-center">
                    <a href="{{ route('cart.show') }}" class="ml-3 d-flex pt-2" style="margin-right: 32px;">
                        <i class="fas fa-shopping-cart" style="font-size: 32px; color: #fff;"></i>
                    </a>

                    <a href="{{ route('front.myOrders') }}" class="ml-3 d-flex pt-2">
                        <i class="fas fa-user text-white" style="font-size: 32px;"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <header class="bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-xl" id="navbar">
                <a href="#" class="text-decoration-none mobile-logo">
                    <span class="h2 text-uppercase text-primary bg-dark">Online</span>
                    <span class="h2 text-uppercase text-white px-2">SHOP</span>
                </a>
                <button class="navbar-toggler menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="navbar-toggler-icon fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        @foreach($thuonghieus as $thuonghieu)
                        <li class="nav-item dropdown">
                            <a href="#" class="btn btn-dark dropdown-toggle">
                                {{ $thuonghieu->TenThuongHieu }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- tạm xóa -->

            </nav>
        </div>
    </header>