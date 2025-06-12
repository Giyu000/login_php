<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// トークンを生成する関数 
function generate_token($key='csrf_token') {
    $_SESSION[$key] = bin2hex(random_bytes(32)); // 常に再生成
    $_SESSION[$key];
}
?>