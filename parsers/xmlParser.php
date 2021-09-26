<?php

//This parser "reads" data from the xml file specified in index.php. 

if (isset($_POST["xmlFileName"])) {
    $data = simplexml_load_file($_POST["xmlFileName"]);

    $bleachingCode = $data->bleachingCode;
    $defaultLanguage = $data->defaultLanguage;
    $dryCleaningCode = $data->dryCleaningCode;
    $dryingCode = $data->dryingCode;
    $fasteningTypeCode = $data->fasteningTypeCode;
    $ironingCode = $data->ironingCode;
    $productID = intval($data->productID);
    $pulloutTypeCode = $data->pulloutTypeCode;
    $sapPacket = $data->sapPacket;
    $updateImages = $data->updateImages;
    $waistlineCode = $data->waistlineCode;
    $washabilityCode = $data->washabilityCode;

    $product = Product::CreateProductWithFullData($bleachingCode, $defaultLanguage, $dryCleaningCode, $dryingCode, $fasteningTypeCode, $ironingCode, $productID, $pulloutTypeCode, $sapPacket, $updateImages, $waistlineCode, $washabilityCode);

    
    Product::InsertProduct($product);
    

    foreach ($data->definitions->detailsData as $pdetail) {
        $cedi = $pdetail->cedi;
        $childWeightFrom = $pdetail->childWeightFrom;
        $childWeightTo = $pdetail->childWeightTo;
        $color_code = $pdetail->color_code;
        $color_description = $pdetail->color_description;
        $countryImages = $pdetail->countryImages;
        $defaultSku = $pdetail->defaultSku;
        $preferredEan = $pdetail->preferredEan;
        $sapAssortmentLevel = $pdetail->sapAssortmentLevel;
        $sapPrice = $pdetail->sapPrice;
        $season = $pdetail->season;
        $showOnLineSku = $pdetail->showOnLineSku;
        $size_code = $pdetail->size_code;
        $size_description = $pdetail->size_description;
        $skuID = $pdetail->skuID;
        $skuName = $pdetail->skuName;
        $stateOfArticle = $pdetail->stateOfArticle;
        $umSAPPrice = $pdetail->umSAPPrice;
        $volume = $pdetail->volume;
        $weight = $pdetail->weight;

        if($countryImages === 'true') {
            $countryImages = 1;
        }else {
            $countryImages = 0;
        }

        if ($defaultSku === 'true') {
            $defaultSku = 1;
        } else {
            $defaultSku = 0;
        } 
        if ($showOnLineSku === 'true') {
            $showOnLineSku = 1;
        } else {
            $showOnLineSku = 0;
        } 
        if ($stateOfArticle === 'true') {
            $stateOfArticle = 1;
        } else {
            $stateOfArticle = 0;
        }

        $prodDetail = Product_Detail::CreateProductDetail($cedi, $childWeightFrom, $childWeightTo, $color_code, $color_description, $countryImages, $defaultSku, $preferredEan, $sapAssortmentLevel, $sapPrice, $season, $showOnLineSku, $size_code, $size_description, $skuID, $skuName, $stateOfArticle, $umSAPPrice, $volume, $weight);
        Product_Detail::InsertProductDetail($prodDetail, $product);
    }

    foreach ($data->definitions->headerData as $pheader) {
        $bag = $pheader->bag;
        if ($bag === 'true') {
            $bag = 1;
        } else {
            $bag = 0;
        }
        
        $bleachingDescription = $pheader->bleachingDescription;
        $brand = strval($pheader->brand);
        $brandCode = $pheader->brandCode;
        $catalog = $pheader->catalog;
        $composition = $pheader->composition;
        $drinkHolder = $pheader->drinkHolder;
        if ($drinkHolder === 'true') {
            $drinkHolder = 1;
        } else {
            $drinkHolder = 0;
        }
        
        $dryCleaningDescription = $pheader->dryCleaningDescription;
        $dryingDescription = $pheader->dryingDescription;
        $EShopDisplayName = $pheader->EShopDisplayName;
        $EShopLongDescription = $pheader->EShopLongDescription;
        $ergonomicSeat = $pheader->ergonomicSeat;
        if ($ergonomicSeat === 'true') {
            $ergonomicSeat = 1;
        } else {
            $ergonomicSeat = 0;
        }
        $fasteningTypeDescription = $pheader->fasteningTypeDescription;
        $fasteningTypeTextile = $pheader->fasteningTypeTextFile;
        $flat = $pheader->flat;
        if ($flat === 'true') {
            $flat = 1;
        } else {
            $flat = 0;
        }
        $freeDelivery = $pheader->freeDelivery;
        if ($freeDelivery === 'true') {
            $freeDelivery = 1;
        } else {
            $freeDelivery = 0;
        }
        $gender = $pheader->gender;
        $indicatorOfItHasToBeAssembled = $pheader->indicatorOfItHasToBeAssembled;
         if ($indicatorOfItHasToBeAssembled === 'true') {
            $indicatorOfItHasToBeAssembled = 1;
        } else {
            $indicatorOfItHasToBeAssembled = 0;
        }
        $ironingDescription = $pheader->ironingDescription;
        $productFeatures = "";
        foreach ($pheader->productFeatures as $pfeat) {
            $productFeatures = $productFeatures . $pfeat . ";";
        }
        $productMissingFeatures = "";
        foreach ($pheader->productMissingFeatures as $pmissfeat) {
            $productMissingFeatures = $productMissingFeatures . $pmissfeat . ";";
        }
        $pulloutType = $pheader->pulloutType;
        $pulloutTypeDescription = $pheader->pulloutTypeDescription;
        $punnet = $pheader->punnet;
        if ($punnet === 'true') {
            $punnet = 1;
        } else {
            $punnet = 0;
        }
        $sapCategoryID = $pheader->sapCategoryID;
        $sapCategoryName = strval($pheader->sapCategoryName);
        $sapDivisionsID = $pheader->sapDivisionsID;
        $sapDivisionName = strval($pheader->sapDivisionName);
        $sapFamilyDescription = $pheader->sapFamilyDescription;
        $sapFamilyID = $pheader->sapFamilyID;
        $sapFamilyName = strval($pheader->sapFamilyName);
        $sapMacrocategoryName = strval($pheader->sapMacrocategoryName);
        $sapName = $pheader->sapName;
        $sapUniverseID = $pheader->sapUniverseID;
        $sapUniverseName = strval($pheader->sapUniverseName);
        $showOnLine = $pheader->showOnLine;
        $sizeGuide = $pheader->sizeGuide;
        $waistLineDescription = $pheader->waistLineDescription;
        $washability = $pheader->washability;
        $washabilityDescription = $pheader->washabilityDescription;
        $zipStopper = $pheader->zipStopper;
        if ($zipStopper === 'true') {
            $zipStopper = 1;
        } else {
            $zipStopper = 0;
        }

        $prodHeader = Product_Header::CreateProductHeader($bag, $bleachingDescription, $brand, $catalog, $composition, $drinkHolder, $dryCleaningDescription, $dryingDescription, $EShopDisplayName, $EShopLongDescription, $ergonomicSeat, $fasteningTypeDescription, $fasteningTypeTextile, $flat, $freeDelivery, $gender, $indicatorOfItHasToBeAssembled, $ironingDescription, $productFeatures, $productMissingFeatures, $pulloutType, $pulloutTypeDescription, $punnet, $sapCategoryName, $sapDivisionName, $sapFamilyName, $sapMacrocategoryName, $sapName, $sapUniverseName, $sizeGuide, $waistLineDescription, $washability, $washabilityDescription, $zipStopper);
        Product_Header::InsertProductHeader($prodHeader, $product);
    }
}
