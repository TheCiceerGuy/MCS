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

// Register user
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if username or email already exists
$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Username or email already exists.";
} else {
  // Insert new user into database
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
  if ($conn->query($sql) === TRUE) {
    echo "Registration successful. You can now login.";
    header("Location: index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close the database connection
$conn->close();
?>
