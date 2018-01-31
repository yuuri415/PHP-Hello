<?php

if (is_numeric($_GET["age"]) == true) {
  print("あなたの年齢は：");
  print(htmlspecialchars($_GET["age"]));
  print("才です");
} else {
  print("入力された値は数字ではありません。");
}


?>
