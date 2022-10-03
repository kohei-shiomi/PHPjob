<?php
$lucky = $_GET['lucky'];
$picked_number = substr(str_shuffle($lucky),0,1);
?>

<p>
<?php 
echo date("Y/m/d/", time()); 
?>の運勢は
</p>



<p>選ばれた数字は<?php echo $picked_number; ?></p> 

<?php
if(in_array(9, (array)$picked_number)){
    echo "大吉"; 
} elseif  (in_array(8, (array)$picked_number)||in_array(7, (array)$picked_number)) {
    echo "吉";
} elseif  (in_array(6, (array)$picked_number)||in_array(5, (array)$picked_number)||in_array(4, (array)$picked_number)) {
    echo "中吉";
} elseif  (in_array(3, (array)$picked_number)||in_array(2, (array)$picked_number)||in_array(1, (array)$picked_number)) {
    echo "小吉";
} else {
    echo "凶";
}
?>
