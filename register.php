<?php
	$con = mysqli_connect("localhost", "root", "root") or die("Oops some thing went wrong");
	mysqli_select_db($con, "pokemon") or die("Oops some thing went wrong");
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = mysqli_query($con, "SELECT * FROM users WHERE username='".$username."'");
					//username taken
		if(mysqli_num_rows($query) > 0){

    		echo '<script type="text/javascript">',
				  "alert('Username $username already exists');",
				  '</script>';
		}
		else{
						//username available
						//TODO make catch table
			$sql = "INSERT INTO users (username, password, wins) VALUES ('".$username."', '".$password."', 0 )";
			if (mysqli_query($con, $sql)) {
							    //login
							      //echo "New record created successfully $username<br>";
				echo "success";
			} else {
				echo "failure";
			}
		}
    mysqli_close($con);
?>