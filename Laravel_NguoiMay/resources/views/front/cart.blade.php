@include('front.layouts.header')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a style="color: #DC0D15;" class="white-text" href="{{ route('front.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a style="color: #DC0D15;" class="white-text" href="{{ route('front.home') }}">Cửa hàng</a></li>
                    <li class="breadcrumb-item">Giỏ hàng</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-9 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">

                        @if(session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                        @endif

                        <table class="table" id="cart">
                            <thead style="background-color: #fff; color: black;">
                                <tr>
                                    <th>Mã</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td><img src="{{ asset($item['image']) }}" width="100" height="100"></td>
                                    <td>{{ $item['name'] }}</td>
                                    <td style="color: #DC0D15;">{{ number_format($item['price'], 0, ',', '.') }} đ</td>
                                    <td>
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <form action="{{ route('cart.decrease', $item['id']) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <input type="text" class="form-control form-control-sm border-0 text-center" value="{{ $item['quantity'] }}" readonly>
                                            <div class="input-group-btn">
                                                <form action="{{ route('cart.increase', $item['id']) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="color: #DC0D15;">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} đ</td>
                                    <td>
                                        <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">

                    <div class="card cart-summery shadow-sm border-0 p-3">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div class="d-flex align-items-center me-4">
                                <span class="me-2 font-weight-medium">Tạm tính:</span>
                                <span>{{ number_format($total, 0, ',', '.') }} đ</span>
                            </div>

                            <div class="d-flex align-items-center me-4">
                                <span class="me-2 font-weight-medium">Phí vận chuyển:</span>
                                <span>Miễn phí</span>
                            </div>

                            <div class="d-flex align-items-center me-4">
                                <strong class="me-2">Tổng cộng:</strong>
                                <strong style="color: #DC0D15;">{{ number_format($total, 0, ',', '.') }} đ</strong>
                            </div>

                            <div>
                                <a href="{{ route('front.order.showOrder') }}" class="btn btn-dark text-uppercase font-weight-bold px-4 py-2">
                                    Tiến hành thanh toán
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>

@include('front.layouts.footer')