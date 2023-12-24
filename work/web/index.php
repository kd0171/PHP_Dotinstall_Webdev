<?php

// GET は基本的に何らかの情報を取得
  // 例えばユーザー名で検索して、その詳細情報を取得
  // GET では送信した値がそのまま URL に埋め込まれる＝セキュリティ面から、安全性が低い
  // 埋め込める値は文字列だけで、なおかつ文字数制限
// POST は情報を追加/更新/削除
  // ユーザー名を送信して、そのユーザー名をデータベースに登録する 
  // POSTでは送信した値がそのまま URL に埋め込まれないが、ブラウザの機能を使えば、値を確認することもできる
  // データサイズに制限がなくて、文字列以外にもファイルなどのバイナリデータも送信

require('../app/functions.php');

// functionsから関数を使用
createToken();

// 定数は大文字
define('FILENAME', '../app/messages.txt');

// 直接アクセスすると空白ポストが追加されるのでPOSTでのアクセスのみ対応
//条件文 if ($_SERVER['REQUEST_METHOD'] === 'POST') は、リクエストがPOSTメソッドである場合に真となります。
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  validateToken();
  // POSTされたデータはfilter_inputで受け取る
  $message = trim(filter_input(INPUT_POST, 'message'));
  $message = $message !== '' ? $message : '...';

  $filename = '../app/messages.txt';
  $fp = fopen(FILENAME, 'a'); //'a'は追記モード
  fwrite($fp, $message . "\n");
  fclose($fp);

  // 処理後にリダイレクトする
  header('Location: http://localhost:8080/result.php');
  exit;
} 
// 正しく処理されない場合はこのリンクに留まる
  // else {
  //   exit('Invalid Request');
  // }

// $filename = '../app/messages.txt';
// 1 行ずつ配列の要素として読み込み、かつ改行を削除
$messages = file(FILENAME, FILE_IGNORE_NEW_LINES);

include('../app/_parts/_header.php');

?>

<ul>
  <?php foreach ($messages as $message): ?>
    <li><?= h($message); ?></li>
  <?php endforeach; ?>
</ul>



<!-- POST形式 -->
  <!-- <form action="index.php" method="post"> -->
  <form action=" " method="post"> <!-- 空文字なら同じファイルへ行く -->
    <input type="text" name="message">
    <button>Post</button>
    <!-- フォームにおいてトークンの値を渡す -->
    <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
  </form>

<?php

include('../app/_parts/_footer.php');