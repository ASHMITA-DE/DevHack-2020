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
	
<script>
<!--

/*
Auto Refresh Page with Time script
By JavaScript Kit (javascriptkit.com)
Over 200+ free scripts here!
*/

//enter refresh time in "minutes:seconds" Minutes should range from 0 to inifinity. Seconds should range from 0 to 59
var limit="0:10"

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
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand"><span>Bus Dispatch and Information System</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li style="margin:10px;">
							<?php include('currentdate.php'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php include('clock_lcd.php'); ?>
						</li>
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
	

			
			<!-- start: Content -->
			
			