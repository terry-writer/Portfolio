<?php

session_start();
$_SESSION['username'] = "yamada";


var_dump($_SESSION['username']);
echo '<br>';
unset($_SESSION['username']);
echo $_SESSION['username'];