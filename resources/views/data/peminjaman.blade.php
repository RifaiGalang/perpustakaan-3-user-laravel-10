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
                                                    @foreach ($buku as $row)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $row->judul }}</td>
                                                            <td>{{ $row->kategori->nama_kategori }}</td>
                                                            <td><img src="gambar/{{ $row->gambar }} "alt=" "
                                                                    width="60px" class=""></td>

                                                            <td>
                                                                <button data-toggle="modal"
                                                                    href="#modalShow{{ $row->id }}"
                                                                    class="btn btn-link btn-success">
                                                                    <i class="fas fa-eye text-white"></i>
                                                                </button>
                                                                <button data-toggle="modal"
                                                                    href="#modalPinjam{{ $row->id }}"
                                                                    class="btn btn-primary">
                                                                    <i class="fa fa-layer-group"></i>Pinjam
                                                                </button>

                                                                {{-- <input type="hidden" name="id_buku" required
                                                                        {{ $row->id }}>
                                                                    <button class="btn btn-primary">
                                                                        <i class="fa fa-layer-group"></i>Pinjam
                                                                    </button> --}}

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

                {{-- form modal create --}}
                
                @foreach ($buku as $c)
                    <div class="modal fade" id="modalPinjam{{ $c->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <form method="POST" action="/pinjam/tambah"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        {{-- <div class="form-group">
                                            <label>Nama</label>
                                            <select class="form-control" name="id_user"
                                            required>
                                            <option value="" hidden>--PILIH NAMA PEMINJAM--
                                            </option>
                                            @foreach ($user as $b)
                                                <option value="{{ $b->id  }}">
                                                    {{ $b->nama_lengkap}}</option>
                                            @endforeach
                                        </select>
                                        </div> --}}
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <select class="form-control" name="id_buku"
                                            required>
                                            <option selected value="{{$c->id}}" >{{$c->judul}}
                                            </option>
                                            
                                        </select>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Tanggal Pinjam</label>
                                            <input type="date" value="{{ $c->tgl_pinjam }}" class="form-control"
                                                name="tgl_pinjam" required>
                                        </div>
                                        @if ($c->gambar)
                                            <div class="mb-2">
                                                <img src="{{ url('gambar') . '/' . $c->gambar }}" alt=""
                                                    width="60px">
                                            </div>
                                        @endif
                                       
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                    class="fa fa-undo"></i>Close</button>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-save"></i>Save changes</button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- form modal show detail --}}
                @foreach ($buku as $d)
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
                                                        <img src="{{ url('gambar') . '/' . $d->gambar }}"
                                                            alt="" width="170px">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Judul</b>
                                                <label
                                                    class="badge badge-info float-right">{{ $d->judul }}</label>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Kategori</b>
                                                <label
                                                    class="badge badge-info float-right">{{ $d->kategori->nama_kategori }}</label>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Penulis</b>
                                                <label
                                                    class="badge badge-info float-right">{{ $d->penulis }}</label>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Penerbit</b>
                                                <label
                                                    class="badge badge-info float-right">{{ $d->penerbit }}</label>
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
