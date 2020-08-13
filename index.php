<!doctype html>
<html lang="en">
<head>
<title>Image Preview before Upload Demo - Javadomain.in</title>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.11.0/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/redmond/jquery-ui.css" type="text/css" /> 
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" type="text/css" />
<script type="text/javascript">
$(document).ready(function (event) {
// triggered when the form submitted
$("#selected_image").on('submit',(function(event) {
event.preventDefault();
$("#upload_status").empty();
$.ajax({
// URL to move the uploaded image file to server
url: "Preview_Upload.php",
// Request type
type: "POST", 
// To send the full form data
data: new FormData(this),
contentType: false,      
processData:false,     
// UI response after the file upload  
success: function(data)
{
$("#upload_status").html(data);
}
});
}));

// Triggered when the image changed (browse)
$(function() {
$("#image_file").change(function(event) {
if(-1!=$.inArray($("#image_file")[0].files[0].type, ["image/jpeg","image/png","image/jpg","image/gif"])){	
var populateImg = new FileReader();
populateImg.onload = previewImg;
populateImg.readAsDataURL($("#image_file")[0].files[0]);
}
});
});

// Function to show the image as a preview
function previewImg(event) {
$('.img').css("display", "block");
$('#img_preview').attr('src', event.target.result);
$('#img_preview').attr('width', '300px');
$('#img_preview').attr('height', '250px');
};
});
</script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="span12">
      <div class="head">
        <div class="row-fluid">
            <div class="span12">
                <div class="span6">
                    <h1 class="muted"><a href="www.javadomain.in">&nbsp;&nbsp;&nbsp;Image Preview before Upload Demo | Javadomain.in</a></h1>
                </div>
            </div>
        </div>
		
		
        </div>
      </div>
    </div>
	
	
	<div class="jumbotron">
  <div class="container">
     
 


 <div class="row">
  <div class="col-sm-8">
  <label>Select Image to Upload</label>
    <div class="row">
      <div class="col-sm-6"><form id="selected_image" action="" method="post" enctype="multipart/form-data"><input type="file" name="image_file" id="image_file" class="btn btn-sm btn-primary" style="width:250px;"/></div>
      <div class="col-sm-6"><input type="submit" value="Upload" class="btn btn-sm btn-success" style="width:250px;"/></div>
    </div>
  </div>
  <div class="col-sm-4">
<div class="img"><img id="img_preview" /></div>
</form></div>
</div>
<div id="upload_status"></div>
  </div>
</div>
  </div>
</div>
</body>
</html>