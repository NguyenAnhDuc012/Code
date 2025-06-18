@include('front.layouts.header')

<main>

    <section class="section-4 pt-5">
        <div class="container">
            <div class="section-title">
                <h5>Trang chủ</h5>
            </div>
            <div class="row pb-3">

                @foreach ($sanphams as $sanpham)
                <div class="col-md-3">
                    <div class="card product-card">
                        <div class="product-image position-relative">
                            <a href="{{ route('sanpham.chitiet', ['id' => $sanpham->MaSanPham]) }}" class="product-img">
                                <img class="card-img-top" src="{{ asset('images/' . $sanpham->HinhAnh) }}" alt="">
                            </a>

                            <form action="{{ route('cart.add', $sanpham->MaSanPham) }}" method="POST">
                                @csrf
                                <div class="product-action">
                                    <button class="btn btn-dark">
                                        <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body text-center mt-3">
                            <a class="h6 link" href="{{ route('sanpham.chitiet', ['id' => $sanpham->MaSanPham]) }}">{{ $sanpham->TenSanPham }}</a>
                            <div class="price mt-2">
                                <span class="h5"><strong style="color: #DC0D15;">{{ number_format($sanpham->GiaBan, 0, ',', '.') }} đ</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>


</main>

@include('front.layouts.footer')