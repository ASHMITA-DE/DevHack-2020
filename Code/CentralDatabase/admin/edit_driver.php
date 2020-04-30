<?php include ('db/dbcon.php');
$ID=$_GET['driverid'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bus Dispatch and Information System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/css/simple-sidebar.css" rel="stylesheet">
	
    <!-- SignIn CSS -->
	<link href="css/css/signin.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

        <!-- navbar start -->
<nav class="navbar navbar-inverse" style="border-radius:0px;" >

<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Bus Dispatch and Information System</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
	<li class="">						
	<a>
		<?php include('currentdate.php'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php include('clock_lcd.php'); ?>
	</a>
	</li>
    </ul>
</div>

</nav>
        <!-- navbar end -->

<div class="account-container register">
	
	<div class="content clearfix">
		
		<form method="post" enctype="multipart/form-data">
			<h1>Edit Details</h1>			
			
			<div class="login-fields">
<?php
  $query=mysqli_query($connect,"select * from driver where driverid='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
				
				<p>Edit driver account:</p>
				<div class="field">
				<a href=""><?php if($row['profile'] != ""): ?>
				<img src="upload/<?php echo $row['profile']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
				<?php else: ?>
				<img src="images/default.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
				<?php endif; ?>
				</a>
					<input type="file" name="image" style="width:190px; float:right; margin-top:57px;">
				</div> <!-- /field -->
			<!-- .actions -->
				
				<div class="field">
					<label for="firstname">First Name:</label>
					<input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" placeholder="First Name" class="login" required />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="lastname">Last Name:</label>	
					<input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" placeholder="Last Name" class="login" required />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="contact_number">Contact Number</label>
					<input type="text" maxlength="15" id="contact_number" name="contact_number" value="<?php echo $row['contact_number']; ?>" placeholder="Contact Number" class="login" required />
				</div> <!-- /field -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				<button type="submit" name="update" class="button btn btn-primary btn-large">Update Info</button>
				<a href="driver.php"><button type="button" style="margin-right:20px;" class="button btn btn-primary btn-large">Cancel</button></a>
			</div> 
			<!-- .actions -->
			
		</form>
	
<?php
/*
$id =$_GET['driverid'];
if (isset($_POST['image'])) {

							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];
							


							if ($error > 0){
										die("Error uploading file! Code $error.");
									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										
									else
										{

move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
$profile=$_FILES["image"]["name"];

mysql_query(" UPDATE driver SET profile='$profile' WHERE driverid = '$id' ")or die(mysql_error());
echo "<script>alert('Successfully Update Driver Profile!'); window.location='driver.php'</script>";
										}
										}
							}*/
?>


<?php
$id =$_GET['driverid'];
if (isset($_POST['update'])) {
								$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];
							


							if ($error > 0){
										
$firstname=$_POST['firstname'];	
$lastname=$_POST['lastname'];	
$contact_number=$_POST['contact_number'];	
$still_profile = $row['profile'];

mysqli_query($connect," UPDATE driver SET firstname='$firstname', profile='$still_profile', lastname='$lastname', contact_number='$contact_number'
 WHERE driverid = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Update Driver Info!'); window.location='driver.php'</script>";	
									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										

move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
$profile=$_FILES["image"]["name"];


$firstname=$_POST['firstname'];	
$lastname=$_POST['lastname'];	
$contact_number=$_POST['contact_number'];	

mysqli_query($connect," UPDATE driver SET firstname='$firstname', profile='$profile', lastname='$lastname', contact_number='$contact_number'
 WHERE driverid = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Update Driver Info!'); window.location='driver.php'</script>";
}
}
?>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<script src="js/js/jquery-1.7.2.min.js"></script>
<script src="js/js/bootstrap.js"></script>
               
<script src="js/js/signin.js"></script>