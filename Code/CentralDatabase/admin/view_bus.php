<?php include ('header.php'); ?>

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="dashboard.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li>
					<a href="bus.php">Bus Information</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="">View Information</a></li>
			</ul>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2>
						<i class="halflings-icon user"></i><span class="break"></span>
						<a href="bus.php">
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
								  <th>Bus Number</th>
								  <th>Bus Type</th>
								  <th>Date Added</th>
							  </tr>
						  </thead>   
						  <tbody>
<?php
		$id=$_GET['busid'];
		$result1 = mysqli_query($connect,"SELECT * FROM bus WHERE busid='$id'");
		while($row1 = mysqli_fetch_array($result1)){
		?>
							<tr>
								<td><?php echo $row1['bus_number']; ?></td>
								<td class="center"><?php echo $row1['bus_type']; ?></td>
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