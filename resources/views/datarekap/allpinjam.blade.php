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
                                            <form method="GET" action="/filter">
                                                <div class="row pb-2">
                                                    <div class="row g-5 align-items-center ">
                                                        <div class="col-4 pt-2">
                                                            <label>Tanggal Awal :</label>
                                                            <input type="date" name="start_date"
                                                                class="form-control ">
                                                        </div>
                                                        <div class="col-4 pt-2">
                                                            <label>Tanggal Akhir :</label>
                                                            <input type="date" name="end_date" class="form-control">
                                                        </div>
                                                        <div class="col-6 pt-2">
                                                            <button type="submit"
                                                                class="btn btn-success">Filter</button>

                                                            <a type="submit" href="/alldatapinjam"
                                                                class="btn btn-primary">
                                                                Refresh</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Judul</th>
                                                        <th>Tanggal Pinjam</th>
                                                        <th>Tanggal Kembali</th>
                                                        <th>Status Peminjaman</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $row->user->nama_lengkap }}</td>
                                                            <td>{{ $row->buku->judul }}</td>
                                                            <td>{{ $row->tgl_pinjam }}</td>
                                                            <td>{{ $row->tgl_kembali }}</td>
                                                            <td>
                                                                @if ($row->statuspeminjaman == 'Menunggu Konfirmasi')
                                                                    <span class="badge bg-warning text-white">Menunggu
                                                                        Konfirmasi</span>
                                                                @elseif ($row->statuspeminjaman == 'Belum di Kembalikan')
                                                                    <span class="badge bg-danger text-white">Belum di
                                                                        Kembalikan</span>
                                                                @elseif ($row->statuspeminjaman == 'Sudah di Kembalikan')
                                                                    <span class="badge bg-success text-white">Sudah di
                                                                        Kembalikan</span>
                                                                @endif
                                                            </td>
                                                        </tr>
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
