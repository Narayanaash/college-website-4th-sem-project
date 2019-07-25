<?php

include('../conn.php');

$receiver = $_SESSION['receiver'];
$sender = $_SESSION['user']['username'];

$target_dir = "../imageshare/uploads/";
$image_id =  $_SESSION['user']['username']."_".time().".jpg";
$savename = $target_dir . $image_id;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$roomName = $_SESSION['user']['username'].$_SESSION['receiver'];

ini_set('upload_max_filesize', '4M');
date_default_timezone_set("Asia/Calcutta");
$time = date('Y-m-d H:i:s');

$name = ''; $type = ''; $size = ''; $error = '';
   function compress_image($source_url, $destination_url, $quality) {

      $info = getimagesize($source_url);

          if ($info['mime'] == 'image/jpeg')
          $image = imagecreatefromjpeg($source_url);

          elseif ($info['mime'] == 'image/gif')
          $image = imagecreatefromgif($source_url);

          elseif ($info['mime'] == 'image/png')
          $image = imagecreatefrompng($source_url);

          imagejpeg($image, $destination_url, $quality);
          return $destination_url;
        }

            if ($_POST) {

            if ($_FILES["fileToUpload"]["error"] > 0) {
            $error = $_FILES["fileToUpload"]["error"];
        }
            else if (($_FILES["fileToUpload"]["type"] == "image/gif") ||
            ($_FILES["fileToUpload"]["type"] == "image/jpeg") ||
            ($_FILES["fileToUpload"]["type"] == "image/png") ||
            ($_FILES["fileToUpload"]["type"] == "image/pjpeg")) {

            $filename = compress_image($_FILES["fileToUpload"]["tmp_name"], $savename, 20);
                
              /////database
        $username = $_SESSION['user']['username'];
        $userid = $_SESSION['user']['user_id'];       

        $sql = "INSERT INTO personalchat (imageAdd, user_id, username, room, time, sender, receiver) VALUES ('$savename', '$userid', '$username', '$roomName', '$time', '$sender', '$receiver')";
        $conn->query($sql);
                
        }else {
            $error = "Uploaded image should be jpg or gif or png";
        }
        }


?>




