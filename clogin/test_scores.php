<?php 			// does this file belong in the clogin folder? 

$host = "localhost";
$user = "root";
$pass = "root"; 
$db = "bcml_qa";

//creates link to database
mysql_connect($host, $user, $pass);
mysql_select_db($db);

	function displayTestScores($cid, $uid){
		$sql = "SELECT BN.alias AS test, BES.score AS grade FROM bcml_node AS BN, 
				bcml_eval_submission AS BES WHERE BES.nid=BN.nid AND 
				course_id = '".$cid."' AND uid = '".$uid."';";
		$result = mysql_query($sql) or die("$sql_error".mysql_error());

		if (mysql_num_rows($result)>0) {
			//creates table + heading
			echo "<table border = 1px>";
			echo "<tr><td><center><strong>TEST</td> <td><center><strong>SCORE</td></tr><br>";
				
			//outputs tests and scores of specified course
			while($row=mysql_fetch_assoc($result)){
				echo "<tr><td><center>".$row["test"]."</td><td><center>".$row["grade"]."</td></tr>";
			}

			//close table
			echo "</table>";
		} else {
			echo "<center><strong>No tests were taken in this course.";
		}
	}

//gets uid, course_id and calls function to display data
$uid = $_GET['uid'];
$cid = $_GET['cid'];
displayTestScores($cid, $uid)
?>

<!DOCTYPE HTML>
<html>
	<head><title>CISC 4900 Project</title></head>
	<body></body>
</html>