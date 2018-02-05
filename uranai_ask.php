<?php

$error_message = array();

if (isset($_POST["uranai"])) {

    // 全角のものを半角にする
    $age = mb_convert_kana($_POST["age"], "a", "EUC-JP");

    if (is_numeric($age) == false) {
      $error_message[] = "年齢は数字で教えてください！";
    } elseif ($age < 1 || $age > 120) {
      $error_message[] = "年齢は1才から120才の範囲で入力してください！";
    }

    if (!count($error_message)) {
        session_start();
        $_SESSION["age"] = $age;
        header("Location: uranai_result.php");
        exit;
    }
} else {
    $age = 25;
}
?>
<html>
<body>

<?php
// エラーメッセージを出力する
if (count($error_message)) {
    foreach ($error_message as $message) {
        print($message);
    }
}
?>
<form action="uranai_ask.php" method="post">
年齢を教えてください：
<input type="text" name="age"
value="<?php print(htmlspecialchars($age, ENT_QUOTES)); ?>">
<input type="submit" name="uranai" value="占う！">
</form>
</body>
</html>
