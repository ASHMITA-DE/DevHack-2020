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
		
		<form action="signup_info.php" method="post">
			<h1>Enter your Details</h1>			
			
			<div class="login-fields">
				
				<p>Create your account:</p>
				
				<div class="field">
					<label for="firstname">First Name:</label>
					<input type="text" id="firstname" name="firstname" value="" placeholder="First Name" class="login" required />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="lastname">Last Name:</label>	
					<input type="text" id="lastname" name="lastname" value="" placeholder="Last Name" class="login" required />
				</div> <!-- /field -->
				
				
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login" required />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login" required />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="confirm_password">Confirm Password:</label>
					<input type="password" id="confirm_password" name="confirm_password" value="" placeholder="Confirm Password" class="login" required />
				</div> <!-- /field -->
				
				<div class="field">
				<label for="Branch Location">Branch Location</label>
				<select name="branchid" class="login" style="font-family: 'Open Sans'; font-size: 13px; color: #8e8d8d; background-color: #fdfdfd; width: 297px; display: block; height: 40px; margin: 0; box-shadow: inset 2px 2px 4px #f1f1f1;">
				<?php 
				include('db/dbcon.php'); 
				
				$result =  mysqli_query($connect,"select * from branch")or die(mysqli_error()); 
				while ($row=mysqli_fetch_array($result)){ ?>
				<option value="<?php echo $row['branchid']; ?>"><?php echo $row['branch_location']; ?></option>
				<?php } ?>
				</select>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="confirm_password">User Type:</label>
					<select name="user_type" id="confirm_password" style="width:100px; border-radius:5px; height:37px; color:#8e8d8d; font-family:'Open Sans';" class="login">
						<option>Admin</option>
						<option>Dispatcher</option>
					</select>
				</div> <!-- /field -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				<button type="submit" name="save" class="button btn btn-primary btn-large">Register</button>
				<a href="profile.php"><button type="button" style="margin-right:20px;" class="button btn btn-primary btn-large">Cancel</button></a>
			</div> 
			<!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<script src="js/js/jquery-1.7.2.min.js"></script>
<script src="js/js/bootstrap.js"></script>
               
<script src="js/js/signin.js"></script>