<?php
require('../app/functions.php');
// // html中に長文を書くのは憚られるので、こちらで定義
// function h($str)
// {
//   return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
// }

$name = 'Taro';
// $name = 'Taro <script>alert(1);</script>';
// 配列の埋め込み
$names = [
  'Taro',
  'Jiro',
  'Saburo',
];

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


  <!-- 
    ifの{}と区別しやすくなる
    foreachは
    <?php foreach ($names as $name): ?>
    <li><?= h($name); ?></li>
    <?php endforeach; ?>
    のように書くことが可能
   -->
  <ul>
  <!-- foreach if while switchにはコロンとセミコロンを用いた記法もある -->
  <!-- dowhileにはこのような記法はない -->
  <?php if (empty($names)): ?>
    <li>Nobody!</li>
  <?php else: ?>
  <?php foreach ($names as $name): ?>
    <li><?= h($name); ?></li>
    <!-- endの時だけセミコロンなことに注意 -->
  <?php endforeach; ?>
  <?php endif; ?>
  </ul>

</body>
</html>