<?php

$fruits = ["150円のりんごが2つ", "50円のみかんが3つ", "300円のももが10個"];

echo $fruits[0];
echo '<br>';
echo $fruits[1];
echo '<br>';
echo $fruits[2];
?>

<br><br>

<?php
function getSubtotal($fruits, $quantity){
    $subtotal = $fruits * $quantity;
    print $subtotal."円";
}
getSubtotal(150,2);
echo'<br>';
getSubtotal(50,3);
echo'<br>';
getSubtotal(300,10);
?>

<br><br>

<?php
$fruits = ["りんごは" => "300円です。", "みかんは" => "150円です。", "ももは" => "3000円です。"];

foreach ($fruits as $key => $value){
    echo $key;
    echo $value;
    echo '<br>';
}
?>






