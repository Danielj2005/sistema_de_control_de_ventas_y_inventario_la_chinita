<?php 

$permiso_proveedor = modeloPrincipal::verificar_permisos_requeridos($_SESSION['permisosRequeridos']['proveedor']);
$permiso_productos = modeloPrincipal::verificar_permisos_requeridos($_SESSION['permisosRequeridos']['producto']['productos']);
$permiso_entrada_productos = modeloPrincipal::verificar_permisos_requeridos($_SESSION['permisosRequeridos']['producto']['entrada']);

$permiso_servicio = modeloPrincipal::verificar_permisos_requeridos($_SESSION['permisosRequeridos']['servicio']);

$permiso_modulo_venta = modeloPrincipal::verificar_permisos_requeridos($_SESSION['permisosRequeridos']['venta']);
$permiso_modulo_cliente = modeloPrincipal::verificar_permisos_requeridos($_SESSION['permisosRequeridos']['cliente']);
$permiso_modulo_usuario = modeloPrincipal::verificar_permisos_requeridos($_SESSION['permisosRequeridos']['usuario']);

$permiso_modulo_rol = modeloPrincipal::verificar_permisos_requeridos($_SESSION['permisosRequeridos']['rol']);
$permiso_ajustes = modeloPrincipal::verificar_permisos_requeridos($_SESSION['permisosRequeridos']['ajustes']);
$permiso_bitacora = modeloPrincipal::verificar_permisos_requeridos($_SESSION['permisosRequeridos']['bitacora']);


if ($_SESSION['dataUsuario']["primer_inicio"] === 0) {  ?>

  <aside id="sidebar" class="sidebar dark:bg-slate-800 dark:shadow-md dark:shadow-slate-300">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- apartado de página principal -->
        <li class="nav-item mb-3">
          <a class="bg-[#f6f9ff] dark:bg-slate-800 dark:shadow-slate-300/80 dark:text-slate-300 flex gap-2 hover:bg-slate-600 p-2 rounded-3 shadow-md" href="./"> <i class="bi bi-speedometer2"></i> <span>Panel de Control</span> </a>
        </li>
      
      <?php if ($permiso_productos || $permiso_proveedor) {  ?>


            <!-- <a class="bg-[#f6f9ff] dark:shadow-slate-300/80 dark:text-slate-300 gap-2 rounded-3 dark:shadow-md flex hover:bg-slate-600 p-3 rounded-3  collapsed" data-bs-toggle="collapse" href="#components-nav" aria-expanded="false" aria-controls="collapseExample">
              <i class="bi bi-box-seam-fill"></i>
              <span>Inventario</span>
              <i class="bi bi-chevron-down ms-auto"></i>
            </a> -->

          <li class="nav-item list-none mb-2">
            <details class="group">
              <!-- Encabezado / Botón disparador -->
              <summary class=" bg-[#f6f9ff] dark:bg-slate-800 justify-between dark:shadow-slate-300/80 dark:text-slate-300 gap-2 rounded-3 shadow-md flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors list-none [&::-webkit-details-marker]:hidden">
                <div class="flex items-center space-x-3">
                  <i class="bi bi-box-seam-fill"></i>
                  <span>Inventario</span>
                </div>
                <!-- Flecha que rota al abrir -->
                <i class="bi bi-chevron-down text-sm transition-transform duration-200 group-open:rotate-180"></i>
              </summary>

              <!-- Contenido colapsable -->
              <ul class="  bg-[#f6f9ff] -translate-y-2 dark:bg-slate-800 dark:text-slate-300 delay-300 pb-2 pl-2 pt-2 rounded-bottom-3 shadow-md dark:shadow-slate-500 space-y-1 transition-all">
                
              <?php if ($permiso_productos) : ?>

                <li class="hover:bg-slate-500/40 p-1 rounded-xl group">
                  <a class="hover:text-slate-800 text-slate-800" href="./gestion_productos.php">
                    <i class="bi bi-caret-right text-sm"></i>
                    <span>Gestión de Productos</span>
                  </a>
                </li>
                  
              <?php endif; if ($permiso_entrada_productos): ?>
                <li class="hover:bg-slate-500/40 p-1 rounded-xl group">
                  <a class="hover:text-slate-800 text-slate-800" href="./entrada_de_productos.php"> <i class="bi bi-caret-right"></i> <span>Registro de Compras</span> </a>
                </li>
              <?php endif; if ($permiso_proveedor) : ?>
                <li class="hover:bg-slate-500/40 p-1 rounded-xl group">
                  <a class="hover:text-slate-800 text-slate-800" href="./proveedor.php"> <i class="bi bi-caret-right"></i> <span>Gestión de Proveedores</span></a>
                </li>
              <?php endif; ?>
              </ul>
            </details>
          </li>
      <?php } if ($permiso_servicio) { ?>
        
          <li class="nav-item mb-3">
            <a href="gestion_servicios.php" class=" bg-[#f6f9ff] dark:bg-slate-800 dark:shadow-slate-300/80 dark:text-slate-300 gap-2 rounded-3 shadow-md flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors list-none [&::-webkit-details-marker]:hidden">
              <i class="bi bi-person-workspace"></i>
              <span> Gestión de Servicios</span>
            </a>
          </li>

      <?php }  if ($permiso_modulo_venta) { ?>
          
          <li class="nav-item list-none mb-3">
            <details class="group">
              <!-- Encabezado / Botón disparador -->
              <summary class=" bg-[#f6f9ff] dark:bg-slate-800 dark:shadow-slate-300/80 dark:text-slate-300 gap-2 rounded-3 shadow-md flex items-center justify-between p-2 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors list-none [&::-webkit-details-marker]:hidden">
                <div class="flex items-center space-x-3">
                  <i class="bi bi-currency-dollar text-lg"></i>
                  <span class="font-medium">Ventas</span>
                </div>
                <!-- Flecha que rota al abrir -->
                <i class="bi bi-chevron-down text-sm transition-transform duration-200 group-open:rotate-180"></i>
              </summary>

              <!-- Contenido colapsable -->
              <ul class=" bg-[#f6f9ff] -translate-y-2 dark:bg-slate-800 dark:text-slate-300 delay-300 pb-2 pl-2 pt-2 rounded-bottom-3 shadow-md dark:shadow-slate-500 space-y-1 transition-all">
                <?php if (array_key_exists( "g_venta", $_SESSION['permisosRol'] )) {  ?>

                  <li class="hover:bg-slate-500/40 p-1 rounded-xl "> <a class="hover:text-slate-800 text-slate-800" href="./generar_venta.php"> <i class="bi bi-caret-right"></i> <span>Generar venta</span> </a> </li>

                <?php } if (array_key_exists( "l_venta", $_SESSION['permisosRol'] ) || array_key_exists( "d_venta", $_SESSION['permisosRol'] ) || array_key_exists( "f_venta", $_SESSION['permisosRol'] )) {  ?>

                  <li class="hover:bg-slate-500/40 p-1 rounded-xl "> <a class="hover:text-slate-800 text-slate-800" href="./venta.php"> <i class="bi bi-caret-right"></i> <span>Historial de Ventas</span> </a> </li>

                <?php } ?>
              </ul>
            </details>
          </li>

      <?php } if ($permiso_modulo_cliente || $permiso_modulo_usuario || $permiso_modulo_rol) { ?>
                  
          <li class="nav-item list-none mb-3">
            <details class="group">
              <!-- Encabezado / Botón disparador -->
              <summary class=" bg-[#f6f9ff] dark:bg-slate-800 dark:shadow-slate-300/80 dark:text-slate-300 gap-2 rounded-3 shadow-md flex items-center justify-between p-2 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors list-none [&::-webkit-details-marker]:hidden">
                <div class="flex items-center space-x-3">
                  <i class="bi bi-people-fill"></i>
                  <span>Usuarios</span>
                </div>
                <!-- Flecha que rota al abrir -->
                <i class="bi bi-chevron-down text-sm transition-transform duration-200 group-open:rotate-180"></i>
              </summary>

              <!-- Contenido colapsable -->
              <ul class=" bg-[#f6f9ff] -translate-y-2 dark:bg-slate-800 dark:text-slate-300 delay-300 pb-2 pl-2 pt-2 rounded-bottom-3 shadow-md dark:shadow-slate-500 space-y-1 transition-all">
                
                <?php if ($permiso_modulo_cliente): ?>

                    <!-- modulo de clientes -->
                    <li class="hover:bg-slate-500/40 p-1 rounded-xl "> <a class="hover:text-slate-800 text-slate-800" href="./cliente.php">
                        <i class="bi bi-caret-right"></i>
                        <span>Clientes</span>
                      </a>
                    </li>

                <?php endif;  if ($permiso_modulo_usuario): ?>

                  <li class="hover:bg-slate-500/40 p-1 rounded-xl "> <a class="hover:text-slate-800 text-slate-800" href="./empleados.php">
                      <i class="bi bi-caret-right"></i>
                      <span>Empleados</span>
                    </a>
                  </li>

                <?php endif; if ($permiso_modulo_rol): ?>

                    <li class="hover:bg-slate-500/40 p-1 rounded-xl "> <a class="hover:text-slate-800 text-slate-800" href="./roles.php">
                        <i class="bi bi-caret-right"></i>
                        <span>Gestión de Roles</span>
                      </a>
                    </li>

                <?php endif; ?>
              </ul>
            </details>
          </li>

      <?php } ?>

      <!-- apartado del perfil de usuario  -->
      <li class="nav-item mb-3">
        <a class=" bg-[#f6f9ff] dark:bg-slate-800 dark:shadow-slate-300/80 dark:text-slate-300 gap-2 rounded-3 shadow-md flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors list-none [&::-webkit-details-marker]:hidden" href="./mi_perfil.php"> <i class="bi bi-person-fill"></i> <span>Mi Perfil</span> </a>
      </li>

      <?php if ($permiso_ajustes || $permiso_bitacora) { ?>
 
          <li class="nav-item list-none mb-3">
            <details class="group">
              <!-- Encabezado / Botón disparador -->
              <summary class=" bg-[#f6f9ff] dark:bg-slate-800 dark:shadow-slate-300/80 dark:text-slate-300 gap-2 rounded-3 shadow-md flex items-center justify-between p-2 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors list-none [&::-webkit-details-marker]:hidden">
                <div class="flex items-center space-x-3"> 
                  <i class="bi bi-gear-fill"></i>
                  <span>Configuración General</span> 
                </div>
                <!-- Flecha que rota al abrir -->
                <i class="bi bi-chevron-down text-sm transition-transform duration-200 group-open:rotate-180"></i>
              </summary>

              <!-- Contenido colapsable -->
              <ul class=" bg-[#f6f9ff] -translate-y-2 dark:bg-slate-800 dark:text-slate-300 delay-300 pb-2 pl-2 pt-2 rounded-bottom-3 shadow-md dark:shadow-slate-500 space-y-1 transition-all">
                
                <?php if ($permiso_ajustes) {  ?>
                  
                  <li class="hover:bg-slate-500/40 p-1 rounded-xl "> <a class="hover:text-slate-800 text-slate-800" href="./configuracion.php">
                      <i class="bi bi-caret-right"></i>
                      <span>Ajustes del Sistema</span>
                    </a>
                  </li>

                <?php } if ($permiso_bitacora) {  ?>
                  
                  <li class="hover:bg-slate-500/40 p-1 rounded-xl "> <a class="hover:text-slate-800 text-slate-800" href="./bitacora.php">
                      <i class="bi bi-caret-right"></i>
                      <span>Bitácora</span>
                    </a>
                  </li>
                  
                <?php } ?>
              </ul>
            </details>
          </li>


      <?php } ?>

      <!-- apartado de ayuda  -->     
          <li class="nav-item list-none mb-3">
            <details class="group">
              <!-- Encabezado / Botón disparador -->
              <summary class=" bg-[#f6f9ff] dark:bg-slate-800 dark:shadow-slate-300/80 dark:text-slate-300 gap-2 rounded-3 shadow-md flex items-center justify-between p-2 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors list-none [&::-webkit-details-marker]:hidden">
                <div class="flex items-center space-x-2">
                  <i class="bi bi-question-circle "></i>
                  <span>Soporte y Ayúda</span>
                </div>
                <!-- Flecha que rota al abrir -->
                <i class="bi bi-chevron-down text-sm transition-transform duration-200 group-open:rotate-180"></i>
              </summary>

              <!-- Contenido colapsable -->
              <ul class=" bg-[#f6f9ff] -translate-y-2 dark:bg-slate-800 dark:text-slate-300 delay-300 pb-2 pl-2 pt-2 rounded-bottom-3 shadow-md dark:shadow-slate-500 space-y-1 transition-all">
                
                <li class="hover:bg-slate-500/40 p-1 rounded-xl "> <a class="hover:text-slate-800 text-slate-800" href="./manuales/MANUAL_DE_SISTEMA_CHINITA.pdf" target="_blank"> <i class="bi bi-caret-right"></i> <span>Manual de Referencia</span> </a> </li>
        </ul>
            </details>
          </li>


      <li class="nav-item mb-3"> <button class=" w-full bg-[#f6f9ff] dark:bg-slate-800 dark:shadow-slate-300/80 dark:text-slate-300 gap-2 rounded-3 shadow-md flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors list-none [&::-webkit-details-marker]:hidden btn-exit-system"> <i class="bi bi-box-arrow-right"></i> <span>Cerrar Sesión</span> </button> </li>
    </ul>
  </aside>
<?php } ?>