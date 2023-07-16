<?php
// Process the contact form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Perform any necessary validations on the form data

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

    // Insert the contact form data into the database
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you for contacting us. We will get back to you soon.";
        header("Location: index.php");
    } else {
        echo "Oops! An error occurred while processing the form. Please try again later.";
    }

    // Close the database connection
    $conn->close();
}
?>
