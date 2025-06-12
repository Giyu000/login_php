<?php
require_once('./Idb.php'); // インターフェース"Idb.php"のパス

class MySql implements Idb
{
    private $DB_DATABASE;
    private $DB_NAME;
    private $DB_USER;
    private $DB_PASS;
    private $DB_OPTION;
    private $pdo;

    // .env を読み込む関数
    private function loadEnv($path)
    {
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $_ENV[trim($key)] = trim($value);
            }
        }
    }

    // データベースと接続するメソッド
    public function __construct()
    {
        // .env 読み込み
        $this->loadEnv(__DIR__ . '/../.env');

        // .env の値をクラス変数に代入
        $this->DB_HOST = $_ENV['DB_HOST'];
        $this->DB_NAME = $_ENV['DB_NAME'];
        $this->DB_USER = $_ENV['DB_USER'];
        $this->DB_PASS = $_ENV['DB_PASS'];
        $this->DB_OPTION = 'charset=utf8mb4';

        // dsn(data source name) pdoで使用する接続文字列
        $dsn = "mysql:host={$this->DB_HOST};dbname={$this->DB_NAME};{$this->DB_OPTION}";
        try {
            // 正常な場合の処理
            $this->pdo = new PDO($dsn, $this->DB_USER, $this->DB_PASS);
            /*
            PDO::ATTR_ERRMODE	エラーモードを設定するための定数
            PDO::ERRMODE_EXCEPTION	エラーが起きたときに「例外（Exception）」として処理する
            */
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {// PDOExceptionをキャッチする
            echo 'DSN: ' . $dsn . '<br>';
            echo 'User: ' . $this->DB_USER . '<br>';
            die('DB接続エラー:' . $e->getMessage());
        }
    }

    // データを取得するメソッド
    public function fetchAll($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // データを1件取得するメソッド
    public function fetch($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // データの挿入・更新・削除するメソッド
    public function execute($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }

    // クエリ実行共通処理
    private function query($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die('DBエラー: ' . $e->getMessage());
        }
    }
}
?>