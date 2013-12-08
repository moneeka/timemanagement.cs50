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
			
			if ($_SERVER["REQUEST_METHOD"] == "POST")
  			{
  				require_once 'includes/google-api-php-client/src/Google_Client.php';
				require_once 'includes/google-api-php-client/src/contrib/Google_CalendarService.php';
				session_start();
	
				$client = new Google_Client();
				$client->setApplicationName("Time Manangement for CS50, yo");
				
				// Visit https://code.google.com/apis/console?api=calendar to generate your
				// client id, client secret, and to register your redirect uri.
				$client->setClientId('785571230762-gu77rjf99i6lbq49glksgnb4g0eak919.apps.googleusercontent.com');
				$client->setClientSecret('ouORC5VnePidUCcloBeMjWVZ');
				$client->setRedirectUri('http://localhost/timemanagement.cs50/index.php');
				//$client->setDeveloperKey('insert_your_developer_key');
				
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
					
					for($i = 1; $i<2; $i++)
					{
					
						$event = new Google_Event();
		
						$summary = "adios";
						$location = "12 Prescott St, Cambridge, MA 02138";
		
						$event->setSummary($summary);
						$event->setLocation($location);
			
						$start = new Google_EventDateTime();
						$end = new Google_EventDateTime();
	
						$date_start_day = strtotime("+".$i." day", strtotime(date('Y-m-d')));
						$date_start_time = strtotime(date('H:i:s'));

						$date_end_day = strtotime("+".$i." day", strtotime(date('Y-m-d')));
						$date_end_time = strtotime(date('H:i:s'))+3600;

	
						$date_start = date("Y-m-d", $date_start_day)."T".date("H:i:s", $date_start_time).".000-07:00";
						$date_end = date("Y-m-d", $date_end_day)."T".date("H:i:s", $date_end_time).".000-07:00";
		
						$start->setDateTime($date_start);
						$end->setDateTime($date_end);
		
						$event->setStart($start);			
						$event->setEnd($end);
	
						
	
						//print "<p>".$event->getId()."</p>";
		
						$cal->events->insert('timemanagement.cs50@gmail.com', $event);

					} 
					
					/*$eventList = $cal->events->listEvents("timemanagement.cs50@gmail.com");
					print $eventList[items];
					print "<h1>event List</h1><pre>" . print_r($eventList, true) . "</pre>";
					*/

					$hours = $_POST["hours"];
  					$type = $_POST["type"];
  					$name = $_POST["name"];
  					$date = $_POST["date"];	
	  			} 

	  			// if type field is empty
	  			if (empty($_POST["type"])) 
	  			{
	  				apologize("Please select type of assignment.");
	  			}

	  			// if name field is empty
	  			else if (empty($_POST["name"])) 
	  			{
	  				apologize("Please name your assignment.");
	  			}

	  			// if date field is empty
	  			else if (empty($_POST["date"])) 
	  			{
	  				apologize("Please insert due date.");
	  			}

	  			// if date is not valid
		       /*	else if (checkdate((int) date("M", $date), (int) date("D", $date), (int) date("Y", $date))==false)
		       	{
		       	  	apologize("Please use valid date format.");
		       	} */

	  			// if hours field is empty
	  			else if (empty($_POST["hours"])) 
	  			{
	  				apologize("Please insert hours.");
	  			}

		       	// if hours is not an integer
		       	else if (!(is_int($_POST["hours"]) || $_POST["hours"] > 1))
		       	{
		       		apologize("Please insert positive integer for hours.");
		       	}

		       	render('event_confirmation_form.php', ["hours" => $hours,"type" => $type, "name" => $name, "date" => $date]);
				$_SESSION['token'] = $client->getAccessToken();
  		
        	}

    		else
    		{
				// more else?	
			 	$authUrl = $client->createAuthUrl();
			 	print "<a class='login' href='$authUrl'>Authorize Me, please</a>";
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