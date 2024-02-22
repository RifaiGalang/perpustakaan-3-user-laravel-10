<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>Perpustakaan | Buku</title>
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
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title"></h4>
                                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                                data-target="#modalCreate">
                                                <i class="fa fa-plus"></i>
                                                Tambah Data
                                            </button>
                                        </div>

                                        {{-- form modal create --}}
                                        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Create Data Buku</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <form method="POST" action="/data-buku/tambah"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Judul Buku</label>
                                                                <input type="text" class="form-control"
                                                                    name="judul" placeholder="Judul Buku ..."
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Kategori</label>
                                                                <select class="form-control" name="id_kategori"
                                                                    required>
                                                                    <option value="" hidden>--PILIH KATEGORI--
                                                                    </option>
                                                                    @foreach ($kategori as $b)
                                                                        <option value="{{ $b->id }}">
                                                                            {{ $b->nama_kategori }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Penulis</label>
                                                                <input type="text" class="form-control"
                                                                    name="penulis" placeholder="Penulis ..." required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Penerbit</label>
                                                                <select class="form-control" name="id_penerbit"
                                                                    required>
                                                                    <option value="" hidden>--PILIH PENERBIT--
                                                                    </option>
                                                                    @foreach ($penerbit as $b)
                                                                        <option value="{{ $b->id }}">
                                                                            {{ $b->nama_penerbit }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tahun Terbit</label>
                                                                <input type="text" class="form-control"
                                                                    name="tahun_terbit" placeholder="Tahun Terbit ..."
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Stok</label>
                                                                <input type="text" class="form-control"
                                                                    name="stok" placeholder="Stok ..." required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gambar" class="form-label">Gambar</label>
                                                                <input type="file" class="form-control"
                                                                    name="gambar">

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal"><i
                                                                        class="fa fa-undo"></i>Close</button>
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-save"></i>Save changes</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
                                                        <th>Judul</th>
                                                        <th>Kategori</th>
                                                        <th>Penulis</th>
                                                        <th>Penerbit</th>
                                                        <th>Tahun Terbit</th>
                                                        <th>Stok</th>
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
                                                            <td>{{ $row->penulis }}</td>
                                                            <td>{{ $row->penerbit->nama_penerbit }}</td>
                                                            <td>{{ $row->tahun_terbit }}</td>
                                                            <td>{{ $row->stok }}</td>
                                                            <td><img src="gambar/{{ $row->gambar }} "alt=" "
                                                                    width="60px" class=""></td>
                                                            <td>
                                                                <button data-toggle="modal"
                                                                    class="btn btn-xs btn-primary"
                                                                    data-target="#modalupdate{{ $row->id }}">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                    Edit</i></button>
                                                                <button data-toggle="modal"
                                                                    data-target="#modalHapus{{ $row->id }}"
                                                                    class="btn btn-xs btn-danger"> <i
                                                                        class="fa fa-trash"></i>Hapus</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul</th>
                                                        <th>Kategori</th>
                                                        <th>Penulis</th>
                                                        <th>Penerbit</th>
                                                        <th>Tahun Terbit</th>
                                                        <th>Stok</th>
                                                        <th>Gambar</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                {{-- form modal update --}}
                @foreach ($buku as $d)
                    <div class="modal fade" id="modalupdate{{ $d->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Buku</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <form method="POST" action="/data-buku/update/{{ $d->id }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Judul Buku</label>
                                            <input type="text" value="{{ $d->judul }}" class="form-control"
                                                name="judul" placeholder="Judul Buku ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="id_kategori" required>
                                                <option selected value="{{ $d->id }}">
                                                    {{ $d->kategori->nama_kategori }}
                                                </option>
                                                @foreach ($kategori as $b)
                                                    <option value="{{ $b->id }}">
                                                        {{ $b->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Penulis</label>
                                            <input type="text" value="{{ $d->penulis }}" class="form-control"
                                                name="penulis" placeholder="Penulis ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <select class="form-control" name="id_penerbit" required>
                                                <option selected value="{{ $d->id }}">
                                                    {{ $d->penerbit->nama_penerbit }}
                                                </option>
                                                @foreach ($penerbit as $b)
                                                    <option value="{{ $b->id }}">
                                                        {{ $b->nama_penerbit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <input type="text" value="{{ $d->tahun_terbit }}"
                                                class="form-control" name="tahun_terbit"
                                                placeholder="Tahun Terbit ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="text" value="{{ $d->stok }}" class="form-control"
                                                name="stok" placeholder="Stok ..." required>
                                        </div>
                                        @if ($d->gambar)
                                            <div class="mb-2">
                                                <img src="{{ url('gambar') . '/' . $d->gambar }}" alt=""
                                                    width="60px">
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="gambar" class="form-label">Gambar</label>
                                            <input type="file" class="form-control" name="gambar">
                                        </div>
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

                {{-- form modal hapus --}}
                @foreach ($buku as $c)
                    <div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Data Buku</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <form method="GET" action="/data-buku/destroy/{{ $c->id }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Apakah Anda ingin Menghapus Data Ini?</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                    class="fa fa-undo"></i>Close</button>
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i>Hapus</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.main content -->
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
