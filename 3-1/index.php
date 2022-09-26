<?php
$num = 1;
for($i=1;$i<=100;$i++) {
    if ($i % 3 === 0 && $i % 5 === 0){
        echo 'FizzBuzz!!';
        echo '<br>';
        continue;
    } elseif ($i % 3 === 0){
        echo 'Fizz!';
        echo '<br>';
        continue;
    } elseif ($i % 5 === 0){
        echo 'Buzz!';
        echo '<br>';
        continue;
    } else {
    echo $i;
    echo '<br>';
    }
} 
?>