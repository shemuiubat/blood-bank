<?php
session_start();
include("config.php");
 if(!isset($_SESSION['usertype']))
 {
	 header("location:admin.php");
 }
 if(isset($_GET["id"]))
 {
	 $id=$_GET["id"];
	 echo $sql="DELETE FROM camps WHERE id=$id";
	 $con->query($sql);
	 header("location:admin_manage_camps.php?mes=Customer Details Deleted");
 }
 else
 {
	 header("location:admin_manage_camps.php");
 }
 
?>