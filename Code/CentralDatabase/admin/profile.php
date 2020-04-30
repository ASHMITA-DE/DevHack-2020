<?php include ('header.php'); ?>

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="dashboard.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="profile.php">Users</a></li>
			</ul>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Welcome!</strong> User
</div>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2>
<?php
$result = mysqli_query($connect,"SELECT * FROM admin");
$num_rows = mysqli_num_rows($result);
?>
						<i class="halflings-icon user"></i><span class="label label-success"><?php echo $num_rows; ?></span><span class="break"></span>
						<a href="signup.php">
							<button style="margin-top:-7px;" class="btn btn-small btn-primary"><i class="halflings-icon plus white"></i> User</button>
						</a>
						</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">

						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Firstname</th>
								  <th>Lastname</th>
								  <th>Username</th>
								  <th>Branch</th>
								  <th>Type</th>
								  <th>Date Added</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
<?php
include ('db/dbcon.php');
$result= mysqli_query($connect,"select * from admin 
LEFT JOIN branch on admin.branchid = branch.branchid
 order by admin.adminid ASC") or die (mysqli_error());
while ($row= mysqli_fetch_array ($result) ){
$id=$row['adminid'];
$branchid=$row['branchid'];
?>
							<tr>
								<td><?php echo $row['firstname']; ?></td>
								<td class="center"><?php echo $row['lastname']; ?></td>
								<td class="center"><?php echo $row['username']; ?></td>
								<td class="center"><?php echo $row['branch_location']; ?></td>
								<td class="center"><?php echo $row['user_type']; ?></td>
								<td class="center">
									<span class="label label-success"><?php echo $row['date_added']; ?></span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="view_admin.php<?php echo '?adminid='.$id; ?>">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-info" href="edit_admin.php<?php echo '?adminid='.$id; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger btn-setting" href="myModal<?php echo $id; ?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
<?php } ?>					  
						  </tbody> 
					  </table> 
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
<!--- Delete Modal -->			
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<i class="halflings-icon user"></i> Profile</a></li>
		</div>
		<div class="modal-body">
			<p>Are you sure you want to delete?</p>
		</div>
		<div class="modal-footer">
			<a href="profile.php" class="btn" data-dismiss="modal">Close</a>
			<a href="delete_admin.php<?php echo '?adminid='.$id; ?>" class="btn btn-primary"><i class=" halflings-icon remove white"></i> Delete</a>
		</div>
	</div>	
			
			
<?php include ('footer.php'); ?>