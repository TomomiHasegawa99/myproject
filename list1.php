<?php

// 先ほど作成したPDOインスタンス作成をそのまま使用します
require 'pdo_connect.php';

// SQL文を準備します。
//$sql = 'SELECT * FROM BOOK WHERE id < :id';
$sql = 'SELECT * FROM BOOK ORDER by id';
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

//改行
echo '<br>';
// $result　からTITLEに該当するカラムのみを取り出す
$title = array_column($result, 'TITLE');
// 取り出したカラムの配列を表示
echo 'タイトル　';

foreach($title as $value){
    echo $value;
    echo '｜';
}

//改行
echo '<br>';
// $result　からAUTHERに該当するカラムのみを取り出す
$auther = array_column($result, 'AUTHER');
// 取り出したカラムの配列を表示
echo '作者　';
foreach($auther as $value){
    echo $value;
    echo '｜';
}

//改行
echo '<br>';
// $result　からBUY_DATEに該当するカラムのみを取り出す
$buy_date = array_column($result, 'BUY_DATE');
// 取り出したカラムの配列を表示
echo '購入日　';
foreach($buy_date as $value){
    echo $value;
    echo '｜';
}

//改行
echo '<br>';

// $result　からSYUPANに該当するカラムのみを取り出す
$syupan = array_column($result, 'SYUPAN');
// 取り出したカラムの配列を表示
echo '出版社　';
// 取り出したカラムの配列を表示

foreach($syupan as $value){
    echo $value;
    echo '｜';
}
//改行
echo '<br>';
// $result　からJIKAI_DATEに該当するカラムのみを取り出す
$jikai_date = array_column($result, 'JIKAI_DATE');
// 取り出したカラムの配列を表示
echo '次回発売日　';
foreach($jikai_date as $value){
    echo $value;
    echo '｜';
}
//改行
echo '<br>';
// $result　からBIKOに該当するカラムのみを取り出す
$biko = array_column($result, 'BIKO');
// 取り出したカラムの配列を表示
echo '備考　';
foreach($biko as $value){
    echo $value;
    echo '｜';
}


echo '<br><br>';
echo '<a href="index2.php">登録</a>';

//echo '<input type="button" name="btn_li" onclick="location.href='index2.php'" value="登録">';
echo '<br><br>';
echo '<a href="index.html">戻る</a>';