<?php

require_once('db_connect.php');

require_once('function.php');

check_user_logged_in();


$pdo = db_connect();

try {
    $sql = "SELECT * FROM books ;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
}catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die(); 
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>メイン</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>在庫一覧画面</h1>
    <p>ようこそ<?php echo $_SESSION["user_name"]; ?>さん</p>
    <div class=button>
    <div class=register><a href="register_books.php">新規登録</a></div>
    <div class=logout><a href="logout.php">ログアウト</a></div>
    </div>
    <table >
    <tr class=tr_top>
        <td width=250px>タイトル</td>
        <td width=300px>発売日</td>
        <td width=200px>在庫数</td>
        <td width=250px></td>
    </tr>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><a href="delete_books.php?id=<?php echo $row['id']; ?>">削除</a></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>