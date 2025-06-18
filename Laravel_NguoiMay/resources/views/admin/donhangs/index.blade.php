@extends('admin.layouts.app')

@section('navbar')
<div class="navbar-nav pl-2">
    <ol class="breadcrumb p-0 m-0 bg-white">
        <li class="breadcrumb-item"><a href="{{ route('admin.donhangs.index') }}">Đơn hàng</a></li>
        <li class="breadcrumb-item active">Danh sách</li>
    </ol>
</div>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách đơn hàng</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Mã Đơn Hàng</th>
                            <th>Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Ngày Đặt</th>
                            <th>Tổng Tiền</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donhangs as $donhang)
                        <tr>
                            <td>{{ $donhang->MaDonHang }}</td>
                            <td>{{ $donhang->nguoiDung->Ten ?? 'N/A' }}</td>
                            <td>{{ $donhang->nguoiDung->SoDienThoai ?? 'N/A' }}</td>
                            <td>{{ $donhang->created_at->format('d/m/Y') }}</td>
                            <td>{{ number_format($donhang->TongTien, 0, ',', '.') }} VNĐ</td>
                            <td>
                                <span class="badge badge-{{ $donhang->TrangThai == 'Đã giao' ? 'success' : ($donhang->TrangThai == 'Đã hủy' ? 'danger' : 'warning') }}">
                                    {{ $donhang->TrangThai }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.donhangs.show', $donhang->MaDonHang) }}" class="btn btn-sm btn-info">Chi tiết</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $donhangs->links() }}
            </div>
        </div>
    </div>
</section>
@endsection