<aside class="main-sidebar sidebar-light-info elevation-4 " style="background-color:DodgerBlue">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block text-bold">{{ auth()->user()->username }}</a>
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
                <li class="nav-item">
                    <a href="home" class="nav-link {{ request()->is('home') ? 'active' : '' }}" >
                        <i class="fa-solid fa-home text-white"></i>
                        <p class="text-white">Home</p>
                    </a>
                </li>
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
                    <li class="nav-header text-bold">MASTER</li>
                    <li class="nav-item menu-open">
                        <a class="nav-link ">
                            <i class="fa-solid fa-database"></i>
                            <p class="text-white">Master Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item text-white">
                                <a href="data-user" class="nav-link {{ request()->is('data-user') ? 'active' : '' }}">
                                    <i class="fa-solid fa-users"></i>
                                    <p class="text-white">Data Pengguna</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="data-buku" class="nav-link {{ request()->is('data-buku') ? 'active' : '' }}">
                                    <i class="fa-solid fa-book"></i>
                                    <p class="text-white">Data Buku</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="nama-penerbit" class="nav-link {{ request()->is('nama-penerbit') ? 'active' : '' }}">
                                    <i class="fa-solid fa-list"></i>
                                    <p class="text-white">Nama Penerbit</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="nama-kategori"
                                    class="nav-link {{ request()->is('nama-kategori') ? 'active' : '' }}">
                                    <i class="fa-solid fa-bars"></i>
                                    <p class="text-white">Nama Kategori</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                 @if (Auth::user()->role == 'petugas')
                    <li class="nav-header text-bold">DATA</li>
                    <li class="nav-item">
                        <a href="konfirmasi-pinjam"
                            class="nav-link {{ request()->is('konfirmasi-pinjam') ? 'active' : '' }}">
                            <i class="fa-solid fa-feather-pointed"></i>
                            <p class="text-white">Peminjaman</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
                    <li class="nav-header text-bold">LAYOUT</li>
                    @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a href="alldatapinjam" class="nav-link {{ request()->is('alldatapinjam') ? 'active' : '' }}">
                            <i class="fa-solid fa-print"></i>
                            <p class="text-white">Cetak Laporan</p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="ulasanview" class="nav-link {{ request()->is('ulasanview') ? 'active' : '' }}">
                            <i class="fa-solid fa-star"></i>
                            <p class="text-white">Ulasan</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="logout" class="nav-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p class="text-white"> log out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
