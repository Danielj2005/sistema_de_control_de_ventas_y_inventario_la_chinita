<!-- Favicons -->
<!-- <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon"> -->
<!-- sweet-alert 2 -->
<link href="./css/sweetalert2.min.css" rel="stylesheet">
<link href="./css/toastify.css" rel="stylesheet">

<!-- estilos custom -->
<!-- <link href="./css/main.css" rel="stylesheet"> -->

<link rel="stylesheet" href="./css/select2.min.css">

<link href="./css/bootstrap.min.css" rel="stylesheet">
<link href="./css/bootstrap-icons.css" rel="stylesheet">
<link href="./css/dataTables.bootstrap5.min.css" rel="stylesheet">

<link href="./css/animate.min.css" rel="stylesheet">
<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">

<script type="text/javascript" src="./js/tailwind.min.js" ></script>
<script type="text/javascript">
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                colors: {
                    slate: { 950: '#020617', },
                    purple: { 400: '#c084fc', 500: '#a855f7', 600: '#9333ea', },
                    fuchsia: { 500: '#d946ef', 600: '#c026d3', 700: '#a21caf', },
                },
                fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'], },
            }
        }
    }
</script>

<style>
    .card-title {
        margin-bottom: 1.5rem;
        border-bottom: 2px solid #012970;
        padding-bottom: 0.5rem;
    }
    .invalid {
        border: var(--bs-red) 2px solid;
    }
    .valid {
        border: var(--bs-green) 2px solid;
    }
    .glassmorph {
        background-color: rgba(0, 0, 0, 0.50);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5);
        -moz-backdrop-filter: blur(10px);
    }

    /* CSS personalizado para el separador */
    .dotted-separator {
        border: none;
        border-top: 1px dotted #000;
        margin: 8px 0; /* Espaciado vertical para recibo */
    }
</style>


<?php 
// se obtiene la configuracion de la base de datos
$configuracion = ['iva' => config_model::obtener_dato('porcentaje_iva'),
    'ganancia' => config_model::obtener_dato('porcentaje_ganancia')];
?>
<!-- se obtiene el porcentaje del iva y de la ganancia para los productos -->
<script type="text/javascript">
    const IVA = <?= $configuracion['iva'] / 100 ?> ;
    const PORCENTAJE_GANANCIA = <?= $configuracion['ganancia'] / 100 ?>;
    // url de la api del router
    const URL_API = "../include/api.php";


    // Se ejecuta al instante antes de pintar el body
    const savedTheme = localStorage.getItem('theme') ?? 'dark';
    document.documentElement.classList.add(savedTheme);
</script>

<script type="text/javascript" src="./js/dark_mode.js" ></script>