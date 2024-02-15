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
                            <h1 class="card-title">Data Buku</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Buku</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <!-- Main content -->
            <div class="content">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul Buku</th>
                                                        <th>Tanggal Pinjam</th>
                                                        <th>Tanggal Kembali</th>
                                                        <th>Status Peminjaman</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $row->buku->judul }}</td>
                                                            <td>{{ $row->tgl_pinjam }}</td>
                                                            <td>{{ $row->tgl_kembali}}</td>
                                                            <td>{{ $row->statuspeminjaman}}</td>
                                                            <td>
                                                               
                                                                <button data-toggle="modal"
                                                                    href="#modalPinjam{{ $row->id }}"
                                                                    class="btn btn-primary">
                                                                    <i class="fa fa-layer-group"></i>Pinjam
                                                                </button>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                </section>

                {{-- form modal show detail --}}
                @foreach ($detailpinjam as $d)
                    <div class="modal fade" id="modalShow{{ $d->id }}" tabindex="-1" role="dialog"
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
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row justify-content-center">
                                                @if ($d->gambar)
                                                    <div class="mb-5">
                                                        <img src="{{ url('gambar') . '/' . $d->gambar }}" alt=""
                                                            width="170px">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Judul</b>
                                                <label class="badge badge-info float-right">{{ $d->judul }}</label>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Kategori</b>
                                                <label
                                                    class="badge badge-info float-right">{{ $d->nama_kategori }}</label>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Penulis</b>
                                                <label class="badge badge-info float-right">{{ $d->penulis }}</label>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Penerbit</b>
                                                <label class="badge badge-info float-right">{{ $d->penerbit }}</label>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tahun Terbit</b>
                                                <label
                                                    class="badge badge-info float-right">{{ $d->tahun_terbit }}</label>
                                            </li>
                                        </ul>
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
