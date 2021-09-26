<?php

//Initiate a connection with the database for a specific user (need to include connection.php which in my case is done in index.php)
$database = new database("localhost", "root", "", "inventory"); //Initiate a connection with the database for a specific user

//A product detail defines the details of a specific version of a product (different sizes / colors etc of a product). 
class Product_Detail
{

    //All the attributes a Product Detail can have 
    public $productID;
    public $cedi;
    public $childWeightFrom;
    public $childWeightTo;
    public $color_code;
    public $color_description;
    public $countryImages;
    public $defaultSku;
    public $preferredEan;
    public $sapAssortmentLevel;
    public $sapPrice;
    public $season;
    public $showOnLineSku;
    public $size_code;
    public $size_description;
    public $skuID;
    public $skuName;
    public $stateOfArticle;
    public $umSAPPrice;
    public $volume;
    public $weight;


    //Default empty constructor
    function __construct()
    {
    }


    //Another "constructor" with all of the product detail parameters.
    
    public static function CreateProductDetail(
        $cedi,
        $childWeightFrom,
        $childWeightTo,
        $color_code,
        $color_description,
        $countryImages,
        $defaultSku,
        $preferredEan,
        $sapAssortmentLevel,
        $sapPrice,
        $season,
        $showOnLineSku,
        $size_code,
        $size_description,
        $skuID,
        $skuName,
        $stateOfArticle,
        $umSAPPrice,
        $volume,
        $weight
    ) {
        $product_detail = new Product_Detail();

        $product_detail->cedi = $cedi;
        $product_detail->childWeightFrom = $childWeightFrom;
        $product_detail->childWeightTo = $childWeightTo;
        $product_detail->color_code = $color_code;
        $product_detail->color_description = $color_description;
        $product_detail->countryImages = $countryImages;
        $product_detail->defaultSku = $defaultSku;
        $product_detail->preferredEan = $preferredEan;
        $product_detail->sapAssortmentLevel = $sapAssortmentLevel;
        $product_detail->sapPrice = $sapPrice;
        $product_detail->season = $season;
        $product_detail->showOnLineSku = $showOnLineSku;
        $product_detail->size_code = $size_code;
        $product_detail->size_description = $size_description;
        $product_detail->skuID = $skuID;
        $product_detail->skuName = $skuName;
        $product_detail->stateOfArticle = $stateOfArticle;
        $product_detail->umSAPPrice = $umSAPPrice;
        $product_detail->volume = $volume;
        $product_detail->weight = $weight;

        return $product_detail;
    }

    //Insert a new Product Detail for a given Product into the database
    public static function InsertProductDetail($product_detail, $product)
    {
        global $database;
        $query = "INSERT INTO PRODUCT_DETAIL VALUES(
            '$product_detail->cedi',
            '$product_detail->childWeightFrom',
            '$product_detail->childWeightTo',
            '$product_detail->color_code',
            '$product_detail->color_description',
            '$product_detail->countryImages',
            '$product_detail->defaultSku',
            '$product_detail->preferredEan',
            '$product_detail->sapAssortmentLevel',
            '$product_detail->sapPrice',
            '$product_detail->season',
            '$product_detail->showOnLineSku',
            '$product_detail->size_code',
            '$product_detail->size_description',
            '$product_detail->skuID',
            '$product_detail->skuName',
            '$product_detail->stateOfArticle',
            '$product_detail->umSAPPrice',
            '$product_detail->volume',
            '$product_detail->weight',
            '$product->productID')";

        $result = $database->conn->query($query);
        echo mysqli_error($database->conn);
        if ($result) {
            return true;
        }
        return false;
    }


    //This gets (in an array) all product details stored in the database;
    public static function GetProductDetails()
    {
        global $database;
        $query = "SELECT * FROM PRODUCT_DETAIL";
        $product_detail_list = array();

        $result = $database->conn->query($query);
        if ($result) {
            while ($product_detail = $result->fetch_object(__CLASS__)) {
                array_push($product_detail_list, $product_detail);
            }
            return $product_detail_list;
        } else {
            return false;
        }
    }

    //This will get (in an array) all the product details for a given product stored in the database.
    public static function GetProductDetailsForProduct($product)
    {
        global $database;
        $query = "SELECT * FROM PRODUCT_DETAIL WHERE PRODUCT_DETAIL.productID=$product->productID";
        $product_detail_list = array();

        $result = $database->conn->query($query);
        if ($result) {
            while ($product_detail = $result->fetch_object(__CLASS__)) {
                array_push($product_detail_list, $product_detail);
            }
            return $product_detail_list;
        } else {
            return false;
        }
    }

    //This will delete all product details that belong to a product.
    public static function DeleteProductDetailForProduct($product)
    {
        global $database;
        $query = "DELETE FROM PRODUCT_DETAIL WHERE PRODUCT_DETAIL.productID=$product->productID";

        $result = $database->conn->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
