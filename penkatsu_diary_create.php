<?php
//var_dump($_POST);
//exit();

$word = $_POST['word'];
$deadline = $_POST['date'];

//データを受け取る
$write_data = "{$deadline} {$word}\n";

//書き込み先のファイルを開く。「なんのファイル」を「どんな開け方で開けるか（'a'っていう開け方がある）」？
$file = fopen('data/pen.txt', 'a');

//他の人が書き込まないようにロックする
flock($file, LOCK_EX);

//データを書き込む
fwrite($file, $write_data);

//ロックを解除する
flock($file, LOCK_UN);

//ファイルを閉じる
fclose($file);

//上の操作だけでは何も出ないのだよ。
//入力画面に移動
header('Location:pen_diary_input.php');
exit();

?>