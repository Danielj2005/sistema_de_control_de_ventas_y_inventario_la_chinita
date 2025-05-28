<?php

function getPrice() {
    try {
        $url = 'https://magicloops.dev/api/loop/a9be03ee-872f-4b08-9890-040ffc4bd1b4/run?request=get_price';
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        
        return $data;
    } catch (Exception $error) {
        error_log('Error fetching data: ' . $error->getMessage());
        throw $error;
    }
}

// Example usage:
try {   
    $datos['existe'] = 0;

    $data = getPrice();

    $price = floatval($data['usd_price_bs']);
    
    if (!is_float($price)) {
        $datos['usd_price_bs'] = 0.98;
        $datos = json_encode($datos);
        echo $datos;
        exit();
    }else {

        $usd_price_bs = round($price,2);
        $usd_price_bs = floatval($usd_price_bs);
        $datos['existe'] = 1;
        $datos['usd_price_bs'] = $usd_price_bs;
        $datos = json_encode($datos);
        echo $datos;
    }

    
} catch (Exception $error) {
    error_log('Failed to get price: ' . $error->getMessage());
}