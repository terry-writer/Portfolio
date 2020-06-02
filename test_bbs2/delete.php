<?php
header("Content-Type: text/html;charset=UTF-8");

$dsn = 'mysql:dbname=test_bbs2; host=localhost; charset=utf8';
$username= 'root';
$password= 'root';

try{

    $dbh = new PDO($dsn, $username, $password);
    echo "接続成功";
    //変数に格納
    $sql="DELETE FROM contacts WHERE id = :id";
    //準備
    $stmt = $dbh->prepare($sql);

    //配列に格納
    $id = (int) $_REQUEST['hidden_id'];
    
    $params = array(':id' => $id);
    var_dump($_REQUEST['hidden_id']);
    echo $_REQUEST['hidden_id'];
    $stmt->execute($params);

    echo "情報を削除しました。";
} catch(PDOException $e){
    echo "失敗:" . $e->getMessage() . "\n";
    exit();
}

?>

<a href="index.php">TOPへ戻る</a>