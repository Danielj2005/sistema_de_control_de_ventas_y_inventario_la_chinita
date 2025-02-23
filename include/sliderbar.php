  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- apartado de página principal -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="inicio.php">
          <i class="bi bi-grid"></i>
          <span>Inicio</span>
        </a>
      </li>
      
      <!-- apartado de inventario -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i>
          <span>Inventario</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../vista/entrada_de_productos.php">
              <i class="bi bi-circle"></i>
              <span>Entrada de productos</span>
            </a>
          </li>
          <li>
            <a href="../vista/productos.php">
              <i class="bi bi-circle"></i>
              <span>Productos</span>
            </a>
          </li>
          <li>
            <a href="../vista/proveedor.php">
              <i class="bi bi-circle"></i>
              <span>Proveedores</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- apartado de ventas  -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Ventas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../vista/venta.php">
              <i class="bi bi-circle"></i><span>Ventas Realizadas</span>
            </a>
          </li>
          <li>
            <a href="./generar_venta.php">
              <i class="bi bi-circle"></i><span>Generar venta</span>
            </a>
          </li>
          <li>
            <a href="./estadisticas_generales.php">
              <i class="bi bi-circle"></i><span>Estadísticas de ventas</span>
            </a>
          </li>
        </ul>
      </li>
      
      <!-- apartado de manú de servicios -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i> <span>Menú</span> <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../vista/menu.php"> <i class="bi bi-circle"></i> <span>Servicios</span> </a>
          </li>
          <li>
            <a href="../vista/agregar_servicio.php">
              <i class="bi bi-circle"></i><span>Añadir nuevo servicio</span>
            </a>
          </li>
        </ul>
      </li>
      
      <!-- apartado de gestión de usuarios  -->
      <?php if ($_SESSION["id_rol"] < "3") {?>
        
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#user-list" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-circle"></i><span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>

          <ul id="user-list" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="../vista/cliente.php">
                <i class="bi bi-circle"></i>
                <span>Clientes</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../vista/lista_empleados.php">
                <i class="bi bi-circle"></i>
                <span>Empleados</span>
              </a>
            </li>
            <li>
              <a href="./roles.php">
                <i class="bi bi-circle"></i>
                <span>Roles</span>
              </a>
            </li>
          </ul>
        </li>
      <?php } ?>

      

      <!-- apartado del perfil de usuario  -->
      <li class="nav-item">
        <a class="nav-link collapsed bi bi-person" href="./mi_perfil.php">&nbsp; Mi perfil</a>
      </li>

      <!-- apartado de configuración de sistema -->
      <?php if ($_SESSION["rol"] < "3") {?>

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i>
            <span>Configuración</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>

          <ul id="setting-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="./configuracion.php">
                <i class="bi bi-circle"></i>
                <span>Ajustes del sistema</span>
              </a>
            </li>

            <li>
              <a href="./bitacora.php">
                <i class="bi bi-circle"></i>
                <span>Bitácora</span>
              </a>
            </li>
          </ul>
        </li>
      <?php } ?>

      <!-- apartado de ayuda  -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#ayuda-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-question-circle"></i>
          <span>Ayuda</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="ayuda-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../vista/manuales/MANUAL_DE_USUARIO_CHINITA.pdf" target="_blank">
              <i class="bi bi-circle"></i>
              <span>Manual de usuario</span>
            </a>
          </li>

          <li>
            <a href="./manuales/MANUAL_DE_INSTALACION_CHINITA.pdf" target="_blank">
              <i class="bi bi-circle"></i>
              <span>Manual de instalación</span>
            </a>
          </li>
          <li>
            <a href="./manuales/MANUAL_DE_SISTEMA_CHINITA.pdf" target="_blank">
              <i class="bi bi-circle"></i>
              <span>Manual de sistema</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <button class="nav-link collapsed bi bi-box-arrow-right btn-exit-system">&nbsp; Cerrar sesión</button>
      </li>
    </ul>
  </aside>