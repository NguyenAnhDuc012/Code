@include('front.layouts.header')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a style="color: #DC0D15;" class="white-text" href="#">Tài khoản</a></li>
                    <li class="breadcrumb-item">Cài đặt</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-11 ">
        <div class="container  mt-5">
            <div class="row">
                <div class="col-md-3">
                    @include('front.layouts.account-panel')
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">Đơn hàng của tôi</h2>
                        </div>

                        <div class="card-body pb-0">
                            <!-- Info -->
                            <div class="card card-sm">
                                <div class="card-body bg-light mb-3">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <!-- Heading -->
                                            <h6 class="heading-xxxs text-muted">ID đơn hàng:</h6>
                                            <!-- Text -->
                                            <p class="mb-lg-0 fs-sm fw-bold">
                                                {{ $order->MaDonHang }}
                                            </p>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <!-- Heading -->
                                            <h6 class="heading-xxxs text-muted">Ngày mua:</h6>
                                            <!-- Text -->
                                            <p class="mb-lg-0 fs-sm fw-bold">
                                                <time datetime="{{ $order->created_at }}">
                                                    {{ $order->created_at->format('d/m/Y') }}
                                                </time>
                                            </p>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <!-- Heading -->
                                            <h6 class="heading-xxxs text-muted">Trạng thái:</h6>
                                            <!-- Text -->
                                            <p class="mb-0 fs-sm fw-bold">
                                                {{ $order->TrangThai }}
                                            </p>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <!-- Heading -->
                                            <h6 class="heading-xxxs text-muted">Tổng tiền:</h6>
                                            <!-- Text -->
                                            <p style="color: #DC0D15;" class="mb-0 fs-sm fw-bold">
                                                {{ number_format($order->TongTien, 0, ',', '.') }} đ
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer p-3">

                            <!-- Heading -->
                            <h6 class="mb-7 h5 mt-4">Sản phẩm đã đặt ({{ $order->chiTietDonHang->count() }})</h6>

                            <!-- Divider -->
                            <hr class="my-3">

                            <!-- List group -->
                            <ul>
                                @foreach($order->chiTietDonHang as $orderDetail)
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-4 col-md-3 col-xl-2">
                                            <!-- Image -->
                                            <a href="#"><img src="{{ asset('images/' . $orderDetail->sanPham->HinhAnh) }}" alt="..." class="img-fluid"></a>
                                        </div>
                                        <div class="col">
                                            <!-- Title -->
                                            <p class="mb-4 fs-sm fw-bold">
                                                <a class="text-body" href="#">{{ $orderDetail->sanPham->TenSanPham }} x {{ $orderDetail->SoLuong }}</a> <br>
                                                <span style="color: #DC0D15;">{{ number_format($orderDetail->sanPham->GiaBan, 0, ',', '.') }} đ</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card card-lg mb-5 mt-3">
                        <div class="card-body">
                            <!-- Heading -->
                            <h6 class="mt-0 mb-3 h5">Thành tiền</h6>

                            <!-- List group -->
                            <ul>

                                <li class="list-group-item d-flex fs-lg fw-bold">
                                    <span>Tổng</span>
                                    <span style="color: #DC0D15;" class="ms-auto">{{ number_format($order->TongTien, 0, ',', '.') }} đ</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('front.layouts.footer')