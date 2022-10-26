<?php
session_start();

// To store the image name in $var and store the image in upload file
if (isset($_POST['submit'])) {
    $fileToUpload = $_FILES["fileToUpload"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $var = basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    array_push($_SESSION['data'], $var);
    header("Location:index.php");
}
