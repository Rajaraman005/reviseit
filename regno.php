<?php
$servername = "localhost";
$username = "root";  // Change if needed
$password = "";  // Change if needed
$dbname = "reviseit";  // Change to your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the registration number from AJAX request
$reg_no = $_POST['reg_no'];

$sql = "SELECT * FROM regno WHERE regno = '$reg_no'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "success"; // User exists
} else {
    echo "not_found"; // User does not exist
}

$conn->close();
?>
