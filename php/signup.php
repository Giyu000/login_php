<?php
// DB接続情報
$host = 'sql102.infinityfree.com';
$db = 'if0_39084798_db_users';
$user = 'if0_39084798';
$pass = 'Ul9X8RdOdU4OUO';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("DB接続エラー: " . $e->getMessage());
}

// 入力値を取得
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($name === '' || $email === '' || $password === '') {
    die("全ての項目を入力してください。");
    
    echo '<pre>';
    print_r('$POST'.$_POST);
    echo '</pre>';
}

// エラーログ
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ハッシュ化してDBに登録
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$name, $email, $hashedPassword])) {
    echo "登録成功！ <a href='https://giyuu.great-site.net/?i=1'>ログインへ戻る</a>";
    $errorInfo = $stmt->errorInfo();
    die("登録に失敗しました。エラー: " . $errorInfo[2]);

}
?>