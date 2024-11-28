
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="./inicio.php" class="logo d-flex align-items-center ">
      <img src="img/logo.png" alt="">
      <span class="d-none d-lg-block">POLLERA LA CHINITA</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>
<!-- 
  <div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="BUSCAR VENTA POR NÚMERO DE FACTURA O POR NOMBRE DEL CLIENTE" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
  </div> -->


  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="" data-bs-toggle="dropdown">
          <i class="bi bi-currency-exchange"></i>
        </a>

        <?php 
          $precio_dolar = modeloPrincipal::consultar("SELECT id_dolar from dolar");
          $precio_dolar = mysqli_num_rows($precio_dolar);
          $precio_dolar = modeloPrincipal::consultar("SELECT id_dolar, dolar from dolar WHERE id_dolar = '$precio_dolar'");
          $mostrarDolar = mysqli_fetch_array($precio_dolar);

        ?>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header row">
            <p class="mb-2">
              La Tasa del Día es: 
              <span id="tasa_dolar"><?= $mostrarDolar['dolar'] ?> </span>
              bs<br>
            </p>
            <button class="nav-link" data-bs-toggle="modal" data-bs-target="#dolarUpdate" id="btnUpdate"><span class="badge rounded-pill bg-primary p-2 ms-2">Actualizar Tasa</span></button>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
        </ul>
      </li>

      <!-- 
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-primary badge-number">1</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            TIENES N NOTIFICACIONES
            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">VER TODO</span></a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="notification-item">
            <i class="bi bi-alarm text-warning"></i>
            <div>
              <h4>RECIBIR PEDIDO</h4>
              <p>EL DIA DE HOY <?= $_SESSION["fecha"]; ?> LLEGA EL PEDIDO SOLICITADO</p>
            </div>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>
          <li class="dropdown-footer">
            <a href="#">VER TODAS LAS NOTIFICACIONES</a>
          </li>

        </ul> 

      </li>-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['nombre'], " ", $_SESSION['apellido']; ?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['nombre'], " ", $_SESSION['apellido']; ?></h6>
              <span><?php echo $_SESSION['nombre_tipo_usuario']; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="./mi_perfil.php">
                <i class="bi bi-person"></i>
                <span>Mi Pefil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <?php //if ($_SESSION["rol"] == "1") {?>
          <!-- <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-gear"></i>
                  <span>CONFIGURACIÓN</span>
                </a>
              </li> -->
            <?php //} ?>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center btn-exit-system" href="#!">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar Sesión</span>
              </a>
            </li>

          </ul>
          <!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>