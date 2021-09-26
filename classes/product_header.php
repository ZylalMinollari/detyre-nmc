<?php

//The Product Header contains data for a given Product.
class Product_Header
{
    

    //All the attributes a Product can have
    public $productID;
    public $bag;
    public $bleachingDescription;
    public $brand;
    public $brandCode;
    public $catalog;
    public $composition;
    public $creationDateInDatabase;
    public $drinkHolder;
    public $dryCleaningDescription;
    public $dryingDescription;
    public $EShopDisplayName;
    public $EShopLongDescription;
    public $ergonomicSeat;
    public $fasteningTypeDescription;
    public $fasteningTypeTextile;
    public $flat;
    public $freeDelivery;
    public $gender;
    public $indicatorOfItHasToBeAssembled;
    public $ironingDescription;
    public $lastDateChanged;
    public $lastUserChanged;
    public $productFeatures;
    public $productMissingFeatures;
    public $pulloutType;
    public $pulloutTypeDescription;
    public $punnet;
    public $sapCategoryID;
    public $sapCategoryName;
    public $sapDivisionID;
    public $sapDivisionName;
    public $sapFamilyDescription;
    public $sapFamilyID;
    public $sapFamilyName;
    public $sapMacroCategoryID;
    public $sapMacrocategoryName;
    public $sapName;
    public $sapUniverseID;
    public $sapUniverseName;
    public $showOnLine;
    public $sizeGuide;
    public $userOfCreation;
    public $waistLineDescription;
    public $washability;
    public $washabilityDescription;
    public $zipStopper;


    //The default empty constructor
    function __construct()
    {
    }

    //A "constructor" with most Product Header parameters. Just like with the product, I "defaulted" some of the variables for simplification purposes.
    public static function CreateProductHeader(
        $bag,
        $bleachingDescription,
        $brand,
        $catalog,
        $composition,
        $drinkHolder,
        $dryCleaningDescription,
        $dryingDescription,
        $EShopDisplayName,
        $EShopLongDescription,
        $ergonomicSeat,
        $fasteningTypeDescription,
        $fasteningTypeTextile,
        $flat,
        $freeDelivery,
        $gender,
        $indicatorOfItHasToBeAssembled,
        $ironingDescription,
        $productFeatures,
        $productMissingFeatures,
        $pulloutType,
        $pulloutTypeDescription,
        $punnet,
        $sapCategoryName,
        $sapDivisionName,
        $sapFamilyName,
        $sapMacrocategoryName,
        $sapName,
        $sapUniverseName,
        $sizeGuide,
        $waistLineDescription,
        $washability,
        $washabilityDescription,
        $zipStopper
    ) {
        $product_header = new Product_Header();

        global $brands;
        global $sapCategories;
        global $sapDivisions;
        global $sapFamilies;
        global $sapFamilyDescriptions;
        global $sapMacroCategories;
        global $sapUniverses;

        $product_header->bag = $bag;
        $product_header->bleachingDescription = $bleachingDescription;
        $product_header->brand = $brand;
        $product_header->brandCode = $brands[$brand]; //Get the id from the name
        $product_header->catalog = $catalog;
        $product_header->composition = $composition;
        $product_header->drinkHolder = $drinkHolder;
        $product_header->dryCleaningDescription = $dryCleaningDescription;
        $product_header->dryingDescription = $dryingDescription;
        $product_header->EShopDisplayName = $EShopDisplayName;
        $product_header->EShopLongDescription = $EShopLongDescription;
        $product_header->ergonomicSeat = $ergonomicSeat;
        $product_header->fasteningTypeDescription = $fasteningTypeDescription;
        $product_header->fasteningTypeTextile = $fasteningTypeTextile;
        $product_header->flat = $flat;
        $product_header->freeDelivery = $freeDelivery;
        $product_header->gender = $gender;
        $product_header->indicatorOfItHasToBeAssembled = $indicatorOfItHasToBeAssembled;
        $product_header->ironingDescription = $ironingDescription;
        $product_header->productFeatures = $productFeatures;
        $product_header->productMissingFeatures = $productMissingFeatures;
        $product_header->pulloutType = $pulloutType;
        $product_header->pulloutTypeDescription = $pulloutTypeDescription;
        $product_header->punnet = $punnet;
        $product_header->sapCategoryName = $sapCategoryName;
        $product_header->sapCategoryID = $sapCategories[$sapCategoryName]; //Get the id from the name
        $product_header->sapDivisionName = $sapDivisionName;
        $product_header->sapDivisionID = $sapDivisions[$sapDivisionName];  //Get the id from the name
        $product_header->sapFamilyName = $sapFamilyName;
        $product_header->sapFamilyID = $sapFamilies[$sapFamilyName];       //Get the id from the name
        $product_header->sapFamilyDescription = $sapFamilyDescriptions[$sapFamilyName];   //Get the description from the name
        $product_header->sapMacroCategoryName = $sapMacrocategoryName;
        $product_header->sapMacroCategoryID = $sapMacroCategories[$sapMacrocategoryName]; //Get the id from the name
        $product_header->sapName = $sapName;
        $product_header->sapUniverseName = $sapUniverseName;
        $product_header->sapUniverseID = $sapUniverses[$sapUniverseName];  //Get the id from the name
        $product_header->showOnLine = 0;
        $product_header->sizeGuide = $sizeGuide;
        $product_header->waistLineDescription = $waistLineDescription;
        $product_header->washability = $washability;
        $product_header->washabilityDescription = $washabilityDescription;
        $product_header->zipStopper = $zipStopper;

        return $product_header;
    }

    //Insert a new Product Header for a given Product into the database
    public static function InsertProductHeader($product_header, $product)
    {
        global $database;
        $date = date("y/m/d");
        $query = "INSERT INTO PRODUCT_HEADER VALUES(
            '$product->productID',
            '$product_header->bag',
            '$product_header->bleachingDescription',
            '$product_header->brand',
            '$product_header->brandCode',
            '$product_header->catalog',
            '$product_header->composition',
            '$date',
            '$product_header->drinkHolder',
            '$product_header->dryCleaningDescription',
            '$product_header->dryingDescription',
            '$product_header->EShopDisplayName',
            '$product_header->EShopLongDescription',
            '$product_header->ergonomicSeat',
            '$product_header->fasteningTypeDescription',
            '$product_header->fasteningTypeTextile',
            '$product_header->flat',
            '$product_header->freeDelivery',
            '$product_header->gender',
            '$product_header->indicatorOfItHasToBeAssembled',
            '$product_header->ironingDescription',
            '$date',
            '$database->user',
            '$product_header->productFeatures',
            '$product_header->productMissingFeatures',
            '$product_header->pulloutType',
            '$product_header->pulloutTypeDescription',
            '$product_header->punnet',
            '$product_header->sapCategoryID',
            '$product_header->sapCategoryName',
            '$product_header->sapDivisionID',
            '$product_header->sapDivisionName',
            '$product_header->sapFamilyDescription',
            '$product_header->sapFamilyID',
            '$product_header->sapFamilyName',
            '$product_header->sapMacroCategoryID',
            '$product_header->sapMacroCategoryName',
            '$product_header->sapName',
            '$product_header->sapUniverseID',
            '$product_header->sapUniverseName',
            '$product_header->showOnLine',
            '$product_header->sizeGuide',
            '$database->user',
            '$product_header->waistLineDescription',
            '$product_header->washability',
            '$product_header->washabilityDescription',
            '$product_header->zipStopper')";

        $result = $database->conn->query($query);
        echo "<br>" . mysqli_error($database->conn);
        if ($result) {
            return true;
        }
        return false;
    }

    //This will get (in an array) all product headers stored in the database.
    public static function GetProductHeaders()
    {
        global $database;
        $query = "SELECT * FROM PRODUCT_HEADER";
        $product_header_list = array();

        $result = $database->conn->query($query);
        if ($result) {
            while ($product_header = $result->fetch_object(__CLASS__)) {
                array_push($product_header_list, $product_header);
            }
            return $product_header_list;
        } else {
            return false;
        }
    }

    //This will get (in an array) all product headers for a given product.
    public static function GetProductHeaderForProduct($product)
    {
        global $database;
        $query = "SELECT * FROM PRODUCT_HEADER WHERE PRODUCT_HEADER.productID=$product->productID";
        $product_header_list = array();

        $result = $database->conn->query($query);
        if ($result) {
            while ($product_header = $result->fetch_object(__CLASS__)) {
                array_push($product_header_list, $product_header);
            }
            if (count($product_header_list) == 1) return $product_header_list[0];
        } else {
            return false;
        }
    }

    //This will delete all product headers that belong to a given product.
    public static function DeleteProductHeaderForProduct($product)
    {
        global $database;
        $query = "DELETE FROM PRODUCT_HEADER WHERE PRODUCT_HEADER.productID=$product->productID";

        $result = $database->conn->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
