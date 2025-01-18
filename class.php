<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: index.html"); // Redirect to login if not logged in
    exit;
}

$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'Not logged in';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reviseit</title>
    <link rel="stylesheet" href="class.css" />
    <link rel="shortcut icon" href="./src/logo.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person" />
    <script src="https://kit.fontawesome.com/bd3ea3309c.js" crossorigin="anonymous"></script>

  </head>
  <body>
   
    <header class="header">
     <div class="profile">
        <div class="initials">
            <?php echo strtoupper(substr($name, 0, 2)); ?>
        </div>
        <div class="dropdown-container">
            <ul>
                <!-- User details -->
                <li class="user-details">
                   <h2><?php echo htmlspecialchars($name); ?></h2>
            <h3><?php echo htmlspecialchars($email); ?></h3>
                </li>
                <!-- Menu links -->
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
         <a href="class.php">Classes</a>
         <a href="quiz.php">Quiz</a>
         <a href="#">Club</a>
         <a href="#">Mentorship</a>
    </nav>
 
</header> 
    <div class="form-container">
      <h2>Search Recorded Sessions</h2>

      <!-- College Input -->
      <label for="college">Code:</label>
      <input
        type="text"
        id="college"
        name="college"
        placeholder="Enter your college Code"
      />

      <!-- Department Dropdown -->
      <label for="department">Department:</label>
      <select id="department" name="department">
  <option value="" disabled selected>Select Department</option>
</select>


      <!-- Year Dropdown -->
      <label for="year">Year:</label>
      <select id="year" name="year" disabled>
        <option value="" disabled selected>Select Year</option>
      </select>

      <!-- Semester Dropdown -->
      <label for="semester">Semester:</label>
      <select id="semester" name="semester" disabled>
        <option value="" disabled selected>Select Semester</option>
      </select>

      <!-- Subject Dropdown -->
      <label for="subject">Subject:</label>
      <select id="subject" name="subject" disabled>
        <option value="" disabled selected>Select Subject</option>
      </select>

      <!-- Topics List -->
      <div id="topics-container">
        <!-- Topics will be displayed here -->
      </div>
    </div>

    <br>
    <br>
    <div id="footer"></div>
    <script>
        fetch('footer.html')
            .then(response => response.text())
            .then(data => document.getElementById('footer').innerHTML = data);
    </script>

  <script src="script.js"></script>
    <script src="class.js"></script>
   
    </script>
  </body>
</html>
