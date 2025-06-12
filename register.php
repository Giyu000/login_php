<?php
session_start();
$token = $_POST["token"];

// セッション開始
session_start();
// トークン処理
require_once('./submit.php');
// トークンを破棄
unset($_SESSION[$key]); 
// データベース
require_once('./sql.php');

// インスタンス生成
$db = new MySql();

// フォームから受け取る
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// 名前かメールアドレスがすでに存在するか確認
$user = $db->execute("SELECT * FROM users WHERE name = ? OR email = ?", [$name, $email]);

if ($user) {
    echo "すでに登録済みの名前またはメールアドレスです。";
} else {
    // パスワードをハッシュ化
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // 登録処理
    $db->execute("INSERT INTO users (name, email, password) VALUES (?, ?, ?)", [$name, $email, $hashedPassword]);

    echo "ユーザー登録が完了しました。";
}

?>