<?php

// 先ほど作成したPDOインスタンス作成をそのまま使用します
require 'pdo_connect.php';

// SQL文を準備します。「:id」がプレースホルダーです。
//$sql = 'SELECT * FROM BOOK WHERE id < :id';
$sql = 'SELECT * FROM FOOD ORDER by id';
// PDOStatementクラスのインスタンスを生成します。
$prepare = $dbh->prepare($sql);

// PDO::PARAM_INTは、SQL INTEGER データ型を表します。
// SQL文の「:id」を「3」に置き換えます。つまりはidが3より小さいレコードを取得します。
//$prepare->bindValue(':id', 3, PDO::PARAM_INT);

// プリペアドステートメントを実行する
$prepare->execute();

// PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

// 結果を出力
//var_dump($result);
//改行
echo '<br>';
// $result　からNAMEに該当するカラムのみを取り出す
$name = array_column($result, 'NAME');
// 取り出したカラムの配列を表示
echo '買ったもの　';
print_r($name);
//改行
echo '<br>';

// $result　からBUY_DATEに該当するカラムのみを取り出す
$buy_date = array_column($result, 'BUY_DATE');
// 取り出したカラムの配列を表示
echo '購入日　';
print_r($buy_date);

//改行
echo '<br>';

// $result　からKIGENに該当するカラムのみを取り出す
$kigen = array_column($result, 'KIGEN');
// 取り出したカラムの配列を表示
echo '期限　';
print_r($kigen);
//改行
echo '<br>';
// $result　からPRICEに該当するカラムのみを取り出す
$price = array_column($result, 'PRICE');
// 取り出したカラムの配列を表示
echo '価格　';
print_r($price);

//改行
echo '<br>';
// $result　からPRICEに該当するカラムのみを取り出す
$number = array_column($result, 'NUMBER');
// 取り出したカラムの配列を表示
echo '個数　';
print_r($number);
//改行
echo '<br>';
// $result　からBIKOに該当するカラムのみを取り出す
$biko = array_column($result, 'BIKO');
// 取り出したカラムの配列を表示
echo '備考　';
print_r($biko);

echo '<br><br>';
echo '<a href="index3.php">登録</a>';

echo '<br><br>';
echo '<a href="index.html">戻る</a>';