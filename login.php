<?php
// Database connection details
$servername = "localhost";
$username = "reviseit_root";
$password = "4CFY_sejyew_4ym";
$dbname = "reviseit_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to fetch user by email
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct
            session_start();
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['name'] = $user['name'];   // Store user name in session
            $_SESSION['email'] = $email;          // Store user email in session

            // Redirect to dashboard
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            // Incorrect password
            echo "<script>alert('Invalid password.');</script>";
            echo "<script>window.location.href = 'signup.html';</script>"; // Redirect back to login
        }
    } else {
        // User not found
        echo "<script>alert('No user found with this email.');</script>";
        echo "<script>window.location.href = 'signup.html';</script>"; // Redirect back to login
    }

    // Close resources
    $stmt->close();
    $conn->close();
}
?>