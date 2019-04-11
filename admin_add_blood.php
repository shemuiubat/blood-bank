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
			<h3 class='text-primary'><i class="fa fa-users"></i> Add Some Blood </h3><hr>    
		<div class="row">
		
		
					<?php
					if(isset($_POST["submit"]))
					{


$sql="
INSERT INTO b_bank(blood_group, quantity,entry_date,expire_date)
 VALUES('{$_POST["BLOOD"]}', '{$_POST["UNIT"]}','{$_POST["END"]}','{$_POST["EXD"]}';";
						if($con->query($sql))
							{
								echo '
								<div class="alert alert-success">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Success!</strong> You added  Some Blood.
								</div>
								';
							}
							else{
								echo '
								<div class="alert alert-success">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Fail!</strong> You dont
								</div>
								';
							}

					}
				?>
                <div class="panel panel-primary" style="background-color: #59b300;">
                                       
                    <div class="panel-body">
						<form method="post" action="admin_add_blood.php" autocomplete="off" role="form" >
						<div class="form-group">
							<label class="control-label text-primary" for="BLOOD" >Blood Group</label>
						<select id="blood" name="BLOOD" required class="form-control input-sm">
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
								<label class="control-label text-primary"> Unit Of Blood</label>
                                <input type="text" pattern="[1-9]" required name="UNIT" maxlength="2"  class="form-control" placeholder="Insert No Of Unit">
                          </div>
						<div class="form-group">
							<label class="control-label text-primary"  for="end">Entry Date</label>
							<input type="text"   name="END" value="0000/00/00"  id="end" placeholder="YYYY/MM/DD" class="form-control input-sm DATES">
						</div><div class="form-group">
							<label class="control-label text-primary"  for="exd">Expire Date</label>
							<input type="date"   name="EXD" value="0000/00/00"  id="exd" placeholder="YYYY/MM/DD" class="form-control input-sm DATES" >
						</div>


						  <div class="form-group">
							<button class="btn btn-primary" type="submit" name="submit" >Add Blood</button>
						  </div>
						 </form>
						 <a class="btn btn-primary "  href="admin_manage_b_bank.php">Back</a>
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