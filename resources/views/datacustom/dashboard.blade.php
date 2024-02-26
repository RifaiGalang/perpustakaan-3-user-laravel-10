<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>Perpustakaan | Home</title>
    @include('template.head')
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        @include('template.navbar-peminjam')
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home">{{ $title }}</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="col-12">
                <div class="row">

                    <div class="col-md-4">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Total Peminjaman</h3>
                            </div>
                            <div class="card-body">
                                <div class="info-box mb-1">
                                    <span class="info-box-icon bg-danger"><i class="fas fa-list"></i></span>
                                    <div class="info-box-content">
                                        <h3 class="info-box-number">{{ $peminjaman }}</h3>
                                        <p class="info-box-text">Peminjaman</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="detailpinjam" class="small-box-footer">More info
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title text-white">Total Buku</h3>
                            </div>
                            <div class="card-body">
                                <div class="info-box mb-1">
                                    <span class="info-box-icon bg-warning"><i class="fas fa-book text-white"></i></span>
                                    <div class="info-box-content">
                                        <h3 class="info-box-number">{{ $buku }}</h3>
                                        <p class="info-box-text">Buku</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="pinjam" class="small-box-footer">More info
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title text-white">Total Koleksi</h3>
                            </div>
                            <div class="card-body">
                                <div class="info-box mb-1">
                                    <span class="info-box-icon bg-success"><i class="fa-solid fa-thumbtack"></i></span>
                                    <div class="info-box-content">
                                        <h3 class="info-box-number">{{ $koleksi }}</h3>
                                        <p class="info-box-text">Koleksi</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="koleksi-pribadi" class="small-box-footer">More info
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @include('template.script')
</body>

</html>
