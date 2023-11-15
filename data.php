<?php
// Database configuration
$conn = mysqli_connect('localhost', 'root', '', 'db_waterbilling') or die("Database Connection failed.");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the GET request is received
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["data"])) {
    // Extract the data from the GET request
    $data = $_GET["data"];

    // Escape special characters in the data to prevent SQL injection
    $data = $conn->real_escape_string($data);

    // Prepare the SQL statement
    $sql = "INSERT INTO watercon (consumption, price) VALUES ('$data', '10')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request";
}

// Close the database connection
$conn->close();
?>
