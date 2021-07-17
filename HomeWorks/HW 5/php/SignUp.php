<?php
  require 'Functions.php';

  // First we check for the username that it should be unique
  foreach (getUsers() as $user) {
    if ($user['username'] == $_POST['username']) {
      header('Location: ../SignUp.php?status=invalidusername');
      exit();
    }
  }

  $uploadOk = 1;
  $imageFileType = $_FILES["userImg"]["type"];
  $imageFileType = explode('/', $imageFileType);
  $imageFileType = $imageFileType[1];
  $target_dir = "../uploads/";
  $target_file = $target_dir . $_POST['username'];

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["userImg"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      header("Location: ../SignUp.php?error=File is not an image");
      exit();
      $uploadOk = 0;
    }
  }

  if ($_FILES["userImg"]["size"] > 0)
  {
    // Check if file already exists
    if (file_exists($target_file)) {
      header("Location: ../SignUp.php?error=Sorry, file already exists");
      exit();
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["userImg"]["size"] > 500000) {
      header("Location: ../SignUp.php?error=Sorry, your file is too large");
      exit();
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      header("Location: ../SignUp.php?error=Sorry, only JPG, JPEG, PNG, GIF files are allowed. " . $imageFileType);
      exit();
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["userImg"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename( $_FILES["userImg"]["name"])). " has been uploaded.";
      } else {
        header("Location: ../SignUp.php?error=Sorry, there was an error uploading your file");
        exit();
      }
    }
  }

  // If the username was valid we save the user information into 
  // a file and save the chats of our user.
  $file = fopen('../data/users.txt', 'a');

  $data = [
    "username" => $_POST['username'],
    "password" => md5($_POST['password']),
  ];

  fwrite($file, serialize($data) . "\n");
  fopen("../data/{$_POST['username']}.txt", 'w');

  fclose($file);

  header("Location: ../SignIn.php");
?>
