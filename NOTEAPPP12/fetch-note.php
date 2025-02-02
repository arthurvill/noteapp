<?php
// Establish connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rap"; // Assuming "rap" is the name of your database

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch notes from the database
$sql = "SELECT id, title, description, is_favorite, is_archived, user_id FROM notETABLE"; // Updated table name to "notess" and included "user_id"
$result = $conn->query($sql);

$notes = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $note = array(
            "id" => $row["id"],
            "title" => $row["title"],
            "description" => $row["description"],
            "is_favorite" => $row["is_favorite"], // Include is_favorite field
            "is_archived" => $row["is_archived"], // Include is_archived field
            "user_id" => $row["user_id"] // Include user_id field
        );
        // Add each note to the array
        array_push($notes, $note);
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();

// Output the notes data in JSON format
echo json_encode($notes);
?>
