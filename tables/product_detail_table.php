<?php

//This file generates a table containing all product detail data stored in the database.

echo '<table id="styledtable">';
echo "<tr>";
echo "<th>cedi</th>";
echo "<th>childWeightFrom</th>";
echo "<th>childWeightTo</th>";
echo "<th>color_code</th>";
echo "<th>color_description</th>";
echo "<th>countryImages</th>";
echo "<th>defaultSku</th>";
echo "<th>preferredEan</th>";
echo "<th>sapAssortmentLevel</th>";
echo "<th>sapPrice</th>";
echo "<th>season</th>";
echo "<th>showOnLineSku</th>";
echo "<th>size_code</th>";
echo "<th>size_description</th>";
echo "<th>skuID</th>";
echo "<th>skuName</th>";
echo "<th>stateOfArticle</th>";
echo "<th>umSAPPrice</th>";
echo "<th>volume</th>";
echo "<th>weight</th>";
echo "</tr>";

$product_detail_list = Product_Detail::GetProductDetails();
if ($product_detail_list) {
    for ($x = 0; $x < count($product_detail_list); $x++) {
        echo "<tr>";
        echo "<td>" . $product_detail_list[$x]->cedi . "</td>";
        echo "<td>" . $product_detail_list[$x]->childWeightFrom . "</td>";
        echo "<td>" . $product_detail_list[$x]->childWeightTo . "</td>";
        echo "<td>" . $product_detail_list[$x]->color_code . "</td>";
        echo "<td>" . $product_detail_list[$x]->color_description . "</td>";
        echo "<td>" . $product_detail_list[$x]->countryImages . "</td>";
        echo "<td>" . $product_detail_list[$x]->defaultSku . "</td>";
        echo "<td>" . $product_detail_list[$x]->preferredEan . "</td>";
        echo "<td>" . $product_detail_list[$x]->sapAssortmentLevel . "</td>";
        echo "<td>" . $product_detail_list[$x]->sapPrice . "</td>";
        echo "<td>" . $product_detail_list[$x]->season . "</td>";
        echo "<td>" . $product_detail_list[$x]->showOnLineSku . "</td>";
        echo "<td>" . $product_detail_list[$x]->size_code . "</td>";
        echo "<td>" . $product_detail_list[$x]->size_description . "</td>";
        echo "<td>" . $product_detail_list[$x]->skuID . "</td>";
        echo "<td>" . $product_detail_list[$x]->skuName . "</td>";
        echo "<td>" . $product_detail_list[$x]->stateOfArticle . "</td>";
        echo "<td>" . $product_detail_list[$x]->umSAPPrice . "</td>";
        echo "<td>" . $product_detail_list[$x]->volume . "</td>";
        echo "<td>" . $product_detail_list[$x]->weight . "</td>";
        echo "</tr>";
    }
}
echo "</table>";
