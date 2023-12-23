<?php

$today = date('Y-m-d H:i:s l');

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHP Practice</title>
</head>
<body>
  <p>Hello, PHP!</p>
  <p>Today: <?php echo date('Y-m-d H:i:s l'); ?></p>
  <!-- 開始タグのphpは省略可能 -->
  <p>Today: <?= date('Y-m-d H:i:s l'); ?></p>
  <!-- 冒頭で変数を定義することも可能 -->
  <p>Today: <?= $today; ?></p>
</body>
</html>