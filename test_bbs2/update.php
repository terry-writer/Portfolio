<?php 

$dsn = 'mysql:dbname=test_bbs2; host=localhost';
$username= 'root';
$password= 'root';

try{

    $dbh = new PDO($dsn, $username, $password);
    echo "接続成功";
    //変数に格納
    $sql="UPDATE contacts SET submit_name = :name, submit_content = :message WHERE id = :id";
    //準備
    $stmt = $dbh->prepare($sql);

    //配列に格納
    $params = array(':name' => $_REQUEST['update_name'], ':message' => $_REQUEST['update_content'], ':id' => $_REQUEST['id']);

    $stmt->execute($params);

    echo "情報を更新しました。";
} catch(PDOException $e){
    echo "失敗:" . $e->getMessage() . "\n";
    exit();
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>更新完了</title>
  </head>
  <body>          
  <p>
      <a href="index.php">投稿一覧へ</a>
  </p> 
  </body>
</html>