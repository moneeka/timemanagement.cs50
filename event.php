<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="manages our time-add event page" />
<meta name="keywords" content="time management cs50 final project" />
<meta name="author" content="Monica Mishra" />

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

<title>Plan mah lyfe CS50</title>

</head>

	<body>

	<div id="wrapper">

		<?php 
			include('includes/header.php'); 
			include('includes/nav.php'); 
			require('includes/functions.php');
		?>

		<div id="form">

			<?php
			
				if ($_SERVER["REQUEST_METHOD"] == "POST")
  				{
       				$hours = $_POST["hours"];
       				print $hours;
       				$name = $_POST["name"];
       				print $name;
       				$type = $_POST["type"];
       				print $type;
        		}
	
    			else
    			{
    				render('event_form.php', ["title" => "event form"]);
    			}
		
    		?>

		</div>


		
		<?php include('includes/sidebar.php'); ?>		
		<?php include('includes/footer.php'); ?>

	</div> 

	</body>

</html>