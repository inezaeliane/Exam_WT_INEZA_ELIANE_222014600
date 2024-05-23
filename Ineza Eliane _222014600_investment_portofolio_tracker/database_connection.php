<?php
// Connection
$servername = "localhost";
$username = "Inezaeliane";
$password = "222014600";
$dbname = "investment_portofolio_tracker";

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>