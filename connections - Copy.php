<?php 
$hostname = "localhost"; // Change this if your database is hosted elsewhere
$username = "root";
$password = "";
$database = "login_system"; // Name of the database

// Create connection
$connections = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$connections) {
    die("Connection failed: " . mysqli_connect_error());
} else {
}
?>