<?php
require('../app/functions.php');
// // html中に長文を書くのは憚られるので、こちらで定義
// function h($str)
// {
//   return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
// }

// $name = 'Taro';
$name = 'Taro <script>alert(1);</script>';

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHP Practice</title>
</head>
<body>
  <!-- <p>Hello, <?= $name; ?>: PHP!</p> -->
  <!-- htmlspecialchars(変換したい文字列, ENT_QUOTES, WEBページの文字コード) -->
  <!-- HTML に値を埋め込むときには、必ずこうした処理をする -->
  <p>Hello, <?= h($name); ?>!</p>
</body>
</html>