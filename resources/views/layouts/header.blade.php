      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

        <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->

      @if(Auth::user()->role == "Admin")
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">    
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">
          {{$notif->count()}}
          </span>
        </a>
       
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{$notif->count()}} Notifikasi</span>
          <div class="dropdown-divider"></div>
          @foreach($pengaduan as $key=>$p)
        @if($p->status == "belumselesai")
          <a href="/daftarpengaduan" class="dropdown-item">
            <i class="fas fa-bell mr-2"></i>{{$p->pemilikrumah}}
            <span class="float-right text-muted text-sm">{{date('d,M ', strtotime($p->tanggal))}}</span>
          </a>
          @endif
        @endforeach
          <div class="dropdown-divider"></div>
          <a href="/daftarpengaduan" class="dropdown-item dropdown-footer">Tampilkan Semua</a>
        </div>

      </li>      
      @endif
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <a href="/actionlogout"><span class="dropdown-item dropdown-header">Logout</span></a>
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item text-center">
           Logout
          </a> -->
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->