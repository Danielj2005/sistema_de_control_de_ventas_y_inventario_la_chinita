<header id="header" class="header fixed-top d-flex align-items-center dark:bg-slate-800 dark:shadow-sm dark:shadow-slate-300/20">

  <div class="d-flex align-items-center justify-content-between">
    <a href="./" class="logo d-flex align-items-center">
      <img src="#" alt="logo ventoi">
      <span class="d-none d-lg-block dark:text-slate-400">VENTOI</span>
    </a>
    <?php if ($_SESSION['dataUsuario']["primer_inicio"] == '0') { ?>
      <i class="bi bi-list toggle-sidebar-btn  dark:text-slate-400"></i>
    <?php } ?>

  </div>

  <!-- 
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="BUSCAR VENTA POR NÚMERO DE FACTURA O POR NOMBRE DEL CLIENTE" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> 
  -->

  <?php
    $id_usuario = $_SESSION['id_usuario'];
    
    $precio_dolar_actual = modeloPrincipal::obtener_precio_dolar();

    $_SESSION['dolar'] = $precio_dolar_actual;

    $tiempo_config = modeloPrincipal::obtener_tiempo_inactividad();

    echo '<script type="text/javascript"> const tiempo_config = '.$tiempo_config.' * 60 * 1000</script>';

  ?>

  <nav class="header-nav ms-auto ">
    <ul class="d-flex align-items-center gap-1">

      <li class="nav-item">
          <a id="lightModeButton" class="w-full group shadow-md  hover:shadow-cyan-500 bg-gray-700/80 dark:bg-slate-500 transition p-[10px] rounded-full mx-3 cursor-pointer">
              <i class="bi bi-sun-fill navicon rounded-full text-amber-400"></i> 
          </a>
      </li>
      <li class="nav-item dropdown">

        <button class="btn bg-secondary-light nav-icon fst-italic fs-6" data-bs-toggle="dropdown">
          <i class="bi bi-currency-exchange"></i>
          &nbsp; Tasa USD: <span id="tasa_dolar"><?= modeloPrincipal::number_format_prices((float)$precio_dolar_actual) ?></span>Bs
        </button>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header row justify-content-center">
            <h6 class="text-center mb-3">Opciones de Actualización</h6>
            <div class=" col-12 mb-2">
              <button id="btn_update_dolar_auto" class="w-100 btn btn-success text-center">
                <i class="bi bi-arrow-repeat"></i>
                <span class="p-2 ms-2">Sincronizar Tasa (Automático)</span>
              </button>
            </div>
            <div class=" col-12 mb-2">
              <button class="btn btn-warning text-center w-100" data-bs-toggle="modal" data-bs-target="#dolarUpdate" id="btnUpdate">
                <i class="bi bi-pencil-square"></i>
                <span class="p-2 ms-2">Establecer Tasa (Manual)</span>
              </button>
            </div>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown me-4">

        <button class="dark:text-slate-400 nav-link nav-profile d-flex align-items-center pe-0" data-bs-toggle="dropdown">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['dataUsuario']['nombre']." ".$_SESSION['dataUsuario']['apellido']; ?></span>
        </button>
        
        <ul class="relative dropdown-menu dropdown-menu-end dropdown-menu-arrow profile dark:bg-slate-800 dark:shadow-xl dark:shadow-slate-400/80">
          <span class="-translate-y-5 absolute h-6 right-5 rotate-45 dark:bg-slate-800 translate-x-2 w-6 "></span>
          <li class="dropdown-header">
            <h6 class=" dark:text-slate-200 font-bold mb-2 "><?= $_SESSION['dataUsuario']['nombre']." ".$_SESSION['dataUsuario']['apellido']; ?></h6>
            <span class="w-full  dark:text-slate-200 bg-purple-900 rounded-full p-1 px-2 text-sm"><?= $_SESSION['dataUsuario']['nombreRolUsuario']; ?></span>
          </li>

          <li> <hr class="dropdown-divider"> </li>

          <li>
            <a class="dropdown-item d-flex align-items-center dark:text-slate-400" href="./mi_perfil.php">
              <i class="bi bi-person"></i>
              <span>Mi Pefil</span>
            </a>
          </li>

          <li> <hr class="dropdown-divider"> </li>

          <?php 
            // Lista de todos los permisos que pertenecen al Módulo de Configuración/Ajustes

            $permiso_ajustes = modeloPrincipal::verificar_permisos_requeridos($_SESSION['permisosRequeridos']['ajustes']);

            // se evalua que este rol tenga el acceso a esta vista

            if ($permiso_ajustes) { ?>
            
              <li>
                <a class="dropdown-item d-flex align-items-center dark:text-slate-400" href="./configuracion.php">
                  <i class="bi bi-gear-fill"></i>
                  <span class=" dark:text-slate-400">Configuración</span>
                </a>
              </li>

          <?php }  ?>

          <li> <hr class="dropdown-divider"> </li>

          <li>
            <a class="dropdown-item d-flex align-items-center dark:text-slate-400 btn-exit-system" href="#!">
              <i class="bi bi-box-arrow-right"></i>
              <span class=" dark:text-slate-400">Cerrar Sesión</span>
            </a>
          </li>

        </ul>
      </li>
    </ul>
  </nav>
</header>
<div class="msjFormSend"></div>
