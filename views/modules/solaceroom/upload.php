<?php
session_start();
include_once 'dbh.php';
$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
  $file = $_FILES['file'];

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];//temporary file location
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);//divide the filename from its extension
  $fileActualExt = strtolower(end($fileExt));//convert to lowercase

  $allowed = array('jpg','jpeg','png');//array of file types allowed to be uploaded

  if (in_array($fileActualExt,$allowed)) {//if extension is inside the array
    if ($fileError === 0) {//if there's no error uploading the file
      if ($fileSize < 1000000) {//if the file size is lower than 1m kb
        $fileNameNew = "profile".$id.".".$fileActualExt;//create unique id to avoid overwriting the file;
// $fileNameNew = uniqid('',true).".".$fileActualExt;
        $fileDestination = 'uploads/'.$fileNameNew;//destination of the file
        move_uploaded_file($fileTmpName,$fileDestination);

        //update the status
        $sql="UPDATE profileimg SET status = 0 WHERE userid = '$id';";
        $result=mysqli_query($conn, $sql);
        header("Location: index.php?uploadsuccess");//add changes to the URL to verify that the upload was a success
      }else {
        echo 'Your file is too big!';
      }
    }else{
      echo 'There was an error uploading your file!';
    }
  }else{
    echo 'You cannot upload files of this type!';
  }
}
 ?>
