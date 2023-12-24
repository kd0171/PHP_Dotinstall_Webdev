<?php
// 空文字にすると、PHP が内部的に Cookie の有効期限を過去日時にセットしてくれて、 Cookie が削除されるという仕組み
setcookie('color', '');

// header関数：ページのリダイレクトが可能
  // この命令の前に何らかの出力をしてはいけません。: のあとの半角空白は必ず必要
header('Location: http://localhost:8080/index.php');