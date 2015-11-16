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

																					//STORES course_IDS INTO PHP ARRAY
			$sql = "SELECT course_id, course_name FROM bcml_course";
			$result = mysqli_query($link, $sql);
			$sql2 = "SELECT course_id, uid FROM bcml_course_user";
			$result2 = mysqli_query($link, $sql2);


			/*$courseID_array = array();
			while($row = mysqli_fetch_assoc($result)) {
				//stores course_ID in courseID_ARRAY
   				array_push($courseID_array, $row['course_id']);
			}
			$length = count($courseID_array);
			echo "length of courseID_array is: " .$length. "!<br><br>";

																					//UPDATES coursename onto PHP array
			$coursename = array();
			foreach($courseID_array as $id){
				
				$sql = "SELECT course_name FROM bcml_course WHERE course_id ='". $id ."';";

				if($id == 1){
					array_push($coursename[$id][1]);
				} else {

				}
				$coursename[$id][1] = "SELECT course_name FROM bcml_course WHERE course_id ='". $id ."';";
				echo "course_id {$id} class: {$coursename[$id][1]} <br>";

			}
			//echo $sql;
			unset($uid, $array_index);			*/

			//CONFIRMS SQL/PHP CONNECTION
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

/*																											//DISPLAYS DATABASE ON WEBPAGE	
			$sql="SELECT uid, pass, created, mail, fname, lname, real_name_created FROM users";
			$result= mysqli_query($link, $sql);

			if (mysqli_num_rows($result)>0) {
				//creates table
				echo "<table border = 5px>";

				//displays heading
				echo "<tr>" . "<td><center> UID </td>" . "<td><center> PASSWORD </td>" . "<td><center> CREATED </td>" 
					. "<td><center> EMAIL </td>" . "<td><center> FNAME </td>" . "<td><center> LNAME </td>". "<td><center> REAL_NAME_CREATED </td>" . "</tr>";
				
				//outputs data of each row
				/*for($i=0; $i<$length; $i++){
					$row=mysqli_fetch_assoc($result);
					echo "<tr><td><center>" . $row["uid"] . "</td><td><center>" . $row["pass"] . "</td><td><center>" . $row["created"] . "</td><td><center>" . $row["mail"] 
					. "</td><td><center>" . $row["fname"] . "</td><td><center>" . $row["lname"] . "</td><td><center>" . $row["real_name_created"] . "</td></tr>";
				}

				while($row=mysqli_fetch_assoc($result)){
					echo "<tr><td><center>" . $row["uid"] . "</td><td><center>" . $row["pass"] . "</td><td><center>" . $row["created"] . "</td><td><center>" . $row["mail"] 
					. "</td><td><center>" . $row["fname"] . "</td><td><center>" . $row["lname"] . "</td><td><center>" . $row["real_name_created"] . "</td></tr>";
				}

				//close table
				echo "</table>";
			} else {
				echo "0 results";
			}
*/
			//closes webpage database connection
			mysqli_close($link);
		?>
	</body>
</html>