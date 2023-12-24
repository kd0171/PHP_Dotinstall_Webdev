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
  
  <textarea name="message"></textarea>
  <input type="text" name="username">
  <!-- <select name="color"> -->
  <select name="colors[]" multiple>
    <option value="orange">Orange</option>
    <option value="pink">Pink</option>
    <option value="gold">Gold</option>
  </select>
  <label><input type="checkbox" name="colors2[]" value="orange"> Orange</label>
  <label><input type="checkbox" name="colors2[]" value="pink"> Pink</label>
  <label><input type="checkbox" name="colors2[]" value="gold"> Gold</label>
  <label><input type="radio" name="color" value="orange"> Orange</label>
  <label><input type="radio" name="color" value="pink"> Pink</label>
  <label><input type="radio" name="color" value="gold"> Gold</label>
  <button>Send</button>
</form>


<?php
// 読み込みに失敗しても処理を止めるほどクリティカルではない
include('../app/_parts/_footer.php');