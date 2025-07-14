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
    <?php 
      // vistas
      $entrada = rol_model::permisos_modulos('r_entrada + l_entrada');
      $productos = rol_model::permisos_modulos('r_categoria + m_categoria + l_categoria + r_presentacion + m_presentacion + l_presentacion + r_marca + m_marca + l_marca + r_productos + l_productos');
      $proveedores = rol_model::permisos_modulos('r_proveedores + m_proveedores + l_proveedores + h_proveedores');

      if ($entrada > '0' || $productos > '0' || $proveedores > '0' || $presentacion > '0' || $categoria > '0') {?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i>
            <span>Inventario</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>

          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <?php if ($productos >= 1 && $productos <= 11) {  ?>
            <li>
              <a href="../vista/gestion_productos.php">
                <i class="bi bi-circle"></i>
                <span>Gestión de Productos</span>
              </a>
            </li>
            <?php } if ($proveedores >= 1 && $proveedores <= 4) {  ?>
              <li>
                <a href="../vista/proveedor.php">
                  <i class="bi bi-circle"></i>
                  <span>Proveedores</span>
                </a>
              </li>
            <?php } if ($entrada == 1 || $entrada == 2 ) {  ?>
              <li>
                <a href="../vista/entrada_de_productos.php">
                  <i class="bi bi-circle"></i>
                  <span>Entrada de productos</span>
                </a>
              </li>
            <?php } ?>
          </ul>
        </li>
    <?php } 

    //  <!-- apartado de ventas  -->

      $generar_venta = rol_model::permisos_modulos('g_venta');
      $est_venta = rol_model::permisos_modulos('est_venta');
      $lista_venta = rol_model::permisos_modulos('l_venta');
      $detalles_venta = rol_model::permisos_modulos('d_venta');
      $factura_venta = rol_model::permisos_modulos('f_venta');

      if ($generar_venta > '0' || $est_venta > '0' || $detalles_venta > '0' || $factura_venta > '0' || $lista_venta > 0) {?>
      
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i>
            <span>Ventas</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <?php if ($generar_venta == 1 ) {  ?>
              <li>
                <a href="./generar_venta.php">
                  <i class="bi bi-circle"></i>
                  <span>Generar venta</span>
                </a>
              </li>
            <?php } if ($lista_venta == 1 || $detalles_venta == 1 || $factura_venta == 1 ) {  ?>
              <li>
                <a href="../vista/venta.php">
                  <i class="bi bi-circle"></i>
                  <span>Ventas Realizadas</span>
                </a>
              </li>
            <?php } if ($est_venta == 1 ) {  ?>
              <li>
                <a href="./estadisticas_generales.php">
                  <i class="bi bi-circle"></i>
                  <span>Estadísticas de ventas</span>
                </a>
              </li>
            <?php } ?>
          </ul>
        </li>
    <?php } 
    // <!-- apartado de manú de servicios -->
      $registro_servicio = rol_model::permisos_modulos('r_servicio');
      $modificar_servicio = rol_model::permisos_modulos('m_servicio');
      $lista_servicio = rol_model::permisos_modulos('l_servicio');

      if ($registro_servicio > '0' || $modificar_servicio > '0' || $lista_servicio > 0) {?>
      
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i>
            <span> Menú</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            
            <?php if ($registro_servicio == 1 ) {  ?>
              <li>
                <a href="../vista/agregar_servicio.php">
                  <i class="bi bi-circle"></i>
                  <span>Añadir nuevo servicio</span>
                </a>
              </li>
            <?php } if ($lista_servicio == 1 || $modificar_servicio == 1) {  ?>
              <li>
                <a href="../vista/menu.php">
                  <i class="bi bi-circle"></i>
                  <span>Servicios</span>
                </a>
              </li>
            <?php } ?>
          </ul>
        </li>
    <?php } ?>

    <!-- apartado de gestión de usuarios  -->
    <?php 
      $cliente = rol_model::permisos_modulos('r_cliente + m_cliente + l_cliente + h_cliente + f_cliente');
      $usuario = rol_model::permisos_modulos('r_empleado + m_empleado + l_empleado');
      $rol = rol_model::permisos_modulos('r_rol + m_rol + l_rol');

      if ($_SESSION["id_rol"] < "3" && $cliente > '0' || $usuario > '0' || $rol > '0' ) {?>
      
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#user-list" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-circle"></i>
            <span>Usuarios</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>

          <ul id="user-list" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            
            <?php if ($cliente >= 1 && $cliente <= 5) {  ?>

                <!-- modulo de clientes -->
                <li class="nav-item">

                  <a class="nav-link collapsed" href="../vista/cliente.php">
                    <i class="bi bi-circle"></i>
                    <span>Clientes</span>
                  </a>
                </li>

            <?php } if ($usuario >= 1 && $usuario <= 3) {  ?>

                <!-- modulo de empleados (usuario) -->
                <li class="nav-item">
                  <a class="nav-link collapsed" href="../vista/lista_empleados.php">
                    <i class="bi bi-circle"></i>
                    <span>Empleados</span>
                  </a>
                </li>

            <?php } if ($rol >= 1 && $rol <= 3) {  ?>

                <!-- modulo de roles -->
                <li>
                  <a href="./roles.php">
                    <i class="bi bi-circle"></i>
                    <span>Roles</span>
                  </a>
                </li>
            <?php } ?>
          </ul>
        </li>
    <?php } ?>

    <!-- apartado del perfil de usuario  -->
    <li class="nav-item">
      <a class="nav-link collapsed bi bi-person" href="./mi_perfil.php">&nbsp; Mi perfil</a>
    </li>

    <!-- apartado de configuración de sistema -->
    <?php 
      // vistas
      $configuracion = rol_model::permisos_modulos('m_cant_pregunta_seguridad + m_cant_num + m_cant_simbolos + m_cant_caracteres + m_tiempo_sesion');
      $bitacora = rol_model::permisos_modulos('v_bitacora');

      if ($configuracion > '0' || $bitacora > '0') {?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i>
          <span>Configuración</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="setting-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          
          <?php if ($configuracion >= 1 && $configuracion <= 5) {  ?>
            <li>
              <a href="./configuracion.php">
                <i class="bi bi-circle"></i>
                <span>Ajustes del sistema</span>
              </a>
            </li>

          <?php } if ($bitacora == 1) {  ?>
            <li>
              <a href="./bitacora.php">
                <i class="bi bi-circle"></i>
                <span>Bitácora</span>
              </a>
            </li>
          <?php } ?>
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