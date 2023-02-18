# アプリケーション
飲食店アプリ
<img width="1380" alt="スクリーンショット 2023-02-16 23 08 17" src="https://user-images.githubusercontent.com/110466543/219393132-60e04b4e-ed41-497c-b0e8-a194f0e5de18.png">

## 作成した目的
模擬案件

Laravelの理解を深めるため

案件開発の練習

## アプリケーションURL
52.199.168.11

resistrationでアカウント登録してからいいね機能や予約機能が使える

## 機能一覧
- 会員登録機能
- ログイン機能
- メール認証機能
- ログアウト機能
- ユーザー情報取得

一般ユーザー
- ユーザー飲食店お気に入り一覧取得
- ユーザー飲食店予約情報取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情報削除 
- エリアで検索する
- ジャンルで検索する
- 店名で検索する
- 評価一覧取得
- 評価追加
- 予約の際、コース選択した場合に決済
- 予約詳細で予約情報QRコード表示

店舗代表者
- 店舗代表者管理画面取得
- 飲食店追加
- 飲食店情報更新
- 予約情報取得
- 予約当日の朝にリマインダー
- QRで予約情報・お客様情報照合
- コース追加

管理者
- 管理者管理画面取得
- 店舗代表者追加
- 一般ユーザーにお知らせメール

## 使用技術
Laravel Framework 8.83.27

Docker version 20.10.22

## テーブル設計
<img width="648" alt="スクリーンショット 2023-02-16 23 32 45" src="https://user-images.githubusercontent.com/110466543/219393927-cd2fb1ec-8a9e-4d89-ab2b-98b1ab1358b3.png">
<img width="649" alt="スクリーンショット 2023-02-16 23 32 50" src="https://user-images.githubusercontent.com/110466543/219393949-9edd3277-3aa1-46da-b2ba-601f58fae8b3.png">
<img width="641" alt="スクリーンショット 2023-02-16 23 32 57" src="https://user-images.githubusercontent.com/110466543/219393962-5c4b521a-6344-4cd3-8a26-c55ac0b3b53f.png">
<img width="652" alt="スクリーンショット 2023-02-16 23 33 02" src="https://user-images.githubusercontent.com/110466543/219393992-3167a079-b43a-4572-abf8-865bb89ce723.png">

## ER図
<img width="368" alt="スクリーンショット 2023-02-16 23 36 53" src="https://user-images.githubusercontent.com/110466543/219394656-b7cd157b-0511-4f1b-813a-0bba3b0daf11.png">

## 環境構築
1. MAMP

　　1.1 MAMPのダウンロードページからMAMP&MAMP Proを選択

　　1.2 ファイルがダウンロードされ、インストーラーのウィザードに従ってインストールを進める

　　1.3 MAMPを起動するためにMAMPフォルダの中にある、MAMP.appを開く

　　1.4 Preferencesを選択後、「80 ＆ 3306」ボタンをクリックし、OKボタンをクリックし初期設定をする。

　　1.5右上の「Start」を選択し、MAMPを起動

2. mysql

　　2.1 下記コマンドでMAMPのbinディレクトリに移動する

　　　cd /Applications/MAMP/Library/bin/
   
　　2.2 以下のコマンドでMySQLに接続

　　　　./mysql -u root -p
  
　　2.3 パスワードが求められたら「root」と入力

　　　Enter password: rootと入力

3. Composerインストール

　　3.1 ターミナルを開き、Homebrewのインストール（パスワードを入力）

　　　/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
  
　　3.2 Composerをインストール

　　　brew install composer

4. Laravelプロジェクト作成

　　4.1 MAMPを起動してCLIでhtdocsまで移動

　　　cd /Applications/MAMP/htdocs/
   
　　4.2 Laravelのプロジェクトを下記コマンドで作成

　　　composer create-project "laravel/laravel=8.*" プロジェクト名 --prefer-dist
      
5. Docker Desktopをインストール

　　5.1 Docker Desktopをインストール

　　　Docker公式のホームページからインストール
   
 
　　5.2 Docker起動
 
　　　パスワードを入力してDockerを起動


6. laravel sailインストール

　　6.1 作成したプロジェクトへ移動

　　　cd プロジェクト名
  
　　6.2 以下のコマンドでSailをインストール

　　　composer require laravel/sail --dev
  
　　6.3 以下のコマンドでLaravelプロジェクトにSail環境を準備
  
　　　php artisan sail:install

7. サーバー立ち上げ

　　下記コマンドでサーバーを立ち上げる
 
　　　./vendor/bin/sail up

