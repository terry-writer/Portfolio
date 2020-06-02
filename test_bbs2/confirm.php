<?php
//エラーの表示
error_reporting(E_ALL);
ini_set('display_errors', '1');

//DBへの接続
$dsn = 'mysql:dbname=test_bbs2; host=localhost';
$username= 'root';
$password= 'root';

try{

    $dbh = new PDO($dsn, $username, $password);
    echo "接続成功";
} catch(PDOException $e){
    echo "失敗:" . $e->getMessage() . "\n";
    exit();
}

//POSTからフォームの内容を受取

//DBへの書き込み（受け取った内容を記述する）

//DBへの保存



//INSERT文を変数に格納
$sql = "INSERT INTO contacts (submit_name, submit_content) VALUES (:name, :content)";

//挿入する値は空のまま、SQL実行の準備をする
$stmt = $dbh->prepare($sql);

// 挿入する値を配列に格納する

$params = array(':name' => $_REQUEST['your_name'], ':content' => $_REQUEST['content']);

//挿入する値が入った変数をexecuteにセットしてSQLを実行
$stmt->execute($params);

//登録完了のメッセージ
echo "登録完了しました";

//トップへ戻る
?>
<br>
<a href="index.php">トップへもどる</a>