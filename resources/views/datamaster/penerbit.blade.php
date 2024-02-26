<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>Perpustakaan | Penerbit</title>
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
                                                        <h5 class="modal-title">Create Penerbit Buku</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <form method="POST" action="/nama-penerbit/tambah"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Nama Penerbit</label>
                                                                <input type="text" class="form-control"
                                                                    name="nama_penerbit" placeholder="Nama Penerbit ..."
                                                                    required>
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
                                                <div class="alert alert-info">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert">×</button>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @endif
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Penerbit</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data_namapenerbit as $row)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $row->nama_penerbit }}</td>
                                                            <td>
                                                                <button data-toggle="modal"
                                                                    class="btn btn-xs btn-primary"
                                                                    data-target="#modalupdate{{ $row->id }}">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                    Edit</i></button>
                                                                <button data-toggle="modal"
                                                                    data-target="#modalHapus{{ $row->id }}"
                                                                    class="btn btn-xs btn-danger"> <i
                                                                        class="fa fa-trash"></i> Hapus</button>
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
                        <!-- /.container-fluid -->
                    </div>
                </section>

                {{-- form modal update --}}
                @foreach ($data_namapenerbit as $d)
                    <div class="modal fade" id="modalupdate{{ $d->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Nama Penerbit</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <form method="POST" action="/nama-penerbit/update/{{ $d->id }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Penerbit</label>
                                            <input type="text" value="{{ $d->nama_penerbit }}" class="form-control"
                                                name="nama_penerbit" placeholder="Nama Penerbit ..." required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                    class="fa fa-undo"></i> Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- form modal hapus --}}
                @foreach ($data_namapenerbit as $c)
                    <div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Penerbit</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <form method="GET" action="/nama-penerbit/destroy/{{ $c->id }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Apakah Anda ingin Menghapus Data Ini?</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                    class="fa fa-undo"></i> Close</button>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                Hapus</button>
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
