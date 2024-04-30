<?php
    $name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if(mb_strlen($name) < 5 || mb_strlen($name) > 90) {
        echo "Длина имени не допустима";
        exit();
    }
    if(mb_strlen($email) < 15 || mb_strlen($email) > 90) {
        echo "Длина логина не допустима";
        exit();
    }
    if(mb_strlen($password) < 4 || mb_strlen($password) > 90) {
        echo "Длина пароля не допустима";
        exit();
    }

    $mysql = new mysqli('localhost', 'root', '', 'regist');
    $mysql->query("INSERT INTO `reg` (`login`, `pass`, `name`) 
    VALUES('$email', '$password', '$name')");

    $mysql->close();
?>