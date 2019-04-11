<?php
session_start();
include("config.php");
include("admin_function.php");
 if(!isset($_SESSION['usertype']))
 {
	 header("location:admin.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
			<?php include("admin_head.php");?>
	
	</head>
	<body style="background-color: black;">

<?php include("admin_topnav.php"); ?>
<div class="container" style='margin-top:70px;background-color:#00ff99;'>
	<div class="row">
		<div class="col-sm-3">
			<?php include("admin_side_nav.php");?>
		</div>
		<div class="col-sm-9" >
			<h3 class="text-primary"><i class="fas fa-hand-holding-heart"></i> All Available Blood </h3><hr>    
		<div class="row">
          <h4   style="text-align: right;"><a class="btn btn-primary" href="admin_add_blood.php"><i class="fa fa-plus" aria-hidden="true"></i> Add Blood</a></h4>
		<div class='col-md-12'>
			<div class='table-responsive' id="feedback">
			 		
			<?php 
				$sql="SELECT * FROM b_bank";
				 load_bank($sql,$con);
			?>
			
			<div>
		</div>
		
		
	</div>
		
		
		</div>
	</div>
</div>
  
  
	 <?php include("admin_footer.php"); ?>
 

	</body>
</html>