<form action="event_confirmation.php" method="post">
	
	<!--selecting type of assignment-->
	<div id="type">	
		Select your assignment:
		<!--dropdown menu-->
		<select id="myList" onchange="assignment()">
		  <option></option>
		  <option value="paper">Paper </option>
		  <option value="pset">Pset </option>  
		  <option value="exam">Exam </option>
		</select>
		<!--autopopulating textbox-->
		<p>Your assignment is: a <input autofocus class="form-control" name="type" placeholder="type of assignment" type="text" id="favorite" size="20"></p>
		<br>
	</div>

	<!--naming assignment-->
	<div id="name">
		<?php 
			echo "Create name for assignment.";
		?>
		<!--textbox-->
		<input autofocus class="form-control" name="name" placeholder="name of assignment" type="text"/>  	
		<br>
		<br>
	</div>

	<!--inserting due date-->
	<div id="date">
		<?php 
			echo "Select due date.";
		?>
		<br>
		<!--dropbox-->
		<input autofocus class="form-control" name="date" placeholder="due date" type="text"/>
		<b>Valid date format:</b> mm/dd/yyyy<br />
		<br>
		<br>

	<!--inputting estimated hours-->
	</div>
	<div id="hours">
		<?php 
			echo "Input number of hours to be spent on this assignment.";
		?>
		<br>
		<!--textbox-->
		<input autofocus class="form-control" name="hours" placeholder="hours spent" type="text"/>	
		<br>
		<br>
	</div>
	<!--submit button-->
	<button type="submit" name="submit">Submit</button>
</form> 

