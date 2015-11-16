<?php

$host = "localhost";
$user = "root";
$pass = "root"; 
$db = "bcml_qa";

//creates link to database
mysql_connect($host, $user, $pass) or die("$sql_error".mysql_error());
mysql_select_db($db) or die("OOPS! Something went wrong at Database selection");

//when username info input is in...
if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql="SELECT * FROM users WHERE mail='".$username."'AND pass='".$password."'LIMIT 1";
	$res= mysql_query($sql);

	//sql returns 1 valid row from users table
	if(mysql_num_rows($res) == 1){

		echo "<br><br><br><br><center> You have successfully logged in! <br><br>";

		$sql = "SELECT uid, fname FROM users WHERE mail = '".$username."';";
		$result = mysql_query($sql);
		$row=mysql_fetch_assoc($result);
		$uid = $row["uid"];
		$fname = $row["fname"];
		echo "<center><strong> Welcome back, " .$fname. "! <br>";
		echo "<center><strong> Your UID is: " .$uid. "<br><br><br>";
		
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

			//displays list of courses connecting to test_scores.php file (if any)
			if (mysql_num_rows($result)>0) {
				while($row=mysql_fetch_assoc($result)){
					//creates URL domain and $_GET parameter
					echo "<br><a href='test_scores.php?uid=".$uid."&cid=".$cid."'>". 
						$row["course_name"] ."</a><br>";
				
				}
			} else {
				echo "<center><strong>No courses available";
			}	
		}
		unset($cid);

		exit(); 
	} else {
		echo "Invalid login information. Please try again.";
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; 
    			any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>CISC4900 Project Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Please Login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="username" type="email" id="inputEmail" class="form-control" 
        		placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" 
        		class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->

  </body>
</html>

