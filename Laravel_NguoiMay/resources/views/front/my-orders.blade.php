@include('front.layouts.header')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a style="color: #DC0D15;" href="#">Tài khoản</a></li>
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
                            <h2 class="h5 mb-0 pt-2 pb-2">Danh sách đơn hàng</h2>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã</th>
                                            <th>Ngày mua</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng tiền</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->MaDonHang }}</td>
                                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <span class="badge {{ $order->TrangThai == 'Đã giao' ? 'bg-success' : ($order->TrangThai == 'Đã hủy' ? 'bg-danger' : 'bg-warning') }}">
                                                    {{ $order->TrangThai }}
                                                </span>

                                            </td>
                                            <td>{{ number_format($order->TongTien, 0, ',', '.') }} đ</td>

                                            <td>
                                                <a href="{{ route('front.orderDetail', $order->MaDonHang) }}" class="btn btn-warning" title="Xem chi tiết">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('front.layouts.footer')