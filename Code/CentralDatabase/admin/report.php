<?php include ('header.php'); ?>

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="dashboard.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="schedule.php">Reports</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2>
<?php
$result = mysqli_query($connect,"SELECT * FROM schedule where arrived_at_destination = 'Yes'");
$num_rows = mysqli_num_rows($result);
?>
						<i class="halflings-icon th"></i><span class="label label-success"><?php echo $num_rows; ?></span><span class="break"></span>
						<b>Arrived List</b>
						</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
			<form method="POST" target="_blank" action="print_report.php">
							<button class="btn btn-danger" style="float:right;"  name="print"><i class="icon-print icon-large"></i> Print Preview</button>
			</form>
					
		<form method="POST" action="sort_report.php">
						<div class="form-group col-lg-3">
		<input type="date" name="sort" value="<?php echo date('Y-m-d'); ?>">
							<select name="status" class="form-control" style="width:130px;">
								<option>--All--</option>
								<option>Delayed</option>
								<option>On Travel</option>
								<option>Cancelled</option>
								<option>Arrived</option>
							</select>
		<button type="submit" class="btn btn-primary" style="margin:0px 20px 10px 10px;" name="ok"><i class="halflings-icon search white"></i> Sort</button>
						</div>
		</form>

						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Driver Name</th>
								  <th>Bus Number</th>
								  <th>Bus Type</th>
								  <th>From</th>
								  <th>Destination</th>
								  <th>Departure</th>
								  <th>Arrival</th>
								  <th>Terminal Location</th>
								  <th>Status</th>
							  </tr>
						  </thead>   
						  <tbody>
<?php
include ('db/dbcon.php');
$result= mysqli_query($connect,"select * from schedule
LEFT JOIN bus ON schedule.busid = bus.busid
LEFT JOIN driver ON schedule.driverid = driver.driverid
 where arrived_at_destination = 'Yes' order by scheduleid ASC ") or die (mysqli_error());
while ($row= mysqli_fetch_array ($result) ){
$id=$row['scheduleid'];
$busid=$row['busid'];
$driverid=$row['driverid'];
?>
							<tr>
								<td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
								<td><?php echo $row['bus_number']; ?></td>
								<td><?php echo $row['bus_type']; ?></td>
								<td><?php echo $row['from_location']; ?></td>
								<td><?php echo $row['destination_location']; ?></td>
								<td><span class="label label-primary"><?php echo date("M d, Y H:i:s",strtotime($row['departure_time'])); ?></span></td>
								<td><span class="label label-success"><?php echo date("M d, Y H:i:s",strtotime($row['arrival_time'])); ?></span></td>
								<td><span class="label label-success"><?php echo $row['terminal_location']; ?></span></td>
								<td><span class="label label-warning"><?php echo $row['status_operation']; ?></span></td>
							</tr>
<?php } ?>					  
						  </tbody> 
					  </table> 
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
	
<?php include ('footer.php'); ?>