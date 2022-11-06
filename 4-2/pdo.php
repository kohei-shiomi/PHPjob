<?php
// セッション開始
//session_start();
// DBサーバのURL
define('DB_DATABASE', 'checktest4');
//Mysqlのユーザー名    
// ユーザー名
define('DB_USERNAME', 'root');
// ユーザー名のパスワード
define('DB_PASSWORD', 'root');
// データベース名
define('PDO_DSN', 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);

function connect(){
try {
    $pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    //echo '接続しました';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
} catch (PDOException $e) {
    echo 'Error:' . $e->getMessage();
    die();
}
}