<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ようこそログインしてください</h1>
    <form action="login_action.php" method="post"> 
        <label for="email">email</label>
        <input type="email" name="email">email
        <label for="password">password</label>
        <input type="password" name="password">
        <button type="submit">Sign In</button>
    </form>

    <h1>初めての方はこちら</h1>
    <form action="signUp.php" method="post">  
    <label for="email">email</label>
        <input type="email" name="email">email
        <label for="password">password</label>
        <input type="password" name="password">
        <button type="submit">Sign Up!</button>  
    <p>※パスワードは半角英数字を1文字以上含んだ8文字以上で設定</p>
    </form>

    

</body>
</html>