<?php

// $color は $colorFromGet がセットされていれば、その値、セットされていなかったら、 Cookie の値、それもセットされていなかったら、 transparent にしてね、という意味
$color = $colorFromGet ?? filter_input(INPUT_COOKIE, 'color') ?? 'transparent';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHP Practice</title>
</head>
<body style="background-color: <?= h($color); ?>;">
