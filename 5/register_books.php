<?php

require_once('db_connect.php');

require_once('function.php');

check_user_logged_in();

// 提出ボタンが押された場合
if (isset($_POST["register_stock"]))  {
    // titleとcontentの入力チェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["date"])) {
        echo '日付が未入力です。'; }
    elseif (empty($_POST["stock"])) {
            echo '在庫数が未入力です。';
    }

    if (!empty($_POST["title"]) && !empty($_POST["date"])&& !empty($_POST["stock"])) {
        // 入力したtitleとcontentを変数に格納
        $title = $_POST["title"];
        $date = $_POST["date"];
        $stock = $_POST["stock"];

        // PDOのインスタンスを取得
        $pdo = db_connect();

        try {
            // SQL文の準備
            $sql = 'INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)';
            // プリペアドステートメントの準備
            $stmt = $pdo->prepare($sql);
            // タイトルをバインド
            $stmt->bindValue(':title',$title, PDO::PARAM_STR);
            // 本文をバインド
            $stmt->bindValue(':date',$date);
            $stmt->bindValue(':stock',$stock);
            // 実行
            $stmt->execute();
            // main.phpにリダイレクト
            header("Location: main.php");
        } catch (PDOException $e) {
            // エラーメッセージの出力
            echo 'Error: ' . $e-getMessage();
            // 終了
            die();
        }
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
    <h1>本 登録画面</h1>
    <form method="POST" action="">
        
        <input type="text" placeholder="タイトル" name="title" id="title" style="width:250px;height:40px;"><br><br>        
        <input type="date" onfocus="this.type='date'" onblur="this.type='text'" placeholder="発売日" name="date" id="date" style="width:250px;height:40px;"><br><br>        
        在庫数<br>
        <select name="stock"  style="width:200px;height:40px;">
            <option value="">選択してください</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
        </select>
        <br><br>
        <input type="submit" value="登録" id="register_stock" name="register_stock">
    </form>
</body>
</html>