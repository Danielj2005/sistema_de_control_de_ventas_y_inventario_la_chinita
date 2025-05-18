<?php

function getPrice() {
    try {
        $url = 'https://magicloops.dev/api/loop/a9be03ee-872f-4b08-9890-040ffc4bd1b4/run?request=get_price';
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        // var_dump($data);
        // echo $data['usd_price_bs']."<br>";
        return $data;
    } catch (Exception $error) {
        error_log('Error fetching data: ' . $error->getMessage());
        throw $error;
    }
}

// Example usage:
try {
    $data = getPrice();
    $price = floatval($data['usd_price_bs']);
    $usd_price_bs = round($price,2);
    $usd_price_bs = floatval($usd_price_bs);
    echo $usd_price_bs;
    // echo "<script type='text/javascript'>
    //         // Assuming you have a way to set the inner text of an element in JavaScript
    //         document.getElementById('tasa_dolar').innerText = '$usd_price_bs';
    //     </script>";
    // Assuming you have a way to set the inner text of an element in PHP
    // This part would typically be handled in the front-end
} catch (Exception $error) {
    error_log('Failed to get price: ' . $error->getMessage());
}