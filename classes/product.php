<?php

//Initiate a connection with the database for a specific user (need to include connection.php which in my case is done in index.php)
$database = new database("localhost", "root", "", "inventory");

//The Product class defines a product.
class Product
{

    //All the attributes a Product can have (Not all of them may be needed)
    public $productID;
    public $bleachingCode;
    public $defaultLanguage;
    public $dryCleaningCode;
    public $dryingCode;
    public $fasteningTypeCode;
    public $ironingCode;
    public $pulloutTypeCode;
    public $sapPacket;
    public $updateImages;
    public $waistLineCode;
    public $washabilityCode;

    // A default empty constructor
    function __construct()
    {
    }

    //A "constructor" (sort of) with most product attributes 
    public static function CreateProduct($productID, $sapPacket, $updateImages, $waistLineCode)
    {
        $product = new Product();

        $product->productID =  intval($productID);
        $product->bleachingCode = 6;
        $product->defaultLanguage = "en_GB";
        $product->dryCleaningCode = 6;
        $product->dryingCode = 20;
        $product->fasteningTypeCode = 9;
        $product->ironingCode = 12;
        $product->pulloutTypeCode = 4;
        $product->sapPacket = $sapPacket;
        $product->updateImages = $updateImages;
        $product->waistLineCode = $waistLineCode;
        $product->washabilityCode = 22;

        return $product;
    }

    //A "constructor" that accepts all product's paramters
    public static function CreateProductWithFullData($bleachingCode, $defaultLanguage, $dryCleaningCode, $dryingCode, $fasteningTypeCode, $ironingCode, $productID, $pulloutTypeCode, $sapPacket, $updateImages, $waistlineCode, $washabilityCode)
    {
        $product = new Product();

        $product->productID = intval($productID);
        $product->bleachingCode = $bleachingCode;
        $product->defaultLanguage = $defaultLanguage;
        $product->dryCleaningCode = $dryCleaningCode;
        $product->dryingCode = $dryingCode;
        $product->fasteningTypeCode = $fasteningTypeCode;
        $product->ironingCode = $ironingCode;
        $product->pulloutTypeCode = $pulloutTypeCode;
        $product->sapPacket = $sapPacket;
        $product->updateImages = $updateImages;
        $product->waistLineCode = $waistlineCode;
        $product->washabilityCode = $washabilityCode;

        return $product;
    }


    //Insert a product object onto the database.
    public static function InsertProduct($product)
    {
        global $database;
        
        $query = "INSERT INTO PRODUCT (productID, bleachingCode, defaultLanguage, 
        dryCleaningCode, dryingCode, fasteningTypeCode, ironingCode,pulloutTypeCode,sapPacket, updateImages,
         waistLineCode, washabilityCode) VALUES(
            $product->productID,
            $product->bleachingCode,
            '$product->defaultLanguage',
            $product->dryCleaningCode,
            $product->dryingCode,
            $product->fasteningTypeCode,
            $product->ironingCode,
            $product->pulloutTypeCode,
            $product->sapPacket,
            $product->updateImages,
            $product->waistLineCode,
            $product->washabilityCode)";
        $result = $database->conn->query($query);
        if ($result) {
            return true;
        }
        return false;
    }



    //Function to update a product
    public static function UpdateProduct($product)
    {
        global $database;

        //I decided to go for the easy way, by using a transaction, I remove the product first (along with the headers and the details it may have)
        //And then re-insert te updated one. Because of the transaction, if one step fails, the whole thing is rolled back, so it is relatively safe.
        try {
            $database->conn->begin_transaction();

            $allPDetails = Product_Detail::GetProductDetailsForProduct($product);
            $pHeader = Product_Header::GetProductHeaderForProduct($product);

            Product_Header::DeleteProductHeaderForProduct($product);
            Product_Detail::DeleteProductDetailForProduct($product);
            Product::DeleteProduct($product);

            Product::InsertProduct($product);

            if (count($allPDetails)) {
                for ($x = 0; $x < count($allPDetails); $x++) {
                    Product_Detail::InsertProductDetail($allPDetails[$x], $product);
                }
            }

            if ($pHeader) Product_Header::InsertProductHeader($pHeader, $product);

            $database->conn->commit();
        } catch (\Throwable $e) {
            $database->conn->rollback();
            return false;
        }

        echo mysqli_error($database->conn);

        return true;
    }

    //Function to delete a product from the database (Note: It also deletes all of the product headers and details of that product!).
    public static function DeleteProduct($product)
    {
        global $database;

        try {
            $database->conn->begin_transaction();

            Product_Header::DeleteProductHeaderForProduct($product);
            Product_Detail::DeleteProductDetailForProduct($product);
            $query = "DELETE FROM PRODUCT WHERE PRODUCT.productID=$product->productID";
            $result = $database->conn->query($query);
            $database->conn->commit();
            if ($result) return true;
        } catch (\Throwable $e) {
            $database->conn->rollback();
            return false;
        }

        echo mysqli_error($database->conn);
        return false;
    }

    //Function to get all products from database in an array.
    public static function GetProducts()
    {
        global $database;
        $query = "SELECT * FROM PRODUCT";
        $products = array();

        $result = $database->conn->query($query);
        if ($result) {
            while ($product = $result->fetch_object(__CLASS__)) {
                array_push($products, $product);
            }
            return $products;
        } else {
            return false;
        }
    }

    //Gets product from the database matching the id supplied.
    public static function GetProductMatchingID($id)
    {
        global $database;
        $query = "SELECT * FROM PRODUCT WHERE PRODUCT.productID=$id";
        $products = array();

        $result = $database->conn->query($query);
        if ($result) {
            while ($product = $result->fetch_object(__CLASS__)) {
                array_push($products, $product);
            }
            if (count($products) == 1) return $products[0];
        } else {
            return false;
        }
    }
}
