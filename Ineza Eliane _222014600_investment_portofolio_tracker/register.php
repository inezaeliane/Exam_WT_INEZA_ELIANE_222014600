<?php
include('database_connection.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['uname'];
$email = $_POST['email'];
$Phone = $_POST['phone'];
$country =$_POST['country'];
$usertype =$_POST['usertype'];
$password = $_POST['password'];
$confirm =$_POST['confirm'];

$sql = "INSERT INTO user (FirstName, LastName, 	Username, Email, Telephone, Country,user_type,
	Password,ComfirmPassword) VALUES ('$fname','$lname','$username','$email','$Phone','$country','$usertype','$password','$confirm')";

if ($conn->query($sql) === TRUE) {
   echo "successfully registered!";
   header("Location: index.html");
   exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
