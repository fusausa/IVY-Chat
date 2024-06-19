<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
  <title>IVYチャット</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/fontawesome-free-5.15.3-web/css/all.min.css">
  <script src="js/main.js"></script>
</head>
<body>
  <main class="main">
    <div class="chat-system">
      <form class="send-box flex-box" action="chat.php#chat-area" method="post">
        <textarea id="textarea" type="text" name="text" rows="1" required placeholder="message.."></textarea>
        <input type="submit" name="submit" value="送信" id="search">
        <label for="search"><i class="far fa-paper-plane"></i></label>
        
      </form>
    </div>
  </main>
</body>
</html>