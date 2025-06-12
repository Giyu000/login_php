<?php
interface Idb {//インターフェース
    // すべてのデータを取得する処理
    public function fetchAll($sql,$param = []);
    // １件だけデータを取得する処理
    public function fetch($sql,$param = []);
    // insert,update,delete
    public function execute($sql,$param = []);
}
?>