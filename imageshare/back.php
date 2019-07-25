<?php

include('../conn.php');

$target_dir = "../imageshare/uploads/";
$image_id =  $_SESSION['user']['username']."_".time().".jpg";
$savename = $target_dir . $image_id;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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
        $groupid = $_SESSION['group']['id'];
        $userid = $_SESSION['user']['user_id'];
        $groupname = $_SESSION['group']['gname'];
       

  	   

        $sql = "INSERT INTO chats (imageAdd, group_id, user_id, username, gname, time) VALUES ('$savename', '$groupid', '$userid', '$username', '$groupname', '$time')";
        $conn->query($sql);
                
        }else {
            $error = "Uploaded image should be jpg or gif or png";
        }
        }


?>




