<?php
session_start();
include("config.php");
//include("functions.php");

error_reporting(0);
?>
<?php
				$em = $_SESSION['email'];
				$s="select * from blood_donor where EMAIL='$em'";
				$q=mysqli_query($con,$s);

				$data=mysqli_fetch_array($q);
				$pic=$data[21]; 
				?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("head.php");?>
</head>
<body style="background-color: black;">






<br>



<div class="row centered-form">
<div class="container">
<div class="  col-sm-6">
				<?php
					if(isset($_POST["submit"]))
					{


$target_dir = "donor_image/";
$img="donor_image/BA.jpg";
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
$country="";
$state="";

$qry="SELECT COUNTRY_NAME FROM country WHERE COUNTRY_ID={$_POST["COUNTRY"]}";
$res=$con->query($qry);
if($res->num_rows>0)
{
	if($row=$res->fetch_assoc())
	{
		$country=$row["COUNTRY_NAME"];
	}
}

// $qry="SELECT STATE_NAME FROM state WHERE STATE_ID={$_POST["STATE"]}";
// $res=$con->query($qry);
// if($res->num_rows>0)
// {
// 	if($row=$res->fetch_assoc())
// 	{
// 		$state=$row["STATE_NAME"];
// 	}
// }



$cityname=$_POST["CITY"];
 


$bb="update blood_donor set NAME='{$_POST["NAME"]}', FATHER_NAME='{$_POST["FATHER_NAME"]}',GENDER='{$_POST["GENDER"]}',DOB='{$_POST["DOB"]}',BLOOD='{$_POST["BLOOD"]}',BODY_WEIGHT='{$_POST["BODY_WEIGHT"]}',password='{$_POST["password"]}',ADDRESS='{$_POST["ADDRESS"]}',CITY='$cityname',CONTACT_1='{$_POST["CONTACT_1"]}',LAST_D_DATE='{$_POST["LAST_D_DATE"]}',DONOR_PIC='{$img}',COUNTRY='{$country}' where EMAIL='$em'";

						if($con->query($bb))
							{
								echo '
								<div class="alert alert-success">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Success!</strong> Upddate was Done. 

								</div>
								';
								
							}
						else{
							echo "Not update sorry";
							echo  @$em;
							
						}
					}
				?>
				
                <div class="panel panel-primary" style="background-color: #59b300;">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center" style="padding:5px;font-size:16px;font-weight:bold"><span class="fa fa-user "> </span> Update Your Profile  </h3>
                    </div>
                       <p id="errorBox"></p>
                    <div class="panel-body">
						<form method="post" action="donor_index.php" autocomplete="off" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label text-primary" for="NAME" >Name </label>
							<input type="text" placeholder="Full Name" value="<?php echo @$data[2]; ?>" id="NAME" name="NAME"  required class="form-control input-sm">
						</div>
						<div class="form-group">
							<label class="control-label text-primary" for="FATHER_NAME">Father Name</label>
							<input type="text" placeholder="Father Name" id="FN" name="FATHER_NAME" value="<?php echo @$data[3]; ?>" required class="form-control input-sm">
						</div>

						<div class="form-group">
							<label class="control-label text-primary"  for="GENDER">Gender</label>
								<select id="gen" name="GENDER" value="" required class="form-control input-sm">
									<option value="<?php echo @$data[4]; ?>"><?php echo @$data[4]; ?></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Thirunangai">Other</option>
									
								</select>
						</div>

						<div class="form-group">
							<label class="control-label text-primary" for="DOB">D.O.B</label>
							<input type="date" value="<?php echo @$data[5]; ?>" placeholder="YYYY/MM/DD" required id="DOB" name="DOB"  class="form-control input-sm DATES">
						</div>


						<div class="form-group">
							<label class="control-label text-primary" for="BLOOD" >Blood Group</label>
						<select id="blood" name="BLOOD" required class="form-control input-sm">
							<option value="<?php echo @$data[6]; ?>"><?php echo @$data[6]; ?></option>
							<option value="A+">A+</option>
							<option value="B+">B+</option>
							<option value="O+">O+</option>
							<option value="AB+">AB+</option>
							
							
							<option value="A-">A-</option>
							<option value="B-">B-</option>
							<option value="O-">O-</option>
							<option value="AB-">AB-</option>
							
							
							</select>
						</div>
						<div class="form-group">
							<label class="control-label text-primary" for="BODY_WEIGHT" >Body Weight</label>
							<input type="text" required placeholder="Weight In Kgs"  name="BODY_WEIGHT" value="<?php echo @$data[7]; ?>" id="BODY_WEIGHT" class="form-control input-sm">
						</div>
						 <div class="form-group">
								<label class="control-label text-primary" for="EMAIL" >Email ID</label>
                                <input type="email" value="<?php echo @$data[8]; ?> "required name="EMAIL" id="EMAIL" class="form-control" placeholder="Email Address">
                          </div>
                          <div class="form-group">
								<label class="control-label text-primary" for="Password" >Password</label>
                                <input type="text" value="<?php echo @$data[1]; ?>" required name="password" id="password" class="form-control" placeholder="Password">
                          </div>

						  <div class="form-group">
								<label class="control-label text-primary" for="COUNTRY">Country</label>
                                <select name="COUNTRY" id="COUNTRY" value="" required class="form-control">
								<option value="<?php echo @$data[14]; ?>"><?php echo @$data[14]; ?></option>
								<?php
									$sql="SELECT COUNTRY_ID,COUNTRY_NAME FROM country ORDER BY COUNTRY_NAME ASC";
									$result=$con->query($sql);
									if($result->num_rows>0)
									{
										while($row=$result->fetch_assoc())
										{
											echo "<option value='{$row['COUNTRY_ID']}'>{$row['COUNTRY_NAME']}	</option>";
										}
									}
								?>
								</select>
                          </div>

							


						  <div class="form-group">
								<label class="control-label text-primary" for="CITY" >City</label>
                                <select name="CITY" value="" id="CITY" required class="form-control">
								<option value="<?php echo @$data[11]; ?>"><?php echo @$data[11]; ?></option>
								<?php

									$sql="SELECT CITY_NAME,CITY_ID FROM city ORDER BY CITY_NAME";
									$result=$con->query($sql);
									if($result->num_rows>0)
									{
										while($row=$result->fetch_assoc())
										{
										echo "<option value='{$row['CITY_NAME']}'>{$row['CITY_NAME']}	</option>";
										}
									}

								?>
								</select>

                          </div>

						  
						  <div class="form-group">
								<label class="control-label text-primary" for="ADDRESS">Address</label>
                                <textarea required name="ADDRESS" value="" id="ADDRESS" rows="5" style="resize:none;"class="form-control" placeholder= "<?php echo @$data[9]; ?>"  value=""><?php echo @$data[9]; ?></textarea>
                          </div>

						
                          	<div class="form-group">
							<label class="control-label text-primary"  for="LAST_D_DATE">Last Blood Donoted Date</label>
							<input type="date"  name="LAST_D_DATE" value="<?php echo @$data[20]; ?>" value="0000/00/00"  id="LAST_D_DATE" placeholder="YYYY/MM/DD" class="form-control input-sm DATES">
						  </div>
					




						   <div class="form-group">
								<label class="control-label text-primary" for="CONTACT_1" >Contact</label>
                                <input type="text"  "required name="CONTACT_1" id="CONTACT_1" value="<?php echo @$data[15]; ?>" class="form-control" placeholder="Contact">
                          </div>
						  
						
							
					
						
						  <hr>
						

							<div class="form-group">
							<label class="control-label text-success" for="fileToUpload" >Upload Photo</label>
							<input type="file" class="form-control" id="PIC"  name="fileToUpload">
						  </div>

							  <div class="form-group">
								<label class="control-label text-success"><input type="checkbox" checked id="c2">&nbsp; I have read the eligibility criteria and confirm that i am eligible to donate blood.</label>
								<label class="control-label text-success"><input type="checkbox" checked id="c3" >&nbsp; I agree to the Term and Conditions and consent to have my contact and donor information published to the potential blood recipients.</label>
						  </div>
						  



						  <div class="form-group">
							<button class="btn btn-primary" type="submit" name="submit" id="BTN" >Update Now</button>
						  </div>
						 </form>
						 <a href="index.php" class="btn btn-primary pull-right">Logout</a>
                    </div>
                </div>
            </div>

<div class="col-sm-6" style="text-align: center;"><br><br> <br><h3 style="position: fixed; color:white;"><i class="fas fa-bug"></i> Shemu ekta soytan <br><img style="width: 300px;height: 300px;" src="<?php echo @$pic ?>"> </div>
        </div></h3>

</div>


 <?php include("footer.php"); ?>
 <script>
	$(document).ready(
		function(){

		$("#BTN").click(function(){
			// var NAME=$("#NAME").val();
			// var FATHER_NAME=$("#FN").val();
			// var GENDER=$("#gen").val();
			// var D.O.B=$("#DOB").val();
			// var BLOOD_Group=$("#Blood").val();
			// var BODY_WEIGHT =$("#BODY_WEIGHT").val();
			// var EMAIL_ID=$("#EMAIL").val();
			// var COUNTRY=$("#COUNTRY").val();
			// var CITY=$("#CITY").val();
			// var ADDRESS=$("#ADDRESS").val();
			// var CONTACT=$("#CONTACT_1").val();
			// var NEW_DONOR=$("#NEW_DONOR").val();
			// var PIC=$("#PIC").val();

			if($("#NAME").val() == "" )
				{
					$("#NAME").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Enter Full Name.</div>");
					return false;
				}
				var letterNumber =  /^[0-9]+$/;
				if($("#NAME").val().match(letterNumber) )
				{
					$("#NAME").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Enter only Alphapet.</div>");
					return false;
				}

				if($("#FN").val() == "" )
				{
					$("#FN").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Enter FATHER_NAME.</div>");
					return false;
				}
				var letterNumber =  /^[0-9]+$/;
				if($("#FN").val().match(letterNumber) )
				{
					$("#FN").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Enter only Alphapet.</div>");
					return false;
				}
				
				if($("#DOB").val() == "" )
				{
					$("#DOB").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please write your date of birth.</div>");
					return false;
				}
					if($("#blood").val() == "" )
				{
					$("#blood").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please select your blood group.</div>");
					return false;
				}
					if($("#BODY_WEIGHT").val() == "" )
				{
					$("#BODY_WEIGHT").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please write your body Weight.</div>");
					return false;
				}
				if($("#EMAIL").val() == "" )
				{
					$("#EMAIL").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please write your Email id.</div>");
					return false;
				}
				if($("#COUNTRY").val() == "" )
				{
					$("#COUNTRY").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please select your Country name.</div>");
					return false;
				}
				if($("#CITY").val() == "" )
				{
					$("#CITY").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please select your City name.</div>");
					return false;
				}
				if($("#ADDRESS").val() == "" )
				{
					$("#ADDRESS").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please write your full adress.</div>");
					return false;
				}
				if($("#CONTACT_1").val() == "" )
				{
					$("#CONTACT_1").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please give your contact number.</div>");
					return false;
				}
							
				
		});
	});

    function validate(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();
    var arrayExtensions = ["jpg" , "jpeg", "png", "bmp", "gif"];
    if (arrayExtensions.lastIndexOf(ext) == -1) {
        alert("Please upload image file only.");
        $("#PIC").val("");
    }
}
</script>
 <script>
	$(document).ready(
				function(){
						$("#volu").hide();
						$("#c1").click(function(){
							if($("#c1").is(':checked'))
							{
								$("#volu").show(1000);
								$("#new").hide(100);
							}
							else
							{
								$("#volu").hide(1000);
								$("#new").show(100);
							}
						});

						/*
						$("#CITY").change(function(){
							var city=$("#CITY").val();
							//alert(city);
							$.post('functions.php',{G_CITY_ID:city},function(data){
							//	alert(data);
								$("#STATE").html(data);
							});

						});*/


						$("#COUNTRY").change(function(){
							var countr=$("#COUNTRY").val();
							//alert(city);
							$.post('get_state.php',{G_STATE_ID:countr},function(data){
							//	alert(data);
								$("#STATE").html(data);
							});

						});

							$("#STATE").change(function(){
							var stid=$("#STATE").val();
							//alert(city);
							$.post('get_city.php',{G_STATE_ID:stid},function(data){
							//	alert(data);
								$("#CITY").html(data);
							});

						});



				});


  $(function() {
    var availableTags = [
      <?php
	  $sql="SELECT AREA_NAME FROM area";
							$result=$con->query($sql);

							if($result->num_rows>0)
							{
								$i=0;
								$n=$result->num_rows;
								while($row=$result->fetch_assoc())
								{
									$i++;
									if($n!=$i)
									{
										echo '"'.$row['AREA_NAME'].'",';
									}
									else
									{
										echo '"'.$row['AREA_NAME'].'"';
									}
								}

							}


	  ?>
    ];
    $( "#AREA" ).autocomplete({
      source: availableTags
    });
  });

 </script>

</body>
</html>