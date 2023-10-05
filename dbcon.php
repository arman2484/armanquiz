<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "arman-quiz";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query the database to retrieve available technologies
$sql = "SELECT id, name FROM technologies";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Fetch the technologies and store them in an array
$technologies = array();
while ($row = mysqli_fetch_assoc($result)) {
    $technologies[] = $row;
}
?>