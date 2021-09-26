<?php

//This page is used to update a specific product. To "select" the product that needs to be changed, supply the id of that product on the url.
// Like-> https://localhost/updaters/product_update.php?id=#Insert Product Id Here#

session_start();

include "../database/connection.php";
include "../classes/globals.php";
include "../classes/product.php";
include "../classes/product_detail.php";
include "../classes/product_header.php";


$prodID = $_GET["id"];
$product = Product::GetProductMatchingID($prodID);

if ($product) {
    if (isset($_POST['productID']) && isset($_POST['sapPacket']) && isset($_POST['updateImages']) && isset($_POST['waistLineCode'])) {
        $productID = $_POST['productID'];
        $sapPacket = $_POST['sapPacket'];
        $updateImages = $_POST['updateImages'];
        $waistLineCode = $_POST['waistLineCode'];

        $product = Product::CreateProduct($productID, $sapPacket, $updateImages, $waistLineCode);
        $attempt = Product::UpdateProduct($product);

        if ($attempt) {
            $_SESSION['message1'] = "Success";
        } else {
            $_SESSION['message1'] = "Request Failed";
        }
    }
    if (isset($_POST['deleter'])) {
        Product::DeleteProduct($product);
        echo "done";
    }
} else {
    $_SESSION['message_up_pr'] = "Couldn't find product";
}

?>


<html>

<head>
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body style="background-color: #EFEFEF;">

    <p class="bigText" style="margin: 0px 0px 100px 0px; text-align: left; font-size: 28px;"> This page is for demonstration purposes. It is not supposed to have actual functionality </p>

    <p class="bigText"> Update Product: </p>
    <br>

    <div class="form">
        <form action="" method="post">
            <p class="text">Product ID: <input type="text" value=<?php echo '"' . $product->productID . '"' ?> name="productID" readonly><br><br></p>
            <p class="text">Sap Packet: <input type="text" value=<?php echo '"' . $product->sapPacket . '"' ?> name="sapPacket"><br><br></p>
            <p class="text">Update Images: <input type="text" value=<?php echo '"' . $product->updateImages . '"' ?> name="updateImages"><br><br></p>
            <p class="text">Waist Line Code: <input type="text" value=<?php echo '"' . $product->waistLineCode . '"' ?> name="waistLineCode"><br></p>
            <button class="formButton" type="submit">Update Product</button>
        </form>
        <form action="" method="post">
            <input hidden type="text" name="deleter" value="DELETE">
            <button class="formButton" type="submit">Delete Product</button>
        </form>
    </div>

    <!-- Display Message From Server -->
    <p class="message">
        <?php
        if (isset($_SESSION['message1'])) {
            echo $_SESSION['message1'];
        }
        ?>
    </p>
    <br>

    <p class="mediumText"> Products: </p>
    <!-- Render Table -->
    <?php include "../tables/product_table.php" ?>
    <br>
    <hr>



</body>

</html>