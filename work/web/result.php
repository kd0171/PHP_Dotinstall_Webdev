<?php

require('../app/functions.php');
// 直接アクセスすると空白ポストが追加されるのでPOSTでのアクセスのみ対応
//条件文 if ($_SERVER['REQUEST_METHOD'] === 'POST') は、リクエストがPOSTメソッドである場合に真となります。
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // POSTされたデータはfilter_inputで受け取る
  $message = trim(filter_input(INPUT_POST, 'message'));
  $message = $message !== '' ? $message : '...';

  $filename = '../app/messages.txt';
  $fp = fopen($filename, 'a'); //'a'は追記モード
  fwrite($fp, $message . "\n");
  fclose($fp);
} else {
  exit('Invalid Request');
}

include('../app/_parts/_header.php');

?>
  <p>Message added!</p>
  <p><a href="index.php">Go back</a></p>

<?php

include('../app/_parts/_footer.php');