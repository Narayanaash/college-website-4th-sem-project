<?php

$target_dir = "uploads/";
$image_id =  $_SESSION['user']['username'].".jpg";
$savename = $target_dir . $image_id;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$errors   = array();

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
            $error = $_FILES["file"]["error"];
        }
            else if (($_FILES["fileToUpload"]["type"] == "image/gif") ||
            ($_FILES["fileToUpload"]["type"] == "image/jpeg") ||
            ($_FILES["fileToUpload"]["type"] == "image/png") ||
            ($_FILES["fileToUpload"]["type"] == "image/pjpeg")) {

            $filename = compress_image($_FILES["fileToUpload"]["tmp_name"], $savename, 20);
            array_push($errors, "<span style='color: green;'>The Image has been uploaded</span>");
        }else {
            array_push($errors, "Sorry, there was an error uploading your file");
        }
        }


?>