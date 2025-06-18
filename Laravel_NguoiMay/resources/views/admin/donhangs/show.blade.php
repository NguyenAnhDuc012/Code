@extends('admin.layouts.app')

@section('navbar')
<div class="navbar-nav pl-2">
    <ol class="breadcrumb p-0 m-0 bg-white">
        <li class="breadcrumb-item"><a href="{{ route('admin.donhangs.index') }}">Đơn hàng</a></li>
        <li class="breadcrumb-item active">Chi tiết đơn hàng #{{ $donhang->MaDonHang }}</li>
    </ol>
</div>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <h1>Chi tiết đơn hàng #{{ $donhang->MaDonHang }}</h1>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <!-- Thông tin khách hàng -->
        <div class="card mb-3">
            <div class="card-header">Thông tin khách hàng</div>
            <div class="card-body">
                <p><strong>Họ tên:</strong> {{ $donhang->nguoiDung->Ten ?? 'N/A' }}</p>
                <p><strong>Email:</strong> {{ $donhang->nguoiDung->Email ?? 'N/A' }}</p>
                <p><strong>Số điện thoại:</strong> {{ $donhang->nguoiDung->SoDienThoai ?? 'N/A' }}</p>
                <p><strong>Địa chỉ:</strong> {{ $donhang->nguoiDung->DiaChi ?? 'N/A' }}</p>
                <p><strong>Ngày đặt:</strong> {{ $donhang->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Trạng thái:</strong>
                    <span class="badge badge-{{ $donhang->TrangThai == 'Đã giao' ? 'success' : ($donhang->TrangThai == 'Đã hủy' ? 'danger' : 'warning') }}">
                        {{ $donhang->TrangThai }}
                    </span>
                </p>
            </div>
        </div>

        <!-- Danh sách sản phẩm trong đơn hàng -->
        <div class="card mb-3">
            <div class="card-header">Sản phẩm trong đơn hàng</div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Mã SP</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá bán (1 sp)</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donhang->chiTietDonHang as $ct)
                        <tr>
                            <td>{{ $ct->sanPham->MaSanPham ?? 'N/A' }}</td>
                            <td>{{ $ct->sanPham->TenSanPham ?? 'Sản phẩm đã xóa' }}</td>
                            <td>{{ $ct->SoLuong }}</td>
                            <td>{{ number_format($ct->sanPham->GiaBan ?? 0, 0, ',', '.') }} VNĐ</td>
                            <td>{{ number_format($ct->sanPham->GiaBan * $ct->SoLuong, 0, ',', '.') }} VNĐ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Cập nhật trạng thái đơn hàng -->
        <div class="card">
            <div class="card-header">Cập nhật trạng thái đơn hàng</div>
            <div class="card-body">
                <form action="{{ route('admin.donhangs.updateStatus', $donhang->MaDonHang) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="TrangThai">Trạng thái</label>
                        <select name="TrangThai" id="TrangThai" class="form-control" required>
                            @php
                            $statuses = ['Chờ xác nhận', 'Đã xác nhận', 'Đang giao hàng', 'Đã giao', 'Đã hủy'];
                            @endphp
                            @foreach($statuses as $status)
                            <option value="{{ $status }}" {{ $donhang->TrangThai == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                            @endforeach
                        </select>
                        @error('TrangThai')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật trạng thái</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection