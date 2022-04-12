  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->nama}}  </a>
        </div>
      </div>

      @if(Auth::user()->role == "Pemilik Rumah")
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/pengaduan" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Pengaduan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/iuran" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                Iuran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-wifi"></i>
              <p>
                Smart Devices
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/controllobby" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Control</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/jadwallobby" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schedule</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      @else
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Akun User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/userpenduduk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemilik Rumah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/useradmin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegawai/Penjaga</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/daftarrumah" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Daftar Rumah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/daftarpengaduan" class="nav-link">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                Pengaduan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/daftariuran" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                Iuran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/settinglobby" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Setting IoT
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      @endif
    </div>
    <!-- /.sidebar -->
  </aside>