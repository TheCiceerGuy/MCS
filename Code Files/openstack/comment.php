<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user is logged in
    if (!isset($_SESSION['username'])) {
        echo "You need to be logged in to leave a comment.";
        exit();
    }

    // Retrieve the comment data
    $comment = $_POST['comment'];
    
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
    
    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO comments (username, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $_SESSION['username'], $comment);
    
    if ($stmt->execute()) {
        echo "Comment added successfully.";
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
