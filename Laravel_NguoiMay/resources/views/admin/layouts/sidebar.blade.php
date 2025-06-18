<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="" style="width: 100%" ;>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Trang chủ</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.sanphams.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>Sản phẩm</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.donhangs.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>Đơn hàng</p>
                    </a>
                </li>
                

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>