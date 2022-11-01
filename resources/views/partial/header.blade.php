<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../" class="nav-link">Trang chủ</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <li class="nav-item dropdown">
            <!-- Sidebar user (optional) -->
            <div class="user-panel pb-1 d-flex" data-toggle="dropdown">
                <div class="image">
                    <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Nguyễn Thị Kim Cúc</a>
                </div>
            </div>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-address-card mr-2"></i> Quản lý thông tin cá nhân
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-key mr-2"></i> Thay đổi mật khẩu
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất
                </a>
            </div>

        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/img/AdminLTELogo.png" alt="Bookstore Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">QLNR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/admin" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/admin' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/admin/list-snacks' || $_SERVER['REQUEST_URI'] == '/admin/add-snack') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/admin/list-snacks' || $_SERVER['REQUEST_URI'] == '/admin/add-snack') ? 'active' : ''; ?>">
                        <i class="nav-icon fa-solid fa-staff-snake"></i>
                        <p>
                            Quản lý lứa rắn
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/list-snacks" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/admin/list-snacks' ? 'active' : ''; ?>">
                                <i class="fa-solid fa-clock-rotate-left nav-icon ml-2"></i>
                                <p>Tất cả lứa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/add-snack" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/admin/add-snack' ? 'active' : ''; ?>">
                                <i class="fa-solid fa-circle-plus nav-icon ml-2"></i>
                                <p>Thêm lứa mới</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/admin/list-medicines' || $_SERVER['REQUEST_URI'] == '/admin/list-sicks') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/admin/list-medicines' || $_SERVER['REQUEST_URI'] == '/admin/list-sicks') ? 'active' : ''; ?>">
                        <i class="nav-icon fab fa-elementor"></i>
                        <p>
                            Quản lý danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/list-medicines" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/admin/list-medicines' ? 'active' : ''; ?>">
                                <i class="fa-solid fa-pills nav-icon ml-2"></i>
                                <p>Danh mục thuốc</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/list-sicks" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/admin/list-sicks' ? 'active' : ''; ?>">
                                <i class="fa-solid fa-viruses nav-icon ml-2"></i>
                                <p>Danh mục bệnh</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/admin/list-foods' || $_SERVER['REQUEST_URI'] == '/admin/list-seeds' || $_SERVER['REQUEST_URI'] == '/admin/list-tools' || $_SERVER['REQUEST_URI'] == '/admin/import-medicines') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/admin/list-foods' || $_SERVER['REQUEST_URI'] == '/admin/list-seeds' || $_SERVER['REQUEST_URI'] == '/admin/list-tools' || $_SERVER['REQUEST_URI'] == '/admin/import-medicines') ? 'active' : ''; ?>">
                        <i class="nav-icon fa-solid fa-arrow-right-to-bracket"></i>
                        <p>
                            Quản lý nhập
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/list-seeds" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/admin/list-seeds' ? 'active' : ''; ?>">
                                <i class="fa-solid fa-egg nav-icon ml-2"></i>
                                <p>Quản lý nhập giống</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/list-foods" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/admin/list-foods' ? 'active' : ''; ?>">
                                <i class="fa-solid fa-fish nav-icon ml-2"></i>
                                <p>Quản lý nhập thức ăn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/list-tools" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/admin/list-tools' ? 'active' : ''; ?>">
                                <i class="fa-solid fa-screwdriver-wrench nav-icon ml-2"></i>
                                <p>Quản lý nhập công cụ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/import-medicines" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/admin/import-medicines' ? 'active' : ''; ?>">
                                <i class="fa-solid fa-capsules nav-icon ml-2"></i>
                                <p>Quản lý nhập thuốc</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-magnifying-glass"></i>
                        <p>
                            Tra cứu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/bookCategory" class="nav-link">
                                <i class="fa-solid fa-book-skull nav-icon ml-2"></i>
                                <p>Tra cứu bệnh</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/bookAuthor" class="nav-link">
                                <i class="fa-solid fa-book-medical nav-icon ml-2"></i>
                                <p>Tra cứu thuốc</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/bookTranslator" class="nav-link">
                                <i class="fa-solid fa-book-bookmark nav-icon ml-2"></i>
                                <p>Tra cứu thông tin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon fa-solid fa-coins"></i>
                        <p>
                            Quản lý bán rắn
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-chart-line"></i>
                        <p>
                            Báo cáo thống kê
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/bookCategory" class="nav-link">
                                <i class="fas fa-quran nav-icon ml-2"></i>
                                <p>Thống kê theo lứa rắn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/bookAuthor" class="nav-link">
                                <i class="fas fa-feather-alt nav-icon ml-2"></i>
                                <p>Thống kê theo tháng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/bookTranslator" class="nav-link">
                                <i class="fas fa-language nav-icon ml-2"></i>
                                <p>Thống kê theo năm</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/manager" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Quản lý nhân viên
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>