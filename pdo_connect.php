<?php

// ドライバ呼び出しを使用して MySQL データベースに接続します
 $dsn = 'mysql:dbname=bktest01;host=websys;charset=utf8;port=3306';

$user = 'test01';
$password = 'test01';


try {
    $dbh = new PDO($dsn, $user, $password);
    echo "接続成功\n";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

// 処理
