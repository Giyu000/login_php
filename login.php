<?php
session_start();
$token=$_POST["token"];

// トークン処理
require_once('./submit.php');
// トークンを破棄
unset($_SESSION[$key]); 
// データベース
require_once('./sql.php');


// インスタンス生成
$db = new MySql();

// フォームから受け取る
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

try {
    // 入力チェック（未入力の場合はエラーにする）
    if (empty($email) || empty($password)) {
        throw new Exception("メールアドレスまたはパスワードが未入力です。");
    }

    // 入力されたメールアドレスに一致するユーザーをデータベースから取得する
    $user = $db->fetch("SELECT * FROM users WHERE email = ?", [$email]);

    // ユーザーが見つからない、またはパスワードが一致しない場合
    if (!$user || !password_verify($password, $user['password'])) {
        throw new Exception("メールアドレスまたはパスワードが間違っています。");
    }

    // 認証成功 → セッションにユーザーIDを保存（ログイン状態にする）
    $_SESSION['user_id'] = $user['id'];

    // ログイン成功したので、専用ページにリダイレクト
    header('Location: top.php');
    exit;

} catch (Exception $e) {
    // エラーが発生したら、エラーメッセージを表示
    echo '<p style="color:red;">' . htmlspecialchars($e->getMessage()) . '</p>';
}

?>