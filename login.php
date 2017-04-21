<?php
	$con = mysqli_connect("localhost", "root", "root") or die("Oops some thing went wrong");
	mysqli_select_db($con, "pokemon") or die("Oops some thing went wrong");
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = mysqli_query($con, "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'");

	if(mysqli_num_rows($query) > 0){
		$user = mysqli_fetch_array($query);
						//echo $user['password'];
		$wins = $user['wins'];
		echo $wins;

	}
	else{
		echo "failure";
	}

    mysqli_close($con);
?>