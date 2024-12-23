<?php
// Database connection details
$servername = "reviseit-db.cvu6mm6w044c.ap-southeast-1.rds.amazonaws.com"; // Replace with your RDS endpoint
$username = "newuser";  // Replace with your MySQL username (e.g., 'newuser')
$password = "newpassword";  // Replace with your MySQL password (e.g., 'newpassword')
$dbname = "reviseit";  // The database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and capture form values
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Secure password hashing

    // Prepare SQL query to insert data into the users table
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $password);

    // Execute the query and check if successful
    if ($stmt->execute()) {
        echo "New record created successfully!";
        // Redirect to login page after successful signup
        header("Location: login.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
