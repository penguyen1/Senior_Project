<!-- THIS IS YOUTUBE VERSION login.php PAGE; INCLUDES config.php; CONNECTS TO DATABASE; (DISPLAYS CLASS COURSE NAMES IN A TABLE???) -->

<?php
	session_start();
  include("includes/config.php");
  
	/** $host = "localhost";
	$user = "root";
	$pass = "root"; 
	$db = "bcml_qa";

	//creates link to database
	mysql_connect($host, $user, $pass) or die("$sql_error".mysql_error());
	mysql_select_db($db) or die ("OOPS! Something went wrong at Database selection"); **/

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = addslashes($_POST['username']);
		$password = md5(addslashes($_POST['password']));
		$sql = "SELECT * FROM users WHERE mail = '".$username."' AND pass = '".$password."' LIMIT 1";
		$res = mysql_query($sql);

		//sql returns 1 valid row from users table
		if(mysql_num_rows($res) == 1){
		$_SESSION['login_admin']=$username;
		header("location: http://localhost/clogin/admin/");
		//enter class course name code here?
		}
	} else {
		echo "Invalid login information. Please try again.";
		exit();
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>CISC 4900 Project Login</title>

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
        <input name="username" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
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
