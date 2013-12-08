<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="manages our time-home page" />
<meta name="keywords" content="time management cs50 final project" />
<meta name="author" content="Monica Mishra" />

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

<title>Plan mah lyfe CS50 Home</title>

</head>

	<body>

	<div id="wrapper">

		<?php include('includes/header.php'); ?>
		<?php include('includes/nav.php'); ?>
		<?php include('includes/sidebar.php'); ?>
		
		<div id="content">
		
		<h2>Le Calendar</h2>

		<?php 
			// Google Calendar for timemanagement.cs50@gmail.com
			$test_var = 'timemanagement.cs50%40gmail.com';
			print "<iframe src=\"https://www.google.com/calendar/embed?src=".$test_var."&ctz=America/New_York\" style=\"border: 0\" width=\"800\" height=\"600\" frameborder=\"0\" scrolling=\"no\">
		</iframe>";
		?>
		
		</div> 
	
		<?php include('includes/footer.php'); ?>

	</div> 

	</body>

</html>