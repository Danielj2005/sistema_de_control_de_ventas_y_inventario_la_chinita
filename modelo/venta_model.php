<?php

class venta_model extends modeloPrincipal {
    
    
    /***************************************************************/ 
    /********************** CRUD de ventas *************************/
    /***************************************************************/ 

    
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