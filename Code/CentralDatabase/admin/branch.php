<?php include ('header.php'); ?>

<?php
$user_query  = mysqli_query($connect,"select * from admin where adminid = '$id_session'")or die(mysqli_error());
$user_row =mysqli_fetch_array($user_query);
$user_type  = $user_row['user_type'];
?> 
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="dashboard.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="branch.php">Branch Information</a></li>
			</ul>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Welcome!</strong> Bus Dispatch and Information System
</div>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2>
<?php
$result = mysqli_query($connect,"SELECT * FROM branch order by branchid DESC");
$num_rows = mysqli_num_rows($result);
?>
						<i class="halflings-icon user"></i><span class="label label-success"><?php echo $num_rows; ?></span><span class="break"></span>
					<?php if ($user_type == 'Admin'){
					?>
						<a href="add_branch.php">
							<button style="margin-top:-7px;" class="btn btn-small btn-primary"><i class="halflings-icon plus white"></i> Branch</button>
						</a>
					<?php } ?>
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
								  <th>Branch Location</th>
								  <th>Date Added</th>
					<?php if ($user_type == 'Admin'){
					?>
								  <th>Actions</th>
					<?php } ?>
							  </tr>
						  </thead>   
						  <tbody>
<?php
include ('db/dbcon.php');
$result= mysqli_query($connect,"select * from branch order by branchid DESC") or die (mysqli_error());
while ($row= mysqli_fetch_array ($result) ){
$id=$row['branchid'];
?>
							<tr>
								<td><?php echo $row['branch_location']; ?></td>
								<td class="center">
									<span class="label label-success"><?php echo $row['date_added']; ?></span>
								</td>
					<?php if ($user_type == 'Admin'){
					?>
								<td class="center">
									<a class="btn btn-success" href="view_branch.php<?php echo '?branchid='.$id; ?>">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-info" href="edit_branch.php<?php echo '?branchid='.$id; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger btn-setting" href="myModal<?php echo $id; ?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
					<?php } ?>
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
			<i class="halflings-icon info-sign"></i><span class="hidden-tablet"> Branch Information</span>
		</div>
		<div class="modal-body">
			<p>Are you sure you want to delete?</p>
		</div>
		<div class="modal-footer">
			<a href="branch.php" class="btn" data-dismiss="modal">Close</a>
			<a href="delete_branch.php<?php echo '?branchid='.$id; ?>" class="btn btn-primary"><i class=" halflings-icon remove white"></i> Delete</a>
		</div>
	</div>	
	
<?php include ('footer.php'); ?>