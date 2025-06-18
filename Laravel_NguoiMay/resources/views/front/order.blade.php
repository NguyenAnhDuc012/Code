@include('front.layouts.header')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a style="color: #DC0D15;" href="{{ route('front.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a style="color: #DC0D15;" href="{{ route('cart.show') }}">Giỏ hàng</a></li>
                    <li class="breadcrumb-item">Đặt hàng</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-9 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sub-title">
                        <h2>Tóm tắt đơn hàng</h2>
                    </div>
                    <div class="card cart-summery">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle text-center">
                                    <thead style="background-color: #fff; color: black;">
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="60">
                                            </td>
                                            <td>{{ $item['name'] }}</td>
                                            <td style="color: #DC0D15;">{{ number_format($item['price'], 0, ',', '.') }} đ</td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td style="color: #DC0D15;">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} đ</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card payment-form mt-3">
                        <div class="card-body p-0">
                            <form action="{{ route('front.order.place') }}" method="POST">
                                @csrf
                                <div class="p-4">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Tổng tiền hàng:</span>
                                        <strong>{{ number_format($total, 0, ',', '.') }} đ</strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Phí vận chuyển:</span>
                                        <strong>{{ number_format($shippingFee = 30000, 0, ',', '.') }} đ</strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3 border-top pt-2">
                                        <span>Tổng thanh toán:</span>
                                        <strong style="color: #DC0D15;">{{ number_format($total + $shippingFee, 0, ',', '.') }} đ</strong>
                                    </div>
                                    <button type="submit" class="btn-dark btn btn-block w-100">Đặt hàng ngay</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="sub-title">
                        <h2>Thông tin đặt hàng</h2>
                    </div>
                    <div class="card shadow-lg border-0">
                        <div class="card-body checkout-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="">Tên người dùng</label>
                                        <input type="text" class="form-control" value="{{ $user->Ten }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" value="{{ $user->Email }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="">Số điện thoại</label>
                                        <input type="text" class="form-control" value="{{ $user->SoDienThoai }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="">Địa chỉ</label>
                                        <textarea cols="30" rows="3" class="form-control" readonly>{{ $user->DiaChi }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>
@include('front.layouts.footer')