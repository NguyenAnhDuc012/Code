@extends('admin.layouts.app')

@section('navbar')
<div class="navbar-nav pl-2">
    <ol class="breadcrumb p-0 m-0 bg-white">
        <li class="breadcrumb-item"><a href="{{ route('admin.sanphams.index') }}">Sản phẩm</a></li>
        <li class="breadcrumb-item active">Sửa Sản phẩm</li>
    </ol>
</div>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa Sản phẩm</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('admin.sanphams.index') }}" class="btn btn-primary">Quay lại</a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <form action="{{ route('admin.sanphams.update', $sanpham->MaSanPham) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <!-- Tên sản phẩm -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ten_san_pham">Tên Sản phẩm</label>
                                <input type="text" name="ten_san_pham" id="ten_san_pham" class="form-control" placeholder="Tên Sản phẩm" value="{{ old('ten_san_pham', $sanpham->TenSanPham) }}">
                                @error('ten_san_pham')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Giá bán -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gia_ban">Giá bán</label>
                                <input type="number" name="gia_ban" id="gia_ban" class="form-control" placeholder="Giá bán" value="{{ old('gia_ban', $sanpham->GiaBan) }}">
                                @error('gia_ban')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Tồn kho -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ton_kho">Tồn kho</label>
                                <input type="number" name="ton_kho" id="ton_kho" class="form-control" placeholder="Số lượng tồn kho" value="{{ old('ton_kho', $sanpham->TonKho) }}">
                                @error('ton_kho')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Mô tả -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mo_ta">Mô tả</label>
                                <textarea name="mo_ta" id="mo_ta" class="form-control" placeholder="Mô tả Sản phẩm">{{ old('mo_ta', $sanpham->MoTa) }}</textarea>
                                @error('mo_ta')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>      

                        <!-- Hình ảnh -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="hinh_anh">Hình ảnh</label>
                                <input type="file" name="hinh_anh" id="hinh_anh" class="form-control">
                                @if ($sanpham->HinhAnh)
                                    <div>
                                        <img src="{{ asset('images/' . $sanpham->HinhAnh) }}" alt="Hình ảnh cũ" style="max-width: 100px; margin-top: 10px;">
                                    </div>
                                @endif
                                @error('hinh_anh')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Thương hiệu -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ma_thuong_hieu">Thương hiệu</label>
                                <select name="ma_thuong_hieu" id="ma_thuong_hieu" class="form-control">
                                    @foreach ($thuonghieus as $thuonghieu)
                                    <option value="{{ $thuonghieu->MaThuongHieu }}" {{ old('ma_thuong_hieu', $sanpham->MaThuongHieu) == $thuonghieu->MaThuongHieu ? 'selected' : '' }}>
                                        {{ $thuonghieu->TenThuongHieu }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('ma_thuong_hieu')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.sanphams.index') }}" class="btn btn-outline-dark ml-3">Hủy</a>
            </div>
        </form>
    </div>
</section>
@endsection
