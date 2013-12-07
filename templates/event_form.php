<form action="event_confirmation.php" method="post">
<div id="assignment">
		<script>
		function assignment()
		{
			var mylist=document.getElementById("myList");
			document.getElementById("favorite").value=mylist.options[mylist.selectedIndex].text;
			(a.options[a.selectedIndex].value);		
		}


		</script>
		Select your assignment:
		<select id="myList" onchange="assignment()">
		  <option></option>
		  <option value="paper">paper </option>
		  <option value="pset">pset </option>  
		  <option value="exam">exam </option>
		</select>

		<p>Your assignment is: a <input autofocus class="form-control" name="type" placeholder="type of assignment" type="text" id="favorite" size="20"></p>

		<!-- form for paper
		<div id="paperform" Object.style.visibility="visible"><p>
		hours needed for: <br> 
			1) research: <input type="text" id="research" size="20"><br>
			2) outlining: <input type="text" id="outlining" size="20"><br></p>
		</div>
		
		-->
	<br>
</div>

<div id="name">
	<?php 
		echo "Create name for assignment.";
	?>
	<input autofocus class="form-control" name="name" placeholder="name of assignment" type="text"/>
	  	
	<br>
	<br>
</div>

<div id="due date">
	<?php 
		echo "Select due date.";
	?>

	<br>
	<script type="text/javascript" src="http://www.snaphost.com/jquery/Calendar.aspx"></script> 
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
<button type="submit">Submit</button>
</form> 