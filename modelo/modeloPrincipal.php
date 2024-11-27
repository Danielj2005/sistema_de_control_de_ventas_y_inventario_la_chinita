<?php
error_reporting(E_PARSE);
date_default_timezone_set('America/Caracas');

// // Definimos contantes podemos utilizar define("NOMBRE", "valor");
// // tambien podemos utilizar const NOMBRE="valor";

// const SERVER = "localhost"; // Servidor de mysql
// const USER = "root";  // Nombre de usuario de mysql
// const PASSWORD = ""; // Contraseña de myqsl
// const DB = "bdchinita"; // Nombre de la base de datos
// const SECRET_KEY = 'SPLCH2024';

class modeloPrincipal {
    /*----------- Funcion para conectar con la base de datos -----------*/
    public static function Conexion(){
        if(!$con = mysqli_connect(SERVER, USER, PASSWORD)){
            die("Los datos de conexión con la base de datos ingresados son incorrectos, por favor verifique");
        }
        if (!mysqli_select_db($con, DB)) {
            die("El nombre de la base de datos es incorrecto, por favor verifique");
        }
        mysqli_set_charset($con, "utf8");
        return $con;
    }
    /********** Funcion consulta simple BD**********/
    public static function consultar($query) {
        mysqli_query(Self::Conexion(),"SET AUTOCOMMIT=0;");
        mysqli_query(Self::Conexion(),"BEGIN;");
        if (!$consul = mysqli_query(Self::Conexion(),$query)) {
            mysqli_query(Self::Conexion(),"ROLLBACK;");
            die(mysqli_error($query).' Error en la consulta SQL ejecutada ');
        }else{
            mysqli_query(Self::Conexion(),"COMMIT;");
        }
        return $consul;
    } 
    /*--------------------------------- CRUD ---------------------------------*/
    // C - create - crear
    // R - read - leer 
    // U - update - actualizar
    // D - delete - eliminar
    /*----------- Funcion insertar datos de Base de Datos -----------*/
    public static function InsertSQL($tabla,$campos,$valores) {
        if (!$consulta = Self::consultar("INSERT INTO $tabla ($campos) VALUES($valores)")) {
            die("Ha ocurrido un error al guardar los datos");
        }
        return $consulta;
    }

    /*----------- Funcion eliminar datos de Base de Datos -----------*/
    public static function DeleteSQL($tabla, $condicion) {
        if (!$consulta = Self::consultar("DELETE FROM $tabla WHERE $condicion")) {
            die("Ha ocurrido un error al eliminar los datos");
        }
        return $consulta;
    }
    /*----------- Funcion Modificar datos de Base de Datos -----------*/
    public static function UpdateSQL($tabla, $campos, $condicion) {
        if (!$consulta = Self::consultar("UPDATE $tabla SET $campos WHERE $condicion")) {
            die("Ha ocurrido un error al actualizar los datos");
        }
        return $consulta;
    }

    /********** Funcion limpiar Cadena  **********/
    public static function limpiar_cadena($valor) {
        $valor = trim($valor);
        $valor = stripslashes($valor);
        $valor = str_ireplace("<script>", "", $valor);
        $valor = str_ireplace("</script>", "", $valor);
        $valor = str_ireplace("<script src>", "", $valor);
        $valor = str_ireplace("<script type=>", "", $valor);
        $valor = str_ireplace("SELECT * FROM", "", $valor);
        $valor = str_ireplace("DELETE FROM", "", $valor);
        $valor = str_ireplace("INSERT INTO", "", $valor);
        $valor = str_ireplace("DROP TABLE", "", $valor);
        $valor = str_ireplace("DROP DATABASE", "", $valor);
        $valor = str_ireplace("TRUNCATE TABLE", "", $valor);
        $valor = str_ireplace("SHOW TABLE", "", $valor);
        $valor = str_ireplace("SHOW DATABASES", "", $valor);
        $valor = str_ireplace("<?php>", "", $valor);
        $valor = str_ireplace("?>", "", $valor);
        $valor = str_ireplace("--", "", $valor);
        $valor = str_ireplace("^", "", $valor);
        $valor = str_ireplace("[", "", $valor);
        $valor = str_ireplace("]", "", $valor);
        $valor = str_ireplace("\\", "", $valor);
        $valor = str_ireplace("=", "", $valor);
        $valor = str_ireplace("==", "", $valor);
        $valor = str_ireplace("===", "", $valor);
        $valor = str_ireplace("'", "", $valor);
        $valor = str_ireplace("?", "", $valor);
        $valor = str_ireplace("%", "", $valor);
        $valor = str_ireplace(":", "", $valor);
        $valor = str_ireplace("::", "", $valor);
        $valor = str_ireplace(";", "", $valor);
        $valor = stripslashes($valor);
        $valor = trim($valor);
        return $valor;
    }
    public static function LimpiarCadenaTexto($val) {
        $data = addslashes($val);
        $datos = self::limpiar_cadena($data);
        return $datos;
    }

    /********** Funcion paginar tablas  **********/
    public static function paginador($pagina,$Npaginas,$url,$botones,$idioma){
        if($idioma=="es"){
            $txt_anterior="Anterior";
            $txt_siguiente="Siguiente";
        }else{
            $txt_anterior="Previous";
            $txt_siguiente="Next";
        }

        $tabla='<nav aria-label="..."><ul class="pagination">';
        if ($pagina==1) {
            $tabla.='<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">'.$txt_anterior.'</a></li>';
        }else{
            $tabla.='<li class="page-item"><a class="page-link" href="'.$url.($pagina-1).'/" tabindex="-1">'.$txt_anterior.'</a></li>';
        }

        $ci=0;
        for ($i=$pagina; $i<=$Npaginas; $i++) { 
            if ($pagina==$i) {
                $tabla.='<li class="page-item active" aria-current="page"><a class="page-link" href="'.$url.$i.'">'.$i.'</a></li>';
            } else {
                $tabla.='<li class="page-item " aria-current="page"><a class="page-link" href="'.$url.$i.'">'.$i.'</a></li>';
                
            }
        }
        if ($pagina==$Npaginas) {
            $tabla.='<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">'.$txt_siguiente.'</a></li>';
        }else{
            $tabla.='<li class="page-item"><a class="page-link" href="'.$url.($pagina+1).'/" tabindex="-1">'.$txt_siguiente.'</a></li>';
        }

        $tabla.='</ul></nav>';
        return $tabla;
    }

    /********** Funcion encriptar Cadena  **********/
    public static function encryption($string) {
        $key = SECRET_KEY;
        $result = '';
            for($i=0; $i<strlen($string); $i++) {
                $char = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key))-1, 1);
                $char = chr(ord($char)+ord($keychar));
                $result.=$char;
            }
        return base64_encode($result);
    }
    /********** Funcion desencriptar Cadena  **********/
    public static function decryption($string) {
        $key = SECRET_KEY;
        $result = '';
        $string = base64_decode($string);
        for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key))-1, 1);
            $char = chr(ord($char)-ord($keychar));
            $result.=$char;
        }
        return $result;
    }
    /*---------- Funcion Verificar Datos ----------*/
    public static function verificar_datos($filtro,$cadena){
        if (preg_match("/^".$filtro."$/", $cadena)) {
            return false;
        } else {
            return true;
        }
    }
    // public static function verifyEmail($email){
    //     if(filter_var( $email , FILTER_VALIDATE_EMAIL)){
    //         return $correo = mysqli_real_escape_string( $conexion, $_POST["correo"]);
    //     }else{
    //         return $errors["correo"] = "Tiene que proporcionar un email valido";
    //     } 
    // }

    /*---------- Funcion Verificar Fechas ----------*/
    // public static function verificar_fecha($Fecha){
    //     $valores = explode('/', $fecha);
    //     if (count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])) {
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }

    /*---- funcion para convertir caracteres con acentos o caracteres especiales en mayúsculas  ----*/
    public static function convertir_mayusculas($variable){
        $mayuculas = mb_strtoupper(mb_convert_case($variable, MB_CASE_UPPER, "UTF-8"), "UTF-8");
        return $mayuculas;
    }

    /*----------- funcion para convertir en mayusculas y limpiar cadenas -----------*/
    public static function limpiar_mayusculas($variable){
        $cadena = Self::limpiar_cadena($variable);
        $mayuculas_limpias = Self::convertir_mayusculas($cadena);
        return $mayuculas_limpias;
    }

    /*-------- funcion para limpiar una cadena convertirla en mayusculas y encriptarla -------*/
    public static function limpiar_mayusculas_encriptar($cadena){
        $cadena_limpia = Self::limpiar_cadena($cadena);
        $cadena_mayuscula = Self::convertir_mayusculas($cadena_limpia);
        $cadena_encripted = Self::encryption($cadena_mayuscula);

        return $cadena_encripted;
    }

    /*------------------- funcion para limpiar una cadena y encriptarla ---------------*/
    public static function limpiar_encriptar($cadena){
        $cadena_limpia = Self::limpiar_cadena($cadena);
        $cadena_encripted = Self::encryption($cadena_limpia);
        return $cadena_encripted;
    }
}
