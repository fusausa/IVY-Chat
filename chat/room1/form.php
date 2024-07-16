<?php
session_start();
if(isset($_SESSION['login'])==false){
    print'ログインされていません。<br/>';
    print'<a href="../../login/login.php">ログイン画面へ</a>';
    exit();
}

// エラーレポートをオンにする
error_reporting(E_ALL);
ini_set('display_errors', 1);

// データベース接続情報
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// データベース接続の作成
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続チェック
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>校内イベント</title>
    <link rel="stylesheet" type="text/css" href="../styleform.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+JP:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="../../image/logo.png" alt="Logo" class="logo">
    </header>

    <h2 id="h2_1">校内イベントルーム</h2>
    <div class = "messageList">
        <ul id="messageList">
            <!-- jQueryの読み込み -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <!-- 自作のJavaScript -->
            <script src="main.js"></script>
        </ul>
    </div>
    <form id="myForm">
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required>
        <label for="message">メッセージ:</label>
        <textarea id="message" name="message" required></textarea>
        <button id="send1" type="submit">送信</button>
    </form>
    <div class="BackButton">
        <a href="../../menu/menu.php">戻る</a>
    </div>
</body>

</html>