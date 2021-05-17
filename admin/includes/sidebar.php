<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminTazkia</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="index.php?include=kelompok" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Profil Anggota Kelompok
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?include=profil" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?include=peserta" class="nav-link">
              <i class="nav-icon fas fa-user-tie "></i>
              <p>
                Data Peserta
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?include=travel" class="nav-link">
              <i class="nav-icon fas ion ion-bag "></i>
              <p>
                 Paket Travel
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?include=adm" class="nav-link">
              <i class="nav-icon fas ion-stats-bars "></i>
              <p>
                Data Administrasi
              </p>
            </a>
          </li>
        	<?php 
	          if (isset($_SESSION['level'])){
	            if ($_SESSION['level']=="superadmin"){?>
                <li class="nav-item">
                  <a href="index.php?include=user" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                      Pengaturan User
                    </p>
                  </a>
                </li>
              <?php }?>
          <?php }?>
          <li class="nav-item">
            <a href="index.php?include=sign_out" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Sign Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>