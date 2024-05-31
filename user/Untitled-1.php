<?php
session start
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];

}else{
    echo "<script>window.location.href='../';</script>";
}

include("../connections.php");

    $query_info = mysqli_query($connections, "SELECT * FROM tbl_user WHERE email='$email'");

    $my_info = mysqli_fetch_assoc($query_info);

    $img = $my_info("img");

include ("nav.php");

?>
    
<script src="../admin/js/jQuery.js"></script>
<style>
    img {height: 150px;}
</style>

<script type="application/javascript">

    var _URL = window.URL || window.webkitURL;

function displayPreview(files) {
    var file = files [0]
    var img = new Image();
    var sizeKB = file.size / 1024;
    img.onload = function() {
        $('#preview').append(img);

    }

img.src _URL.createObjectURL(file);

}


</script>
<br>
<br>

<?php

$target_dir = "photo/folder";

if (isset($_POST["btnUpload"])) {

    $target_file = $target_dir. "/" . basename ($_FILES["profile_pic"]["name"]);

    $upload0k = 1;

    if (file_exists($target_file)) {

        $target_file = $target_dir . rand (1,9) . rand (1,9) . rand (1,9) . rand (1,9) . "_" . basename ($_FILES["profile_pic") ["name"]);
    
        $upload0k = 1;

    }

    $imageFileType = pathinfo ($target_file, PATHINFO_EXTENSION);

    if ($_FILES["profile_pic"] ["size"] > 500000000000000000000000000000) {

        $uploadErr "Sorry, your file is too large.";

        $upload0k = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {

        $uploadErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

        $uploadok = 0;
    }
 
    if ($uploadOk == 1) {

        if (move_uploaded_file($_FILES["profile_pic"] ["tmp_name"], $target_file)) {

            mysqli_query($connections, "UPDATE tbl_user SET img='$target_file' WHERE email='$email'");

            $notify = <font color=green>You file photo has been uploaded!</font>;

        } else {
            
            echo "Sorry, there was an error uploading your file.";

        }
    }
}

if (empty($_GET["notify"])){

    // do nothing

} else {

    echo "<center>". $_GET["notify"]"</center>"
}
?>

<form method="POST" enctype="multipart/form-data">

    <table border="0" width="30%">

        <tr><td colspan="2"></td> <center> <span id="preview"></span> </center> </tr>

        <tr><td colspan="2"></td></tr>

        <tr>
            <td width="50%"> <input type="file" id="profile pic" onchange="displayPreview(this.file);"/></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="2">
                <center>
                    <input type="submit" name="btn-Upload" class="btn-update" value="Upload"
                </center>
            </td>
        </tr>


    </table>
</form>

<span class="error"><?php echo $uploadErr; ?></span>