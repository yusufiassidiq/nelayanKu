<!-- Main Sidebar Container -->
<aside id="tes" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div style="text-align:center">
    <a href="{{route('listDataPage')}}" class="brand-link">
      <img src="AdminLTE-3.0.0/dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8;">
      <h4 style="text-align:justify"class="brand-text font-weight-light" >NelayanKu</h4>
    </a>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="AdminLTE-3.0.0/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-header">APLIKASI PENDATAAN NELAYAN</li>
          
          <li class="nav-item has-treeview">
            <a href="{{route('dashboardPage')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-bar"></i>
                  <p>Grafik Tangkapan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-trophy nav-icon"></i>
                  <p>Nelayan Terbaik</p>
                </a>
              </li>
            </ul> -->
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-ship nav-icon"></i>
              <p>
                Nelayan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tambahNelayanPage')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Tambah Nelayan</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Data Nelayan</p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Data Tangkapan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tambahDataPage')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Tambah Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('listDataPage')}}" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>List Data</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>