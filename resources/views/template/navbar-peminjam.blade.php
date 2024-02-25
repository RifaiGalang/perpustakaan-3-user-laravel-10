 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-gradient-primary">
     <div class="container">
         <!-- Brand/logo -->
         <span class="navbar-brand">
             Perpustakaan
         </span>

         <!-- Toggler/collapsibe Button -->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
             <span class="navbar-toggler-icon"></span>
         </button>

         <!-- Navbar links -->
         <div class="collapse navbar-collapse" id="collapsibleNavbar">
             @if (Auth::user()->role == 'peminjam')
                 <ul class="navbar-nav mr-auto">
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
                         <a href="koleksi-pribadi"
                             class="nav-link {{ request()->is('koleksi-pribadi') ? 'active' : '' }}">
                             Koleksi Pribadi
                         </a>
                     </li>
                 </ul>
             @endif

             <ul class="navbar-nav ml-auto">
                 <li class="nav-item dropdown">
                     <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false">
                         <span class="badge bg-warning text-white">Hallo {{ auth()->user()->username }}</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-md-2 dropdown-menu-right" aria-labelledby="navbarDropdown">
                         <a href="logout" class="dropdown-item text-danger">
                             <i class="fa-solid fa-right-from-bracket"></i> Logout
                         </a>
                     </div>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
 <!-- /.navbar -->
