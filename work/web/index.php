<?php
// 確実に読み込まなければならないファイルにはrequireを、そうでないファイルにはincludeを使う
require('../app/functions.php');

// 読み込みに失敗しても処理を止めるほどクリティカルではない
include('../app/_parts/_header.php');

?>

<!-- methodはgetかpostで指定 -->
  <!-- GET形式ではURLを介して値を渡す -->
<form action="result.php" method="get">
<!-- result.phpで送られた値をどの名前で受け取るかをname属性で指定 -->
  <input type="text" name="message">
  <input type="text" name="username">
  <button>Send</button>
</form>


<?php
// 読み込みに失敗しても処理を止めるほどクリティカルではない
include('../app/_parts/_footer.php');