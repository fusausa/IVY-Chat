<?php

try{
    $user_id = $_POST['id'];
    $user_pass = $_POST['pw'];

    //$user_id = htmlspecialchars($user_id,ENT_QUOTES,'UTF-8');
    //$user_pass = htmlspecialchars($user_id,ENT_QUOTES,'UTF-8');

    //$user_pass =md5($user_pass);暗号化するやつ

    $dsn = 'mysql:dbname=testdb;host=172.16.3.132;charset=utf8';
    $db_username = "sample_user";
    $db_password = "";

    $dbh = new PDO($dsn, $db_username, $db_password);
    //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);エラー処理

    $sql= "SELECT * FROM manager WHERE loginid = ? AND password = ?";
    $stmt = $dbh->prepare($sql);
    $data[]= $user_id;
    $data[]= $user_pass;
    $stmt->execute($data);

    $dbh = null;

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if($rec == false){
        echo('IDまたはパスワードが間違っています。<br/>');
        //header("Location: login.php");
    }else{
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['db_username'] = $db_username;
        $_SESSION['db_password'] = $db_password;
        header("Location: ../menu/menu.php");
        exit();
    }
}

catch(Exception $e){
    print('ただいまアクセスが集中しております。時間をおいて再度アクセスしてください。');
    echo $e->getMessage();
    exit();
}

?>