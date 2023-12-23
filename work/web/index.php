<?php

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
  <p>Hello, <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>!</p>
</body>
</html>