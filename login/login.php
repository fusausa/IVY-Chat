<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>IVY CHAT ログイン</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+JP:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <header>
    <img src="../image/logo.png" alt="Logo" class="logo">
    </header>
    <main>
        <form id="loginForm" method="post" action="loginmatch.php"> <!-- PHPファイルへのアクションを指定 -->
            <div class="form-group">
                <label for="id">学 籍 番 号　</label>
                <input type="text" id="id" name="id" required autofocus placeholder="  2 3 9 0 0 4">
            </div>
            <div class="form-group">
                <label for="pw">パスワード　</label>
                <input type="password" id="pw" name="pw" required autofocus placeholder="  a b c d">
            </div>
            <input type="submit" class="gradient1" value="ログイン">
        </form>
    </main>
    </body>
</html>