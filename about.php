<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="manages our time-about page" />
<meta name="keywords" content="time management cs50 final project" />
<meta name="author" content="Monica Mishra" />

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

<title>About Page</title>

</head>

	<body>

	<div id="wrapper">

		<?php include('includes/header.php'); ?>
		<?php include('includes/nav.php'); ?>
		
		<div id="content">
		
		<h3>Welcome! <?php echo $appName ?></h3>
		
		<p>
			Welcome to timemanagement.cs50! Here you will find an easy and managable tool that will help you use your time 
			wisely and avoid missing deadlines. To begin, simply click on the "Add An Assignment" tab, fill 
			out the short form, and click submit! 
		</p>
		
		
		<h3>How To Use</h3>
		
		<p> 
			The "Home" page allows you to view your calendar. To begin planning, click on the "Add An Assignment" tab. 
			Use the dropdown menu to select the type of assignment you wish to add to your calendar, either a paper, pset, or exam. 
			Confirm your choice by editing the textbox below, which should autopopulate upon your selection 
			of an option in the dropdown. Create a name for your assignment. Proceed to enter the due 
			date for the assignment, making sure to use the valid date format mm/dd/yyyy. Input the estimated 
			amount of time needed to complete this assignment, and click "submit".
			
		</p>
		
		<p>
			You will be redirected to a confirmation page, which will calculate the amount of hours you should 
			spend on this assignment daily. Click "Authorize Me, please" to allow access to your Google Calendar. Click 
			"View Calendar" to see your schedule!
		</p>
		
		</div> 
		
		<?php include('includes/sidebar.php'); ?>
		<?php include('includes/footer.php'); ?>

	</div>

	</body>

</html>