<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>IVY CHAT メニュー</title>
    <link rel="stylesheet" type="text/css" href="menu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+JP:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <header>
    <img src="../image/logo.png" alt="Logo" class="logo">
    <button class="logout" onclick="logout()">ログアウト</button>
    </header>

    <div class="Room">
        <div class="Room1_2">
            <div class="Room1"><a href="../chat/room1/form.php">校内イベント<br>Room</a></div>
            <div class="Room2"><a href="../chat/room2/form.php">校外イベント<br>Room</a></div>
        </div>
        <div class="Room3_4">
            <div class="Room3"><a href="../chat/room3/form.php">就活<br>Room</a></div>
            <div class="Room4"><a href="../chat/room4/form.php">みんなの<br>Room</a></div>
        </div>
        </div>
    </body>
    <footer>
    <script>
        function logout() {
            window.location.href = 'logout_message.php';
        }
    </script>
    </footer>
</html>