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

                <li class="nav-item">
                    <a href="home" class="nav-link {{ request()->is('home') ? 'active' : ''}}">
                        <i class="fa-solid fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
                    <li class="nav-item menu-open">
                        <a class="nav-link ">
                            <p>
                                Master Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="data-user" class="nav-link {{ request()->is('data-user') ? 'active' : ''}}">
                                    <i class="fa-solid fa-users"></i>
                                    <p>Data Pengguna</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="data-buku" class="nav-link {{ request()->is('data-buku') ? 'active' : ''}}">
                                    <i class="fa-solid fa-book"></i>
                                    <p>Data Buku</p>
                                </a>
                            <li class="nav-item">
                                <a href="nama-kategori" class="nav-link {{ request()->is('nama-kategori') ? 'active' : ''}}">
                                    <i class="fa-solid fa-bars"></i>
                                    <p>Nama Kategori</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                   
                @endif
                <li class="nav-item menu-open">
                    <a class="nav-link">
                        <p>Peminjaman
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::user()->role == 'peminjam' || Auth::user()->role == 'petugas')
                            <li class="nav-item ">
                                <a href="pinjam" class="nav-link {{ request()->is('pinjam') ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar buku</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="detailpinjam" class="nav-link  {{ request()->is('detailpinjam') ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Pinjaman</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="koleksi-pribadi" class="nav-link {{ request()->is('koleksi-pribadi') ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Koleksi Pribadi</p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a href="alldatapinjam" class="nav-link {{ request()->is('alldatapinjam') ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Pinjaman</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                @if (Auth::user()->role == 'admin'  || Auth::user()->role == 'petugas')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-print"></i>
                        <p>Cetak Laporan</p>
                    </a>
                </li>
                @endif
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
