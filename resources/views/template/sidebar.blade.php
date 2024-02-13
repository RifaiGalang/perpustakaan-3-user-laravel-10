<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->username }}</a>
            </div>
        </div>

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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home" class="nav-link ">
                                <i class="fa-solid fa-table-columns"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a href="data-user" class="nav-link">
                                    <i class="fa-solid fa-users"></i>
                                    <p>Data Pengguna</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="data-buku" class="nav-link">
                                    <i class="fa-solid fa-book"></i>
                                    <p>Data Buku</p>
                                </a>
                            <li class="nav-item">
                                <a href="nama-kategori" class="nav-link">
                                    <i class="fa-solid fa-bars"></i>
                                    <p>Nama Kategori</p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'peminjam')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fa-solid fa-memory"></i>
                                    <p>Peminjaman</p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-print"></i>
                                <p>Cetak Laporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout" class="nav-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>
                            log out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
