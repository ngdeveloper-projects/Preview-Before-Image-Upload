<?php
if(isset($_FILES["image_file"]["type"]))
{
$uploadedImgFileExtension = $_FILES["image_file"]["type"];
$uploadedImgFileSize = $_FILES["image_file"]["size"];
// checking the image file types and size
if(( ($uploadedImgFileExtension=="image/png") || ($uploadedImgFileExtension=="image/gif") || ($uploadedImgFileExtension=="image/jpg") || ($uploadedImgFileExtension=="image/jpeg")) && ($uploadedImgFileSize < 100000)) {
// Name of the uploaded file
$uploadedImgFileName =$_FILES['image_file']['name'];
if (file_exists("upload/" . $uploadedImgFileName)) {
echo $uploadedImgFileName . " Exists already ";
}
else
{
// Temporary path to store the uploaded image
$tempPath = $_FILES['image_file']['tmp_name'];
// destination folder name where the uploaded image need to be moved
$moveFileTo = "upload/";
$destFullPath = $moveFileTo.$uploadedImgFileName;
// Moving the uploaded image file
$isMoved = move_uploaded_file($tempPath,$destFullPath) ; 
if ($isMoved == true) {
    echo "Image Uploaded Successfully";
echo "<br/><b>Name:</b> " . $uploadedImgFileName . "<br>";
echo "<b>Type:</b> " . $uploadedImgFileExtension . "<br>";
echo "<b>Size:</b> " . ($uploadedImgFileSize / 1024) . " kB<br>";
} else {
     echo "ERROR: File not moved correctly";
}
}
}
else
{
echo "Invalid Image File";
}
}
?>