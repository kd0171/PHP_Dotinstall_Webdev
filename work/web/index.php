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

$filename = '../app/messages.txt';
// 1 行ずつ配列の要素として読み込み、かつ改行を削除
$messages = file($filename, FILE_IGNORE_NEW_LINES);

include('../app/_parts/_header.php');

?>

<ul>
  <?php foreach ($messages as $message): ?>
    <li><?= h($message); ?></li>
  <?php endforeach; ?>
</ul>



<!-- POST形式 -->
  <form action="result.php" method="post">
    <input type="text" name="message">
    <button>Post</button>
  </form>

<?php

include('../app/_parts/_footer.php');