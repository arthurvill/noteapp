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
$title = $_POST['title'];
$description = $_POST['description'];

// Prepare and bind the SQL statement to update the note
$stmt = $conn->prepare("UPDATE notetable SET title = ?, description = ? WHERE id = ?");
$stmt->bind_param("ssi", $title, $description, $noteId);

// Execute the update statement
if ($stmt->execute()) {
    echo "Note updated successfully";
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>