<!DOCTYPE php>
<html>
<head><title>CISC 4900 Project</title></head>
	
<body>
	<p style="font-size: 40px; text-align: center">Welcome to my Senior Project!</p>
	<?php 
			
		//CREATES CONNECTION to mySQL DATABASE
		$link = mysqli_connect('localhost', 'root', 'root', 'bcml_qa');
			
		if (!$link) { die('Could not connect: ' . mysqli_error()); } 
		else { 	echo 'bcml_qa Connection: Successful <br><br>'; }

		//CREATES CONNECTION TO bcml_course_user and bcml_course
		$sql = "SELECT course_id, course_name FROM bcml_course";
		$result = mysqli_query($link, $sql);
		$sql2 = "SELECT course_id, uid FROM bcml_course_user";
		$result2 = mysqli_query($link, $sql2);

		//CONFIRMS bcml_course_user and bcml_course CONNECTION
		if (mysqli_query($link, $sql)) {
    		echo "bcml_course Successful! <br><br>"; } 
    	else {
    		echo "Error connecting bcml_course: " . mysqli_error($link); }

		if (mysqli_query($link, $sql2)) {
    			echo "bcml_course_user Successful! <br><br>"; } 
    	else {
    			echo "Error connecting bcml_course_user: ".mysqli_error($link); }

		//creates a query of all courses taken by logged in UID
		$sql = "SELECT BC.course_id FROM bcml_course AS BC, bcml_course_user AS BCU 
				WHERE BCU.course_id = BC.course_id AND uid = '".$uid."';";
		$result = mysql_query($sql);
		$uid_courseID = array();		//stores course_id into this array

	
		if (mysql_num_rows($result)>0) {
			//creates table + heading
			echo "<table border = 1px>";
			echo "<tr><td><center><strong> Your Classes (course name): </td></tr><br>";
				
			//outputs course name of UID
			while($row=mysql_fetch_assoc($result)){
				//creates array of course_id's for specified UID
				array_push($uid_courseID, $row["course_id"]);
			}

			//close table
			echo "</table>";
		} else {
			echo "0 results";
		}

		//displays course_name for corresponding course_id
		foreach($uid_courseID AS $cid){
			$sql = "SELECT course_name FROM bcml_course WHERE course_id = '".$cid."' ;";
			$result = mysql_query($sql);

			//displays list of course names 
			if (mysql_num_rows($result)>0) {
				while($row=mysql_fetch_assoc($result)){
					echo "<br>".$row["course_name"]."<br>";
				}
			} else {
				echo "<center><strong>No courses available";
			}	
		}
		unset($cid);

		//closes webpage database connection
		mysqli_close($link);
	?>
	</body>
</html>