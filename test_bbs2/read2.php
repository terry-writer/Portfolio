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



echo "<table>";
    echo "<tr>";
    echo "<th>お名前</th><th>メッセージ</th>\n";
    echo "</th>";
    foreach($stmt as $user){
        echo "<tr>\n";
            echo "<td>" . $user['submit_name'] . "</td>\n";
            echo "<td>" . $user['submit_content'] . "</td>\n";
            echo  "<td>" . "<a href=edit.php?id=" . $user['id'] . ">編集する</a>" . "</td>\n";
            echo  "<td>" . "<a href=delete_confirm.php?id=" . $user['id'] . ">削除する</a>" . "</td>\n";            
        }


echo "</table>";



?>

<a href="index.php">トップへ戻る</a>