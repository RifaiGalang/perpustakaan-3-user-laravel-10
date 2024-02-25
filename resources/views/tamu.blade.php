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
        @include('template.navbar-tamu')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        {{-- @include('template.sidebar') --}}

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
                                <li class="breadcrumb-item"><a href="#">{{ $title }}</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <div class="content">
                <section class="content">
                    <div class="card-content mb-2">
                        <div class="row">
                            @foreach ($data as $a)
                                <div class="col-md-3">
                                    <div class="card mb-4 shadow" style="cursor: pointer">
                                        <div class="container mt-2">

                                            <img src="gambar/{{ $a->gambar }}" alt="{{ $a->judul }}"
                                                class="card-img-top" width="300" height="400">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $a->judul }}</h5>
                                                <p class="card-text">{{ $a->penulis }}</p>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button data-toggle="modal" href="#modalShow{{ $a->id }}"
                                                class="btn btn-link btn-success">
                                                <i class="fas fa-eye text-white"></i>
                                            </button>
                                            <button data-toggle="modal" href="#modalLogin" class="btn btn-primary">
                                                <i></i>Pinjam
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>

            {{-- modal show detail --}}
            @foreach ($data as $b)
                <div class="modal fade" id="modalShow{{ $b->id }}" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            @csrf
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row justify-content-center">
                                                <img src="{{ url('gambar') . '/' . $b->gambar }}" alt=""
                                                    width="200px">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <table class="table text-nowarp">
                                                <tbody>
                                                    <tr>
                                                        <th>Judul</th>
                                                        <td>:</td>
                                                        <td>{{ $b->judul }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Penulis</th>
                                                        <td>:</td>
                                                        <td>{{ $b->penulis }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Penerbit</th>
                                                        <td>:</td>
                                                        <td>{{ $b->penerbit->nama_penerbit }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kategori</th>
                                                        <td>:</td>
                                                        <td>{{ $b->kategori->nama_kategori }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title">Pemberitahuan</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Anda Perlu Login Terlebih Dahulu</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-undo"></i> Close</button>
                                <a href="/login" class="btn btn-primary">
                                    Login</a>
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
