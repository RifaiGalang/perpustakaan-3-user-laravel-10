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
                            <h1 class="card-title">{{ $title }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
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
                                            @if ($message = Session::get('success'))
                                                <div class="alert alert-success">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert">×</button>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @endif
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul Buku</th>
                                                        <th>Tanggal Pinjam</th>
                                                        <th>Status Peminjaman</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                        @if ($row->statuspeminjaman == 'Menunggu Konfirmasi' || $row->statuspeminjaman == 'Belum di Kembalikan')
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $row->buku->judul }}</td>
                                                                <td>{{ $row->tgl_pinjam }}</td>
                                                                <td>
                                                                    @if ($row->statuspeminjaman == 'Menunggu Konfirmasi')
                                                                        <span
                                                                            class="badge bg-warning text-white">Menunggu
                                                                            Konfirmasi</span>
                                                                    @elseif ($row->statuspeminjaman == 'Belum di Kembalikan')
                                                                        <span class="badge bg-danger text-white">Belum
                                                                            di Kembalikan</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($row->statuspeminjaman == 'Menunggu Konfirmasi')
                                                                        <button class="btn btn-xs btn-danger"
                                                                            data-toggle="modal"
                                                                            href="#modalHapus{{ $row->id }}">
                                                                            Batalkan
                                                                        </button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @foreach ($data as $a)
                    <div class="modal fade" id="modalHapus{{ $a->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Batalkan Pinjaman</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <form method="GET" action="/pinjam/destroy/{{ $a->id }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Apakah Anda Yakin Membatalkan Peminjaman?</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-xs btn-secondary"
                                                data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                                            <button type="submit" class="btn btn-xs btn-danger">
                                                Batalkan</button>
                                        </div>
                                    </div>
                                </form>
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
                "buttons": ["colvis"]
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
