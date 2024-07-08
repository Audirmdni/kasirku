<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Sidebar Style -->
  <style>
    .brand-link {
      background-color: #ff6600;
    }

    .main-sidebar {
      background-color: #FFFFFF;
    }

    .brand-text {
      color: #f2f2f2;
      font-family: 'Times New Roman', Times, serif;
      font-size: 20px;
      font-weight: bold;
      padding: 10px;
      text-align: center;
      letter-spacing: 5px;
    }

    .nav-header {
      color: #000000;
      font-family: 'Times New Roman', Times, serif;
      font-weight: bold;
      font-size: 16px;
    }

    .nav-link p {
      color: #000000;
      font-family: 'Times New Roman', Times, serif;
      font-size: 16px;
    }

    .nav-icon {
      color: #ff6600;
    }
  </style>

  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{url('public')}}/admin-asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text">OKEPAY</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
<<<<<<< HEAD
            <a href="{{(url('Admin/Beranda'))}}" class="nav-link {{request()->is('Admin/Beranda*') ? '' : ''}}">
=======
            <a href="pages/widgets.html" class="nav-link">
>>>>>>> ebdf7e1cdc81dbd230fb7f70792df4ef2b8018df
              <i class="nav-icon fas fa-th"></i>
              <p>
                Beranda
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-header">DATABASE</li>
          <li class="nav-item">
<<<<<<< HEAD
            <a href="{{(url('Admin/Produk'))}}" class="nav-link {{request()->is('Admin/Produk*') ? '' : ''}}">
=======
            <a href="pages/calendar.html" class="nav-link">
>>>>>>> ebdf7e1cdc81dbd230fb7f70792df4ef2b8018df
              <i class="nav-icon fas fa-box"></i>
              <p>
                Produk
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
<<<<<<< HEAD
            <a href="{{(url('Admin/Kategori'))}}" class="nav-link {{request()->is('Admin/Kategori*') ? '' : ''}}">
=======
            <a href="pages/gallery.html" class="nav-link">
>>>>>>> ebdf7e1cdc81dbd230fb7f70792df4ef2b8018df
              <i class="nav-icon fas fa-list"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{(url('Admin/Supplier'))}}" class="nav-link {{request()->is('Admin/Supplier*') ? '' : ''}}">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Supplier
              </p>
            </a>
          </li>
          <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <a href="{{(url('Admin/Pengeluaran'))}}" class="nav-link {{request()->is('Admin/Penjualan*') ? '' : ''}}">
              <i class="nav-icon far fa-money-bill-alt"></i>
              <p>
                Pengeluaran
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{(url('Admin/Penjualan'))}}" class="nav-link {{request()->is('Admin/Penjualan*') ? '' : ''}}">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Penjualan
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{(url('Admin/Pembelian'))}}" class="nav-link {{request()->is('Admin/Pembelian*') ? '' : ''}}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Pembelian
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="{{(url('Admin/Pembelian'))}}" class="nav-link {{request()->is('Admin/Pembelian*') ? '' : ''}}">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          </li>
          <li class="nav-header">SISTEM</li>
          <li class="nav-item">
            <a href="{{(url('Admin/User'))}}" class="nav-link {{request()->is('Admin/User*') ? '' : ''}}">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                User
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{(url('Admin/Pengaturan'))}}" class="nav-link {{request()->is('Admin/Pengaturan*') ? '' : ''}}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan
              </p>
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