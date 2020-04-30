<?php include ('db/dbcon.php'); ?>
<?php include ('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bus Dispatch and Information System</title>
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link id="bootstrap-style" href="css/slide.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
<!-- end: Favicon -->

<?php
//$user_query  = mysql_query("select * from admin where adminid = '$id_session'")or die(mysql_error());
//$user_row =mysql_fetch_array($user_query);
//$user_type  = $user_row['user_type'];
?> 	
	

					<?php //if ($user_type == 'Dispatcher'){
					?>
<script>
<!--

/*
Auto Refresh Page with Time script
By JavaScript Kit (javascriptkit.com)
Over 200+ free scripts here!
*/

//enter refresh time in "minutes:seconds" Minutes should range from 0 to inifinity. Seconds should range from 0 to 59
var limit="0:25"

var doctitle = document.title
var parselimit=limit.split(":")
parselimit=parselimit[0]*60+parselimit[1]*1

function beginrefresh(){
	if (parselimit==1)
		window.location.reload()
	else{ 
		parselimit-=1
		curmin=Math.floor(parselimit/60)
		cursec=parselimit%60
		if (curmin!=0)
			curtime=curmin+" minutes and "+cursec+" seconds left until page refresh!"
		else
			curtime=cursec+" seconds left until page refresh!"
		document.title = doctitle + ' (' + curtime +')'
		setTimeout("beginrefresh()",1000)
	}
}

if (window.addEventListener)
	window.addEventListener("load", beginrefresh, false)
else if (window.attachEvent)
	window.attachEvent("load", beginrefresh)

//-->
</script>	
					<?php //} ?>
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="dashboard.php"><span>Bus Dispatch and Information System</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<?php
								include('db/dbcon.php');
								$user_query=mysqli_query($connect,"select *  from admin where adminid='$id_session'")or die(mysql_error());
								$row=mysqli_fetch_array($user_query); {
							?>
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon user white"></i> <?php echo $row['firstname']; ?>
								<span class="caret"></span>
							</a>
<?php } ?>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
<?php
$user_query  = mysqli_query($connect,"select * from admin where adminid = '$id_session'")or die(mysqli_error());
$user_row =mysqli_fetch_array($user_query);
$user_type  = $user_row['user_type'];
?>  
					<?php if ($user_type == 'Admin'){
					?>
								<li><a href="profile.php"><i class="halflings-icon user"></i> User List</a></li>
					<?php } ?>
								<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="dashboard.php"><i class="halflings-icon home white"></i><span class="hidden-tablet"> Home</span></a></li>	
					<?php if ($user_type == 'Admin'){
					?>
						<li><a href="dispatcher.php"><i class="halflings-icon user white"></i><span class="hidden-tablet"> Dispatcher Profile</span></a></li>	
					<?php } ?>
						<li><a href="driver.php"><i class="halflings-icon user white"></i><span class="hidden-tablet"> Driver Profile</span></a></li>	
	
						<li><a href="report.php"><i class="halflings-icon th white"></i><span class="hidden-tablet"> Reports</span></a></li>
						<li><a href="bus.php"><i class="halflings-icon info-sign white"></i><span class="hidden-tablet"> Bus Information</span></a></li>	
						<li><a href="branch.php"><i class="halflings-icon info-sign white"></i><span class="hidden-tablet"> Branch Information</span></a></li>	
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			