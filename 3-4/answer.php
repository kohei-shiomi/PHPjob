<link rel="stylesheet" href="style.css">
<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成

//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
$my_name = $_POST['my_name'];
?>
<p><!--POST通信で送られてきた名前を表示--><?php echo $my_name; ?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php
$answer1 = $_POST['answer1'];
$correct1 = $_POST['correct1'];

if ($answer1 == $correct1){
    echo "正解！";
} else {
    echo "残念・・・";
}
?>

<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php
$answer2 = $_POST['answer2'];
$correct2 = $_POST['correct2'];

if ($answer2 == $correct2){
    echo "正解！";
} else {
    echo "残念・・・";
}
?>

<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php
$answer3 = $_POST['answer3'];
$correct3 = $_POST['correct3'];

if ($answer3 == $correct3){
    echo "正解！";
} else {
    echo "残念・・・";
}
?>

