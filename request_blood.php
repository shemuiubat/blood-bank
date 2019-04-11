<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en" >
<head>
<?php include("head.php");?>
</head>
<body style="background-color: lightblue;>



<?php
include("top_nav.php");
?>


<br>
<br><br><br>

 <div class="container row">

    

		
  
		    <div class="col-sm-6" >
                <div class="panel panel-primary " style="background-color: #000066;">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center" style="padding:5px;font-size:16px;font-weight:bold"><span class="fa fa-envelope "> </span> Need Blood To Save Lifes</h3>
                    </div>
                    <div class="panel-body">
					<p id="errorBox"></p>

					<?php
						if(isset($_POST["submit"]))
						{
								$target_dir = "request_image/";
								$file_name=$_FILES["PIC"]["name"];
								if($file_name!="")
								{
									$target_file = $target_dir.rand(100,999). basename($_FILES["PIC"]["name"]);
									move_uploaded_file($_FILES["PIC"]["tmp_name"], $target_file);

								}
								else
								{
									$target_file ="request_image/no-image.jpg";
								}

								 $sql="INSERT INTO request_blood(NAME,GENDER,BLOOD,BUNIT,HOSP,CITY,RDATE,EMAIL,CON1,CON2,REASON,PIC,CADDRESS)
								 VALUES('{$_POST["NAME"]}','{$_POST["GENDER"]}','{$_POST["BLOOD"]}','{$_POST["BUNIT"]}','{$_POST["HOSP"]}','{$_POST["CITY"]}','{$_POST["RDATE"]}','{$_POST["EMAIL"]}','{$_POST["CON1"]}','{$_POST["CON2"]}','{$_POST["REASON"]}','{$target_file}','{$_POST["CADDRESS"]}')";
									if($con->query($sql))
									{

										echo "<div class='alert alert-success fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Information : </strong>Your Blood request is sent. Admin will contact you soon. </br> <b> Call (01786981171) for Canceling the Request!!</b>
										</div>";
									}
									else
									{
										echo "<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error : </strong>Server busy.Try again later.</div>";
									}
						}

					?>
					<form autocomplete="off" method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label text-primary">Patient Name</label>
							<input type="text" placeholder="Patient Name" name="NAME"  required id="NAME" class="form-control input-sm">
						</div>

								<div class="form-group">
							<label class="control-label text-primary"  for="GENDER">Gender</label>
								<select id="gen" name="GENDER" required class="form-control input-sm">
									<option value="">Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									
								</select>
						</div>


						<div class="form-group">
							<label class="control-label text-primary">Required Blood Group</label>
								<select name="BLOOD" id="BLOOD" required  class="form-control input-sm">
							<option value="">Select Blood</option>
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
								<label class="control-label text-primary">Need Unit Of Blood</label>
                                <input type="text" pattern="[1-9]" required name="BUNIT" maxlength="1" id="BUNIT" class="form-control" placeholder="Insert No Of Unit">
                          </div>
						<div class="form-group">
								<label class="control-label text-primary">Hospital Name &amp; Address</label>
                                <textarea required name="HOSP" id="HOSP" rows="5" style="resize:none;"class="form-control" placeholder="Hospital Full Address"></textarea>
                          </div>
						 <div class="form-group">
								<label class="control-label text-primary">City</label>
                                <input type="text" required name="CITY" id="CITY" class="form-control" placeholder="Insert City">
                          </div>

						<div class="form-group">
							<label class="control-label text-primary">When Required</label>
							<input type="text" required placeholder="MM/DD/YYYY" class="form-control input-sm DATES" name="RDATE" id="RDATE">
						</div>

					
						<div class="form-group">
								<label class="control-label text-primary">Address</label>
                                <textarea required name="CADDRESS" id="CADDRESS" rows="5" style="resize:none;"class="form-control" placeholder="Full Address"></textarea>
                          </div>
						<div class="form-group">
							<label class="control-label text-primary">Email ID</label>
							<input type="email" placeholder="Contact Email" class="form-control input-sm" name="EMAIL" id="EMAIL">
						</div>
						<div class="form-group">
							<label class="control-label text-primary">Contact No-1</label>
							<input type="number" required pattern="[0-9]"   minlength="11" placeholder="Contact Number" class="form-control input-sm" name="CON1" id="CON1">
						</div>
							<div class="form-group">
							<label class="control-label text-primary">Contact No-2</label>
							<input type="number" required pattern="[0-9]" placeholder="Contact Number" class="form-control input-sm" name="CON2" id="CON2">
						</div>
						<div class="form-group">
								<label class="control-label text-primary">Reason For Blood</label>
                                <textarea required name="REASON" id="REASON" rows="5" style="resize:none;"class="form-control" placeholder="Reason For Blood" name="REASON" id="REASON"></textarea>
                          </div>
						  	<div class="form-group">
							<label class="control-label text-primary" >Upload Photo</label>
							<input type="file"  onChange="validate(this.value)" name="PIC" id="PIC">
						    </div>


						   <div class="form-group">
							<button class="btn btn-primary" id="BTN" name="submit"><i class="fa fa-send"></i> Request Now</button>
						  </div>
						 </form>
                    </div>
                </div>

            </div>
            <br><br>

        
<div class="col-sm-6" ><h1 style="position: fixed; color:blue;text-align: center;">TAKE BLOOD AND SAVE YOUR LIFE.<br><br> <img  src="images/dt.jpg" width=700px,height=400px;" > </div></h1>
            </div>


 <?php include("footer.php"); ?>
<script>
	$(document).ready(
		function(){

		$("#BTN").click(function(){
			var NAME=$("#NAME").val();
			var BLOOD=$("#BLOOD").val();
			var BUNIT=$("#BUNIT").val();
			var HOSP=$("#HOSP").val();
			var CITY=$("#CITY").val();
			var PIN=$("#PIN").val();
			var DOC=$("#DOC").val();
			var RDATE=$("#RDATE").val();
			var CNAME=$("#CNAME").val();
			var EMAIL=$("#EMAIL").val();
			var CON1=$("#CON1").val();
			var CON2=$("#CON2").val();
			var REASON=$("#REASON").val();
			var PIC=$("#PIC").val();
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
				if($("#gen").val() == "" )
				{
					$("#NAME").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Select Your Gender.</div>");
					return false;
				}
		      if($("#BLOOD").val() == "" )
				{
					$("#BLOOD").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Select Blood.</div>");
					return false;
				}

				if($("#BUNIT").val() == "")
				{
					$("#BUNIT").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Enter No Of Units.</div>");
					return false;
				}

				if(isNaN($("#BUNIT").val()))
				{
					$("#BUNIT").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Unit should be numeric.</div>");
					return false;
				}

				if($("#HOSP").val() == "")
				{
					$("#HOSP").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Enter Hospital Name and full address.</div>");
					return false;
				}

				if($("#CITY").val() == "")
				{
					$("#CITY").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Enter Your city name correctly.</div>");
					return false;
				}

				if($("#DOC").val() == "")
				{
					$("#DOC").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Enter Docter Name.</div>");
					return false;
				}

				if($("#RDATE").val() == "")
				{
					$("#RDATE").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Select the Blood Requiered Date .</div>");
					return false;
				}

				if($("#CNAME").val() == "")
				{
					$("#CNAME").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Enter Contact Person Name.</div>");
					return false;
				}

				if($("#CADDRESS").val() == "")
				{
					$("#CADDRESS").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Fill Full Address.</div>");
					return false;
				}
				if($("#CON1").val() == "")
				{
					$("#CON1").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Enter your Mobile Number.</div>");
					return false;
				}

				if(isNaN($("#CON1").val()))
				{
					$("#CON1").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Mobile Number should be Numeric.</div>");
					return false;
				}

				if($("#CON2").val() == "")
				{
					$("#CON2").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Enter  Alternate Contact No.</div>");
					return false;
				}

				if(isNaN($("#CON2").val()))
				{
					$("#CON2").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Alternate Contact should be Numeric.</div>");
					return false;
				}

				if($("#REASON").val() == "")
				{
					$("#REASON").focus();
					$("#errorBox").html("<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Warning : </strong> Please Enter the correct Reason for Blood.</div>");
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

</body>
</html>
