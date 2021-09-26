<?php

//This file generates a table containing all product data stored in the database.

echo '<table id="styledtable">';
echo "<tr>";
echo "<th>productID</th>";
echo "<th>bleachingCode</th>";
echo "<th>defaultLanguage</th>";
echo "<th>dryCleaningCode</th>";
echo "<th>dryingCode</th>";
echo "<th>fasteningTypeCode</th>";
echo "<th>ironingCode</th>";
echo "<th>pulloutTypeCode</th>";
echo "<th>sapPacket</th>";
echo "<th>updateImages</th>";
echo "<th>waistLineCode</th>";
echo "<th>washabilityCode</th>";
echo "</tr>";

$products = Product::GetProducts();
if ($products) {
    for ($x = 0; $x < count($products); $x++) {
        echo "<tr>";
        echo "<td>" . $products[$x]->productID . "</td>";
        echo "<td>" . $products[$x]->bleachingCode . "</td>";
        echo "<td>" . $products[$x]->defaultLanguage . "</td>";
        echo "<td>" . $products[$x]->dryCleaningCode . "</td>";
        echo "<td>" . $products[$x]->dryingCode . "</td>";
        echo "<td>" . $products[$x]->fasteningTypeCode . "</td>";
        echo "<td>" . $products[$x]->ironingCode . "</td>";
        echo "<td>" . $products[$x]->pulloutTypeCode . "</td>";
        echo "<td>" . $products[$x]->sapPacket . "</td>";
        echo "<td>" . $products[$x]->updateImages . "</td>";
        echo "<td>" . $products[$x]->waistLineCode . "</td>";
        echo "<td>" . $products[$x]->washabilityCode . "</td>";
        echo "</tr>";
    }
}
echo "</table>";
