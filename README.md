# アプリケーション
飲食店アプリ
<img width="1380" alt="スクリーンショット 2023-02-16 23 08 17" src="https://user-images.githubusercontent.com/110466543/219393132-60e04b4e-ed41-497c-b0e8-a194f0e5de18.png">

## 作成した目的
模擬案件

Laravelの理解を深めるため

案件開発の練習

## アプリケーションURL
3.115.11.64

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
<img width="636" alt="スクリーンショット 2023-03-04 22 12 49" src="https://user-images.githubusercontent.com/110466543/222904089-b02cf3ec-fa49-43e5-968e-fbe36f420734.png">
<img width="634" alt="スクリーンショット 2023-03-04 22 13 08" src="https://user-images.githubusercontent.com/110466543/222904116-bfaf5248-9178-4b9c-8af8-a90f392ed59b.png">
<img width="636" alt="スクリーンショット 2023-03-04 22 13 17" src="https://user-images.githubusercontent.com/110466543/222904121-f0154f43-7c14-4012-81c1-5727bbec1595.png">
<img width="635" alt="スクリーンショット 2023-03-04 22 13 21" src="https://user-images.githubusercontent.com/110466543/222904126-3da354bb-7b45-4f25-a843-1e212e795fd6.png">

## ER図
<img width="412" alt="スクリーンショット 2023-03-04 22 16 01" src="https://user-images.githubusercontent.com/110466543/222904002-6218b53a-0284-40c3-b825-8a5f692077c9.png">

## 環境構築
1. MAMP

　　1.1 MAMPのダウンロードページからMAMP&MAMP Proを選択

　　1.2 ファイルがダウンロードされ、インストーラーのウィザードに従ってインストールを進める

　　1.3 MAMPを起動するためにMAMPフォルダの中にある、MAMP.appを開く

　　1.4 Preferencesを選択後、「80 ＆ 3306」ボタンをクリックし、OKボタンをクリックし初期設定をする。

　　1.5右上の「Start」を選択し、MAMPを起動

2. mysql

　　2.1 下記コマンドでMAMPのbinディレクトリに移動する

　　　`cd /Applications/MAMP/Library/bin/`
   
　　2.2 以下のコマンドでMySQLに接続

　　　　`./mysql -u root -p`
  
　　2.3 パスワードが求められたら「root」と入力

　　　Enter password: rootと入力

3. Composerインストール

　　3.1 ターミナルを開き、Homebrewのインストール（パスワードを入力）

　　　`/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"`
  
　　3.2 Composerをインストール

　　　`brew install composer`

4. Laravelプロジェクト作成

　　4.1 MAMPを起動してCLIでhtdocsまで移動

　　　`cd /Applications/MAMP/htdocs/`
   
　　4.2 Laravelのプロジェクトを下記コマンドで作成

　　　`composer create-project "laravel/laravel=8.*" プロジェクト名 --prefer-dist`
      
5. Docker Desktopをインストール

　　5.1 Docker Desktopをインストール

　　　Docker公式のホームページからインストール
   
 
　　5.2 Docker起動
 
　　　パスワードを入力してDockerを起動


6. laravel sailインストール

　　6.1 作成したプロジェクトへ移動

　　　cd プロジェクト名
  
　　6.2 以下のコマンドでSailをインストール

　　　`composer require laravel/sail --dev`
  
　　6.3 以下のコマンドでLaravelプロジェクトにSail環境を準備(mysqlを選択)
  
　　　`php artisan sail:install`

　　6.4 Docker Desktop設定

　　　設定→Resources→FileSharingで該当プロジェクトを追加

　　6.5 docker-compose.ymlの設定

　　　docker-compose.ymlのportsを8000:80に書き換え

　　6.6 キャッシュを削除

7. サーバー立ち上げ

　　下記コマンドでサーバーを立ち上げる
 
　　　`./vendor/bin/sail up`

## テストユーザー

　　　name:admin password:adminpass role:3

　　　テストでは上記roleを店舗代表者は2、一般ユーザーは3に変更してテスト実行
