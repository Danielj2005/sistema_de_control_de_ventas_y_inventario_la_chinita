<?php 
session_start();


if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { 
  // Redirigir el acceso a la página sino inició de sesión
  header('Location: ../index.php');
  exit();
  
}else{ ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <!-- metadatos -->  
    <?php include_once("../include/meta_include.php"); ?>

    <!-- titulo -->
    <title>AÑADIR SERVICIO</title>

    <!-- ======= estilos y librerias css ======= -->
    <?php include_once("../include/css_include.php"); ?>
  </head>
  <body>
    <!-- ======= Header ======= -->
    <?php   include_once("../include/header.php"); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php   include_once("../include/sliderbar.php"); ?>
    <!-- End Sidebar-->



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>REGISTRAR SERVICIO</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">DATOS DEL SERVICIO</h5>



              <form method="post" action="../controlador/realizar_entrada.php" class="row g-3">
                <input type="hidden" name="dolar" id="dolar" value="<?php echo $mostrarDolar['dolar']; ?>">
                <div class="col-md-4">
                  <label for="validationDefault01" class="form-label">NOMBRE DEL SERVICIO</label>
                    <div class="col-md-4 input-group">

                          <input type="text" class="form-control"  placeholder="NOMBRE DEL SERVICIO" name="cedula" id="cedula" required>
                      </div>
                </div>

                <div class="col-md-4">
                  <label for="validationDefault02" class="form-label">DESCRIPCIÓN</label>
                  <input type="text" class="form-control"  placeholder="NOMBRE DEL PROVEEDOR" id="nombre_proveedor" name="nombre_proveedor" required>
                </div>

                <h7 class="card-title">PRODUCTO A INGRESAR A LA LISTA</h7>

                <div class="col-md-6">
                  <label for="validationDefault05" class="form-label">PRODUCTO</label>
                  <input type="text" class="form-control" name="preducto" placeholder="PRODUCTO" id="producto" list="productos" name="producto" required>

                  <datalist id="productos">
                    <?php
                          $consulta = modeloPrincipal::consultar("SELECT producto.id_producto, producto.nombre_producto FROM producto WHERE producto.estatus != 'DESACTIVADO'");

                          while ( $mostrar = mysqli_fetch_array($consulta)) {

                        ?>

                        <option value="<?php echo $mostrar['nombre_producto']; ?>"><?php echo $mostrar['nombre_producto']; ?></option>

                      <?php } ?>
                  </datalist>


                </div>

                <div class="col-md-6">
                  <label for="validationDefault05" class="form-label">CANTIDAD DEL PRODUCTO EN EL SERVICIO</label>
                  <input type="text" class="form-control" name="cantidad" placeholder="CANTIDAD QUE DESEA COMPRAR" id="cantidad" required>
                </div>

                <div class="d-grid gap-2 mt-3">
                 <button type="button"  class="btn btn-primary" onclick="añadir()">AGREGAR PRODUCTO A LA LISTA</button>
              </div>

                <div class="col-md-12">
                            <div class="card">
            <div class="card-body">
              <h5 class="card-title">LISTA DE PRODUCTOS QUE CONFORMAN EL SERVICIO</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">PRODUCTO</th>
                    <th scope="col">CANTIDAD</th>
                    <th scope="col">PRECIO POR UNIDAD EN BASE A LA TASA</th>
                    <th scope="col">PRECIO POR UNIDAD EN BASE A LA MONEDA NACINAL</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>


              <!-- End Table with stripped rows -->

            </div>
          </div>
                </div>
                <h7 class="card-title">MONTO TOTAL DEL SERVICIO</h7>
                <div class="col-md-6">
                  <label for="validationDefault05" class="form-label">TOTAL EN BASE A LA TASA REGISTRADA</label>
                  <input class="btn btn-primary" id="totalDolar" disabled value="0$">
                </div>
                <div class="col-md-6">
                  <label for="validationDefault05" class="form-label">TOTAL EN BASE A LA MONEDA NACIONAL</label>
                  <input class="btn btn-primary" id="totalBolivar" disabled value="0 BS">
                </div>
                <div class="d-grid gap-2 mt-3">
                 <button type="submit"  class="btn btn-success">REGISTRAR SERVICIO</button>
              </div>
              </form>
              <div class="msjFormSend"></div>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
<?php   include_once("../include/footer.php"); ?>


  <!-- End Footer -->

     <?php include_once("../include/footer.php"); ?>
    <!-- End Footer -->

    <!-- ======= javascript ======= -->
    <?php include_once("../include/scripts_include.php"); ?>
    <!-- End javascript -->


  <script type="text/javascript">
    

   function buscar_proveedor()
      {

        cedula = document.getElementById("cedula").value;

        if (cedula =="") {
          alert("EL CAMPO CEDULA DE ENCUENTRA VACIO POR FAVOR LLENAR TODOS LOS CAMPOS PARA PODER CONTINUAR");
        }

            var parametros = {
                "buscar": "1",
                "cedula" : cedula
            };

           
            
            $.ajax({
                data:  parametros,
                url:   '../controlador/buscar_proveedor.php',
                type:  'post',
                beforeSend: function(){
                },
                error: function() {
                },
                success: function (datos) {
                    var datosObj = $.parseJSON(datos);
                    if (datosObj.existe==1) {
                        $("#nombre_proveedor").val(datosObj.nombre);
                        $("#telefono").val(datosObj.telefono);
                        $("#correo").val(datosObj.correo);
                        $("#direccion").val(datosObj.direccion);
                    }else{
                        
                    }
                    
                }
                
            }) 
      }


  </script>

  <script type="text/javascript">
    
    n = 1;


    function transformar()
    {
      precioDolares = document.getElementById("precioDolares").value;
      dolar = document.getElementById("dolar").value;

      bolivares = parseFloat(precioDolares) * parseFloat(dolar);
        precioBolivares = document.getElementById("precioBolivares").value = bolivares;
    }



    function añadir()
    {
      if (n == 0) {n++;}
      producto = document.getElementById("producto").value;
      cantidad = document.getElementById("cantidad").value;
      precioDolares = document.getElementById("precioDolares").value;
      precioBolivares = document.getElementById("precioBolivares").value;

      dolar = document.getElementById("dolar").value;

      totalDolar = document.getElementById("totalDolar").value;

      total = precioDolares * cantidad;
      total = parseFloat(total) + parseFloat(totalDolar);

      totalDolar = document.getElementById("totalDolar").value=total+'$';

      totalbolivares = parseFloat(dolar) * parseFloat(total);
      totalEnBolivares = document.getElementById("totalBolivar").value=totalbolivares+' BS';

      tr = '<tr id="nuevo_'+n+'"><th scope="row">'+n+'</th><td>'+producto+'</td><td>'+cantidad+'</td><td>'+precioDolares+'</td><td>'+precioBolivares+'</td></tr>';

      $('.table').append(tr);

      if (producto=="") 
      {
        alert("El CAMPO PRODUCTO ESTA VACIO, POR FAVOR COMPLETAR TODOS LOS CAMPOS");
        let tr = document.getElementById('nuevo_'+n);
        tr.remove();
        n--;
      }
      if (cantidad=="") 
      {
        alert("El CAMPO CANTIDAD ESTA VACIO, POR FAVOR COMPLETAR TODOS LOS CAMPOS");
        let tr = document.getElementById('nuevo_'+n);
        tr.remove();
        n--;
      }
      n++;
    }

  </script>

  <!-- datatable js files -->


</body>

</html>
<?php } ?>