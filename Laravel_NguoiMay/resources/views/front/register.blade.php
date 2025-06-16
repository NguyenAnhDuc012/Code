@include('front.layouts.header')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item">Đăng ký</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-10">
        <div class="container">
            <div class="login-form">
                <form method="POST" action="{{ route('front.auth.register') }}">
                    @csrf
                    <h4 class="modal-title">Đăng ký ngay</h4>
                    <div class="form-group">
                        <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Tên người dùng">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input value="{{ old('email') }}" name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input value="{{ old('password') }}" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input value="{{ old('password_confirmation') }}" name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Xác nhận mật khẩu">
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input value="{{ old('phone_number') }}" name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Số điện thoại">
                        @error('phone_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input value="{{ old('address') }}" name="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Địa chỉ">
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark btn-block btn-lg" value="Register">Đăng ký</button>
                </form>

                <div class="text-center small">Bạn đã có tài khoản? <a href="{{ route('front.auth.showLogin') }}">Đăng nhập ngay</a></div>
            </div>
        </div>
    </section>
</main>
@include('front.layouts.footer')