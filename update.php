<?php
	$con = mysqli_connect("localhost", "root", "root") or die("Oops some thing went wrong");
	mysqli_select_db($con, "pokemon") or die("Oops some thing went wrong");
	$username = $_POST['username'];
	$wins = $_POST['wins'];
	$sql = "UPDATE users SET wins=".$wins." WHERE username='".$username."'";
	if (mysqli_query($con, $sql)) {
		echo "$username has $wins wins DB updated";
	}
	else{
		echo "error";
	}
    mysqli_close($con);
?>