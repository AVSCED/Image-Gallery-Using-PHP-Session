<?php
session_start();
if (isset($_POST['resetData'])) {
    session_destroy();
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <style>
        .button1 {
            background-color: #0099ff;
            border-radius: 8px;
            border: 1px, solid;
            color: white;
            padding: 4px 9px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 7px 5px;
        }

        .row1 {
            display: flex;
        }

        img {
            margin-right: 2rem;
        }
    </style>

</head>
<?php
if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = [];
}
?>

<body>
    <h3>Image Gallery !</h3>
    <p>This Page displays the list of uploaded images.</p>
    <!-- To let user upload various Images and store it in session array -->

    <form action="upload.php" method="post" name="img_Gallery" enctype="multipart/form-data">
        <input style="margin-left:.5% " type="file" name="fileToUpload" id="fileToUpload"><br>
        <button class="button1" type="submit" value="Upload Image" name="submit">Upload More</button>
    </form>

    <!-- To reset the session Data -->
    <form action="" method="POST">
        <p style="margin-left:.5% ">Reset data:
            <button type=submit name="resetData">&#9850;</button>
        </p>
    </form>
    <hr><br>
    <?php
    // To Display the session Data of images
    foreach ($_SESSION['data'] as $key => $value) {
        $s .= '<div class= "row1"><p><img src="./uploads/' . $value . '" alt="" width="200px" height="150px" ><br>' . $value . '</p><div>';
    }
    echo $s;
    ?>
</body>

</html>