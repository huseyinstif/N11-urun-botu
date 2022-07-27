<?php
include 'botFunctions.php';

function getDatas($url) {
    
    $data = getSite($url);

    $productName = searchBot('type": "Product",', '",', $data);
    $productName = str_replace('"name": "', '', $productName[0]);
    $productName = preg_replace('/\s+/', ' ', trim($productName));

    $productPrice = searchBot('lowPrice": "', '",', $data);
    $productPrice = str_replace('', '', $productPrice[0]);
    
    $productImage = searchBot('"image": "', '",', $data);
    $productImage = str_replace('"', '', $productImage[0]);
    
    $productDescription = searchBot('"description": "', ',', $data);
    $productDescription = str_replace('"', '', $productDescription[0]);
    
    $productBrand = searchBot('"brand": "', ',', $data);
    $productBrand = str_replace('"', '', $productBrand[0]);
    
    $productSellerNickName = searchBot('"sellerNickname":', '",', $data);
    $productSellerNickName = str_replace('"', '', $productSellerNickName[0]);
    
    $productSkuStock = searchBot('<input type="hidden" id="skuStock" class="skuStock" value="', '"/>', $data);
    // $productSkuStock = str_replace('', '', $productSkuStock[0]);

    if ($productSkuStock) {
        $productSkuStock = str_replace('', '', $productSkuStock[0]);
    } else {
        $productSkuStock = "Stock Information Not Available";
    }

    return array(
        'productName' => $productName,
        'productPrice' => $productPrice,
        'productImage' => $productImage,
        'productDescription' => $productDescription,
        'productBrand' => $productBrand,
        'productSellerNickName' => $productSellerNickName,
        'productSkuStock' => $productSkuStock
    );
}




?>