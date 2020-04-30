<?php include ('header.php'); ?>

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="dashboard.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li>
					<a href="driver.php">Driver Profile</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="">View Profile</a></li>
			</ul>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2>
						<i class="halflings-icon user"></i><span class="break"></span>
						<a href="driver.php">
							<button style="margin-top:-7px;" class="btn btn-small btn-primary"><i class="halflings-icon circle-arrow-left white"></i> Back</button>
						</a>
						</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">

						<table class="table table-striped">
						  <thead>
							  <tr>
								  <th>Profile Image</th>
								  <th>Firstname</th>
								  <th>Lastname</th>
								  <th>Contact Number</th>
								  <th>Date Added</th>
							  </tr>
						  </thead>   
						  <tbody>
<?php
		$id=$_GET['driverid'];
		$result1 = mysqli_query($connect,"SELECT * FROM driver WHERE driverid='$id'");
		while($row1 = mysqli_fetch_array($result1)){
		?>
							<tr>
								<td style="text-align:center; word-break:break-all; width:200px;"><a href="#image<?php  echo $id;?>"><?php if($row1['profile'] != ""): ?>
								<img src="upload/<?php echo $row1['profile']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php else: ?>
								<img src="images/default.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php endif; ?>
								</a></td>
								<td><?php echo $row1['firstname']; ?></td>
								<td class="center"><?php echo $row1['lastname']; ?></td>
								<td class="center"><?php echo $row1['contact_number']; ?></td>
								<td class="center">
									<span class="label label-success"><?php echo $row1['date_added']; ?></span>
								</td>
							</tr>
<?php } ?>					  
						  </tbody> 
					  </table> 
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php include ('footer.php'); ?>