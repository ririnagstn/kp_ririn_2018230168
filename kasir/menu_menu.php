>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['nama'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <a href="../home/" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>

              <p>
                Dashboard
              </p>
            </a>
          </li>
          



		  
		  <li class="nav-item">
            <a href="../pemesanan/" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
              <p>
               Pemesanan Barang
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../dikirim/" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>

              <p>
               Pesanan Dikirim
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../histori/" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>

              <p>
               Semua Transaksi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../laporanpenjualan/" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>

              <p>
                Laporan Penjualan
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="../databarang/" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>

              <p>
                Data Barang
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
