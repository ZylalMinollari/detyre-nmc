<?php

//This is used to get the data from the "Insert Product Detail" form in the index.php and insert that data in the database.

if (isset($_POST['productID-detail']) && isset($_POST['cedi']) && isset($_POST['childWeightFrom']) && isset($_POST['childWeightTo']) && isset($_POST['color_code']) && isset($_POST['color_description']) && isset($_POST['countryImages']) && isset($_POST['defaultSku']) && isset($_POST['preferredEan']) && isset($_POST['sapAssortmentLevel']) && isset($_POST['sapPrice']) && isset($_POST['season']) && isset($_POST['showOnLineSku']) && isset($_POST['size_code']) && isset($_POST['size_description']) && isset($_POST['skuID']) && isset($_POST['skuName']) && isset($_POST['stateOfArticle']) && isset($_POST['umSAPPrice']) && isset($_POST['volume']) && isset($_POST['weight'])) {
    $productID = $_POST['productID-detail'];
    $product = Product::GetProductMatchingID($productID);
    $cedi = $_POST['cedi'];
    $childWeightFrom = $_POST['childWeightFrom'];
    $childWeightTo = $_POST['childWeightTo'];
    $color_code = $_POST['color_code'];
    $color_description = $_POST['color_description'];
    $countryImages = $_POST['countryImages'];
    $defaultSku = $_POST['defaultSku'];
    $preferredEan = $_POST['preferredEan'];
    $sapAssortmentLevel = $_POST['sapAssortmentLevel'];
    $sapPrice = $_POST['sapPrice'];
    $season = $_POST['season'];
    $showOnLineSku = $_POST['showOnLineSku'];
    $size_code = $_POST['size_code'];
    $size_description = $_POST['size_description'];
    $skuID = $_POST['skuID'];
    $skuName = $_POST['skuName'];
    $stateOfArticle = $_POST['stateOfArticle'];
    $umSAPPrice = $_POST['umSAPPrice'];
    $volume = $_POST['volume'];
    $weight = $_POST['weight'];

    $product_detail = Product_Detail::CreateProductDetail($cedi, $childWeightFrom, $childWeightTo, $color_code, $color_description, $countryImages, $defaultSku, $preferredEan, $sapAssortmentLevel, $sapPrice, $season, $showOnLineSku, $size_code, $size_description, $skuID, $skuName, $stateOfArticle, $umSAPPrice, $volume, $weight);
    $attempt = Product_Detail::InsertProductDetail($product_detail, $product);

    if ($attempt) {
        $_SESSION['message2'] = "Success";
    } else {
        $_SESSION['message2'] = "Request Failed";
    }
}
