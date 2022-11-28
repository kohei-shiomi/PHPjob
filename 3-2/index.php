<?php

$fruits = ["りんご" => 150, "みかん" => 30, "もも" => 500];
$quantity = [2, 5 ,6];
//
function getSubtotal($price, $quantity){
$subtotal = $price * $quantity;
return $subtotal;
echo $subtotal;
}
//
$i = 0;
foreach ($fruits as $key => $value) {
$subtotal = getSubtotal($value, $quantity[$i]);
print $key .'は'. $subtotal.'円です。'  .'<br />';
++$i;
}
?>

