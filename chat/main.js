$(document).ready(function () {
    $('#myForm').on('submit', function (event) {
        event.preventDefault(); // フォームのデフォルトの送信を防止

        // フォームデータを取得
        var formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            message: $('#message').val()
        };

        // AJAXリクエストを送信
        $.ajax({
            type: 'POST',
            url: 'message.php',
            data: formData,
            dataType: 'json',
            encode: true,
            success: function (response) {
                console.log(response);
                // 成功時の処理
                fetchMessages();
            },
            error: function (xhr, status, error) {
                // エラー時の処理
                console.error(error.message);
                alert('メッセージの送信に失敗しました');
            }
        });
    });
});

// メッセージを取得して表示する関数
function fetchMessages() {
    // フォームデータを取得
    var formData = {
        name: $('#name').val(),
        email: $('#email').val(),
        message: $('#message').val(),
    };
    $.ajax({
        type: 'GET',
        url: 'message.php',
        data: formData,
        dataType: 'json',
        success: function (messages) {
            // メッセージを表示する
            var messageList = $('#messageList');
            messageList.empty(); // 既存のメッセージをクリア

            messages.forEach(function (message) {
                var messageItem = $('<li></li>').text(
                    message.name + ' (' + message.email + '): ' + message.message + ' [' + message.created_at + ']'
                );
                messageList.append(messageItem);
            });
        },
        error: function (xhr, status, error) {
            // エラー時の処理
            console.error(xhr.responseText);
            alert('メッセージの取得に失敗しました');
        }
    });
}

// ページロード時にメッセージを取得
fetchMessages();