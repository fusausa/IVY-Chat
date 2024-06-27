<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォーム送信</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.15.3-web/css/all.min.css">
</head>

<body>
    <h2>Message</h2>
    <ul id="messageList"></ul>

    <!-- jQueryの読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- 自作のJavaScript -->
    <script src="main.js"></script>

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