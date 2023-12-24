<?php
// 確実に読み込まなければならないファイルにはrequireを、そうでないファイルにはincludeを使う
require('../app/functions.php');

// 送られてきた値を用いるにはfilter_inputを用いる。形式は現在はGET
// 前後の空白や改行を除去できる trim() という関数
$message = trim(filter_input(INPUT_GET, 'message'));
// $message !== ''の確認　-> 真：?から:までの間の値を代入、偽：:から;までの値を代入
$message = $message !== '' ? $message : '...';
$username = filter_input(INPUT_GET, 'username');
$color = filter_input(INPUT_GET, 'color');


// 読み込みに失敗しても処理を止めるほどクリティカルではない
include('../app/_parts/_header.php');

?>
<!-- nl2br関数：htmlでは改行は表示されないので、タグに変える必要 -->
  <p><?= h($color); ?></p>
  <p><?= nl2br(h($message)); ?> by <?= h($username); ?></p>
  <p><a href="index.php">Go back</a></p>


<?php
// 読み込みに失敗しても処理を止めるほどクリティカルではない
include('../app/_parts/_footer.php');