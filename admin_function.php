<?php 
function load_donor($sql,$con)
{
	echo '
				<table class="table table-striped">
				<tr>
				<th>S.No.</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Blood</th>
				<th>City</th>
				
				<th>Contact</th>
				
				<th>View</th>
				<th>Delete</th>
				
				</tr>';
				
					
							$result=$con->query($sql);
							$n=0;
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{   
									$n++;
									echo "<tr>";
									echo "<td>".$n."</td>";
									echo "<td>".$row['NAME']."</td>";
									echo "<td>".$row['GENDER']."</td>";
									echo "<td>".$row['BLOOD']."</td>";
									echo "<td>".$row['CITY']."</td>";
									
									echo "<td>".$row['CONTACT_1']."</td>";
								
										
									echo "<td><a href='admin_view_donor.php?id=".$row['DONOR_ID']."' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i> View</a></td>";
									echo "<td><a href='admin_delete_donor.php?id=".$row['DONOR_ID']."' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a></td>";
									echo "</tr>";
								}
							}
							
						
				
			echo'</table>';

}

function load_patient($sql,$con)
{
	echo '
				<table class="table table-striped">
				<tr>
				<th>S.No.</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Blood</th>
				<th>Unit</th>
				<th>Hospital</th>
				<th>Reason</th>
				<th>R-Date</th>
				<th>Status</th>
				<th>Update</th>
				<th>Delete</th>
				
				</tr>';
				
					
							$result=$con->query($sql);
							$n=0;
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{   
									$n++;
									echo "<tr>";
									echo "<td>".$n."</td>";
									echo "<td>".$row['NAME']."</td>";
									echo "<td>".$row['GENDER']."</td>";
									echo "<td>".$row['BLOOD']."</td>";
									echo "<td>".$row['BUNIT']."</td>";
									echo "<td>".$row['HOSP']."</td>";
									echo "<td>".$row['REASON']."</td>";
									echo "<td>".$row['RDATE']."</td>";
										
									if($row["STATUS"]==0)
									{
									
									echo "<td><a href='#' class='btn btn-danger btn-xs'><i class='fa fa-bed'></i> Pending</a></td>";
									
									}
									else if($row["STATUS"]==2)
									{
										
									echo "<td><a href='#' class='btn btn-success btn-xs'><i class='fa fa-bed'></i> Completed</a></td>";
									
									}
									else if($row["STATUS"]==1)
									{
										
									echo "<td><a href='#' class='btn btn-warning btn-xs'><i class='fa fa-bed'></i> Not Completed</a></td>";
									
									}
									
									
									echo "<td><a href='admin_view_request.php?id={$row['ID']}' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i> View</a></td>";
									
									echo "<td><a href='admin_delete_request.php?id=".$row['ID']."' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a></td>";
									echo "</tr>";
									
								}
							}
							else
							{
								echo "<div >No Blood Request Yet</div>";
							}
						
				
			echo'</table>';

}

function load_camps($sql,$con)
{
	echo '
				<table class="table table-striped">
				<tr>
				<th>S.No.</th>
				<th>Name</th>
				<th>Details</th>
				
				
				<th>View</th>
				<th>Delete</th>
				</tr>';
				
					
							$result=$con->query($sql);
							$n=0;
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{   
									$n++;
									echo "<tr>";
									echo "<td>".$n."</td>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['details']."</td>";
									
									
									
										
									echo "<td><a href='admin_view_camps.php?id=".$row['id']."' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i> View</a></td>";
									echo "<td><a href='admin_delete_camps.php?id=".$row['id']."' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a></td>";
									
									
									echo "</tr>";
									
								}
							}
							else
							{
								echo "<div >No Camps available</div>";
							}
						
				
			echo'</table>';

}

function load_bank($sql,$con)
{
	echo '
				<table class="table table-striped">
				<tr>
				<th>S.No.</th>
				<th>Blood Group</th>
				<th>Quantity</th>
				<th>Entry Date</th>
				<th>Expire Date</th>
				
				
				<th>Update</th>
				<th>Delete</th>
				</tr>';
				
					
							$result=$con->query($sql);
							$n=0;
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{   
									$n++;
									echo "<tr>";
									echo "<td>".$n."</td>";
									echo "<td>".$row['blood_group']."</td>";
									echo "<td>".$row['quantity']."</td>";
									echo "<td>".$row['entry_date']."</td>";
									echo "<td>".$row['expire_date']."</td>";
									
									
									
										
									echo "<td><a href='admin_update_bank.php?id=".$row['ID']."' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i> View</a></td>";
									echo "<td><a href='admin_delete_bank.php?id=".$row['ID']."' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a></td>";
									
									
									echo "</tr>";
									
								}
							}
							else
							{
								echo "<div >No Blood available</div>";
							}
						
				
			echo'</table>';

}
?>
