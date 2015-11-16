<!DOCTYPE php>
<html>
	<head><title>CISC 4900 Project</title></head>
	
	<body>
	<p style="font-size:40px; text-align:center">Welcome to my Senior Project!</p>

<?php 
	//generates random number
	function num(){
		$num = rand(0,9);
		return $num;
	}

	//generates random character
	function char(){
		$char = array("a", "A", "b", "B", "c", "C", "d", "D", "e", "E", 
				"f", "F", "g", "G", "h", "H", "i", "I", "j", "J", "k", 
				"K", "l", "L", "m", "M", "n", "N", "o", "O", "p", "P", 
				"q", "Q", "r", "R", "s", "S", "t", "T", "u", "U", "v", 
				"V", "w", "W", "x", "X", "y", "Y", "z", "Z");
		$choose = rand(0,51);
		$letter = $char[$choose];
		return $letter;
	}

	//generates random password
	function pass_gen(){
		$pw = array();

		for($i=0; $i<7; $i++){
			$guess = rand(0,1);
			//returns num 0-9
			$num = num();		
			//returns random letter
			$char = char();		

			if($guess==0){
				array_push($pw, $char);
			} else {
				array_push($pw, $num);
			}
		}	//end for loop

		//converts array into string
		$pass = implode($pw);
		return $pass;
	}

	//generates random email
	function email_gen(){
		$em = array();
		$em_ext = array("@gmail.com", "@yahoo.com", "@AOL.com");
		$back = rand(0,2);

		//generates random email address
		for($i=0; $i<10; $i++){
			$guess = rand(0,1);
			//returns num 0-9
			$num = num();		
			//returns random letter
			$char = char();		

			if($guess==0){
				array_push($em, $char);
			} else {
				array_push($em, $num);
			}
		}	//end for loop

		//converts array into string
		$email = implode($em).$em_ext[$back];
		return $email;
	}

	//generates random first name
	function fname_gen(){
		$first = array();
		$long = rand(4,6);

		for($i=0; $i<$long; $i++){
			//returns random letter
			$char = char();			
			array_push($first, $char);
		}	//end for loop

		//converts array into string + lowercase
		$name = implode($first);
		$fname = strtolower($name);
		return $fname;
	}

	//generates random last name
	function lname_gen(){
		$last = array();
		$long = rand(5,7);

		for($i=0; $i<$long; $i++){
			//returns random letter
			$char = char();			
			array_push($last, $char);
		}	//end for loop

		//converts array into string + lowercase
		$name = implode($last);
		$lname = strtolower($name);
		return $lname;
	}

	//generates random date in comp time
	function created(){
		$created = time();
		return $created;
	}

	//generates random UNIX time
	function real_name_created(){
		$date = mktime();
		return $date;
	}

	//CREATES CONNECTION to mySQL DATABASE
	$link = mysqli_connect('localhost', 'root', 'root', 'bcml_qa');
			
	if (!$link) {
   		die('Could not connect: ' .mysqli_error());
	} else {
		echo 'SQL/PHP Connection: Successful <br><br>';
	}

	//STORES UIDS INTO PHP ARRAY
	$sql="SELECT uid FROM users";
	$result= mysqli_query($link, $sql);
			
	$uid_array = array();
	while($row = mysqli_fetch_assoc($result)) {
		//stores UID in UID_ARRAY
   		array_push($uid_array, $row['uid']);
	}
	$length = count($uid_array);


	//UPDATES DATA TO mySQL DATABASE
	foreach($uid_array as $array_index => $uid){
		$pass = pass_gen();
		$created = created();
		$email = email_gen();
		$fname = fname_gen();
		$lname = lname_gen();
		$rnc = real_name_created();

		if($array_index == 0){
			$sql = "UPDATE users SET pass='".$pass."', created='".
					$created."', mail='".$email."', fname='".$fname.
					"', lname='".$lname."', real_name_created='".$rnc.
					"' WHERE uid ='".$uid."';" ;
		} else {
			$sql .= "UPDATE users SET pass='".$pass."', created='".
					$created."', mail='".$email."', fname='".$fname."', 
					lname='".$lname."', real_name_created='".$rnc.
					"' WHERE uid ='".$uid."';" ;
		}
	}
	unset($uid, $array_index);

	//CONFIRMS SQL/PHP CONNECTION
	if (mysqli_query($link, $sql)) {
    	echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . mysqli_error($link);
	}

	//DISPLAYS DATABASE ON WEBPAGE	
	$sql="SELECT uid,pass,created,mail,fname,lname,real_name_created FROM users";
	$result= mysqli_query($link, $sql);

	if (mysqli_num_rows($result)>0) {
		//creates table
		echo "<table border = 5px>";

		//displays heading
		echo "<tr>"."<td><center>UID</td>"."<td><center>PASSWORD</td>".
			"<td><center>CREATED</td>"."<td><center>EMAIL</td>".
			"<td><center>FNAME</td>"."<td><center>LNAME </td>".
			"<td><center>REAL_NAME_CREATED</td>"."</tr>";
				
		//outputs data of each row
		for($i=0; $i<$length; $i++){
			$row=mysqli_fetch_assoc($result);
			echo "<tr><td><center>".$row["uid"]."</td><td><center>".$row["pass"].
				"</td><td><center>".$row["created"]."</td><td><center>".$row["mail"]. 
				"</td><td><center>".$row["fname"]."</td><td><center>".$row["lname"]. 
				"</td><td><center>".$row["real_name_created"]."</td></tr>";
		}

		//close table
		echo "</table>";
	} else {
		echo "0 results";
	}

	//closes webpage database connection
	mysqli_close($link);
?>
	</body>
</html>