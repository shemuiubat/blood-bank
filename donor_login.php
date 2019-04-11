<!DOCTYPE html>
<?php
session_start();
include("config.php");
?>
<html lang="en">

<head>

	<?php include("head.php");?>

</head>

<body style="background-color: black;">


    <!-- Navigation -->
   
<br>



    <!-- Page Content -->
    <div class="container" style="margin-top:20px; background-color:#00ffff;">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary"><i class='fa fa-user-md'></i> Donor Login
                  
                </h1>
              
            </div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				<?php
				if(isset($_POST["submit"]))
					{
					$email = $_POST['email'];
				    $pass = $_POST['pass'];
					
	                 $sql="select * from blood_donor where EMAIL='$email' and password='$pass'";
						$q = mysqli_query($con,$sql);
						$r = mysqli_num_rows($q);
						if($r>0){

							 $_SESSION['email']=$email;
					        
							header("location:donor_index.php");
						}
						else
						{
							echo "<div class='alert alert-danger'><b>Error</b> User Name and Password Incorrect.</div>";
							echo $_SESSION['email'];

						}
					}
				?>
					<form role="form" action="donor_login.php" method="post">
			    	  	<div class="form-group">
							 <label for="user_name" class="text-primary">Email</label>
			    		    <input class="form-control" name="email"  id="user" type="email" required>
			    		</div>
			    		<div class="form-group">
							<label for="pass" class="text-primary">Password</label>
			    			<input class="form-control" id="pass" name="pass" type="password" value="" required>
			    		</div>
						
						
			    		<button class="btn btn-primary pull-right"  name="submit" type="submit"><i class="fas fa-sign-in-alt"></i> Login Here</button>
			    		
			      	</form>
			      	<a class="btn btn-primary "  href="index.php">Back</a>
				</div>
				<div class="col-md-3"></div>
			</div>
        </div>
        <!-- /.row -->


       

        <!-- Footer -->
       <?php include"footera.php";?>
  
        </div>
      
  
</body>

</html>
