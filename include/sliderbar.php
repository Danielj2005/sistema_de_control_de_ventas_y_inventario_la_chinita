<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <!-- apartado de página principal -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="./">
        <i class="bi bi-speedometer2"></i>
        <span>Panel de Control</span>
      </a>
    </li>
    
    <?php if ($PERMISOS_MODULO_PRODUCTOS['total'] > '0' || $PERMISOS_MODULO_PROVEEDORES['total'] > '0') {  ?>

        <li class="nav-item">

          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-box-seam-fill"></i>
            <span>Inventario</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>

          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

            <?php if ($PERMISOS_MODULO_PRODUCTOS['total'] > 0 && $PERMISOS_MODULO_PRODUCTOS['total'] < 14) : ?>

                <li>
                  <a href="./gestion_productos.php">
                    <i class="bi bi-circle"></i>
                    <span>Gestión de Productos</span>
                  </a>
                </li>
                
            <?php endif; if ($PERMISOS_MODULO_PRODUCTOS['entrada']['total'] == 1 || $PERMISOS_MODULO_PRODUCTOS['entrada']['total'] == 2 ): ?>

              <li>
                <a href="./entrada_de_productos.php">
                  <i class="bi bi-circle"></i>
                  <span>Registro de Compras</span>
                </a>
              </li>

            <?php endif; if ($PERMISOS_MODULO_PROVEEDORES['total'] >= 1 && $PERMISOS_MODULO_PROVEEDORES['total'] <= 4) : ?>

              <li>
                <a href="./proveedor.php">
                  <i class="bi bi-circle"></i>
                  <span>Gestión de Proveedores</span>
                </a>
              </li>

            <?php endif; ?>
          </ul>
        </li>

    <?php } if ($PERMISOS_MODULO_SERVICIOS['total'] > '0' && $PERMISOS_MODULO_SERVICIOS['total'] < '4') { ?>
      
        <li class="nav-item">
          <a href="gestion_servicios.php" class="nav-link collapsed">
            <i class="bi bi-person-workspace"></i>
            <span> Gestión de Servicios</span>
          </a>
        </li>

    <?php }  if ($PERMISOS_MODULO_VENTAS['total'] > '0' && $PERMISOS_MODULO_VENTAS['total'] < '6') {?>
      
        <li class="nav-item">
          
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-currency-dollar"></i>
            <span>Ventas</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>

          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

            <?php if ($PERMISOS_MODULO_VENTAS['g_venta'] == 1 ) {  ?>

              <li>
                <a href="./generar_venta.php">
                  <i class="bi bi-circle"></i>
                  <span>Generar venta</span>
                </a>
              </li>

            <?php } if ($PERMISOS_MODULO_VENTAS['l_venta'] == 1 || $PERMISOS_MODULO_VENTAS['d_venta'] == 1 || $PERMISOS_MODULO_VENTAS['f_venta'] == 1 ) {  ?>

              <li>
                <a href="./venta.php">
                  <i class="bi bi-circle"></i>
                  <span>Historial de Ventas</span>
                </a>
              </li>

            <?php } if ($PERMISOS_MODULO_VENTAS['est_venta'] == 1 ) {  ?>

              <li>
                <a href="./estadisticas_generales.php">
                  <i class="bi bi-graph-up"></i>
                  <span>Análisis de Ventas</span>
                </a>
              </li>

            <?php } ?>

          </ul>
        </li>

    <?php } if ($PERMISOS_MODULO_CLIENTES['total'] > '0' || $PERMISOS_MODULO_USUARIOS['total'] > '0' || $PERMISOS_MODULO_ROLES['total'] > '0' ) {?>
      
        <li class="nav-item">

          <a class="nav-link collapsed" data-bs-target="#user-list" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people-fill"></i>
            <span>Usuarios</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>

          <ul id="user-list" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            
            <?php if ($PERMISOS_MODULO_CLIENTES['total'] >= 1 && $PERMISOS_MODULO_CLIENTES['total'] <= 4): ?>

                <!-- modulo de clientes -->
                <li class="nav-item">
                  <a class="nav-link collapsed" href="./cliente.php">
                    <i class="bi bi-circle"></i>
                    <span>Clientes</span>
                  </a>
                </li>

            <?php endif;  if ($PERMISOS_MODULO_USUARIOS['total'] >= 1 && $PERMISOS_MODULO_USUARIOS['total'] <= 3): ?>

              <li class="nav-item">
                <a class="nav-link collapsed" href="./empleados.php">
                  <i class="bi bi-circle"></i>
                  <span>Empleados</span>
                </a>
              </li>

            <?php endif; if ($PERMISOS_MODULO_ROLES['total'] >= 1 && $PERMISOS_MODULO_ROLES['total']  <= 3): ?>

                <li>
                  <a href="./roles.php">
                    <i class="bi bi-circle"></i>
                    <span>Gestión de Roles</span>
                  </a>
                </li>

            <?php endif; ?>
          </ul>
        </li>

    <?php } ?>

    <!-- apartado del perfil de usuario  -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="./mi_perfil.php">
        <i class="bi bi-person-fill"></i>
        <span>Mi Perfil</span>
      </a>
    </li>

    <?php if ($PERMISOS_MODULO_AJUSTES['total'] > '0' || $PERMISOS_MODULO_BITACORA['total'] > '0') { ?>

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear-fill"></i>
            <span>Configuración General</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>

          <ul id="setting-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            
            <?php if ($PERMISOS_MODULO_AJUSTES['total'] >= 1 && $PERMISOS_MODULO_AJUSTES['total'] <= 5) {  ?>
              
              <li>
                <a href="./configuracion.php">
                  <i class="bi bi-circle"></i>
                  <span>Ajustes del Sistema</span>
                </a>
              </li>

            <?php } if ($PERMISOS_MODULO_BITACORA['total'] == 1) {  ?>
              
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
        <i class="bi bi-question-circle-fill"></i>
        <span>Soporte y Documentación</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>

      <ul id="ayuda-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="./manuales/MANUAL_DE_USUARIO_CHINITA.pdf" target="_blank">
            <i class="bi bi-book"></i>
            <span>Manual de Usuario</span>
          </a>
        </li>

        <li>
          <a href="./manuales/MANUAL_DE_INSTALACION_CHINITA.pdf" target="_blank">
            <i class="bi bi-wrench"></i>
            <span>Guía de Instalación Técnica</span>
          </a>
        </li>
        <li>
          <a href="./manuales/MANUAL_DE_SISTEMA_CHINITA.pdf" target="_blank">
            <i class="bi bi-laptop"></i>
            <span>Manual de Referencia</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <button class="nav-link collapsed btn-exit-system">
        <i class="bi bi-box-arrow-right"></i>
        <span>Cerrar Sesión</span>
      </button>
    </li>
  </ul>
</aside>