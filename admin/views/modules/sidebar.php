<aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link ">
      <img src="views/assets/img/template/logo.cbpc.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CORREDOR-BBY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    
        <div class="info">
          <a href="#" class="d-block"><?php echo  $_SESSION["admin"]->displayname_user?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
               <li class="nav-item">
            <a href="/" class="nav-link <?php if(empty($routesArray) ): ?>active<?php endif ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admins" class="nav-link  <?php if($routesArray[1] == "admins"): ?>active<?php endif ?>">

              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Administradores
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/users" class="nav-link  <?php if($routesArray[1] == "users"): ?>active<?php endif ?> ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>




          <li class="nav-item">
            <a href="/volunteers" class="nav-link  <?php if($routesArray[1] == "volunteers"): ?>active<?php endif ?> ">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Voluntariado
              </p>
            </a>
          </li>

  


         <li class="nav-item">
            <a href="/donations" class="nav-link  <?php if($routesArray[1] == "donations"): ?>active<?php endif ?> ">
              <i class="nav-icon fa fa-hand-holding-heart"></i>
              <p>
                Donaciones
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Documentacion
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/internal" class="nav-link  <?php if($routesArray[1] == "internal"): ?>active<?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Interna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/public" class="nav-link  <?php if($routesArray[1] == "public"): ?>active<?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Publica</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item">
            <a href="/reports" class="nav-link   <?php if($routesArray[1] == "reports"): ?>active<?php endif ?>">
              <i class="nav-icon fa fa-copy"></i>
              <p>
                Reportes
              </p>
            </a>
          </li>


  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>