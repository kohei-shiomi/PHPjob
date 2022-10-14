<?php
// セッション開始
session_start();
// DBサーバのURL
//$db['host'] = "localhost";
define('DB_DATABASE', 'localhost');
//Mysqlのユーザー名    
// ユーザー名
//$db['user'] = "root";
define('DB_USERNAME', 'root');
// ユーザー名のパスワード
//$db['pass'] = "";
define('DB_PASSWORD', 'root');
// データベース名
//$db['dbname'] = "loginManagement";
define('PDO_DSN', 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);

try {
    $dbh = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    echo 'DBと接続しました';
    
} catch (PDOException $e) {
    echo 'Error:' . $e->getMessage();
    die();
}