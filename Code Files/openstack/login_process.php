<?php
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "openstack";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Authenticate user
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  // If authentication is successful, set session variables
  $_SESSION['username'] = $username;

  // Redirect to index page
  header("Location: index.php");
  exit();
} else {
  // Authentication failed
  echo "Invalid username or password.";
}

// Close the database connection
$conn->close();
?>
