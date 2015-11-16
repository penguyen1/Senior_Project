<!DOCTYPE php>
<html>
	<head><title>CISC 4900 Project</title></head>
	
	<body>
		<p style="font-size: 40px; text-align: center">Welcome to my Senior Project!</p>
		<?php 
			
			//CREATES CONNECTION to mySQL DATABASE
			$link = mysqli_connect('localhost', 'root', 'root', 'bcml_qa');
			
			if (!$link) {
   				 die('Could not connect: ' . mysqli_error());
			} else {
				echo 'bcml_qa Connection: Successful <br><br>';
			}

			//CREATES CONNECTION TO bcml_course_user and bcml_course
			$sql = "SELECT course_id, course_name FROM bcml_course";
			$result = mysqli_query($link, $sql);
			$sql2 = "SELECT course_id, uid FROM bcml_course_user";
			$result2 = mysqli_query($link, $sql2);

			//CONFIRMS bcml_course_user and bcml_course CONNECTION
			if (mysqli_query($link, $sql)) {
    			echo "bcml_course Successful! <br><br>";
			} else {
    			echo "Error connecting bcml_course: " . mysqli_error($link);
			}

			if (mysqli_query($link, $sql2)) {
    			echo "bcml_course_user Successful! <br><br>";
			} else {
    			echo "Error connecting bcml_course_user: " . mysqli_error($link);
			}

			//this works on phpMyAdmin: 
			sql3 = "SELECT course_name FROM bcml_course AS BC, bcml_course_user AS BCU WHERE BCU.course_id = BC.course_id AND uid = $RETURN_UID_HERE;"



			//closes webpage database connection
			mysqli_close($link);
		?>
	</body>
</html>