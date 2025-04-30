<?php

// require_once __DIR__ . '/modeloPrincipal.php'; // se incluye el modelo principal
// require_once __DIR__ . '/alert_model.php'; // se incluye el modelo principal
// error_reporting(E_PARSE);

class venta_model extends modeloPrincipal {
    
    
    /***************************************************************/ 
    /********************** CRUD de ventas *************************/
    /***************************************************************/ 

    // public static function get_ventas($id_usuario) {
    //     $query = "SELECT * FROM ventas WHERE id_usuario = :id_usuario AND estado = 1";
    //     $stmt = modeloPrincipal::get_conexion()->prepare($query);
    //     $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    
    // public static function agregar_venta($id_usuario, $monto, $descripcion) {
    //     $query = "INSERT INTO ventas (id_usuario, monto, descripcion, estado) VALUES (:id_usuario, :monto, :descripcion, 1)";
    //     $stmt = modeloPrincipal::get_conexion()->prepare($query);
    //     $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    //     $stmt->bindParam(':monto', $monto, PDO::PARAM_STR);
    //     $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    //     return $stmt->execute();
    // }

    
    /**********************************************************************************/
    /***************** funciones para generar el codigo de las ventas *****************/
    /**********************************************************************************/
    /*---------- Funcion para generar el codigo de las ventas ----------*/
    public static function generar_numero($num){
        switch (strlen($num)) {
            case '1':
                $num = '0000000'.$num;
                break;
            case '2':
                $num = '000000'.$num;
                break;
            case '3':
                $num = '00000'.$num;
                break;
            case '4':
                $num = '0000'.$num;
                break;
            case '5':
                $num = '000'.$num;
                break;
            case '6':
                $num = '00'.$num;
                break;
            case '7':
                $num = '0'.$num;
                break;
            case '8':
                $num;
                break;
            default:
                $num;
                break;
        }
        return $num;
    }
    
}