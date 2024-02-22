<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>Perpustakaan | Peminjaman</title>
    @include('template.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('template.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="card-title">{{ $title }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <!-- Main content -->
            <div class="content">
                <section class="content">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="card-content mb-2">
                        <div class="row">
                            @foreach ($data as $a)
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow" style="cursor: pointer">
                                        <div class="container mt-2">

                                            <img src="gambar/{{ $a->buku->gambar }}" alt="{{ $a->buku->judul }}"
                                                class="card-img-top" width="300" height="400">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $a->buku->judul }}</h5>
                                                <p class="card-text">{{ $a->buku->penulis }}</p>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button data-toggle="modal" href="#modalShow{{ $a->id }}"
                                                class="btn btn-link btn-success">
                                                <i class="fas fa-eye text-white"></i>
                                            </button>
                                            <a type="button" href="/koleksi-pribadi/destroy/{{ $a->id }}"
                                                class="btn btn-danger">
                                                <i></i> Hapus Koleksi
                                            </a>
                                            <a type="button" href="/pinjam/tambah/{{ $a->buku->id }}"
                                                class="btn btn-primary">
                                                <i></i>Pinjam
                                            </a>


                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                <!-- Main content/end -->

                {{-- form modal show detail --}}
                @foreach ($data as $b)
                    <div class="modal fade" id="modalShow{{ $b->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                @csrf
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row justify-content-center">
                                                    @if ($b->buku->gambar)
                                                        <div class="mb-5">
                                                            <img src="{{ url('gambar') . '/' . $b->buku->gambar }}"
                                                                alt="" width="170px">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>


                                            <ul class="list-group list-group-unbordered ml-3">
                                                <li class="list-group-item">
                                                    <b>Judul</b>
                                                    <label
                                                        class="badge badge-info float-right">{{ $b->buku->judul }}</label>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Kategori</b>
                                                    <label
                                                        class="badge badge-info float-right">{{ $b->buku->kategori->nama_kategori }}</label>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Penulis</b>
                                                    <label
                                                        class="badge badge-info float-right">{{ $b->buku->penulis }}</label>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Penerbit</b>
                                                    <label
                                                        class="badge badge-info float-right">{{ $b->buku->penerbit }}</label>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Tahun Terbit</b>
                                                    <label
                                                        class="badge badge-info float-right">{{ $b->buku->tahun_terbit }}</label>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
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

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>
