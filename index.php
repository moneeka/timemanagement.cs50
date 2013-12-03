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
		
		<div id="content">
		
		<h2>Le Calendar</h2>

		<?php 
			//include('google-api-php-client/src/Google_Client.php');
			//require_once 'google-api-php-client/src/contrib/Google_CalendarService.php';
			//session_start();
			
			//$client = new Google_Client();
			//$client->setApplicationName("Google Calendar PHP Starter Application");
			//
			//// Visit https://code.google.com/apis/console?api=calendar to generate your
			//// client id, client secret, and to register your redirect uri.
			//$client->setClientId(785571230762-gu77rjf99i6lbq49glksgnb4g0eak919.apps.googleusercontent.com);
			//$client->setClientSecret(ouORC5VnePidUCcloBeMjWVZ);
			////$client->setRedirectUri('insert_your_oauth2_redirect_uri');
			////$client->setDeveloperKey('insert_your_developer_key');
			//$cal = new Google_CalendarService($client);
			//if (isset($_GET['logout'])) {
			//  unset($_SESSION['token']);
			//}
			//
			//if (isset($_GET['code'])) {
			//  $client->authenticate($_GET['code']);
			//  $_SESSION['token'] = $client->getAccessToken();
			//  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
			//}
			//
			//if (isset($_SESSION['token'])) {
			//  $client->setAccessToken($_SESSION['token']);
			//}
			//
			//if ($client->getAccessToken()) {
			//  $calList = $cal->calendarList->listCalendarList();
			//  print "<h1>Calendar List</h1><pre>" . print_r($calList, true) . "</pre>";
			//	
			//
			//$_SESSION['token'] = $client->getAccessToken();
			//} else {
			//  $authUrl = $client->createAuthUrl();
			//  print "<a class='login' href='$authUrl'>Connect Me!</a>";
			//}
		?>

	<!--	<iframe src="https://www.google.com/calendar/embed?src=timemanagement.cs50%40gmail.com&ctz=America/New_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no">
		</iframe> -->
		
		<h3>Paragraph Element</h3>
		
		<p>		
			Quisque pellentesque sodales aliquam. Morbi mollis neque eget arcu egestas non ultrices neque volutpat. Nam at nunc lectus, id vulputate purus. In et turpis ac mauris viverra iaculis. Cras sed elit a purus ultrices iaculis eget sit amet dolor. Praesent ac libero dolor, id viverra libero. Mauris aliquam nibh vitae eros sodales fermentum. Fusce cursus est varius ante vehicula eget ultrices felis eleifend. Nunc pharetra rutrum nibh et lobortis. Morbi vitae venenatis velit.		
		</p>

		</div> 
		
		<?php include('includes/sidebar.php'); ?>		
		<?php include('includes/footer.php'); ?>

	</div> 

	</body>

</html>