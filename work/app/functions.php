<?php

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


function createToken() {
  // issetでトークンがsessionに生成されているかを確認
  if (!isset($_SESSION['token'])) {
    // トークン生成のための関数：bin2hex(random_bytes(32))
    // バイナリーから16進数へ変換：bin2hex
    $_SESSION['token'] = bin2hex(random_bytes(32));
  }
}


function validateToken() {
  if (
    empty($_SESSION['token']) || // トークンが空の場合
    $_SESSION['token'] !== filter_input(INPUT_POST, 'token')  // トークンが一致しない場合
  ) {
    exit('Invalid post request');
  }
}

session_start();


