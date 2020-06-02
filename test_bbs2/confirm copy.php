<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

//DBへの接続
$db_hostname    = 'localhost';
$db_username    = 'root';
$db_password    = 'root';
$db_name        = 'test_bbs2';

$link = mysqli_connect( $db_hostname, $db_username, $db_password, $db_name);

if (!$link) {
    exit( 'エラー : mysqli_connect : ' . mysqli_connect_error() );
}else{
    echo '成功しました';
}

echo mysqli_get_host_info( $link );
//ここまで

//DBへの書き込み
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test_bbs2', 'root', 'root');
    foreach((array)$dbh->query('INSERT INTO contacts VALUES (1,'鈴木','suzuki');') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "エラー!: " . $e->getMessage() . "<br/>";
    die();
}
    



//コピー以下
//DBへの接続
$db_hostname    = 'localhost';
$db_username    = 'root';
$db_password    = 'root';
$db_name        = 'test_bbs2';
$link = mysqli_connect( $db_hostname, $db_username, $db_password, $db_name);
if (!$link) {
    exit( 'エラー : mysqli_connect : ' . mysqli_connect_error() );
}else{
    echo '成功しました';
}
echo mysqli_get_host_info( $link );
//ここまで
//DBへの書き込み
    $comment_test = "こんにちは";
    $sql = "INSERT INTO test_bbs2 (	submit_name, submit_content) VALUES ('テストその１', $comment_test)";
    // SQL実行
$stmt = $dbh->prepare($sql);
$stmt->execute();