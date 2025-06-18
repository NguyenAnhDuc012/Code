@include('front.layouts.header')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a style="color: #DC0D15;" class="white-text" href="{{ route('front.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a style="color: #DC0D15;" class="white-text" href="{{ route('front.home') }}">Cửa hàng</a></li>
                    <li class="breadcrumb-item">Chi tiết sản phẩm</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-7 pt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img class="w-100 h-100" src="{{ asset('images/' . $sanpham->HinhAnh) }}" alt="{{ $sanpham->TenSanPham }}">
                </div>
                <div class="col-md-7">
                    <div class="bg-light right">
                        <h1>{{ $sanpham->TenSanPham }}</h1>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(99 Reviews)</small>
                        </div>
                        <h2 style="color: #DC0D15;" class="price">{{ number_format($sanpham->GiaBan, 0, ',', '.') }} VNĐ</h2>

                        <p>{{ $sanpham->MoTa }}</p>

                        <form action="{{ route('cart.add', $sanpham->MaSanPham) }}" method="POST">
                            @csrf
                            <div class="product-action">
                                <button class="btn btn-dark">
                                    <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <h4 class="mb-4">Bình luận về sản phẩm</h4>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (Auth::check())
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('comment.store', $sanpham->MaSanPham) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="binhluan">Viết bình luận của bạn:</label>
                        <textarea name="NhanXet" class="form-control" id="binhluan" rows="3" placeholder="Nhập bình luận..." required></textarea>
                    </div>
                    <button style="background-color: #001d3d;" type="submit" class="btn btn-primary mt-2">Gửi bình luận</button>
                </form>
            </div>
        </div>
        @else
        <div class="alert alert-warning">
            Vui lòng <a href="{{ route('front.auth.showLogin') }}">đăng nhập</a> để bình luận.
        </div>
        @endif

        @foreach($sanpham->danhGia as $binhluan)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="me-3">
                        <img style="width: 50px" src="{{ asset('images/meo.jpg') }}" alt="avatar" class="rounded-circle" width="40" height="40">
                    </div>
                    <div>
                        <h6 class="mb-0">{{ $binhluan->nguoiDung->Ten ?? 'Người dùng' }}</h6>
                        <small class="text-muted">{{ $binhluan->created_at->format('H:i d/m/Y') }}</small>
                    </div>
                </div>
                <p class="mb-0">{{ $binhluan->NhanXet }}</p>
            </div>
        </div>
        @endforeach
    </div>

</main>
@include('front.layouts.footer')