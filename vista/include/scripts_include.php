<!-- sweet alert -->
<script src="./js/sweet-alert.min.js"></script>

<!-- jquery -->
<script src="./js/jquery-2.2.4.min.js"></script>

<!-- validacion de formato en formularios -->
<!-- <script src="./js/validacion_formularios.js"></script> -->

<!-- Send Form -->
<script src="./js/SendForm.js"></script>

<!-- cerrar sesion -->
<script src="./js/cerrar_sesion.js"></script>

<!-- cambio de vista en el menu del perfil de usuario -->
<script src="./js/menu_perfil_opciones.js"></script>

<!-- modal modificar -->
<script src="./js/modal.js"></script>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<!-- datatable js files -->

<script src="js/jquery.dataTables.min.js"></script>
<script src="./js/datatables.min.js"></script>
<script src="js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var t = $('#example').DataTable( { 
            language: {
				url: './js/dataTables-Español.json'
			}
        } );

        t.on( 'order.dt search.dt', function () {
            let i = 1;
    
            t.cells(null, 0, {search:'applied', order:'applied'}).every( function (cell) {
                this.data(i++);
            } );
        } ).draw();
        
    } );
</script>