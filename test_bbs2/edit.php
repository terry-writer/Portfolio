<?php

try{

    //DBに接続
    $dsn = 'mysql:dbname=test_bbs2; host=localhost';
    $username= 'root';
    $password= 'root';

    $dbh = new PDO($dsn, $username, $password);


    //準備
    $stmt = $dbh->prepare('SELECT * FROM contacts WHERE id = :id');
    //実行
    $stmt->execute(array(':id' => $_GET["id"]));
    $result = 0;
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "OK";
    echo "<br>";
} catch(PDOException $e){
    echo "失敗:" . $e->getMessage() . "\n";
    exit();
}


?>

<html>
<head>
    <meta charset="utf-8">
    <title>編集</title>

<h2>編集</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php if(!empty($result['id']))  echo(htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8')); ?>">
    <p>
        <label>お名前</label>
        <input type="text" name="update_name" value="<?php if(!empty($result['submit_name']))  echo(htmlspecialchars($result['submit_name'], ENT_QUOTES, 'UTF-8')); ?>">
    </p>
    <p>
        <label>発言</label>
        <input type="text" name="update_content" value="<?php if(!empty($result['submit_content']))  echo(htmlspecialchars($result['submit_content'], ENT_QUOTES, 'UTF-8')); ?>">
    </p>

        <input type="submit" value="編集する">

    </form>

        <a href="index.php">投稿一覧へ</a>


</body>
</html>