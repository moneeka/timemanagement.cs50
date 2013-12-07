<form action="event_confirmation.php" method="post">
	<div id="type">	
		Select your assignment:
		<select id="myList" onchange="assignment()">
		  <option></option>
		  <option value="paper">paper </option>
		  <option value="pset">pset </option>  
		  <option value="exam">exam </option>
		</select>
		<p>Your assignment is: a <input autofocus class="form-control" name="type" placeholder="type of assignment" type="text" id="favorite" size="20"></p>
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

	<div id="date">
		<?php 
			echo "Select due date.";
		?>
		<br>
		<input autofocus class="form-control" name="date" placeholder="due date" type="text"/>
		<b>Valid date format:</b> mm/dd/yyyy<br />
		<br>
		<br>
	</div>
	<div id="hours">
		<?php 
			echo "Input number of hours to be spent on this assignment.";
		?>
		<br>
		<input autofocus class="form-control" name="hours" placeholder="hours spent" type="text"/>	
		<br>
		<br>
	</div>
	<button type="submit" name="submit">Submit</button>
</form> 

