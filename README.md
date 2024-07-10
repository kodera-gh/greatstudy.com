# greatstudy

## 使用技術一覧
### バックエンド
<img src="https://img.shields.io/badge/-Php-777BB4.svg?logo=php&style=for-the-badge">

### フロントエンド
<img src="https://img.shields.io/badge/-Vue.js-4FC08D.svg?logo=vue.js&style=for-the-badge">

### インフラ
<img src="https://img.shields.io/badge/-Docker-1488C6.svg?logo=docker&style=for-the-badge">

# 環境構築手順
1. cd api
2. composr install
3. cd ../
4. docker compose up --build
5. http://localhost:8080/ にアクセス

# greatstudy.com/ ファイル構成
## /api
PHPファイル
## /greatstudy
vue3プロジェクト  
### /public
**video**　動画ファイル設置位置  
**/pdf**　pdfファイル設置位置  
### /src
**/assets**　各ページ毎にディレクトリを切って画像を格納する  
**/views**　各ページ毎にファイルを作成する  
**/components/**　各ページ毎にディレクトリを切ってコンポーネントを設置  
**/components/Ui**　汎用的に使用するコンポーネントを設置  
**/components/Layout**　ヘッダーやフッターなどの固定レイアウト等を設置  
**/App.vue**　基本的なページの構成要素を記述  
