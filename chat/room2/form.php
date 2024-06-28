<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>room2</title>
    <link rel="stylesheet" type="text/css" href="styleform.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+JP:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="../../image/logo.png" alt="Logo" class="logo">
    </header>

    <h2>校外イベントルーム</h2>
    <ul id="messageList">
        <!-- jQueryの読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <!-- 自作のJavaScript -->
        <script src="main.js"></script>
    </ul>
    
    <form id="myForm">
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="message">メッセージ:</label>
        <textarea id="message" name="message" required></textarea>
        <br>
        <button id="send" type="submit">送信</button>
    </form>
</body>

</html>