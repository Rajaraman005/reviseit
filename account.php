<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "1234";
$dbname = "reviseit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $query = "SELECT name, email, phone FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
} else {
    header("Location: login.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Update name, email, and phone
    $updateQuery = "UPDATE users SET name = ?, email = ?, phone = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("sssi", $name, $email, $phone, $userId);
    $updateStmt->execute();

    // Update session variables
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;

    if (!empty($newPassword) && $newPassword === $confirmPassword) {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
        // Update the password in the database
        $passwordUpdateQuery = "UPDATE users SET password = ? WHERE id = ?";
        $passwordUpdateStmt = $conn->prepare($passwordUpdateQuery);
        $passwordUpdateStmt->bind_param("si", $hashedPassword, $userId);
        $passwordUpdateStmt->execute();
    }

    // Redirect or show a success message
    header("Location: dashboard.php");
    exit;

}
?>
<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: login.html"); // Redirect to login if not logged in
    exit;
}

$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'Not logged in';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviseit</title>
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="./src/logo.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://github.com/Gustavo-Victor/theme-switcher/blob/main/assets/favicon/favicon-16x16.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/bd3ea3309c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person" />
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        * {
            -webkit-tap-highlight-color: transparent;
            -webkit-focus-ring-color: transparent;
            outline: none;
            font-family: 'Roboto', sans-serif; 
        }
        
        body {
            background-color: #EEF1F8;
            margin: 0;
            padding: 0;
            color: black;
            overflow-Y: none;
        }

        a { text-decoration: none; }

        
        .container1 {
            width: 50%;
            height: 85%;
            background-color: #FFFFFF;
            position: absolute;
            left: 50%;
            top: 56%;
            transform: translate(-50%, -50%);
            box-shadow: 2px 2px 30px rgba(66, 57, 238, .2);
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('./src/login bg.gif');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .sign-up {
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .heading {
            font-family: calibri;
            color: rgba(30, 30, 30, 1);
        }

        .text {
            width: 350px;
            height: 50px;
            box-shadow: 2px 6px 18px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px;
        }

        .text input {
            height: 40px;
            width: 80%;
            outline: none;
            border: none;
            font-size: 14px;
            margin: 5px;
        }

        .text i { 
            color: #333;
            margin-left: 20px;
        }

        .conditions {
            font-family: myriad pro;
            color: #58595a;
            font-size: 14px;
        }

        .conditions a { color: rgb(10, 244, 10); font-weight: 500; }

        .terms { display: flex; align-items: center; }

       .submitbtn {
    width: 200px;
    height: 40px;
    outline: none;
    border: none;
    border-radius: 20px;
    background: linear-gradient(-30deg, rgb(0, 0, 0), rgb(0, 0, 0) 55%);
    box-shadow: 2px 6px 16px rgba(10, 244, 10, 0.1);
    color: #FFFFFF;
    font-weight: 600;
   
    letter-spacing: 1px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
    transition: all .3s ease;
    text-align: center;
    padding-top: 10px;  /* Adjust this value to move the text up */
}

.submitbtn:active {
    transform: scale(1.1);
}

        .text-container {
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .text-container p {
            width: 70%;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            font-weight: 400;
        }

        .text-container h1 {
            font-family: Arial, Helvetica, sans-serif;
            color: #2D2C2C;
            line-height: 20px;
        }

            .text {
            width: 350px;
            height: 50px;
            box-shadow: 2px 6px 18px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between; /* Change to space-between */
            margin: 10px;
            padding: 0 10px; /* Add padding */
        }

        .text input {
            height: 40px;
            width: 80%;
            outline: none;
            border: none;
            font-size: 14px;
            margin: 5px;
        }

        .edit-icon {
            cursor: pointer;
            color: #333;
        }
        @media screen and (max-width: 1080px) {
            .text-container { display: none;}
            .container1 { height: 80%; }
        }

        @media screen and (max-width: 600px) {
            .container1 { width: 85%; }
        }

        @media screen and (max-width: 500px) {
            .text { width: 300px; }
        }

        @media screen and (max-width: 420px) {
            .container1 { width: 95%; }
            .heading { text-align: center; }
            .conditions { text-align: center; }
            input[type="checkbox"] { margin-right: 5px; }
            .text {width: 280px; }
        }
    </style>

</head>
<body>

    <header class="header">
     <div class="profile">
        <div class="initials">
            <?php echo strtoupper(substr($name, 0, 2)); ?>
        </div>
        <div class="dropdown-container">
            <ul>
               
                <li class="user-details">
                   <h2><?php echo htmlspecialchars($name); ?></h2>
            <h3><?php echo htmlspecialchars($email); ?></h3>
                </li>
          
                <li>
                    <a href="account.php">
                        <i class="fa-solid fa-user"></i>
                        Account
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>



     <a href="dashboard.php" class="logo">Reviseit</a>
     <input type="checkbox" name="" id="check">
     <label for="check" class="icons">
        <i class='bx bx-menu-alt-left' id="menu-icon"></i>
        <i class='bx bx-x' id="close-icon"></i>
     </label>
     <nav class="navbar">
         <a href="dashboard.php">Home</a>
         <a href="class.html">Classes</a>
         <a href="#">Quiz</a>
         <a href="#">Club</a>
         <a href="#">Mentorship</a>
    </nav>
 
</header> 
        
     
    <div class="container1">
        <form class="sign-up" action="" method="POST" id="signup">
            <h1 class="heading">Profile Details</h1>
          
            <div class="text">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Name" required id="name" value="<?php echo htmlspecialchars($user['name']); ?>" readonly>
                <i class="fas fa-pencil-alt edit-icon" onclick="toggleEdit('name')"></i>
            </div>

            <div class="text">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required id="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                <i class="fas fa-pencil-alt edit-icon" onclick="toggleEdit('email')"></i>
            </div>
            
            <div class="text">
                <i class="fas fa-phone-alt"></i>
                <input type="tel" name="phone" placeholder="Phone Number" required id="phone" maxlength="13" value="<?php echo htmlspecialchars($user['phone']); ?>" readonly>
                <i class="fas fa-pencil-alt edit-icon" onclick="toggleEdit('phone')"></i>
            </div>
            <div class="text">
    <i class="fas fa-lock"></i>
    <input type="password" name="new_password" placeholder="New Password" id="new_password" >
</div>

<div class="text">
    <i class="fas fa-lock"></i>
    <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" >
</div>
           <div class="submitbtn" onclick="document.getElementById('signup').submit();">Update Profile</div>

        </form>
    </div>


        
    
<script>
function toggleEdit(fieldId) {
    const inputField = document.getElementById(fieldId);
    const isReadOnly = inputField.hasAttribute('readonly');

    if (isReadOnly) {
        inputField.removeAttribute('readonly');
        inputField.focus();
    } else {
        inputField.setAttribute('readonly', true);
    }
}
document.addEventListener("DOMContentLoaded", () => {
  const profile = document.querySelector(".profile");
  const dropdownContainer = document.querySelector(".dropdown-container");

  // Show dropdown when profile is clicked
  profile.addEventListener("click", () => {
    dropdownContainer.classList.toggle("active");
  });

  // Close dropdown when clicking outside
  document.addEventListener("click", (event) => {
    if (
      !profile.contains(event.target) &&
      !dropdownContainer.contains(event.target)
    ) {
      dropdownContainer.classList.remove("active");
    }
  });
});

 function validatePhoneNumber() {
            let phoneInput = document.getElementById('phone');
            if (phoneInput.value.length < 3) {
                phoneInput.value = '+91';
            }
            phoneInput.value = phoneInput.value.replace(/[^0-9+]/g, '');
            if (!phoneInput.value.startsWith('+91')) {
                phoneInput.value = '+91' + phoneInput.value.slice(3); 
            }
        }
</script>

</body>
</html>