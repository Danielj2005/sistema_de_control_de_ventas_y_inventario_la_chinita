  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="inicio.php">
          <i class="bi bi-grid"></i>
          <span>INICIO</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>INVENTARIO</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../vista/entrada_de_productos.php">
              <i class="bi bi-circle"></i><span>ENTRADA</span>
            </a>
          </li>
          <li>
            <a href="../vista/productos.php">
              <i class="bi bi-circle"></i><span>PRODUCTOS</span>
            </a>
          </li>

          <li>
            <a href="../vista/proveedor.php">
              <i class="bi bi-circle"></i><span>PROVEEDORES</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>VENTAS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../vista/venta.php">
              <i class="bi bi-circle"></i><span>VENTAS</span>
            </a>
          </li>
          <li>
            <a href="./generar_venta.php">
              <i class="bi bi-circle"></i><span>GENERAR VENTAS</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>MENU</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../vista/menu.php">
              <i class="bi bi-circle"></i><span>MENU</span>
            </a>
          </li>
          <li>
            <a href="../vista/agregar_servicio.php">
              <i class="bi bi-circle"></i><span>AÑADIR NUEVO SERVICIO</span>
            </a>
          </li>

        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>ESTADÍSTICAS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="estadisticas_generales.php">
              <i class="bi bi-circle"></i><span>ESTADÍSTICAS DE VENTAS</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ESTADÍSTICAS DE VENTAS POR PRODUCTO</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ESTADÍSTICAS DE GASTOS</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../vista/lista_empleados.php">
          <i class="bi bi-person-plus"></i>
          <span>EMPLEADOS</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../vista/cliente.php">
          <i class="bi bi-people"></i>
          <span>CLIENTES</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="./mi_perfil.php">
          <i class="bi bi-person"></i>
          <span>MI PERFIL</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#ayuda-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-question-circle"></i><span>AYUDA</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ayuda-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="ayuda-chartjs.html" target="_blank">
              <i class="bi bi-circle"></i><span>MANUAL DE USUARIO</span>
            </a>
          </li>
          <li>
            <a href="ayuda-apexcharts.html" target="_blank">
              <i class="bi bi-circle"></i><span>MANUAL DE INSTALACIÓN</span>
            </a>
          </li>
          <li>
            <a href="ayuda-echarts.html" target="_blank">
              <i class="bi bi-circle"></i><span>MANUAL DE SISTEMA</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>

  </aside>