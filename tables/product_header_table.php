<?php

//This file generates a table containing all product header data stored in the database.


echo '<table id="styledtable">';
echo "<tr>";
echo "<th>productID</th>";
echo "<th>catalog</th>";
echo "<th>EShopDisplayName</th>";
echo "<th>EShopLongDescription</th>";
echo "<th>Gender</th>";
echo "</tr>";

$productHeaders = Product_Header::GetProductHeaders();
if ($productHeaders) {
    for ($x = 0; $x < count($productHeaders); $x++) {
        echo "<tr>";
        echo "<td>" . $productHeaders[$x]->productID . "</td>";
        echo "<td>" . $productHeaders[$x]->catalog . "</td>";
        echo "<td>" . $productHeaders[$x]->EShopDisplayName . "</td>";
        echo "<td>" . $productHeaders[$x]->EShopLongDescription . "</td>";
        echo "<td>" . $productHeaders[$x]->gender . "</td>";
        echo "</tr>";
    }
}
echo "</table>";
