<?php 

include('db/dbcon.php');

$get_id=$_GET['driverid'];

mysqli_query($connect,"delete from driver where driverid = '$get_id' ")or die(mysqli_error());
echo "<script>alert('Successfully Delete'); window.location='driver.php'</script>";
?>