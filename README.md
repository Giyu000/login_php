# PHPログイン認証システム

## 構成

```
├── index.html                # ログイン画面
├── login.php                 # ログイン処理
├── submit.php                # トークン処理
├── create_token.php          # トークン生成
├── top.html                  # ログイン後の画面
├── create_account.html       # 新規登録画面
├── create_account.php        # 新規登録処理
├── Idb.php                   # インターフェース（共通）
├── sql.php                   # DB接続用ファイル
├── spl.php                   # 新規登録側のDB処理用ファイル
```

## 学んだこと

- **PHPの基本構文と処理の流れ**
- **CSRF対策の実装**
- **インターフェース（interface）を用いた設計**
- **データベース接続（PDO）**
- **セキュリティの重要性**

## 参考サイト一覧

- [【PHP】インターフェイスの使い方がよくわからない人向け](https://qiita.com/tkek321/items/a6112bc195b73438a9b0)

- [【コピペで使える】ログイン機能の簡単実装サンプル（PHP／MySQL）](https://tadworks.jp/archives/1147)

- [PHPのDBクラス](https://qiita.com/jemm/items/66bc5c35a13fa4e5f87e)

- [PHPでログイン機能を実装するチュートリアル #2](https://qiita.com/ShibuyaKosuke/items/6109810464a7293293bd)

- [PHPによる簡単なログイン認証いろいろ](https://qiita.com/mpyw/items/bb8305ba196f5105be15)

- [クロスサイトリクエストフォージェリ（CSRF）とは]
(https://medium-company.com/%e3%82%af%e3%83%ad%e3%82%b9%e3%82%b5%e3%82%a4%e3%83%88%e3%83%aa%e3%82%af%e3%82%a8%e3%82%b9%e3%83%88%e3%83%95%e3%82%a9%e3%83%bc%e3%82%b8%e3%82%a7%e3%83%aa/#CSRF1)

- [CSRF対策の実装でWebアプリを守ろう！具体的なコード例と注意点](https://www.furikatu.com/2025/04/secure-csrf-protection.html)

- [【備忘録】.envファイルってなに？](https://qiita.com/Aloha2691/items/7c2d8d832bc4192625e3)

- [.envを初心者が早いうちから理解するための記事](https://zenn.dev/nababa/articles/77727f9600ec13)

- [PHPで会員登録＆ログイン機能を作成してみた](https://wagtechblog.com/programing/php-register-login.html#i)
