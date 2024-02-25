 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-gradient-primary">
     <div class="container">

         <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
             aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse order-3" id="navbarCollapse">
             <!-- Left navbar links -->
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a data-toggle="modal" href="#modalLogin" class="nav-link">
                         Home
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                         Daftar Buku
                     </a>
                 </li>
                 <li class="nav-item">
                     <a data-toggle="modal" href="#modalLogin" class="nav-link">
                         Daftar Pinjaman
                     </a>
                 </li>
                 <li class="nav-item">
                     <a data-toggle="modal" href="#modalLogin" class="nav-link">
                         Koleksi Pribadi
                     </a>
                 </li>
             </ul>
         </div>

         <!-- Right navbar links -->
         <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
             <li class="nav-item dropdown">
                 <a class="nav-link" data-toggle="dropdown" href="#">
                     <span class="badge bg-warning text-white">Login</span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-md-2 dropdown-menu-right">
                     <a href="/login" class="nav-link text-primary">
                         <i class="fa-solid fa-right-to-bracket"></i> Login
                     </a>
                 </div>
             </li>
         </ul>
     </div>
 </nav>
 <!-- /.navbar -->

 <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog ">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <h5 class="modal-title">Pemberitahuan</h5>
                 <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
             </div>
             <div class="modal-body">
                 <div class="form-group">
                     <label>Anda Perlu Login Terlebih Dahulu</label>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                         Close</button>
                     <a href="/login" class="btn btn-primary">
                         Login</a>
                 </div>
             </div>
         </div>
     </div>
 </div>
