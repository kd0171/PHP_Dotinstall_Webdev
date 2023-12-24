<?php
// 確実に読み込まなければならないファイルにはrequireを、そうでないファイルにはincludeを使う
require('../app/functions.php');

// 送られてきた値を用いるにはfilter_inputを用いる。形式は現在はGET
$message = filter_input(INPUT_GET, 'message');
$username = filter_input(INPUT_GET, 'username');


// 読み込みに失敗しても処理を止めるほどクリティカルではない
include('../app/_parts/_header.php');

?>

  <p><?= h($message); ?> by <?= h($username); ?></p>
  <p><a href="index.php">Go back</a></p>


<?php
// 読み込みに失敗しても処理を止めるほどクリティカルではない
include('../app/_parts/_footer.php');