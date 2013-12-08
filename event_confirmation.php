<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="manages our time-event confirmation page" />
<meta name="keywords" content="time management cs50 final project" />
<meta name="author" content="Monica Mishra" />

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

<title>Plan my life, CS50</title>

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

		<div id="content">

		<?php

		// if the user submits the event form	
		if ($_SERVER["REQUEST_METHOD"] == "POST")
  	{

  		// check the responses from the user for validity.
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
	  	// if hours field is empty
	  	else if (empty($hours)) 
	  	{
	  		apologize("Please insert hours.");
	  	}
		  // if hours is not an integer
		else if (!(is_int($hours) || $hours >= 0))
		{
		    apologize("Please insert positive integer for hours.");
		}
      
		  //Now that all the input is valid, we can insert the events into the calendar
		  //Authorizing the user using Oauth 2.0
  			require_once 'includes/google-api-php-client/src/Google_Client.php';
			require_once 'includes/google-api-php-client/src/contrib/Google_CalendarService.php';
			session_start();

			//code given by google
			$client = new Google_Client();
			$client->setApplicationName("Time Manangement for CS50, yo");
			
			$client->setClientId('785571230762-gu77rjf99i6lbq49glksgnb4g0eak919.apps.googleusercontent.com');
			$client->setClientSecret('ouORC5VnePidUCcloBeMjWVZ');
			$client->setRedirectUri('http://localhost/timemanagement.cs50/event_confirmation.php');
			
			//$cal is the calendar being modified
			$cal = new Google_CalendarService($client);

			//logout function
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
			
			//now the user is authenticated and entered proper inputs
			//now we insert the events
			if ($client->getAccessToken()) 
			{
				$present = strtotime(date('Y-m-d H:i:s'));

				$start_day = strtotime(date("Y-m-d", $present));
        		$start_time = strtotime(date("H:i:s", $present));

				$number_of_days = ceil(((strtotime($due_date) - $start_time) / 86400));
        		$daily_event_time = ((float) $hours / $number_of_days) * 3600;

        		if($daily_event_time >= 86400)
        		{
          			apologize("Not enough time to complete assignment. Enter lower estimated total time.");
        		}

        		$future = $present + $daily_event_time;

        		$end_day = strtotime(date("Y-m-d", $future));
        		$end_time = strtotime(date("H:i:s", $future));

        		$summary = $type." ".$name;
        
        		for($i = 0; $i <= $number_of_days; $i++)
        		{
        
          			$event = new Google_Event();
  
          			$event->setSummary($summary);
    
          			$start = new Google_EventDateTime();
          			$end = new Google_EventDateTime();

          			$date_start_day = strtotime("+".$i." day", $start_day);         
          			$date_end_day = strtotime("+".$i." day", $end_day);

          			$date_start = date("Y-m-d", $date_start_day)."T".date("H:i:s", $start_time).".000-07:00";
          			$date_end = date("Y-m-d", $date_end_day)."T".date("H:i:s", $end_time).".000-07:00";
  
          			$start->setDateTime($date_start);
          			$end->setDateTime($date_end);
  
          			$event->setStart($start);     
          			$event->setEnd($end);
  
          			$cal->events->insert('timemanagement.cs50@gmail.com', $event);
        		}         
        		// render event_confirmation_form to display the confirmation
        		render('event_confirmation_form.php', ["hours" => $hours,"type" => $type, "name" => $name, "due_date" => $due_date, "daily_event_time" => ($daily_event_time/3600), "number_of_days" => $number_of_days]);
				
				$_SESSION['token'] = $client->getAccessToken();
			} 

			// user is not authorized. Authorize them.
			else 
			{
				$authUrl = $client->createAuthUrl();
			  print "<a class='login' href='$authUrl'>Authorize Me, please!</a>";
			}
	  } 
        
    else
    {
		 	require_once 'includes/google-api-php-client/src/Google_Client.php';
      require_once 'includes/google-api-php-client/src/contrib/Google_CalendarService.php';
      session_start();

      //code given by google
      $client = new Google_Client();
      $client->setApplicationName("Time Manangement for CS50, yo");
      
      $client->setClientId('785571230762-gu77rjf99i6lbq49glksgnb4g0eak919.apps.googleusercontent.com');
      $client->setClientSecret('ouORC5VnePidUCcloBeMjWVZ');
      $client->setRedirectUri('http://localhost/timemanagement.cs50/event_confirmation.php');
      
      //$cal is the calendar being modified
      $cal = new Google_CalendarService($client);

      //logout function
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
      
      //now the user has an access token and can be redirected back to add an event
      if ($client->getAccessToken()) 
      {
        print("<a href=\"event.php\">You've been authorized! Add an event!</a>");
        $_SESSION['token'] = $client->getAccessToken();
      } 
      // user is not authorized. Authorize them.
      else 
      {
        $authUrl = $client->createAuthUrl();
        print "<a class='login' href='$authUrl'>Authorize Me, please!</a>";
      } 
      
    } 

		?>

    	<form action="index.php" method="post">

		<div id="confirmation">

		<button type="submit">View Calendar</button>

		</div>

		</div>
			
		<?php include('includes/footer.php'); ?>

	</div> 

	</body>

</html>