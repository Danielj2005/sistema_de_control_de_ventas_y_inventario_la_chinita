<?php 
session_start();

// importacion de la conexion a la base de datos y al modelo principal

include_once "../include/modelos_include.php"; // se incluyen los modelos necesarios para la vista

$id_usuario = $_SESSION['id_usuario']; // se obtiene el id del usuario
// validación para verificar que el usuario inicio sesion de manera correcta
model_user::verificar_intento_de_acceso_al_sistema();

include_once "../include/verificacion_primer_inicio_usuario.php"; // se incluyen los modelos necesarios para la vista

$g_venta = modeloPrincipal::verificar_permisos_requeridos(['g_venta']);

// se evalua que este rol tenga el acceso a esta vista
if ($g_venta) {  ?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- titulo -->
      <title>Generar Venta</title>
      <?php 
        // se incluyen los meta datos 
        include_once "../include/meta_include.php"; 
        // se incluyen los estilos css y sus librerias a la vista
        include_once "../include/css_include.php";
      ?>
      <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="toggle-sidebar">
      <?php 
        // se incluye el header / encabezado a la vista
        include_once "../include/header.php";
        // se incluye el menu lateral a la vista 
        include_once "../include/sliderbar.php"; 
      ?>
      
      <main id="main" class="bg-slate-100 h-screen flex flex-col font-sans overflow-hidden">
        
        <nav class="d-none bg-blue-800 text-white px-6 py-2 flex justify-between items-center shadow-md">
            <div class="flex items-center gap-4">
                <h1 class="font-black text-xl tracking-tight">VENE-POS</h1>
                <span class="bg-blue-700 px-3 py-1 rounded-full text-xs font-mono border border-blue-500">Terminal #01</span>
            </div>
            
            <div class="flex items-center gap-3 bg-blue-900 px-4 py-1 rounded-lg border border-blue-400">
                <span class="text-xs font-bold text-blue-200">TASA BCV:</span>
                <div class="flex items-center">
                    <span class="text-sm font-bold mr-1">Bs.</span>
                    <input type="number" value="36.50" step="0.01" class="bg-transparent border-none w-16 text-sm font-black focus:ring-0 outline-none text-yellow-400" title="Click para editar tasa">
                </div>
                <span class="text-[10px] text-blue-300 italic">Hoy 19:18</span>
            </div>
        </nav>

        <div class="flex flex-col md:flex-row h-ful overflow-hidden">
            
            <div class="flex-1 flex flex-col bg-white overflow-hidden">
                
                <div class="p-2 border-b">
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-blue-600 transition-colors">
                          🔍
                        </span>
                        <input 
                          type="text" placeholder="Escribe Nombre, Código de Barras o Presentación..." 
                          class="w-full pl-12 pr-4 py-2 bg-gray-50 border-2 border-gray-200 rounded-2xl focus:border-blue-500 focus:bg-white transition-all outline-none text-lg shadow-sm"
                          autofocus
                        >
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto px-4">
                    <table class="w-full text-left">
                        <thead class="sticky top-0 bg-white z-10 border-b">
                            <tr class="text-gray-500 uppercase text-[10px] font-bold tracking-widest">
                                <th class="py-2">Descripción</th>
                                <th class="py-2 text-center">Cant.</th>
                                <th class="py-2 text-right">Precio ($ / Bs.)</th>
                                <th class="py-2 text-right">Total Bs.</th>
                                <th class="py-2 w-12"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-blue-50/50 transition-colors">
                                <td class="py-4">
                                    <div class="font-bold text-gray-800 leading-tight">Harina Pan 1kg</div>
                                    <div class="text-[11px] text-blue-600 font-mono">759100100012 • Maíz Precocida</div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center justify-center bg-gray-100 rounded-lg w-20 mx-auto">
                                        <button class="px-2 font-bold hover:text-blue-600">-</button>
                                        <span class="px-2 text-sm font-black">2</span>
                                        <button class="px-2 font-bold hover:text-blue-600">+</button>
                                    </div>
                                </td>
                                <td class="py-4 text-right">
                                    <div class="text-sm font-bold text-gray-700">$ 1.20</div>
                                    <div class="text-[10px] text-gray-400">Bs. 43.80</div>
                                </td>
                                <td class="py-4 text-right">
                                    <div class="text-base font-black text-blue-900 italic">Bs. 87.60</div>
                                    <div class="text-[10px] text-gray-400">Ref. $ 2.40</div>
                                </td>
                                <td class="py-4 text-center">
                                    <button class="text-gray-300 hover:text-red-900 transition-colors">✕</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="w-full md:w-96 bg-slate-50 border-l border-gray-200 flex flex-col shadow-2xl">
                <div class="p-4 flex-1 space-y-6">
                    <div>
                        <h3 class="text-slate-400 text-xs font-black uppercase tracking-widest mb-4">Resumen de Cuenta</h3>
                        
                        <div class="space-y-3 bg-white p-2 rounded-xl border border-gray-200 shadow-sm">
                            <div class="flex justify-between items-baseline">
                                <span class="text-gray-400 text-xs">TOTAL REF.</span>
                                <span class="text-xl font-black text-gray-800">$ 2.47</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-blue-600 p-2 rounded-2xl shadow-lg shadow-blue-200 text-white relative overflow-hidden">
                        <div class="relative z-10 p-2">
                            <span class="text-xs font-bold opacity-40 uppercase">Total a Pagar (Bs.)</span>
                            <div class="text-xl font-black mt-1 leading-none">
                                Bs. 90.15
                            </div>
                        </div>
                        <div class="absolute right-2 -bottom-4 text-6xl opacity-10 rotate-12">🇻🇪</div>
                    </div>

                    <div class="grid grid-cols-2 gap-1">
                        <button class="flex flex-col items-center justify-center p-2 bg-white border-2 border-gray-100 rounded-xl hover:border-blue-500 transition-all group">
                            <span class="text-xl">📱</span>
                            <span class="text-[10px] font-black text-gray-50:">PAGO MÓVIL</span>
                        </button>
                        <button class="flex flex-col items-center justify-center p-2 bg-white border-2 border-gray-100 rounded-xl hover:border-blue-500 transition-all group">
                            <span class="text-xl">💵</span>
                            <span class="text-[10px] font-black text-gray-50:">DIVISAS</span>
                        </button>
                        <button class="flex flex-col items-center justify-center p-2 bg-white border-2 border-gray-100 rounded-xl hover:border-blue-500 transition-all group">
                            <span class="text-xl">💳</span>
                            <span class="text-[10px] font-black text-gray-50:">DÉBITO</span>
                        </button>
                        <button class="flex flex-col items-center justify-center p-2 bg-white border-2 border-gray-100 rounded-xl hover:border-blue-500 transition-all group">
                            <span class="text-xl">🧾</span>
                            <span class="text-[10px] font-black text-gray-50:">BIOPAGO</span>
                        </button>
                    </div>
                </div>

                <div class="p-6 bg-white border-t">
                    <button class="w-full bg-green-500 hover:bg-green-600 text-white font-black py-2 rounded-xl text-lg shadow-lg flex flex-col items-center justify-center transition-transform active:scale-95 leading-tight">
                        <span>FINALIZAR VENTA</span>
                        <span class="text-[10px] font-normal opacity-90 uppercase tracking-tighter">Generar Factura Ticket</span>
                    </button>
                </div>
            </div>

        </div>

        
      </main>

      <?php 
        include_once "./modal/plantillaModalCustom.php";

        // se incluye el footer / pie de pagina a la vista
        include_once "../include/footer.php"; 
        // se incluyen los script de javascript a la vista 
        include_once "../include/scripts_include.php"; 
    
        model_user::validar_sesion_activa($id_usuario);

        config_model::verificar_actualizacion_configuracion(); 

      ?>

        
      <script type="text/javascript">
            
        // inicializar la libreria Select2 
        $('.Select').select2();

        // función para añadir un metodo de pago 
        let i = 2;
        function añadir_metodo_pago(){
          // este tr será añadido a la tabla 
          let tr = `<tr id="metodo_${i}">
                      <td class="text-center col">
                        <select name="metodo_pago[]" id="metodo_pago_${i}" class="form-select form-select-sm selector_metodo_pago" onchange="habilitar_referencia('metodo_pago_${i}','num_referencia_${i}')">
                          <option selected>seleccione un método</option>
                          <option value="1">Divisa</option>
                          <option value="2">Punto de Venta</option>
                          <option value="3">Transferencia / Pago movíl</option>
                          <option value="4">Bolivares en Efectivo</option>
                        </select>
                      </td>
                      <td class="text-center col">
                        <input type="text" class="form-control form-control-sm" id="cantidad_${i}" name="monto_pagar[]" placeholder="monto a pagar ($)" required>
                      </td>
                      <td class="text-center col">
                        <input type="text" class="form-control form-control-sm bg-dark-subtle" readOnly id="num_referencia_${i}" name="num_referencia[]" maxlength="20" minlength="7" placeholder="número de referencia">
                      </td>
                      <td class="text-center col">
                        <button type="button" class="btn btn-sm btn-danger bi bi-trash" onclick="quitar_metodo(${i++})"></button>
                      </td>
                    </tr>`;
  
          $('#tabla_metodo_pago').append(tr);
        }

        function quitar_metodo(num){
          let tr = document.getElementById(`metodo_${num}`);
          tr.remove();
        }
        
        // estafuncion sirve para habilitar e inhabilitar el input de el número de referencia de un pago 
        function habilitar_referencia (id_del_selector,input_num_referencia){

          let id_selector = document.getElementById(id_del_selector).value;
          let input_referencia = document.getElementById(input_num_referencia);

          if (id_selector === '3') {
            input_referencia.classList.remove('bg-dark-subtle');
            input_referencia.removeAttribute('readOnly');
          }else{
            input_referencia.classList.add('bg-dark-subtle');
            input_referencia.setAttribute('readOnly','');
          }
        }
      
      </script>

    </body>
  </html>
<?php }else{
  // se registran las acciones del usuario en la bitacora y es redirijido al inicio
  bitacora::intento_de_acceso_a_vista_sin_permisos("generar venta");
}