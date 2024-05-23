
<?php
include('database_connection.php');

$uname = $_POST['uname']; 
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE Username='$uname' AND Password='$password'";
$result =$conn->query($sql);
if ($result->num_rows >0) {
  // echo "successfully loggedin!";
  header("Location:Dashboard.php");
      exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
 
