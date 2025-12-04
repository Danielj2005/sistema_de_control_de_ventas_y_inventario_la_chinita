<?php 

$primer_inicio = $_SESSION['primerInicio'];

if($primer_inicio == '1'){
    echo "<script type='text/javascript'>
            window.location.href='./mi_perfil.php';
        </script>";
    exit();
}