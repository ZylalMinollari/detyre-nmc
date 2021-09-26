<?php

//This is used to get the data from the "Insert Product" form in the index.php and insert that data in the database.

if (isset($_POST['productID']) && isset($_POST['sapPacket']) && isset($_POST['updateImages']) && isset($_POST['waistLineCode'])) {
    $productID = $_POST['productID'];
    $sapPacket = $_POST['sapPacket'];
    $updateImages = $_POST['updateImages'];
    $waistLineCode = $_POST['waistLineCode'];

    $product = Product::CreateProduct($productID, $sapPacket, $updateImages, $waistLineCode);
    $attempt = Product::InsertProduct($product);
    if ($attempt) {
        $_SESSION['message1'] = "Success";
    } else {
        $_SESSION['message1'] = "Request Failed";
    }
}
