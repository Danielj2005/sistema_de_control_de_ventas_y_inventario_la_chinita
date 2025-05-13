<?php

function getPrice() {
    try {
        $url = 'https://magicloops.dev/api/loop/a9be03ee-872f-4b08-9890-040ffc4bd1b4/run?request=get_price';
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        var_dump($data);
        return $data;
    } catch (Exception $error) {
        error_log('Error fetching data: ' . $error->getMessage());
        throw $error;
    }
}

// Example usage:
try {
    $data = getPrice();
    $price = $data['usd_price_bs'];
    $usd_price_bs = $price[0] + $price[1] + $price[2] + $price[3] + $price[4];
    echo 'Price: ' . $usd_price_bs . ' bs';
    // Assuming you have a way to set the inner text of an element in PHP
    // This part would typically be handled in the front-end
} catch (Exception $error) {
    error_log('Failed to get price: ' . $error->getMessage());
}
?>

<script>
    // Assuming you have a way to set the inner text of an element in JavaScript
    document.getElementById('priceElement').innerText = '<?= $usd_price_bs ?> bs';
</script>