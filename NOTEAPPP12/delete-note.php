<?php
// Establish a database connection (Replace the placeholders with your actual database credentials)
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

// Retrieve data from the POST request
$noteId = $_POST['id'];

// Prepare and bind the SQL statement to delete the note
$stmt = $conn->prepare("DELETE FROM notetable WHERE id = ?");
$stmt->bind_param("i", $noteId);

// Execute the deletion statement
if ($stmt->execute()) {
    echo "Note deleted successfully";
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>