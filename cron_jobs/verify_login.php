<?php


// Database connection details
$servername = "db5013859389.hosting-data.io";
$username = "dbu1470512";
$password = "Immokalee_34142";
$dbname = "dbs11591428";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Write the SQL query with COUNT() function to fetch total number of entries
$sql = "SELECT COUNT(*) as total_entries FROM properties";

// Execute the query and fetch data
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Fetch the total number of entries from the result
    $row = $result->fetch_assoc();
    $totalEntries = $row["total_entries"];

    echo "Total number of entries in the 'properties' table: " . $totalEntries;
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>