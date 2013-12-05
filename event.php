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

		<?php include('includes/header.php'); ?>
		<?php include('includes/nav.php'); ?>

		
		
		<div id="trial message">

		<br>

		</div> 

		<div id="form">

			<form action="event.php" method="post">

			<?php
			
				if ($_SERVER["REQUEST_METHOD"] == "POST")
  				{
       				$hours = $_POST["hours"];
       				print $hours;
        		}
	
    			else
    			{
    				print "<p>Nope</p>";
    			}
		
    		?>

			<div id="assignment">

					<script>
					function assignment()
					{
						var mylist=document.getElementById("myList");
						document.getElementById("favorite").value=mylist.options[mylist.selectedIndex].text;						
					}
					</script>

					Select your assignment:
					<select id="myList" onchange="assignment()">
					  <option></option>
					  <option>paper</option>
					  <option>pset</option>  
					  <option>exam</option>
					</select>



					<!--form for paper
					<div id="paperform" Object.style.visibility="visible"><p>
					hours needed for: <br> 
						1) research: <input type="text" id="research" size="20"><br>
						2) outlining: <input type="text" id="outlining" size="20"><br></p>
					</div>-->


					<p>Your assignment is: a <input type="text" id="favorite" size="20"></p>

				<br>
				<br>

			</div>

			<div id="due date">

			<?php 
				echo "Select due date.";
			?>
				<br>
				<script type="text/javascript"
				src="http://www.snaphost.com/jquery/Calendar.aspx"></script> 

				<br>
				<br>

			</div>

			<div id="hours spent">


			<?php 
				echo "Input number of hours to be spent on this assignment.";
			?>
				<br>
				<input autofocus class="form-control" name="hours" placeholder="hours spent" type="text"/>
				  	
				<br>
				<br>

			</div>

			<button type="submit">Quote!</button>
			</form> 

		</div>
		
		<?php include('includes/sidebar.php'); ?>		
		<?php include('includes/footer.php'); ?>

	</div> 

	</body>

</html>