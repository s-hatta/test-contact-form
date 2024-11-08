# アプリケーション名

## 環境構築
1. はじめに
```
$ コマンドラインで実行するコマンドであることをあらわす
/var/www# PHPコンテナで実行するコマンドであることをあらわす
```

2. リポジトリのコピー
```
$ git clone git@github.com:s-hatta/test-contact-form.git
```

3. Dockerビルド
```
$ cd test-contact-form/
$ docker-compose up -d --build
```

4. Laravelのパッケージインストール
```
$ docker　compose exec php bash
/var/www# composer install
```

5. .envファイルの設定
```
/var/www# cp .env.example .env
/var/www# exit
```

6. .envファイルを編集（+は追加する行、-は削除する行）
```
// 前略

DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
+ DB_HOST=mysql
DB_PORT=3306
- DB_DATABASE=laravel
- DB_USERNAME=root
- DB_PASSWORD=
+ DB_DATABASE=laravel_db
+ DB_USERNAME=laravel_user
+ DB_PASSWORD=laravel_pass

// 後略
```

7. アプリケーションキー作成
```
/var/www# php artisan key:generate
```

8. マイグレーション
```
/var/www# php artisan migrate
```

9. シーディング
```
php artisan db:seed
exit
```

## 使用技術(実行環境)
- PHP 8.2.8
- Lalavel Framework 8.83.27
  - fortify 1.19.1
  - livewire 2.12.8
- MySQL 8.0.26
- phpMyAdmin 5.2.1
- nginx 1.21.1

## ER図
![ER-contact-form-ER drawio](https://github.com/user-attachments/assets/c7a8eefe-6b20-4fa0-af7d-e549d322b247)

## URL
- 開発環境：http://localhost/
- 管理画面ログイン：http://localhost/login/
- phpMyAdmin：http://localhost:8080/
