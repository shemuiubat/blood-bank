<?php
session_start();
include("config.php");

?>
<!DOCTYPE html>
<html lang="en">
	<head>
			<?php include("admin_head.php");?>
	</head>
	<body>

<?php include("admin_topnav.php"); ?>
<div class="container"  style='margin-top:70px'>
	<div class="row">
		<div class="col-sm-3">
			<?php include("admin_side_nav.php");?>
		</div>
		<div class="col-sm-9" >
			<h3 class='text-primary'><i class="fa fa-users"></i> Add New Camps </h3><hr>    
		<div class="row">
		
		
					<?php
					if(isset($_POST["submit"]))
					{


$target_dir = "camp_image/";
$img="camp_image/BA.jpg";
$target_file = $target_dir.rand(100,999). basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "";
        $uploadOk = 1;
    } else {
      //  echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
   // echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000000) {
   // echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $img=$target_file;
    } else {
     //   echo "Sorry, there was an error uploading your file.";
    }
}







$sql="
INSERT INTO camps(name, details,image)
 VALUES('{$_POST["NAME"]}',  '{$_POST["details"]}',  '{$img}');";
						if($con->query($sql))
							{
								echo '
								<div class="alert alert-success">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Success!</strong> You added a new Camps.
								</div>
								';
							}
					}
				?>
                <div class="panel panel-primary" style="background-color: #59b300;">
                                       
                    <div class="panel-body">
						<form method="post" action="admin_add_camps.php" autocomplete="off" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label text-primary" for="NAME" >Name</label>
							<input type="text" placeholder="Camps Name" id="NAME" name="NAME"  required class="form-control input-sm">
						</div>
						


						


						
						
						

						

							



						  
						  <div class="form-group">
								<label class="control-label text-primary" for="ADDRESS">Details</label>
                                <textarea required name="details" id="ADDRESS" rows="5" style="resize:none;"class="form-control" placeholder="Details of the Camps"></textarea>
                          </div>

						





							<div class="form-group">
							<label class="control-label text-success" for="fileToUpload" >Upload Photo</label>
							<input type="file" class="form-control"  name="fileToUpload">
						    </div>




						  <div class="form-group">
							<button class="btn btn-primary" type="submit" name="submit" >Add Camp</button>
						  </div>
						 </form>
						 <a class="btn btn-primary "  href="admin_manage_camps.php">Back</a>
                    </div>
                </div>
            </div>

	
		
			
		</div>
		</div>
	</div>
</div>
  
  
	 <?php include("admin_footer.php"); ?>
  <script>
  </script>

	</body>
</html>