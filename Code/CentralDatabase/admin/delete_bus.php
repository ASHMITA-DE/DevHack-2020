<?php 

include('db/dbcon.php');

$get_id=$_GET['busid'];

mysqli_query($connect,"delete from bus where busid = '$get_id' ")or die(mysqli_error());
echo "<script>alert('Successfully Delete'); window.location='bus.php'</script>";
?>