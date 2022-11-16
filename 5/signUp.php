<?php

require_once('db_connect.php');

$name = $_POST['name'];
$password = $_POST['password'];
$password_hash = password_hash($password,PASSWORD_DEFAULT);


if(isset($_POST['name']) && isset( $_POST['password'])){

$pdo = db_connect();
try {

    $sql  = 'INSERT INTO users(name, password) VALUES(:name, :password)';
    $stmt = $pdo->prepare($sql);
    $password_hash = password_hash($password,PASSWORD_DEFAULT);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password_hash, PDO::PARAM_STR);
    $stmt->execute();
    echo '登録が完了しました。'."<a href="."login.php".">ログインページへ移動</a>";
    }catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        die();
    }
    }
    ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>ユーザー登録画面</h1>
    <form method="POST" action="">
        
        <input type="text" placeholder="ユーザー名" name="name" id="name" style="width:350px;height:40px;"><br><br>
        <input type="password" placeholder="パスワード" name="password" id="password" style="width:350px;height:40px;"><br><br>
        <input type="submit" value="新規登録" id="signUp" name="signUp">
    </form>
</body>
</html>
 