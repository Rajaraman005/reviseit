<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: signup.html"); // Redirect to login if not logged in
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
<style>

  /* #blur-container {
  filter: blur(5px); /* Apply blur effect */
    pointer-events: none;
} */
/* Remove number input arrows in Chrome, Safari, Edge, and Opera */
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Remove number input arrows in Firefox */
input[type="number"] {
    -moz-appearance: textfield;
}


/* Floating Labels Form */


      .floating-form {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #1a1a1a;
    padding: 2.5rem;
    border-radius: 15px;
    width: 100%;
    max-width: 400px;
    color: white;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    z-index: 100;
}


        .floating-form .input-group {
            position: relative;
            margin: 2rem 0;
        }

        .floating-form input {
            width: 100%;
            padding: 0.8rem;
            border: none;
            margin-top:2px;
            border-bottom: 2px solid #444;
            background: transparent;
            color: white;
            outline: none;
        }

        .floating-form label {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            transition: 0.3s;
            pointer-events: none;
        }

        .floating-form input:focus ~ label,
        .floating-form input:valid ~ label {
            top: -10px;
            font-size: 0.8rem;
            color:rgb(255, 255, 255);
        }

        .floating-form input:focus {
            border-bottom-color:rgb(255, 255, 255);
        }

        .floating-form button {
            width: 100%;
            padding: 1rem;
            background:rgb(10, 244, 10);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            color:black;
        }

        .floating-form button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .floating-form button:hover::after {
            width: 300px;
            height: 300px;
        }
</style>
  </head>
  <body>
  <!-- <form class="floating-form" id="login-form">
    <h2>Login</h2>
    <div class="input-group">
        <input type="number" id="reg_no" name="reg_no" required>
        <label>Registration Number</label>
    </div>
    <button type="submit" id="sign-in-btn">Sign In</button>
    <p id="message" style="color: red; text-align: center;"></p>

</form>
</div> -->
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
    <div class="form-container"id="blur-container">
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
            document.addEventListener("contextmenu", (event) => event.preventDefault()); // Disable right-click

document.addEventListener("keydown", (event) => {
    if (
        event.key === "F12" || // Disable F12
        (event.ctrlKey && event.shiftKey && event.key === "I") || // Disable Ctrl+Shift+I
        (event.ctrlKey && event.shiftKey && event.key === "J") || // Disable Ctrl+Shift+J
        (event.ctrlKey && event.key === "U") // Disable Ctrl+U (View Source)
    ) {
        event.preventDefault();
    }
});

// Prevent Developer Tools opening using debugger
setInterval(() => {
    (function () {
        debugger;
    })();
}, 100);
document.addEventListener("DOMContentLoaded", function () {
    const inputField = document.querySelector(".floating-form input[type='number']");
    const loginForm = document.getElementById("login-form");
    const blurContainer = document.getElementById("blur-container");

    // Auto-scroll down when input is focused (useful for mobile)
    inputField.addEventListener("focus", function () {
        setTimeout(() => {
            window.scrollTo({
                top: inputField.getBoundingClientRect().top + window.scrollY - 100,
                behavior: "smooth",
            });
        }, 250);
    });

    // Check if user is already logged in (Persistent login)
    if (localStorage.getItem("isLoggedIn") === "true") {
        loginForm.style.display = "none";
        blurContainer.style.filter = "none";
        blurContainer.style.pointerEvents = "auto";
        window.scrollTo({ top: 0, behavior: "smooth" });
    }

    // Handle login form submission
    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const regNo = document.getElementById("reg_no").value;

        // Create an AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "regno.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status === 200) {
                if (xhr.responseText.trim() === "success") {
                    // Hide login form, remove blur effect, and scroll up
                    loginForm.style.display = "none";
                    blurContainer.style.filter = "none";
                    blurContainer.style.pointerEvents = "auto";
                    localStorage.setItem("isLoggedIn", "true");

                    setTimeout(() => {
                        window.scrollTo({ top: 0, behavior: "smooth" });
                    }, 300);
                } else {
                    document.getElementById("message").textContent =
                        "Not authenticated. Please check your registration number.";
                }
            }
        };

        xhr.send("reg_no=" + encodeURIComponent(regNo));
    });

    // Custom warning before leaving
    window.addEventListener("click", function (event) {
        if (event.target.tagName === "A" || event.target.closest("a")) {
            if (localStorage.getItem("isLoggedIn") === "true") {
                const confirmExit = confirm("If you go to the next page, your session will end.");
                if (!confirmExit) {
                    event.preventDefault(); // Stop navigation if canceled
                } else {
                    localStorage.removeItem("isLoggedIn"); // Logout if confirmed
                }
            }
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const check = document.getElementById("check");
    const navbar = document.querySelector(".navbar");

    document.addEventListener("click", function (event) {
        // Check if the click is outside the navbar and the checkbox is checked (menu open)
        if (!navbar.contains(event.target) && !check.contains(event.target)) {
            check.checked = false; // Close the menu
        }
    });
});


    </script>

  <script src="script.js"></script>
    <script src="class.js"></script>
   
    </script>
  </body>
</html> 