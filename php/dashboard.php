<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: https://giyuu.great-site.net/?i=1");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Dashboard</title></head>
<body>
    <h1>ようこそ、<?php echo htmlspecialchars($_SESSION['user_name']); ?>さん！</h1>
    <p><a href="logout.php">ログアウト</a></p>
</body>
</html>
