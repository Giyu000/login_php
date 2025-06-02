<?php
session_start();

// DB接続情報（必要に応じて修正）
$host = 'sql102.infinityfree.com';
$db = 'if0_39084798_db_users';
$user = 'if0_39084798';
$pass = 'Ul9X8RdOdU4OUO';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("DB接続エラー: " . $e->getMessage());
}

// 入力値取得＆サニタイズ
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// ユーザー情報をDBから取得
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    // ログイン成功
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    header("Location: dashboard.php"); // ダッシュボードなどに遷移
    exit;
} else {
    // ログイン失敗
    echo "メールアドレスまたはパスワードが間違っています。";
}
?>
