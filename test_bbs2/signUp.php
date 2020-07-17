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
?>

<html lang="ja">


<body>
    <h1>ようこそログインしてください</h1>
    <form action="login_confirm.php" method="post"> 
        <label for="email">email</label>
        <input type="email" name="email">email
        <label for="password">password</label>
        <input type="password" name="password">
        <button type="submit">Sign In</button>
    </form>

    <h1>初めての方はこちら</h1>
    <form action="signUp_confirm.php" method="post">  
    <label for="email">email</label>
        <input type="email" name="email">email
        <label for="password">password</label>
        <input type="password" name="password">
        <button type="submit">Sign Up!</button>  
    <p>※パスワードは半角英数字を1文字以上含んだ8文字以上で設定</p>
    </form>

</body>
</html>

<?php
//POSTのValidate
if(!$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    echo '入力された値が不正です。';
    return false;
}

//パスワードの正規表現
if(preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
}else{
    echo 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください';
    return false;
}

//登録処理
try{
    var_dump($password);
    $stmt = $dbh->prepare("insert into login_table(login_email, login_password) value(?, ?)");
    $stmt->execute([$email, $password]);
    echo '登録完了';
} catch(\Exception $e){
    echo '登録済みのメールアドレス';
}

?>