<aside class="main-sidebar sidebar-light-primary elevation-4">
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
    }

    .nav-link.active .nav-icon {
      color: #FFFFFF !important;
    }

    .nav-item:hover {
      background-color: #059212;
      color: #FFFFFF;
    }
  </style>

  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ url('public/admin-asset/dist/img/Kasir.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text">KASIRKU</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Beranda -->
        <li class="nav-item">
          <a href="{{ url('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Bagian Database -->
        <li class="nav-header">DATABASE</li>
        <li class="nav-item">
          <a href="{{ url('admin/produk') }}" class="nav-link {{ request()->is('admin/produk*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box"></i>
            <p>Produk</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/kategori') }}" class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-list"></i>
            <p>Kategori</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/supplier') }}" class="nav-link {{ request()->is('admin/supplier*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-truck"></i>
            <p>Supplier</p>
          </a>
        </li>

        <!-- Bagian Transaksi -->
        <li class="nav-header">TRANSAKSI</li>
        <li class="nav-item">
          <a href="{{ url('admin/pengeluaran') }}" class="nav-link {{ request()->is('admin/pengeluaran*') ? 'active' : '' }}">
            <i class="nav-icon far fa-money-bill-alt"></i>
            <p>Pengeluaran</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/penjualan') }}" class="nav-link {{ request()->is('admin/penjualan*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cash-register"></i>
            <p>Penjualan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/pembelian') }}" class="nav-link {{ request()->is('admin/pembelian*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>Pembelian</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/laporan') }}" class="nav-link {{ request()->is('admin/laporan*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-file"></i>
            <p>Laporan</p>
          </a>
        </li>

        <!-- Bagian Sistem -->
        <li class="nav-header">SISTEM</li>
        <li class="nav-item">
          <a href="{{ url('admin/user') }}" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>User</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/kasir') }}" class="nav-link {{ request()->is('admin/kasir*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>Kasir</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/pengaturan') }}" class="nav-link {{ request()->is('admin/pengaturan*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Pengaturan</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>