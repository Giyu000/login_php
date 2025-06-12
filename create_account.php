<?php
session_start();
require_once('./create_token.php');
// トークンを生成
$token = generate_token();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録画面</title>
</head>

<body>
    <h1>新規登録</h1>
    <!-- 入力した値をregister.phpに送る -->
    <form action="register.php" method="post">
        <p>name</p>
        <input type="text" name="name" id="name">
        <p>e-mail</p>
        <input type="email" name="email" id="email">
        <p>password</p>
        <input type="password" name=passwordid="password">
        <!-- ここでトークンを hidden フィールドに埋め込む -->
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8'); ?>">

        <button type="submit">新規登録</button>
    </form>
</body>

</html>