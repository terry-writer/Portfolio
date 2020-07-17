<?php
try{

    //DBに接続
    $dsn = 'mysql:dbname=test_bbs2; host=localhost';
    $username= 'root';
    $password= 'root';
    
    $dbh = new PDO($dsn, $username, $password);
    
    echo "OK";
    echo "<br>";
    } catch(PDOException $e){
    echo "失敗:" . $e->getMessage() . "\n";
    exit();
    }
    

//フォームに入力されたmailとpassがすでに登録されていないかチェック

$email = $_POST['email'];
$sql = "SELECT * FROM login_table WHERE email = :email";
$stmt = $dbh->prepare($sql);
$email_result = $stmt->bindValue(':email', $email);
$stmt->execute();
$member = $stmt->fetch();



//パスワードの正規表現
if(preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
    $login_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
}else{
    echo 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください';
    return false;
}

if ($member['email'] == $email) {
    $msg = '同じメールアドレスが存在します。';
    echo $msg;
    echo '<a href="signUp.php">戻る</a>';
} else {
    //登録されていなければinsert 
    echo '存在しないため、メールアドレスを登録しました';

    $sql = "INSERT INTO login_table(email, password) VALUES (:email, :password)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $login_password);
    $stmt->execute();
    echo '<a href="signUp.php">戻る</a>';
}

//---ここまで
