# 2023 WCTokyo Styles

WordCamp Tokyo 2023 ウェブサイト用カスタム CSS 開発のためのプラグインです。

## Get started

1. `cd /PATH/TO/wp-content/plugins/`
2. `git clone https://github.com/wctokyo/2023-wctokyo-styles.git` ( または、zipファイルをダウンロードしてプラグインを新規追加 )
3. `cd 2023-wctokyo-styles`
4. `npm ci` で packege をインストール（ package-lock.json の内容に沿ったパッケージをインストールするコマンド）
5. `npm run watch` で SCSS ファイルの変更を常時監視（SCSS を修正したら即時に CSS へコンパイルする）
6. `npm run build` で CSS にコンパイル（コマンドが走ったときだけ CSS をコンパイルする）

---

## ローカルでの開発環境の作成手順

### ローカル上にWPサイトを構築

* Local https://localwp.com/
* wp-env

など、各自が普段使い慣れている環境で OK です。  
マルチサイト化**せず**に、通常の WordPress のローカル環境を構築してください。  
今回使用するテーマは、TwentyTwentyThree です。

### 必要なプラグインを管理画面からインストールして有効化する

* Gutenberg
* Jetpack
* WordPress インポートツール

### WCJ2021 CSS をGitHubからダウンロードしてインストール、有効化する

https://github.com/wctokyo/2023-wctokyo-styles

このプラグインです。  
上記 Get started の 1. 2. の手順でインストールします。  
有効化すると、アドミンバーの色がデフォルトから変わります。

### WordCamp.org Post Types をインストールして有効化する

本家の https://github.com/WordPress/wordcamp.org からそのまま持ってきた状態だと有効化したときにエラーが出るので、WordCamp Tokyo の別リポジトリに用意したものをインストールしてください。

https://github.com/wctokyo/2023__wc-post-types

エラーが出ないように一部コードを編集してあります。

### 本番サイトから記事データを移植

* 本番サイトの「ツール > エクスポート」からすべてのコンテンツをダウンロード。 https://japan.wordcamp.org/2021/wp-admin/export.php
* ローカル環境の「ツール > インポート > インポーターの実行」で、ダウンロードしたファイルをインポート。
