<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="manages our time-event confirmation page" />
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
			include('includes/sidebar.php');
		?>

		<div id="form">

		<?php
		//If the user submits the event form	
		if ($_SERVER["REQUEST_METHOD"] == "POST")
  		{

  		//Check the responses from the user for validity.
  			$hours = $_POST["hours"];
  			$type = $_POST["type"];
  			$name = $_POST["name"];
  			$due_date = $_POST["date"];

  			// if type field is empty
	  		if (empty($type)) 
	  		{
	  			apologize("Please select type of assignment.");
	  		}
	  		// if name field is empty
	  		else if (empty($name)) 
	  		{
	  			apologize("Please name your assignment.");
	  		}
	  		// if date field is empty
	  		else if (empty($due_date)) 
	  		{
	  			apologize("Please insert due date.");
	  		}
	  		// if date is not valid
		      /*	else if (checkdate((int) date("M", $date), (int) date("D", $date), (int) date("Y", $date))==false)
		      	{
		      	  	apologize("Please use valid date format.");
		      	} */
	  		// if hours field is empty
	  		else if (empty($hours)) 
	  		{
	  			apologize("Please insert hours.");
	  		}
		      	// if hours is not an integer
		    else if (!(is_int($hours) || $hours > 1))
		    {
		      	apologize("Please insert positive integer for hours.");
		    }


  			require_once 'includes/google-api-php-client/src/Google_Client.php';
			require_once 'includes/google-api-php-client/src/contrib/Google_CalendarService.php';
			session_start();

			$client = new Google_Client();
			$client->setApplicationName("Time Manangement for CS50, yo");
			
			$client->setClientId('785571230762-gu77rjf99i6lbq49glksgnb4g0eak919.apps.googleusercontent.com');
			$client->setClientSecret('ouORC5VnePidUCcloBeMjWVZ');
			$client->setRedirectUri('http://localhost/timemanagement.cs50/index.php');
			
			$cal = new Google_CalendarService($client);
			if (isset($_GET['logout'])) 
			{
			  	unset($_SESSION['token']);
			}
			
			if (isset($_GET['code'])) 
			{
				$client->authenticate($_GET['code']);
				$_SESSION['token'] = $client->getAccessToken();
				header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
			}
			
			if (isset($_SESSION['token'])) 
			{
			  	$client->setAccessToken($_SESSION['token']);
			}
			
			if ($client->getAccessToken()) 
			{
				$present = strtotime(date('Y-m-d H:i:s'));
				$current_day = strtotime(date("Y-m-d", $present));
				$current_time = strtotime(date("H:i:s", $present));
				
				print $present."<br>";
				print $current_time."<br>";
				print date("H:i:s", $present)."<br>";
				print $current_day."<br>";
				print date("Y-m-d", $present)."<br>";
				$number_of_days = (strtotime($due_date) - $current_time) / 86400;
				$daily_event_time = ($hours * 60 * 60) / $number_of_days;
			
				$date_start_time = $current_time;
				$date_end_time = $current_time + $daily_event_time;			
				$summary = $type." ".$name;
				
				/*for($i = 0; $i <= $number_of_days; $i++)
				{
				
					$event = new Google_Event();
	
					$event->setSummary($summary);
		
					$start = new Google_EventDateTime();
					$end = new Google_EventDateTime();
					$date_start_day = strtotime("+".$i." day", $current_day);
					print $date_start_day."<br>";
					$date_end_day = strtotime("+".$i." day", $current_day);
					print $date_end_day."<br>";
					$date_start = date("Y-m-d", $date_start_day)."T".date("H:i:s", $date_start_time).".000-07:00";
					print $date_start."<br>";
					$date_end = date("Y-m-d", $date_end_day)."T".date("H:i:s", $date_end_time).".000-07:00";
					print $date_end."<br>";
	
					$start->setDateTime($date_start);
					$end->setDateTime($date_end);
	
					$event->setStart($start);			
					$event->setEnd($end);
	
					//print "<p>".$event->getId()."</p>";
					//$test_var = 'monicamishra@college.harvard.edu';
	
					$cal->events->insert('timemanagement.cs50@gmail.com', $event);
				} */
				
				/*$eventList = $cal->events->listEvents("timemanagement.cs50@gmail.com");
				print $eventList[items];
				print "<h1>event List</h1><pre>" . print_r($eventList, true) . "</pre>";
				*/
  			/*	ANGEL EXAMPLE OF HOW TO TEST USER INPUTTED VALUES
  				if($hours == 1){
  					apologize("test message");
  				}
			*/
  				render('event_confirmation_form.php', ["hours" => $hours,"type" => $type, "name" => $name, "due_date" => $due_date]);
				
				$_SESSION['token'] = $client->getAccessToken();
			} 

			//User is not authorized. Authorize them.
			else 
			{
				$authUrl = $client->createAuthUrl();
			  	print "<a class='login' href='$authUrl'>Authorize Me, please!</a>";
			}
	  	} 
        
    	else
    	{
		 	print "No Data Entered. How did you get here? You are a crafty user!. <br>";	
    	}
		?>

    	<form action="index.php" method="post">

		<div id="confirmation">

		<button type="submit">View Calendar</button>

		</div>
			
		<?php include('includes/footer.php'); ?>

	</div> 

	</body>

</html>