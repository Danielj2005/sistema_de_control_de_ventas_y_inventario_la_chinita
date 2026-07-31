<!-- jquery -->
<script type="text/javascript" src="./js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>

<!-- datatable js files -->
<script type="text/javascript" src="./js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="./js/datatables.min.js"></script>
<script type="text/javascript" src="./js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var t = $('#example').DataTable( { 
            language: {
				url: './js/dataTables-Español.json'
			},
            lengthMenu: [[5, 10, 15, 20, 25, 50, 100, -1], [5, 10, 15, 20, 25, 50, 100, "Todos"]],
            responsive: true,
        } );

        t.on( 'order.dt search.dt', function () {
            let i = 1;
    
            t.cells(null, 0, {search:'applied', order:'applied'}).every( function (cell) {
                this.data(i++);
            } );
        } ).draw();
    } );
    
    function dataTable(classTable = "example"){
        var t = $(`.${classTable}`).DataTable( { 
            language: {
                url: './js/dataTables-Español.json'
            },
            lengthMenu: [[5, 10, 15, 20, 25, 50, 100, -1], [5, 10, 15, 20, 25, 50, 100, "Todos"]],
            responsive: true,
        } );

        t.on( 'order.dt search.dt', function () {
            let i = 1;
            t.cells(null, 0, {search:'applied', order:'applied'}).every( function (cell) {
                this.data(i++);
            } );
        } ).draw();
    }
    
</script>


<!-- Vendor JS Files -->
<script type="text/javascript" src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script type="text/javascript" src="assets/vendor/chart.js/chart.umd.js"></script>
<script type="text/javascript" src="assets/vendor/echarts/echarts.min.js"></script>
<script type="text/javascript" src="assets/vendor/quill/quill.min.js"></script>
<!-- <script type="text/javascript" src="assets/vendor/tinymce/tinymce.min.js"></script> -->

<!-- Template Main JS File -->
<script type="text/javascript" src="assets/js/main.js"></script>

<!-- lógica de los modales -->
<script type="text/javascript" src="./js/configModal.js"></script>
<script type="text/javascript" src="./js/modal.js"></script>
<script type="text/javascript" src="./js/get_url.js"></script>

<!-- <script src="./js/sweet-alert.min.js"></script> -->
<script type="text/javascript" src="./js/sweetalert2.min.js"></script>
<script type="text/javascript" src="./js/tiempo_inactividad.js"></script>
<script type="text/javascript" src="./js/hiddeInput.js"></script>
<script type="text/javascript" src="./js/dolar.js"></script>
<script type="text/javascript" src="./js/validacion_formularios.js"></script>

<<<<<<< HEAD
<script type="text/javascript" src="./js/SendForm.js"></script> <!-- procesamiento de peticiones CRUD del usuario -->
<script type="text/javascript" src="./js/buscar_proveedor.js"></script> <!--  script para llamar la información de un proveedor -->
<script type="text/javascript" src="./js/buscar_datos_cliente.js"></script> <!--  script para llamar la información de un cliente -->
<script type="text/javascript" src="./js/procesamiento_de_dinero.js"></script> <!-- script para calcular los montos totales de un producto -->
<script type="text/javascript" src="./js/select2.min.js"></script> <!-- libreria selec2 -->
<script type="text/javascript" src="./js/cerrar_sesion.js"></script> <!-- script para cerrar sesion -->
<script type="text/javascript" src="./js/toastify.js"></script> <!-- script para import la libreria de alertas toastify -->

<script type="text/javascript" src="./js/añadir_elemento_lista.js"></script>
=======
<script src="./js/SendForm.js"></script> <!-- procesamiento de peticiones CRUD del usuario -->
<script src="./js/buscar_proveedor.js"></script> <!--  script para llamar la información de un proveedor -->
<script src="./js/buscar_datos_cliente.js"></script> <!--  script para llamar la información de un cliente -->
<script src="./js/procesamiento_de_dinero.js"></script> <!-- script para calcular los montos totales de un producto -->
<script src="./js/cerrar_sesion.js"></script> <!-- script para cerrar sesion -->
<script src="./js/toastify.js"></script> <!-- script para import la libreria de alertas toastify -->
>>>>>>> 6d67ee1dfe1b477a1b125acb7b6ceefc095b793e


<script type="text/javascript" src="./js/select2.min.js"></script> <!-- libreria selec2 -->
<script type="text/javascript">
    // inicializar la libreria Select2 
    $('.SelectTwo').select2();

    // funcion para eliminar un elemento del html
    document.addEventListener('DOMContentLoaded', () => {
        const alertHistoryt = document.querySelectorAll('.alert-history');
        alertHistoryt.forEach(alert => {
            alert.addEventListener('click', () => {
                // alert con toastify library
                Toastify({
                    text: ' Este proveedor se encuentra sin un historial de compras.',
                    className: "bi bi-exclamation-triangle-fill fs-5",
                    duration: 3000,
                    style: {
                        background: "#6c757d",
                    }
                }).showToast();
            });
        });
        
    });
</script>