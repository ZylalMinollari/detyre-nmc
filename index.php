<?php
session_start();

include "database/connection.php";

include "classes/globals.php";

include "classes/product.php";
include "classes/product_detail.php";
include "classes/product_header.php";

include "parsers/productFormParser.php";
include "parsers/productDetailFormParser.php";
include "parsers/xmlParser.php";

?>

<html>

<head>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body style="background-color: #FFA07A;">

    <p class="bigText" style="margin: 0px 0px 100px 0px; text-align: left; font-size: 28px;"> This page is for demonstration.</p>

    <!-- XML Loader Form -->
    <div class="form">
        <form action="" method="post">
            <p class="text">XML File Name: <input type="text" name="xmlFileName"><br><br></p>
            <button class="formButton" type="submit">Load XML Data</button>
        </form>
    </div>

    <p class="bigText"> Product Section </p>
    <br>

    <div class="form">
        <form action="" method="post">
            <p class="text">Product ID: <input type="text" name="productID"><br><br></p>
            <p class="text">Sap Packet: <input type="text" name="sapPacket"><br><br></p>
            <p class="text">Update Images: <input type="text" name="updateImages"><br><br></p>
            <p class="text">Waist Line Code: <input type="text" name="waistLineCode"><br></p>
            <button class="formButton" type="submit">Insert Product</button>
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
    <?php include "tables/product_table.php" ?>
    <br>
    <hr>


    <!-- Here starts the Product_Data Section -->

    <p class="bigText" style="margin:50px 0 0 0;"> Product Data Section </p>
    <br>

    <div class="form">
        <form action="" method="post">
            <p class="text">Product:
                <select name="productID-detail" id="products" style="height:35px;">
                    <?php
                    $products = Product::GetProducts();
                    for ($x = 0; $x < count($products); $x++) {
                        //$productHeader = Product_Header::GetProductHeaderForProduct($products[$x]);
                        //if (!$productHeader) continue;
                        echo "<option value=" . ' " ' . $products[$x]->productID . ' " ' . ">" . $products[$x]->productID . "</option>";
                    }
                    ?>
                </select>
                <br><br>
            </p>
            <p class="text">cedi: <input type="text" name="cedi"><br><br></p>
            <p class="text">childWeightFrom: <input type="text" name="childWeightFrom"><br><br></p>
            <p class="text">childWeightTo: <input type="text" name="childWeightTo"><br></p>
            <p class="text">color_code: <input type="text" name="color_code"><br><br></p>
            <p class="text">color_description: <input type="text" name="color_description"><br></p>
            <p class="text">countryImages: <input type="text" name="countryImages"><br><br></p>
            <p class="text">defaultSku: <input type="text" name="defaultSku"><br></p>
            <p class="text">preferredEan: <input type="text" name="preferredEan"><br></p>
            <p class="text">sapAssortmentLevel: <input type="text" name="sapAssortmentLevel"><br></p>
            <p class="text">sapPrice: <input type="text" name="sapPrice"><br></p>
            <p class="text">season: <input type="text" name="season"><br></p>
            <p class="text">showOnLineSku: <input type="text" name="showOnLineSku"><br></p>
            <p class="text">size_code: <input type="text" name="size_code"><br></p>
            <p class="text">size_description: <input type="text" name="size_description"><br></p>
            <p class="text">skuID: <input type="text" name="skuID"><br></p>
            <p class="text">skuName: <input type="text" name="skuName"><br></p>
            <p class="text">stateOfArticle: <input type="text" name="stateOfArticle"><br></p>
            <p class="text">umSAPPrice: <input type="text" name="umSAPPrice"><br></p>
            <p class="text">volume: <input type="text" name="volume"><br></p>
            <p class="text">weight: <input type="text" name="weight"><br></p>

            <button class="formButton" type="submit">Insert Product Detail</button>
        </form>
    </div>

    <p class="message">
        <?php
        if (isset($_SESSION['message2'])) {
            echo $_SESSION['message2'];
        }
        ?>
    </p>

    <!-- Render Table -->
    <p class="mediumText"> Product Detail Contents: </p>
    <?php include "tables/product_detail_table.php" ?>
    <br>
    <hr>


    <!-- Here starts the Product_Header Section -->

    <p class="bigText" style="margin:50px 0 0 0;"> Product Header Section </p>
    <br>

    <!-- Render Table -->
    <p class="mediumText"> Product Header Contents: </p>
    <?php include "tables/product_header_table.php" ?>
    <br>
    <hr>

    <p class="bigText" style="margin:50px 0 0 0;"> Sample Product View </p>
    <br><br>

    <p class="mediumText"> Product: <?php $prdcts = Product::GetProducts();
                                    $phdr = Product_Header::GetProductHeaderForProduct($prdcts[0]);
                                    echo $phdr->EShopDisplayName ?></p>

    <p class="mediumText"> Description: <?php echo $phdr->EShopLongDescription ?></p>

    <p class="mediumText"> Variants: </p>
    <?php
    $pdtl = Product_Detail::GetProductDetailsForProduct($prdcts[0]);
    echo "<ul>";
    for ($x = 0; $x < count($pdtl); $x++) {
        echo '<li class="text">' . $pdtl[$x]->skuName . "</li>";
    }
    echo "</ul>";
    ?>

</body>

</html>