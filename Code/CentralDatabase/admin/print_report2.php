<html>

<head>
		<title>Bus Dispatch and Information System</title>
		
		<style>
		
		
.container {
	width:100%;
	margin:auto;
}
		
.table {
    width: 100%;
    margin-bottom: 20px;
}	

.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
    background-color: #f9f9f9;
}
		
		</style>
		
</head>


<body>
	<div class = "container">
		<div id = "header">
		<br/>
				<img src = "photo3.JPG" style = " margin-top:-17px; float:left; margin-left:115px; margin-bottom:-6px; width:100px; height:100px;">
				<img src = "photo2.JPG" style = " margin-top:-17px; float:right; margin-right:115px; width:100px; height:100px;" >
				<center><h5 style = "font-style:Calibri"></h5>&nbsp; &nbsp;&nbsp; Republic of the Philippines &nbsp;	&nbsp; </center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5> &nbsp; &nbsp; Bus Dispatch and Information System</center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5> Sagay City</center>
				
			<p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">Arrived List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
		<br/>
						<table class="table table-striped">
						  <thead>
							  <tr>
    <?php include('session.php'); ?>
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

							if ($_SESSION['status'] == '--All--') {
							$result= mysqli_query($connect,"select * from schedule 
							LEFT JOIN bus ON schedule.busid = bus.busid
							LEFT JOIN driver ON schedule.driverid = driver.driverid
							where schedule.arrival_time between '".$_SESSION['sort']." 00:00:01' and '".$_SESSION['sort']." 23:59:59' and arrived_at_destination = 'Yes' 
							order by schedule.scheduleid DESC ") or die (mysqli_error());
							} elseif ($_SESSION['status'] == 'Delayed') {
							$result= mysqli_query($connect,"select * from schedule 
							LEFT JOIN bus ON schedule.busid = bus.busid
							LEFT JOIN driver ON schedule.driverid = driver.driverid
							where schedule.arrival_time BETWEEN '".$_SESSION['sort']." 00:00:01' and '".$_SESSION['sort']." 23:59:59'  and arrived_at_destination = 'Yes' 
							and schedule.status_operation like '".$_SESSION['status']."'
							order by schedule.scheduleid DESC ") or die (mysql_error());
							} elseif ($_SESSION['status'] == 'On Travel') {
							$result= mysqli_query($connect,"select * from schedule 
							LEFT JOIN bus ON schedule.busid = bus.busid
							LEFT JOIN driver ON schedule.driverid = driver.driverid
							where schedule.arrival_time BETWEEN '".$_SESSION['sort']." 00:00:01' and '".$_SESSION['sort']." 23:59:59'  and arrived_at_destination = 'Yes' 
							and schedule.status_operation like '".$_SESSION['status']."'
							order by schedule.scheduleid DESC ") or die (mysqli_error());
							}  elseif ($_SESSION['status'] == 'Cancelled') {
							$result= mysqli_query($connect,"select * from schedule 
							LEFT JOIN bus ON schedule.busid = bus.busid
							LEFT JOIN driver ON schedule.driverid = driver.driverid
							where schedule.arrival_time BETWEEN '".$_SESSION['sort']." 00:00:01' and '".$_SESSION['sort']." 23:59:59'  and arrived_at_destination = 'Yes' 
							and schedule.status_operation like '".$_SESSION['status']."'
							order by schedule.scheduleid DESC ") or die (mysqli_error());
							}  elseif ($_SESSION['status'] == 'Arrived') {
							$result= mysqli_query($connect,"select * from schedule 
							LEFT JOIN bus ON schedule.busid = bus.busid
							LEFT JOIN driver ON schedule.driverid = driver.driverid
							where schedule.arrival_time BETWEEN '".$_SESSION['sort']." 00:00:01' and '".$_SESSION['sort']." 23:59:59'  and arrived_at_destination = 'Yes' 
							and schedule.status_operation like '".$_SESSION['status']."'
							order by schedule.scheduleid DESC ") or die (mysqli_error());
							} else {
							$result= mysqli_query($connect,"select * from schedule 
							LEFT JOIN bus ON schedule.busid = bus.busid
							LEFT JOIN driver ON schedule.driverid = driver.driverid
							where schedule.arrival_time BETWEEN '".$_SESSION['sort']." 00:00:01' and '".$_SESSION['sort']." 23:59:59'  and arrived_at_destination = 'Yes' 
							order by schedule.scheduleid DESC ") or die (mysqli_error());
							}	
while ($row= mysqli_fetch_array ($result) ){
$id=$row['scheduleid'];
$busid=$row['busid'];
$driverid=$row['driverid'];
?>
							<tr>
								<td style="text-align:center;"><?php echo $row['firstname']." ".$row['lastname']; ?></td>
								<td style="text-align:center;"><?php echo $row['bus_number']; ?></td>
								<td style="text-align:center;"><?php echo $row['bus_type']; ?></td>
								<td style="text-align:center;"><?php echo $row['from_location']; ?></td>
								<td style="text-align:center;"><?php echo $row['destination_location']; ?></td>
								<td style="text-align:center;"><span class="label label-primary"><?php echo date("M d, Y H:i:s",strtotime($row['departure_time'])); ?></span></td>
								<td style="text-align:center;"><span class="label label-success"><?php echo date("M d, Y H:i:s",strtotime($row['arrival_time'])); ?></span></td>
								<td style="text-align:center;"><span class="label label-success"><?php echo $row['terminal_location']; ?></span></td>
								<td style="text-align:center;"><span class="label label-warning"><?php echo $row['status_operation']; ?></span></td>
							</tr>	  
							
							<?php 
							}			
							?>
							</tr>  
						  </tbody> 
					  </table> 

<br />
<br />
							<?php
								include('db/dbcon.php');
								$user_query=mysqli_query($coonect,"select *  from admin where adminid='$id_session'")or die(mysqli_error());
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>