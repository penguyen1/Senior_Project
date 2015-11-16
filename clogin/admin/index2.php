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

    <title>Student Courses</title>

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
        <h1>Your Classes (by course name):</h1>

        <?php 
                  $host = "localhost";
                  $user = "root";
                  $pass = "root"; 
                  $db = "bcml_qa";

                  //creates link to database
                  mysql_connect($host, $user, $pass) or die("$sql_error".mysql_error());
                  mysql_select_db($db) or die ("OOPS! Something went wrong at Database selection");

                  
                    function displayTestScores($cid, $uid){
                      $sql = "SELECT BN.alias AS test, BES.score AS grade FROM bcml_node AS BN, bcml_eval_submission AS BES 
                            WHERE BES.nid = BN.nid AND course_id = '".$cid."' AND uid = '".$uid."';";
                      $result = mysql_query($sql) or die("$sql_error".mysql_error());

                      if (mysql_num_rows($result)>0) {
                        //creates table + heading
                        echo "<table border = 1px>";
                        echo "<tr><td><center><strong> TEST </td>  <td><center><strong> SCORE </td></tr><br>";
                          
                        //outputs tests and scores of specified course
                        while($row=mysql_fetch_assoc($result)){
                          echo "<tr><td><center>" .$row["test"]. "</td><td><center>" .$row["grade"]. "</td></tr>";
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
                  displayTestScores($cid, $uid);
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
