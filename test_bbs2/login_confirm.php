<?php

$login_email = $_POST['email'];
$login_password = $_POST['password'];


//DBに接続
    $dsn = 'mysql:dbname=test_bbs2; host=localhost';
    $username= 'root';
    $password= 'root';


try {
    $dbh = new PDO($dsn, $username, $password);
    echo '接続しました';
} catch (PDOException $e) {
    $msg = $e->getMessage();
}
    $sql = "SELECT * FROM login_table WHERE email = :email";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $login_email);
    $stmt->execute();
    $member = $stmt->fetch();

echo $login_password;
echo '<br>';
echo $member['password'];


    //指定したハッシュがパスワードにマッチしているかチェック
    #password_verify(DBに登録されてるパスワード, フォームに入力されたパスワード)

    if (password_verify($login_password, $member['password'])) {
        echo 'ログインしました。';
        header( "Location: index.php" ) ;
        exit ;
    
    } else {
        echo 'メールアドレスもしくはパスワードが間違っています。';
    }