<!DOCTYPE html>
<html lang="ja">
  <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <title>IVYチャット</title>
    <link rel="stylesheet" href="css/チャット画面.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.15.3-web/css/all.min.css">
    <script src="js/main.js"></script>
  </head>
  <body>
    <main class="main">
      <div class="chat-system">
        <div class="chat-box">
          <div class="chat-area" id="chat-area">
            <!-- 最初の入力フォーム -->
            <form class="send-box flex-box" action="chat.php#chat-area" method="post">
                <textarea id="textarea" type="text" name="text" rows="1" required placeholder="message.."></textarea>
                <input type="submit" name="submit" value="送信" id="search">
                <label for="search"><i class="far fa-paper-plane"></i></label>
                <input id="web-chat"><label for="web-chat">
                <i class="far fa-paper-plane" style="cursor:pointer;"></i></label>
            </form>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
<?php   
$J_file = "chatlog.json"; // ファイルパス格納
date_default_timezone_set('Asia/Tokyo'); // タイムゾーンを日本にセット
if(isset($_POST['submit']) && $_POST['submit'] === "送信"){ //コメント入れて送信
  $chat = [];
  $chat["person"] = "person1";
  $chat["imgPath"] = "image/nimoicon.png"; //画像ファイル名は任意
  $chat["time"] = date("H:i");
  $chat["text"] = htmlspecialchars($_POST['text'],ENT_QUOTES); /*時間の取得*/

  // 入力値格納処理
  if($file = file_get_contents($J_file)){ // ファイルがある場合 追記処理
    $file = str_replace(array(" ","\n","\r"),"",$file);
    $file = mb_substr($file,0,mb_strlen($file)-2);
    $json = json_encode($chat);
    $json = $file.','.$json.']}';
    file_put_contents($J_file,$json,LOCK_EX);
  }else{ // ファイルがない場合 新規作成処理
    $json = json_encode($chat);
    $json = '{"chatlog":['.$json.']}';
    file_put_contents($J_file,$json,FILE_APPEND | LOCK_EX);
  }

  header('Location:https://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/chat.php');
  header('Location:./chat.php');
  exit;
  }
  if($file = file_get_contents($J_file)){
    $file = json_decode($file);
    $array = $file->chatlog;
    foreach($array as $object){
      if(isset($result)){
        // 第二回目以降
        $result =  $result.'<div class="'.$object->person.'"><p class="chat">'.str_replace("\r\n","<br>",$object->text).'<span class="chat-time">'.$object->time.'</span></p><img src="'.$object->imgPath.'"></div>';
      }else{
        // 第一回目
        $result = '<div class="'.$object->person.'"><p class="chat">'.str_replace("\r\n","<br>",$object->text).'<span class="chat-time">'.$object->time.'</span></p><img src="'.$object->imgPath.'"></div>';
      }
    } 
  }
?>
<!DOCTYPE html>