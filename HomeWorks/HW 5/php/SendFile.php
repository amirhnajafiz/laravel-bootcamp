<?php 

require 'AddMessage.php';

$target_dir = "../uploads/";
$imageFileType = $_FILES["file"]["type"];
$imageFileType = explode('/', $imageFileType);
$imageFileType = $imageFileType[1];
$target_name = "file" . time() . "." . $imageFileType;
$target_file = $target_dir . $target_name;
$uploadOk = 1;

$error = "File not sent.";

// Check file size
if ($_FILES["file"]["size"] > 1000000) {
  $error = "Sorry, your file is too large.";
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
  $error = "Not image format.";
  $uploadOk = 0;
}

if ($uploadOk == 1 && move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
  addMessage("../data/{$_POST['sender']}.txt", $_POST['to'], $target_file, time(), true, true);
  addMessage("../data/{$_POST['to']}.txt", $_POST['sender'], $target_file, time(), false, true);
} else {
  header("Location: ../SendFile.php?sender={$_POST['sender']}&to={$_POST['to']}&error={$error}");
  exit();
}

header("Location: ../MyChatRoom.php?user={$_POST['sender']}&chater={$_POST['to']}");
exit();
?>