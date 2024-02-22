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
                             <h1 class="m-0">{{$title}}</h1>
                         </div><!-- /.col -->
                         <div class="col-sm-6">
                             <ol class="breadcrumb float-sm-right">
                                 <li class="breadcrumb-item"><a href="home">{{$title}}</a></li>
                             </ol>
                         </div><!-- /.col -->
                     </div><!-- /.row -->
                 </div><!-- /.container-fluid -->
             </div>
             <!-- /.content-header -->

             <!-- Main content -->
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                         <h1 class="text-center">Selamat Datang {{ auth()->user()->username }}</h1>
                        </div>
                     </div>
                     </div>
                 </div>
             </div>


             <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>user</h3>
                        <p>User</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-solid fa-user"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
