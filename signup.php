<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Start the session

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

// Fetch the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and trim input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validate inputs
    if (empty($name) || empty($email) || empty($phone) || empty($password)) {
        echo "<script>alert('All fields are required.');</script>";
        echo "<script>window.location.href = 'signup.html';</script>";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
        echo "<script>window.location.href = 'signup.html';</script>";
        exit();
    }

    if (!preg_match('/^(\+?\d{1,4}[\s-]?)?(\(?\d{3}\)?[\s-]?)?[\d\s-]{7,10}$/', $phone)) {
        echo "<script>alert('Invalid phone number format.');</script>";
        echo "<script>window.location.href = 'signup.html';</script>";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Check if email or phone already exists
    $checkStmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR phone = ?");
    if (!$checkStmt) {
        die("Query preparation failed: " . $conn->error); // Shows more details about the failure
    }

    $checkStmt->bind_param("ss", $email, $phone);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Error: Email or phone number already exists.');</script>";
        echo "<script>window.location.href = 'login.html';</script>";
        exit();
    } else {
        // Prepare SQL query to insert data into the users table
        $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
        
        if (!$stmt) {
            die("Query preparation failed: " . $conn->error); // Error message to debug
        }

        $stmt->bind_param("ssss", $name, $email, $phone, $hashedPassword);

        if ($stmt->execute()) {
            // Set session variables after successful signup
            $_SESSION['user_id'] = $stmt->insert_id; // Get the ID of the newly created user
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;

            header("Location: index.php"); // Redirect to dashboard
            exit(); // Ensure no further code is executed
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        $stmt->close();
    }

    $checkStmt->close();
}

$conn->close();
?>
