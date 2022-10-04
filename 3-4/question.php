<link rel="stylesheet" href="style.css">
<?php
//POST送信で送られてきた名前を受け取って変数を作成
$my_name = $_POST['my_name'];

//①画像を参考に問題文の選択肢の配列を作成してください。

//② ①で作成した、配列から正解の選択肢の変数を作成してください
?>


<p>お疲れ様です<!--POST通信で送られてきた名前を出力--><? echo $my_name; ?>さん</p>
<!--フォームの作成 通信はPOST通信で-->
<form action="answer.php" method="post">
<!--取得した名前を送信-->
    <input type="hidden" name="my_name" value="<? echo $my_name; ?>">

    <h2>①ネットワークのポート番号は何番？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php
    $question1 = ["80","22","20","21"];
    foreach ($question1 as $value){ ?>
    <input type="radio" name="answer1" value="<?php echo $value; ?>"> <?php echo $value;
    } ?>
    <input type="hidden" name="correct1" value="80">

    <h2>②Webページを作成するための言語は？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php
    $question2 = ["PHP","Python","JAVA","HTML"];
    foreach ($question2 as $value){ ?>
    <input type="radio" name="answer2" value="<?php echo $value; ?>"> <?php echo $value;
    } ?>
    <input type="hidden" name="correct2" value="HTML">

    <h2>③MySQLで情報を取得するためのコマンドは？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php
    $question3 = ["join","select","insert","update"];
    foreach ($question3 as $value){ ?>
    <input type="radio" name="answer3" value="<?php echo $value; ?>"> <?php echo $value;
    } ?>
    <input type="hidden" name="correct3" value="select">

<!--問題の正解の変数と名前の変数を[answer.php]に送る-->
    <br>
     <input type="submit" value="回答する" />
</form>