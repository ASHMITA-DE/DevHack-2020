<?php
include('db/dbcon.php');
include('session.php');

$logout_query=mysqli_query($connect,"select * from admin where adminid=$id_session");
$row=mysqli_fetch_array($logout_query);
$user=$row['firstname']." ".$row['lastname'];
session_start();
session_destroy();

header('location:index.php');

?>