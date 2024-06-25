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
              <a href="{{ url('kasir') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>
            <li class="nav-header">Ui Component</li>
            <li class="nav-item">
              <a href="{{ url('kasir/transaksi') }}" class="nav-link">
                <i class="nav-icon fas fa-box"></i>
                <p>
                  Transaksi
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