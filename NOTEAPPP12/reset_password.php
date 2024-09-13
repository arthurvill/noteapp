<?php
// Database connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "rap"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email from the form
    $email = $_POST["email"];

    // Add your password reset logic here
    // For example, you might generate a unique token and send it to the user's email
    // You could also update the password in the database if a valid token is provided

    // For demonstration purposes, let's assume we send a confirmation message
    $confirmationMessage = "Password reset instructions have been sent to your email.";

    // Display the confirmation message
    echo $confirmationMessage;
}

// Close the database connection
$conn->close();
?>
