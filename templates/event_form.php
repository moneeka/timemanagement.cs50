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
		<p>Your assignment is a: <input autofocus class="form-control" name="type" placeholder="type of assignment" type="text" id="favorite" size="20"></p>
	</div>

	<!--naming assignment-->
	<div id="name">
		<?php 
			echo "Assignment details <i>(eg \"The Vietnamese War\")</i>";
		?>
		<!--textbox-->
		<input autofocus class="form-control" name="name" placeholder="name of assignment" type="text"/>  	
		<br>
		<br>
	</div>

	<!--inserting due date-->
	<div id="date">
		<?php 
			echo "Assignment due date <b>(mm/dd/yyyy)</b>:";
		?>
		<!--textbox-->
		<input autofocus class="form-control" name="date" placeholder="due date" type="text"/>
		
		<br>
		<br>

	<!--inputting estimated hours-->
	</div>
	<div id="hours">
		<?php 
			echo "Estimated number of hours to be spent on this assignment:";
		?>
		<!--textbox-->
		<input autofocus class="form-control" name="hours" placeholder="hours estimated" type="text"/>	
		<br>
		<br>
	</div>
	<!--submit button-->
	<button type="submit" name="submit">Submit</button>
</form> 

