
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

  <?php
    $id_usuario = $_SESSION['id_usuario'];
    $precio_dolar_actual = modeloPrincipal::obtener_precio_dolar();
    $_SESSION['dolar'] = $precio_dolar_actual;

    $tiempo_config = modeloPrincipal::obtener_tiempo_inactividad();

    echo '<script type="text/javascript"> const tiempo_config = '.$tiempo_config.' * 60 * 1000</script>';

  ?>

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown">

        <button class="btn btn-light nav-icon bi bi-currency-exchange fst-italic fs-6" data-bs-toggle="dropdown">
          &nbsp; La Tasa del Día: <span id="tasa_dolar"><?= $precio_dolar_actual ?></span>bs
        </button>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header row justify-content-center">
            <div class=" col-12 mb-2">
              <button id="btn_update_dolar_auto" class="w-100 btn btn-success text-center">
                <span class="p-2 ms-2">Actualizar automáticamente</span>
              </button>
            </div>
            <div class=" col-12 mb-2">
              <button class="btn btn-warning text-center w-100" data-bs-toggle="modal" data-bs-target="#dolarUpdate" id="btnUpdate">
                <span class="p-2 ms-2">Actualizar manualmente</span>
              </button>
            </div>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="" data-bs-toggle="dropdown">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?= model_user::obtener_info_personal_usuario('nombre',$id_usuario), " ", model_user::obtener_info_personal_usuario('apellido',$id_usuario); ?></span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?= model_user::obtener_info_personal_usuario('nombre',$id_usuario), " ", model_user::obtener_info_personal_usuario('apellido',$id_usuario); ?></h6>
            <span><?= rol_model::obtener_nombre_rol_usuario( rol_model::obtener_id_rol_usuario()); ?></span>
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
          <?php 
            // esta funcion retorna si el rol tiene permiso a las vista
            $rol = rol_model::permisos_modulos('intentos_inicio_sesion + m_cant_pregunta_seguridad + m_tiempo_sesion + m_cant_caracteres + m_cant_simbolos + m_cant_num');
            // se evalua que este rol tenga el acceso a esta vista
            if ($rol >= 1 && $rol <= 6) {?>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="./configuracion.php">
                  <i class="bi bi-gear"></i>
                  <span>Configuración</span>
                </a>
              </li>
          <?php } ?>
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
      </li>
    </ul>
  </nav>
</header>
<div class="msjFormSend"></div>
