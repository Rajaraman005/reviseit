<?php
session_start();

$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'Not logged in';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviseit</title>
    <meta name="description" content="ReviseIt is a platform for students to access and revise college lectures anytime, anywhere.">
<meta name="keywords" content="ReviseIt, College Notes, Online Learning, Lecture Revision">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="./src/logo.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://github.com/Gustavo-Victor/theme-switcher/blob/main/assets/favicon/favicon-16x16.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/bd3ea3309c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person" />
     <link rel="preload" href="./src/record.jpg" as="image">
    <link rel="preload" href="./src/quizz.jpg" as="image">
    <link rel="preload" href="./src/books.jpg" as="image">
    <link rel="preload" href="./src/community.jpg" as="image">
 
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
                <!-- User details -->
                <li class="user-details">
                   <h2><?php echo htmlspecialchars($name); ?></h2>
            <h3><?php echo htmlspecialchars($email); ?></h3>
                </li>
                <!-- Menu links -->
                
                <li>
                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div> 



     <a href="index.php" class="logo">Reviseit</a>
     <input type="checkbox" name="" id="check">
     <label for="check" class="icons">
        <i class='bx bx-menu-alt-left' id="menu-icon"></i>
        <i class='bx bx-x' id="close-icon"></i>
     </label>
     <nav class="navbar">
         <a href="#">Home</a>
         <a href="class.php">Classes</a>
         <a href="quiz.php">Quiz</a>
         <a href="#">Club</a>
         <a href="#">Mentorship</a>
    </nav>
 
</header> 
    
     <!-- <button id="theme-switcher">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z"/></svg>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M440-760v-160h80v160h-80Zm266 110-55-55 112-115 56 57-113 113Zm54 210v-80h160v80H760ZM440-40v-160h80v160h-80ZM254-652 140-763l57-56 113 113-56 54Zm508 512L651-255l54-54 114 110-57 59ZM40-440v-80h160v80H40Zm157 300-56-57 112-112 29 27 29 28-114 114Zm283-100q-100 0-170-70t-70-170q0-100 70-170t170-70q100 0 170 70t70 170q0 100-70 170t-170 70Z"/></svg>
    </button> -->
    <div class="search" id="search">
        <img src="./src/search.jpg" alt="Search Background">
        <div class="overlay">
            <p>Hello <span class="stu">Student</span>, What Topic do you want to Revise?</p>
            <div class="search-box">
                <div class="row">
                    <input type="text" name="searchbar" id="search-box" placeholder="Search Topics" autocomplete="off">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="result-box">
                </div>
            </div>
            
           
            </div>
        </div>
   
    <div class="card-container" id="card-container">
        <div class="card block">
            <img id="img1" src="https://via.placeholder.com/150" alt="Book Image">
            <div class="card-content">
                <h3><span id="title1">Book Title 1</span></h3>
                <p><span id="desc1">Short description of the content goes here.</span></p>
                <button onclick="goToBookPage(1)">Read More</button>
            </div>
        </div>

        <div class="card block">
            <img id="img2" src="https://via.placeholder.com/150" alt="Book Image">
            <div class="card-content">
                <h3><span id="title2">Book Title 2</span></h3>
                <p><span id="desc2">Short description of the content goes here.</span></p>
                <button onclick="goToBookPage(2)">Read More</button>
            </div>
        </div>

        <div class="card block">
            <img id="img3" src="https://via.placeholder.com/150" alt="Book Image">
            <div class="card-content">
                <h3><span id="title3">Book Title 3</span></h3>
                <p><span id="desc3">Short description of the content goes here.</span></p>
                <button onclick="goToBookPage(3)">Read More</button>
            </div>
        </div>
    </div>
       
        <div class="vision">Our <span class="stu">Vision</span></div>
   <div class="timeline">
    <div class="container left-conatiner block">
        <img src="./src/r-solid.svg" alt="" srcset="">
        <div class="text-box">
            <h2>Empowering Students</h2>
            <small>Unlock Your Potential</small>
            <p>We offer tools and resources to help students excel academically. Our platform provides access to study materials, tutorials, and expert guidance. Whether for exams or exploring new topics, we ensure students have the resources they need. Our focus is personalized learning, helping students achieve their potential with knowledge and confidence for success.</p>
            <span class="left-container-arrow"></span>
        </div>
    </div>
    <div class="container right-conatiner block">
        <img src="./src/e-solid.svg" alt="" srcset="">
        <div class="text-box">
            <h2>Guiding Educators</h2>
            <small>Shaping Future Minds</small>
            <p>We support teachers with innovative solutions to enhance teaching and learning. Our platform offers tools that help educators inspire the next generation. From lesson planning to classroom management, we equip teachers with the resources to create engaging learning experiences. Empowering teachers with technology helps shape the future of education.</p>
            <span class="right-container-arrow"></span>
        </div>
    </div>
    <div class="container left-conatiner block">
        <img src="./src/v-solid.svg" alt="" srcset="">
        <div class="text-box">
            <h2>Fostering Creativity</h2>
            <small>Think Beyond Limits</small>
            <p>We encourage both students and teachers to embrace creativity and innovation in learning. By fostering creativity, we inspire students to think outside the box and explore new ways of learning and problem-solving. We provide tools and strategies for educators to adopt innovative teaching methods, making learning more dynamic and interactive.</p>
            <span class="left-container-arrow"></span>
        </div>
    </div>
    <div class="container right-conatiner block">
        <img src="./src/i-solid.svg" alt="" srcset="">
        <div class="text-box">
            <h2>Building Connections</h2>
            <small>Collaborate and Grow</small>
            <p>We encourage creativity and innovation in learning processes. By fostering a culture of creativity, we inspire new ideas and approaches in education, enabling more dynamic and engaging learning experiences. Our goal is to empower individuals to explore innovative solutions in their academic and teaching journeys.</p>
            <span class="right-container-arrow"></span>
        </div>
    </div>
    <div class="container left-conatiner block">
        <img src="./src/s-solid.svg" alt="" srcset="">
        <div class="text-box">
            <h2>Championing Education</h2>
            <small>Learn. Teach. Lead.</small>
            <p>We empower educators and learners to achieve excellence by fostering knowledge-sharing. Our platform facilitates collaboration and the exchange of ideas, helping both teachers and students grow and succeed together. By encouraging a culture of shared learning, we enhance educational outcomes and promote continuous development.</p>
            <span class="left-container-arrow"></span>
        </div>
    </div>
    <div class="container right-conatiner block">
        <img src="./src/e-solid.svg" alt="" srcset="">
        <div class="text-box">
            <h2>Inspiring Growth</h2>
            <small>Continuous Learning</small>
            <p>We believe in lifelong learning to help both students and educators thrive in a dynamic world. Our platform provides resources for continuous development, whether through new skills or updated knowledge. Promoting ongoing learning ensures students stay ahead in their academic pursuits and educators remain effective in their teaching.</p>
            <span class="right-container-arrow"></span>
        </div>
    </div>
    <div class="container left-conatiner block">
        <img src="./src/i-solid.svg" alt="" srcset="">
        <div class="text-box">
            <h2>Inspiring Innovation</h2>
            <small>Think, Create, Innovate</small>
            <p>We encourage both students and educators to embrace creativity and innovation as essential skills for a future-ready world. Our platform provides tools and resources to inspire new ideas in learning and teaching. By fostering a culture of innovation, we aim to equip students to tackle challenges and encourage educators to adopt creative teaching methods.</p>
            <span class="right-container-arrow"></span>
        </div>
    </div>
    <div class="container right-conatiner block">
        <img src="./src/t-solid.svg" alt="" srcset="">
        <div class="text-box">
            <h2>Empowering Future Leaders</h2>
            <small>Lead with Purpose</small>
            <p>We provide opportunities and resources that help both students and educators become impactful leaders. Through leadership programs, skill-building workshops, and mentorship, we equip individuals with the tools to make a difference. By fostering a sense of responsibility and vision, we inspire students to take initiative and educators to mentor the next generation of leaders.</p>
            <span class="right-container-arrow"></span>
            
        </div>
    </div>
</div>

<div class="about-works">
    <h1 class="how-it">What we <span class="stu"> Offers</span></h1>
 </div>

<div class="slider-container">
      <div class="left-slide">
        <div style="background-color: #B0ABA1">
         <h1>Join a Learning Community</h1>
         <p>Collaborate with peers, participate in clubs, and enhance your learning experience</p>
        </div>
        <div style="background-color: #F5D952">
          <h1>complete Study Guides</h1>
          <p>Get access to detailed notes and study guides to supplement your learning and prepare for exams</p>
        </div>
        
        <div style="background-color:#E5DECA">
          <h1>Interactive Quizzes to Test Your Knowledge</h1>
          <p>Practice with topic-specific quizzes and track your progress with detailed feedback.</p>
        </div>
        <div style="background-color:#D9C39C">
          <h1>Access Recorded Lectures Anytime</h1>
          <p>Revise your lessons with high-quality recorded classes designed for easy understanding and effective learning.</p>
        </div>
      </div>
      <div class="right-slide">
        <div style="background-image: url('./src/record.jpg');" loading="lazy"></div>
        <div style="background-image: url('./src/quizz.jpg');"loading="lazy"></div>
        <div style="background-image: url('./src/books.jpg');"loading="lazy"></div>
        <div style="background-image: url('./src/community.jpg'); "loading="lazy"></div>
      </div>
      <div class="action-buttons">
        <button class="down-button">
          <i class="fas fa-arrow-down"></i>
        </button>
        <button class="up-button">
          <i class="fas fa-arrow-up"></i>
        </button>
      </div>
    </div>
    <div class="about-works">
    <h1 class="contact-us">Contact <span class="stu"> US</span></h1>
 </div>

    <section id="section-wrapper">
        <div class="box-wrapper">
            <div class="info-wrap">
                <h2 class="info-title">Contact Information</h2>
                <h3 class="info-sub-title">Got Questions? Reach Out and We'll Respond Within a Day!</h3>
                <ul class="info-details">
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <span>Phone:</span> <a href="tel:+91 6383634873">+91 6383634873</a>
                    </li>
                    <li>
                        <i class="fas fa-paper-plane"></i>
                        <span>Email:</span> <a href="mailto:info@yoursite.com">info@Reviseit.in</a>
                    </li>
                    <li>
                        <i class="fas fa-globe"></i>
                        <span>Website:</span> <a href="#">
                            Reviseit.in
                        </a>
                    </li>
                </ul>
                <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
            <div class="form-wrap">
                <form action="#" method="POST">
                    <h2 class="form-title">Send us a message</h2>
                    <div class="form-fields">
                        <div class="form-group">
                            <input type="text" class="fname" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="lname" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="email" placeholder="Mail">
                        </div>
                        <div class="form-group">
                            <input type="text" class="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="" placeholder="Write your message"></textarea>
                        </div>
                    </div>
                    <input type="submit" value="Send Message" class="submit-button">
                </form>
            </div>
        </div>
    </section>



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

    
<?php
$servername = "localhost";
$username = "reviseit_root";
$password = "4CFY_sejyew_4ym";
$dbname = "reviseit_database";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT id, name, email FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];

        // Debugging: Check what values are being retrieved
        echo "Debug: Retrieved Name = " . htmlspecialchars($user['name']) . ", Email = " . htmlspecialchars($user['email']);

        header("Location: index.php");
        exit;
    } else {
        echo "Invalid email or password.";
    }
}
?>
 
</body>
</html>
