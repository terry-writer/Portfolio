<?php
header("Content-Type: text/html;charset=UTF-8");


try{

    //DBに接続
    $dsn = 'mysql:dbname=test_bbs2; host=localhost; charset=utf8';
    $username= 'root';
    $password= 'root';

    $dbh = new PDO($dsn, $username, $password);


    //SELECT文を変数に格納
    $sql = "SELECT * FROM contacts WHERE id = :id";

    //SQLステートメントを実行し、結果を変数に格納
    $stmt = $dbh->prepare($sql);

    //idをDBからidを取得
    $stmt->execute(array(':id' => $_REQUEST["id"]));
    $result = 0;
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $result['id'];
    var_dump($id);


    echo "OK";
    echo "<br>";
} catch(PDOException $e){
    echo "失敗:" . $e->getMessage() . "\n";
    exit();
}

    echo '<br>';
    echo $result['submit_name'];
    echo '<br>';
    echo $result['submit_content'];
    echo '<br>';
?>
    <h2>本当に削除しますか？</h2>
    <form action="delete.php" method="get">
    <input type="hidden" name="hidden_id" value="<?php echo $id; ?>">
    value="<?php print($result['id']); ?>"
    <input type="submit" value="削除する">
    </form>
    

