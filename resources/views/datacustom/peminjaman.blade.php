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
                        </div><!-- /.col -->
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
                                            @elseif ($message = Session::get('errors'))
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert">×</button>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @endif
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul</th>
                                                        <th>Kategori</th>
                                                        <th>Gambar</th>
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
                                                            <td>{{ $row->judul }}</td>
                                                            <td>{{ $row->kategori->nama_kategori }}</td>
                                                            <td><img src="gambar/{{ $row->gambar }} "alt=" "
                                                                    width="60px" class=""></td>

                                                            <td>
                                                                <button data-toggle="modal"
                                                                    href="#modalShow{{ $row->id }}"
                                                                    class="btn btn-success">
                                                                    <i class="fas fa-eye text-white"></i>
                                                                </button>
                                                                <button data-toggle="modal"
                                                                    href="#modalUlasan{{ $row->id }}"
                                                                    class="btn btn-warning text-white">
                                                                    <i></i> Ulasan
                                                                </button>
                                                                <a type="button"
                                                                    href="/pinjam/tambah/{{ $row->id }}"
                                                                    class="btn btn-primary">
                                                                    <i></i> Pinjam
                                                                </a>

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
                {{-- form modal show detail --}}
                @foreach ($data as $d)
                    <div class="modal fade" id="modalShow{{ $d->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
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
                                                    <img src="{{ url('gambar') . '/' . $d->gambar }}" alt=""
                                                        width="200px">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <table class="table text-nowarp">
                                                    <tbody>
                                                        <tr>
                                                            <th>Judul</th>
                                                            <td>:</td>
                                                            <td>{{ $d->judul }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Penulis</th>
                                                            <td>:</td>
                                                            <td>{{ $d->penulis }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Penerbit</th>
                                                            <td>:</td>
                                                            <td>{{ $d->penerbit->nama_penerbit }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Kategori</th>
                                                            <td>:</td>
                                                            <td>{{ $d->kategori->nama_kategori }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Stok</th>
                                                            <td>:</td>
                                                            <td>{{ $d->stok }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer mt-3">
                                            <a type="button" href="/koleksi/tambah/{{ $d->id }}"
                                                class="btn btn-primary">
                                                <i class="fa fa-plus"></i> Koleksi
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Form Ulasan --}}
                @foreach ($data as $e)
                    <div class="modal fade" id="modalUlasan{{ $e->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Berikan Ulasan</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <form method="POST" action="/ulasan/tambah/{{ $e->id }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Ulasan</label>
                                            <textarea type="text" class="form-control" name="ulasan"
                                                placeholder="Berikan Ulasan ..." required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Rating</label>
                                            <select class="form-control" name="rating" required>
                                                <option <?php if ($d['rating'] == '5') {
                                                    echo 'selected';
                                                } ?> value="5">5</option>
                                                <option <?php if ($d['rating'] == '4') {
                                                    echo 'selected';
                                                } ?> value="4">4</option>
                                                <option <?php if ($d['rating'] == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                                <option <?php if ($d['rating'] == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                                <option <?php if ($d['rating'] == '1') {
                                                    echo 'selected';
                                                } ?> value="1">1</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                    class="fa fa-undo"></i> Batal</button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa-solid fa-paper-plane"></i> Kirim</button>
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
