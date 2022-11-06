<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
require_once 'getData.php';

connect();


try {
    $data = new getData();
    $getpostdata = $data->getPostData();
    $getuserdata = $data->getUserData();
    $fullname = $getuserdata['last_name'] . $getuserdata['first_name'];
    
} catch (PDOException $e) {
    die('取得できませんでした。'. $error->getMessage());
}
?>  

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>記事一覧ページ</title>
</head>
<body>
    <div class="contents">
            <div class="logo">
                <img src="./image/logo.png" alt="カリキュラム_logo">
            </div>
        <div class="user_name">
            <div class="welcome"> ようこそ<?php echo $getuserdata['last_name'] . $getuserdata['first_name']?>さん</div>
        </div>
        <div class="last_login">
        <div class="last_login_date">最終ログイン日 : <?php echo $getuserdata['last_login']?></div>
        </div>
    </div>
        <table align=center>
            <tr id="title" bgcolor=#87ceeb>
                <th>記事ID</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th>
            </tr>
            <?php foreach ($getpostdata as $row):?>
            <tr id="contents" bgcolor=#e0ffff>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php if($row['category_no'] == 1) {
                                echo "食事";
                            } elseif($row['category_no'] == 2) { 
                                echo "旅行";
                            } else {
                                echo "その他";
                            }
                ?></td>
                <td><?php echo $row['comment'];?></td>
                <td><?php echo $row['created'];?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <div class="company_name">Y&I group.inc</div>

    <?php foreach ($getpostdata as $row): 
            echo $row['title']."<br>";
    ?>
    <?php endforeach; ?>
</body>
</html>