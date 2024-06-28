<?php
// データベース接続情報
$servername = "172.16.3.132";
$username = "sample_user";
$password = "";
$dbname = "testdb";

// データベース接続を作成
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続をチェック
if ($conn->connect_error) {
    die("接続に失敗しました: " . $conn->connect_error);
}

// テーブルが存在しない場合は作成
$tableCreationQuery = "
CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($tableCreationQuery) === FALSE) {
    $response = array('status' => 'error', 'message' => 'テーブルの作成に失敗しました: ' . $conn->error);
    echo json_encode($response);
    exit;
}

// リクエストメソッドをチェック
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    // POSTデータを取得
    $name = $_POST['name'];
    $message = $_POST['message'];

    // 簡単なバリデーション
    if (empty($name) || empty($message)) {
        $response = array('status' => 'error', 'message' => '全てのフィールドを入力してください');
        echo json_encode($response);
        exit;
    }

    // SQL文を準備
    $stmt = $conn->prepare("INSERT INTO messages (name, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $message);

    // データを挿入
    if ($stmt->execute()) {
        $response = array('status' => 'success', 'message' => 'メッセージが正常に送信され、データベースに保存されました');
    } else {
        $response = array('status' => 'error', 'message' => 'データベースへの保存に失敗しました: ' . $stmt->error);
    }

    // ステートメントを閉じる
    $stmt->close();
    echo json_encode($response);

} else if ($method == 'GET') {
    // データを取得して返す
    $result = $conn->query("SELECT id, name, message, created_at FROM messages ORDER BY created_at ASC");
    
    $messages = array();
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    echo json_encode($messages);
}

// 接続を閉じる
$conn->close();
?>