<!-- THIS FILE DISPLAYS THE CONTENTS OF THE STARTER TEMPLATE; INCLUDE course_names HERE -->

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

    <title>Course Tests and Scores</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
          padding-top: 50px;
        }
        .starter-template {
          padding: 40px 15px;
          text-align: center;
        }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CISC 4900</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="../logout.php">Log Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Tests and Scores:</h1>

        <?php 
                  $host = "localhost";
                  $user = "root";
                  $pass = "root"; 
                  $db = "bcml_qa";

                  //creates link to database
                  mysql_connect($host, $user, $pass) or die("$sql_error".mysql_error());
                  mysql_select_db($db) or die ("OOPS! Something went wrong at Database selection");

                  $sql = "SELECT uid, fname FROM users WHERE mail = '".$username."';";
                  $result = mysql_query($sql);
                  $row=mysql_fetch_assoc($result);
                  $uid = $row["uid"];
                  $fname = $row["fname"];
                  
                  //creates a query of all courses taken by logged in UID
                  $sql = "SELECT BC.course_id FROM bcml_course AS BC, bcml_course_user AS BCU WHERE BCU.course_id = BC.course_id AND uid = '".$uid."';";
                  $result = mysql_query($sql);
                  $uid_courseID = array();    //stores course_id into this array

                
                  if (mysql_num_rows($result)>0) {
                      
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
                        echo "<br><a href='test_scores.php?uid=".$uid."&cid=".$cid."'>". $row["course_name"] ."</a><br>";
                      
                      }
                    } else {
                      echo "<center><strong>No courses available";
                    } 
                  }
                  unset($cid);
        ?>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  </body>
</html>
