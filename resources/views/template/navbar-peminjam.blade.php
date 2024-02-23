 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
     <div class="container">

         <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
             aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse order-3" id="navbarCollapse">
             <!-- Left navbar links -->
             @if (Auth::user()->role == 'peminjam')
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a href="dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                         Home
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="pinjam" class="nav-link {{ request()->is('pinjam') ? 'active' : '' }}">
                         Daftar Buku
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="detailpinjam" class="nav-link  {{ request()->is('detailpinjam') ? 'active' : '' }}">
                         Daftar Pinjaman
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="koleksi-pribadi" class="nav-link {{ request()->is('koleksi-pribadi') ? 'active' : '' }}">
                         Koleksi Pribadi
                     </a>
                 </li>
                 <!-- SEARCH FORM -->
                 {{-- <form class="form-inline ml-0 ml-md-3">
                     <div class="input-group input-group-sm">
                         <input class="form-control form-control-navbar" type="search" placeholder="Search"
                             aria-label="Search">
                         <div class="input-group-append">
                             <button class="btn btn-navbar" type="submit">
                                 <i class="fas fa-search"></i>
                             </button>
                         </div>
                     </div>
                 </form> --}}
             </ul>
             @endif
         </div>

         <!-- Right navbar links -->
         <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
             <li class="nav-item dropdown">
                 <a class="nav-link" data-toggle="dropdown" href="#">
                     <span class="badge bg-primary text-white">Hallo {{ auth()->user()->username }}</span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-md-2 dropdown-menu-right">
                     <a href="logout" class="nav-link text-danger">
                         <i class="fa-solid fa-right-from-bracket"></i> log out
                     </a>
                 </div>
             </li>
         </ul>
     </div>
 </nav>
 <!-- /.navbar -->
