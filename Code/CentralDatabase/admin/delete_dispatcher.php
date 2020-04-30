<?php 

include('db/dbcon.php');

$get_id=$_GET['dispatcherid'];

mysqli_query($connect,"delete from dispatcher where dispatcherid = '$get_id' ")or die(mysqli_error());
echo "<script>alert('Successfully Delete'); window.location='dispatcher.php'</script>";
?>