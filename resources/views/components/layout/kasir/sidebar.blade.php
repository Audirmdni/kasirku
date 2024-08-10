<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Sidebar Style -->
    <style>
      /* Style untuk logo brand */
      .brand-link {
        display: flex;
        align-items: center;
        padding: 10px;
        background-color: #059212;
      }
  
      .brand-image {
        width: 50px;
        height: 50px;
        margin-right: 10px;
      }
  
      .brand-text {
        color: #FFFFFF;
        font-weight: bold;
        letter-spacing: 2px;
        font-size: 24px;
        white-space: nowrap;
        font-family: 'Times New Roman', Times, serif;
      }
  
      /* Style untuk sidebar */
      .main-sidebar {
        background-color: #0C0C0C;
      }
  
      /* Style untuk item navigasi */
      .nav-link p {
        color: #FFFFFF;
        font-size: 20px;
      }
  
      .nav-header {
        font-weight: bold;
        color: #DDDDDD;
      }
  
      .nav-item {
        margin-top: 0;
        margin-bottom: 0;
        width: 14.5rem !important;
      }
  
      .nav-link {
        padding: 8px 15px;
        display: flex;
        align-items: center;
      }
  
      .nav-icon {
        color: #FFFFFF;
        margin-right: 10px;
      }
  
      .nav-link.active {
        background-color: #059212 !important;
        color: #FFFFFF !important;
        margin-bottom: 5px;
        width: 100% !important;
      }
  
      .nav-link.active .nav-icon {
        color: #FFFFFF !important;
      }
  
      .nav-item:hover {
        background-color: #059212;
        color: #FFFFFF;
      }
    </style>


<a href="index3.html" class="brand-link">
  <img src="{{ url('public/admin-asset/dist/img/Kasir.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text">KASIRKU</span>
</a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{ url('kasir/beranda') }}" class="nav-link {{ request()->is('kasir/beranda*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>
            <li class="nav-header text-light">Ui Component</li>
            <li class="nav-item">
              <a href="{{ url('kasir/transaksi') }}" class="nav-link {{ request()->is('kasir/transaksi*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cash-register"></i>
                <p>Penjualan</p>
              </a>
            </li>
           
            <li class="nav-item">
              <a href="{{ url('kasir/reports') }}" class="nav-link {{ request()->is('kasir/reports*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Laporan
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>