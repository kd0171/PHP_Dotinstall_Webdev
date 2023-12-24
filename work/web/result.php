<?php
// 確実に読み込まなければならないファイルにはrequireを、そうでないファイルにはincludeを使う
require('../app/functions.php');

// 送られてきた値を用いるにはfilter_inputを用いる。形式は現在はGET
// 前後の空白や改行を除去できる trim() という関数
$message = trim(filter_input(INPUT_GET, 'message'));
// $message !== ''の確認　-> 真：?から:までの間の値を代入、偽：:から;までの値を代入
$message = $message !== '' ? $message : '...';
$username = filter_input(INPUT_GET, 'username');

// $color = filter_input(INPUT_GET, 'color');
  // 値が設定されているかはisset()で確認可能
// $color = isset($color) ? $color : 'None selected';
  // isset()は省略可能（Null合体演算子）
   // この演算子は null または未定義の値に対してのみ動作し、他の値（例: 空の文字列 '' や 0）には効果がありません。
// $color = $color ?? 'None selected';
$colorFromGet = filter_input(INPUT_GET, 'color')??'transparent'; //背景色のデフォルト
// Cookieに値を保存
  // setcookie() の前で echo を使ったり、 PHP の開始タグの前に HTML を書いたりしてはいけないので、注意しておきましょう。  
// setcookie('color', $colorFromGet);
$_SESSION['color'] = $colorFromGet; // sessionで書き換え



// 配列として受け取る場合には、FILTER_REQUIRE_ARRAYが必要（FILTER_DEFAULT：デフォルトのフィルタを使用）
$colors = filter_input(INPUT_GET, 'colors', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
// empty()：配列が空の場合、trueを返す
$colors = empty($colors) ? 'None Selected': implode(',', $colors); // implode() を使ってカンマ区切りで連結した文字列を表示
// 読み込みに失敗しても処理を止めるほどクリティカルではない

$colors2 = filter_input(INPUT_GET, 'colors2', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
// empty()：配列が空の場合、trueを返す
$colors2 = empty($colors2) ? 'None Selected': implode(',', $colors2);



include('../app/_parts/_header.php');

?>
<!-- nl2br関数：htmlでは改行は表示されないので、タグに変える必要 -->
  <p><?= h($colors); ?></p>
  <p><?= h($colors2); ?></p>
  <p><?= h($colorFromGet); ?></p>
  <p><?= nl2br(h($message)); ?> by <?= h($username); ?></p>
  <p><a href="index.php">Go back</a></p>


<?php
// 読み込みに失敗しても処理を止めるほどクリティカルではない
include('../app/_parts/_footer.php');