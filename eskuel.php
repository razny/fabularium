<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT kategoria FROM pierwsze50"; // Modify the query to select only unique values of "kategoria"
$result = $conn->query($sql);

$count = 0; // Initialize count variable

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // Explode the categories by comma and count each separately
        $categories = explode(",", $row["kategoria"]);
        $count += count($categories);
    }
} else {
    echo "0 results";
}

$conn->close();

echo "Total number of categories: " . $count;
?>
