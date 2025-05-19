<!-- sweet alert -->
<script src="./js/sweet-alert.min.js"></script>

<!-- jquery -->
<script src="./js/jquery-3.6.0.min.js"></script>

<script src="./js/hiddeInput.js"></script>
<script src="./js/dolar.js"></script>

<!-- Send Form -->
<script src="./js/SendForm.js"></script>
<!-- script para llamar la información de un proveedor -->
<script src="./js/buscar_proveedor.js"></script>
<!-- script para llamar la información de un cliente -->
<script src="./js/buscar_datos_cliente.js"></script>
<!-- script para calcular los montos totales de un producto-->
<script src="./js/procesamiento_de_dinero.js"></script>
<!-- libreria selec2 -->
<script type="text/javascript" src="./js/select2.min.js"></script>
<script>
    /*--------------------- inicializar la libreria Select2 ---------------------*/
    $('.Select').select2();

    function limpiar_sendform(){
        $(".msjFormSend").html("");
    }
</script>
<!-- cerrar sesion -->
<script src="./js/cerrar_sesion.js"></script>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<!-- datatable js files -->
<script src="./js/jquery.dataTables.min.js"></script>
<script src="./js/datatables.min.js"></script>
<script src="./js/dataTables.bootstrap5.min.js"></script>

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
    
    function dataTable(){

        $(document).ready(function() {
            var t = $('.example').DataTable( { 
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
    }
</script>