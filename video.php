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
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="./src/logo.jpg" type="image/x-icon">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person" />
  <script src="https://kit.fontawesome.com/bd3ea3309c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./style_hidden.css">
  <title>Reviseit</title>
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
    <input type="checkbox" id="check">
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

  <div id="video-container">
    <div id="video-title">Loading video title...</div>
    <video id="s3-video" controls controlslist="nodownload"
      data-watermark="ReviseIt" data-dyntube-key="abcd1234">
      Your browser does not support the video tag.
    </video>
    <div id="watermark">ReviseIt</div>
  </div>
  <div id="notes-container"></div>

  <div id="footer" style="margin-top:30px;"></div>
    <script>
        fetch('footer.html')
            .then(response => response.text())
            .then(data => document.getElementById('footer').innerHTML = data);
    </script>

  <script>
    document.addEventListener("keydown", function (event) {
      if (event.key === "F12" || event.ctrlKey || event.shiftKey) {
        event.preventDefault();
      }
    });
    document.addEventListener('contextmenu', event => event.preventDefault());

    window.addEventListener("load", function () {
      const video = document.getElementById("s3-video");
      const videoTitle = document.getElementById("video-title");
      const notesContainer = document.getElementById("notes-container");

      const urlParams = new URLSearchParams(window.location.search);
      const videoUrl = urlParams.get("videoUrl");
      const videoTitleText = urlParams.get("subheadingTitle");
      const notes = urlParams.get("notes");

      if (videoUrl) {
        const encodedVideoUrl = btoa(videoUrl);
        const decodedVideoUrl = atob(encodedVideoUrl);
        video.src = decodedVideoUrl;
      } else {
        alert("No video URL found.");
      }

      videoTitle.textContent = videoTitleText ? decodeURIComponent(videoTitleText) : "No video title found.";
      notesContainer.innerHTML = notes ? `<h3>Notes:</h3><p>${decodeURIComponent(notes)}</p>` : "<h3>Notes:</h3><p>No notes available.</p>";
    });

    document.getElementById("s3-video").addEventListener('fullscreenchange', function () {
      const watermark = document.getElementById('watermark');
      const videoContainer = document.getElementById('video-container');
      if (document.fullscreenElement) {
        watermark.style.position = 'fixed';
        watermark.style.bottom = '10px';
        watermark.style.right = '10px';
        watermark.style.zIndex = '9999';
      } else {
        watermark.style.position = 'absolute';
        watermark.style.bottom = '10px';
        watermark.style.right = '10px';
        watermark.style.zIndex = '1';
      }
    });
  </script>
  <script src="script.js"></script>
</body>

</html>
