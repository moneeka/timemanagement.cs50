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

					for($i = 0; $i<4; $i++)
					{
					
					$event = new Google_Event();
	
					$summary = "Test Event for loops34";
					$location = "12 Prescott St, Cambridge, MA 02138";
	
					$event->setSummary($summary);
					$event->setLocation($location);
		
					$start = new Google_EventDateTime();
					$end = new Google_EventDateTime();

					$date_start_day = strtotime("+".$i." day", strtotime(date('Y-m-d')));

					$date_end_day = strtotime("+".$i." day", strtotime(date('Y-m-d')));

					$date_start = date("Y-m-d", $date_start_day)."T02:00:00.000-07:00";
					$date_end = date("Y-m-d", $date_end_day)."T16:00:00.000-07:00";
	
					$start->setDateTime($date_start);
					$end->setDateTime($date_end);

					$start->setTimeZone('America/New_York');
					$end->setTimeZone('America/New_York');
	
					$event->setStart($start);			
					$event->setEnd($end);
	
					$cal->events->insert('timemanagement.cs50@gmail.com', $event);

				}

					$hours = $_POST["hours"];
  					$type = $_POST["type"];
  					$name = $_POST["name"];

  					render('event_confirmation_form.php', ["hours" => $hours,"type" => $type, "name" => $name]);
					
					
					$_SESSION['token'] = $client->getAccessToken();
				} 
	
				else 
				{
				  $authUrl = $client->createAuthUrl();
				  print "<a class='login' href='$authUrl'>Authorize Me, please</a>";
				}
  		
        	}

    		else
    		{
    			print("<p>No Data entered. <a href='index.php'>Redirect</a> </p>");
    		}
		
    	?>

    	<form action="index.php" method="post">

		<div id="confirmation">

		<button type="submit">View Calendar</button>

		</div>
		
		<?php include('includes/sidebar.php'); ?>		
		<?php include('includes/footer.php'); ?>

	</div> 

	</body>

</html>