<?php

print("<p>Your assignment: ". $type." ". $name. "<br>
					Estimated number of hours needed to complete assignment: ". $hours. "<br>
					Today's date: 
						<script>
						var date=new Date();
						document.write(date);
						</script><br>
					Due date: ". $due_date."<br>
					Number of days until due date: <br>
					Number of hours to spend on assignment each day: <br>
					</p>");
?>