<?php
	$user= $_POST['user'];
    $email= $_POST['email'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','squarelemon');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into userinfodata(user, email, message) values(?, ?, ?)");
		$stmt->bind_param("sss", $user, $email, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Message Sent successfully...";
	}
?>