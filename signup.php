<?php
// Database connection
$servername = "reviseit-db.cvu6mm6w044c.ap-southeast-1.rds.amazonaws.com";   // Replace with your EC2 public IP
$username = "root";     // Replace with your MySQL username
$password = "password005";     // Replace with your MySQL password
$dbname = "reviseit";                  // Database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Secure password hashing

    // Prepare SQL query to insert data into the users table
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $password);

    if ($stmt->execute()) {
        echo "New record created successfully!";
        // Redirect to login page after successful signup
        header("Location: login.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
