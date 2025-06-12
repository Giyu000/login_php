<?php
// 送信されてきたトークンとセッション内のトークンを比較検証する関数
function validate_token($request_token)
{
    if (!isset($_SESSION['csrf_token']) || !isset($request_token)) {
        return false; // トークンが存在しない
    }
    // タイミング攻撃対策として hash_equals を使うのが推奨
    return hash_equals($_SESSION['csrf_token'], $request_token);
}

// POSTリクエストかどうかを確認 (必須ではないが、状態変更はPOSTが基本)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('不正なリクエストです。');
}

// 送信されたトークンを取得
$submitted_token = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '';

// トークンを検証
if (!validate_token($submitted_token)) {
    // トークンが無効なら処理を中断
    die('CSRFトークンが無効です。フォームを再読み込みしてもう一度お試しください。');
}

function delete_token($request_token): bool
{
    // 処理が完了したら、セッションのトークンを削除
    unset($_SESSION['csrf_token']); 
    // または再生成: $_SESSION['csrf_token'] = generate_token();
}

delete_token($submitted_token);
?>