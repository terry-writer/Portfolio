<?php 
//DBからデータを読み込む

//DBを編集する

//DBを削除する

//Pagenation機能

//トップへ戻る

$dsn = 'mysql:dbname=test_bbs2; host=localhost';
$username= 'root';
$password= 'root';

try{

    $dbh = new PDO($dsn, $username, $password);
    echo "接続成功";
    echo "<br>";
} catch(PDOException $e){
    echo "失敗:" . $e->getMessage() . "\n";
    exit();
}


//SELECT文を変数に格納
$sql = "SELECT * FROM contacts";

//SQLステートメントを実行し、結果を変数に格納
$stmt = $dbh->query($sql);

//foreach文で配列の中身を一行ずつ出力
foreach ($stmt as $row){
    echo "名前：" . $row['submit_name'] . ':' . "発言：" . $row['submit_content'];

    echo '<br>';
}

?>

<a href="index.php">トップへ戻る</a>