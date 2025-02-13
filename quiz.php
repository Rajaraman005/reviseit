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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviseit</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="./src/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="https://github.com/Gustavo-Victor/theme-switcher/blob/main/assets/favicon/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person" />
    <script src="https://kit.fontawesome.com/bd3ea3309c.js" crossorigin="anonymous"></script>


    
    <style>
 @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

body{
    font-family: 'Montserrat', sans-serif;
   
}
.container-heading {
    text-align: center;
    font-size: 2rem;
    margin-top: 70px;
    margin-bottom: -10px;
    color: #333; /* Adjust color as needed */
    font-weight: bold;
}

.con1 {
    max-width: 1300px;
    margin: 0 auto;
    padding: 50px 20px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 30px;
    
}

.card1 {
    border-radius: 5px 30px 5px 5px;
    overflow: hidden;
    box-shadow: 5px 5px 20px rgba(0,0,0,0.3);
    transition: 0.4s ease;
    cursor: pointer;

}



.card-img,img{
    border-radius:0px 30px;
}
.card1 .card-img {
    width: 100%;
    height: 200px;
    cursor: pointer;
    content-visibility: auto;
}


.card1:nth-child(1) .card-img {
    background: url("./src/science.WebP") no-repeat center center / cover;
    
}

.card1:nth-child(2) .card-img {
    background: url("./src/maths.WebP") no-repeat center center / cover;
}

.card1:nth-child(3) .card-img {
    background: url("./src/cs.WebP") no-repeat center center / cover;
}
.card1:nth-child(4) .card-img {
    background: url("./src/Engineering.WebP") no-repeat center center / cover;
}

.card1:nth-child(5) .card-img {
    background: url("./src/Economics.WebP") no-repeat center center / cover;
}

.card1:nth-child(6) .card-img {
    background: url("./src/history.WebP") no-repeat center center / cover;
}

.card1:nth-child(7) .card-img {
    background: url("./src/Political.WebP") no-repeat center center / cover;
}

.card1:nth-child(8) .card-img {
    background: url("./src/Personal.WebP") no-repeat center center / cover;
}

.card1:nth-child(9) .card-img {
    background: url("./src/gk.jpg") no-repeat center center / cover;
}



.card1-body {
    padding: 30px 20px;
}

.card1-body .card-title {
 
    margin-bottom: 15px;
    font-weight: 600;
}


.card1-body .card-button {
    display: block;
    width: 100%;
    height: 50px;
    border-radius: 3px;
    text-align: center;
    background-color: #000000;
    color: #ffffff;
    text-decoration: none;
    font-size: 20px;
    font-weight: 500;
    line-height: 50px;
}

.card1-body .card-button i {
    margin-left: 10px;
    transition: 0.4s ease;
}

.card1:hover {
    transform: translateY(-5px);
    box-shadow: 8px 8px 40px rgba(0,0,0,0.5);
}

.card1-body .card-button:hover i {
    margin-left: 20px;
}

.card-title{
    justify-content: center;
    text-align: center;
    font-size: 20px;
}
.score{
    text-align: center;
    margin-bottom: 10px;
}



@media screen and (max-width: 900px) {
    .con1 {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media screen and (max-width: 600px) {
    .con1 {
        grid-template-columns: 1fr;
    }
}    

.quiz-container {
            display: none;
            margin-top: 50px;
            margin-bottom:50px;
        }

        .quiz-content {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .question {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .option-button {
            padding: 10px;
            background-color: #000000;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .option-button:hover {
            background-color: rgba(10,244,10);
            color: rgb(255, 255, 255);
        }

        .feedback {
            margin-top: 20px;
            font-weight: bold;
        }

        @media screen and (max-width: 768px) {
            .category-container {
                padding: 10px;
            }

            .grid-container {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }

            .card img {
                height: 220px;
            }
        }

        @media screen and (max-width: 480px) {
            .card img {
                height: 150px;
            }

          
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
<!-- Container -->
 <h1 class="container-heading">Select category</h1>
<div class="con1">
    <!-- Card One -->
    <div class="card1" data-category="science" onclick="loadQuiz('science')">
        <div class="card-img"></div>
        <div class="card1-body">
            <h2 class="card-title">Science</h2>
            <h4 class="score">Total score:10</h4>
            <a class="card-button" onclick="navigateToQuiz(event, 'science')">Explore <i class="fas fa-arrow-right-long"></i></a>
        </div>
    </div>

    <!-- Card Two -->
    <div class="card1" data-category="maths" onclick="loadQuiz('maths')">
        <div class="card-img"></div>
        <div class="card1-body">
            <h2 class="card-title">Maths</h2>
            <h4 class="score">Total score:10</h4>
            <a class="card-button" onclick="navigateToQuiz(event, 'maths')">Explore <i class="fas fa-arrow-right-long"></i></a>
        </div>
    </div>

    <!-- Card Three -->
    <div class="card1" data-category="computer-science" onclick="loadQuiz('cs')">
        <div class="card-img"></div>
        <div class="card1-body">
            <h2 class="card-title">Computer Science</h2>
            <h4 class="score">Total score:10</h4>
            <a class="card-button" onclick="navigateToQuiz(event, 'cs')">Explore <i class="fas fa-arrow-right-long"></i></a>
        </div>
    </div>

    <!-- Card Four -->
    <div class="card1" data-category="engineering" onclick="loadQuiz('engineering')">
        <div class="card-img"></div>
        <div class="card1-body">
            <h2 class="card-title">Engineering</h2>
            <h4 class="score">Total score:10</h4>
            <a  class="card-button" onclick="navigateToQuiz(event, 'engineering')">Explore <i class="fas fa-arrow-right-long"></i></a>
        </div>
    </div>

    <!-- Card Five -->
    <div class="card1" data-category="economics" onclick="loadQuiz('economics')">
        <div class="card-img"></div>
        <div class="card1-body">
            <h2 class="card-title">Economics</h2>
            <h4 class="score">Total score:10</h4>
            <a  class="card-button" onclick="navigateToQuiz(event, 'economics')">Explore <i class="fas fa-arrow-right-long"></i></a>
        </div>
    </div>

    <!-- Card Six -->
    <div class="card1" data-category="history" onclick="loadQuiz('history')">
        <div class="card-img"></div>
        <div class="card1-body">
            <h2 class="card-title">History</h2>
            <h4 class="score">Total score:10</h4>
            <a " class="card-button" onclick="navigateToQuiz(event, 'history')">Explore <i class="fas fa-arrow-right-long"></i></a>
        </div>
    </div>

    <!-- Card Seven -->
    <div class="card1" data-category="political-science" onclick="loadQuiz('ps')">
        <div class="card-img"></div>
        <div class="card1-body">
            <h2 class="card-title">Political Science</h2>
            <h4 class="score">Total score:10</h4>
            <a  class="card-button" onclick="navigateToQuiz(event, 'ps')">Explore <i class="fas fa-arrow-right-long"></i></a>
        </div>
    </div>

    <!-- Card Eight -->
    <div class="card1" data-category="personal-growth" onclick="loadQuiz('pg')">
        <div class="card-img"></div>
        <div class="card1-body">
            <h2 class="card-title">Personal Growth</h2>
            <h4 class="score">Total score:10</h4>
            <a  class="card-button" onclick="navigateToQuiz(event, 'pg')">Explore <i class="fas fa-arrow-right-long"></i></a>
        </div>
    </div>
    <!-- nineth card -->
     <div class="card1" data-category="personal-growth" onclick="loadQuiz('gk')">
        <div class="card-img"></div>
        <div class="card1-body">
            <h2 class="card-title">General Knowledge</h2>
            <h4 class="score">Total score:10</h4>
            <a class="card-button" onclick="navigateToQuiz(event, 'gk')">Explore <i class="fas fa-arrow-right-long"></i></a>
        </div>
    </div>
</div>



    <!-- Quiz Section -->
   <div class="quiz-container" id="quiz">
    <div class="quiz-content">
        <div class="question-counter">
            Question <span id="current-question-number">1</span> of <span id="total-questions">10</span>
        </div>
        <div class="question"></div>
        <div class="options"></div>
        <div class="feedback"></div>
        <p>Score: <span id="current-score">0</span></p>
    </div>
</div>

<div id="footer"></div>
    <script>
        fetch('footer.html')
            .then(response => response.text())
            .then(data => document.getElementById('footer').innerHTML = data);
    </script>

    <script>
       

const questionsData = {
    science: [
        // Easy Level
        {
            question: "What is the boiling point of water?",
            options: ["90°C", "100°C", "110°C", "120°C"],
            answer: "100°C"
        },
        {
            question: "What is the chemical symbol for gold?", 
            options: ["Au", "Ag", "Pb", "Fe"],
            answer: "Au"
        },
        {
            question: "What planet is known as the Red Planet?",
            options: ["Earth", "Mars", "Jupiter", "Venus"],
            answer: "Mars"
        },
        {
            question: "What is the chemical symbol for water?",
            options: ["H2O", "CO2", "O2", "H2"],
            answer: "H2O"
        },

        // Medium Level
        {
            question: "What gas do plants primarily use for photosynthesis?",
            options: ["Oxygen", "Carbon Dioxide", "Nitrogen", "Hydrogen"],
            answer: "Carbon Dioxide"
        },
        {
            question: "What is the center of an atom called?",
            options: ["Electron", "Proton", "Neutron", "Nucleus"],
            answer: "Nucleus"
        },
        {
            question: "Which part of the human body controls temperature?",
            options: ["Heart", "Lungs", "Brain", "Skin"],
            answer: "Brain"
        },

        // Hard Level
        {
            question: "What is the most abundant gas in Earth's atmosphere?",
            options: ["Oxygen", "Carbon Dioxide", "Nitrogen", "Hydrogen"],
            answer: "Nitrogen"
        },
        {
            question: "What is the chemical formula of table salt?",
            options: ["NaCl", "KCl", "MgCl", "CaCl"],
            answer: "NaCl"
        },
        {
            question: "What particle has no electric charge?",
            options: ["Proton", "Electron", "Neutron", "Photon"],
            answer: "Neutron"
        }
    ],

    maths: [
        // Easy Level
        {
            question: "What is the value of 2 + 3?", 
            options: ["4", "5", "6", "7"], 
            answer: "5"
        },
        {
            question: "What is the square root of 16?", 
            options: ["2", "3", "4", "5"], 
            answer: "4"
        },
        {
            question: "What is 10 ÷ 2?", 
            options: ["2", "4", "5", "8"], 
            answer: "5"
        },

        // Medium Level
        {
            question: "What is the value of 5²?", 
            options: ["10", "15", "20", "25"], 
            answer: "25"
        },
        {
            question: "Solve for x: 2x - 4 = 10", 
            options: ["5", "6", "7", "8"], 
            answer: "7"
        },
        {
            question: "What is the area of a circle with radius 7 (π = 22/7)?", 
            options: ["44", "154", "88", "121"], 
            answer: "154"
        },

        // Hard Level
        {
            question: "What is the derivative of 3x²?", 
            options: ["3x", "6x", "9x", "x²"], 
            answer: "6x"
        },
        {
            question: "What is the integral of x dx?", 
            options: ["x²/2", "x²", "1/x", "ln(x)"], 
            answer: "x²/2"
        },
        {
            question: "What is the determinant of the matrix [[1, 2], [3, 4]]?", 
            options: ["-2", "2", "4", "-4"], 
            answer: "-2"
        },
        {
            question: "Solve for x: log(x) = 2 (base 10)", 
            options: ["100", "10", "20", "200"], 
            answer: "100"
        }
    ],

     cs: [
        // Easy Level
        {
            question: "What does 'HTML' stand for?", 
            options: ["HyperText Makeup Language", "HyperText Markup Language", "HighText Markup Language", "HyperText Markdown Language"], 
            answer: "HyperText Markup Language"
        },
        {
            question: "What is the binary representation of the decimal number 5?", 
            options: ["1010", "110", "101", "1001"], 
            answer: "101"
        },
        {
            question: "Which data structure uses the principle 'First In, First Out' (FIFO)?", 
            options: ["Stack", "Queue", "Array", "Tree"], 
            answer: "Queue"
        },

        // Medium Level
        {
            question: "What is the time complexity of binary search?", 
            options: ["O(n)", "O(log n)", "O(n^2)", "O(1)"], 
            answer: "O(log n)"
        },
        {
            question: "Which of the following is NOT a programming language?", 
            options: ["Python", "HTML", "Java", "C++"], 
            answer: "HTML"
        },
        {
            question: "Which sorting algorithm has the best average-case time complexity?", 
            options: ["Bubble Sort", "Merge Sort", "Insertion Sort", "Selection Sort"], 
            answer: "Merge Sort"
        },

        // Hard Level
        {
            question: "What is the purpose of a 'foreign key' in a database?", 
            options: ["To uniquely identify a row", "To link tables", "To store data", "To enforce constraints"], 
            answer: "To link tables"
        },
        {
            question: "What is the output of the following code: print(len('Hello World'))?", 
            options: ["11", "10", "12", "9"], 
            answer: "11"
        },
        {
            question: "Which protocol is used to send emails?", 
            options: ["HTTP", "SMTP", "FTP", "POP"], 
            answer: "SMTP"
        },
        {
            question: "What does the term 'polymorphism' mean in Object-Oriented Programming?", 
            options: ["Encapsulation of data", "Ability of a function to take multiple forms", "Reusing existing code", "Hiding implementation details"], 
            answer: "Ability of a function to take multiple forms"
        }
    ],
    engineering: [
    // Easy Level
    {
        question: "What does 'CAD' stand for in engineering design?",
        options: ["Computer-Assisted Design", "Computer-Aided Design", "Computer-Analyzed Design", "Computer-Adapted Design"],
        answer: "Computer-Aided Design"
    },
    {
        question: "What is the SI unit of force?",
        options: ["Joule", "Pascal", "Newton", "Watt"],
        answer: "Newton"
    },
    {
        question: "Which type of engineer designs and builds bridges?",
        options: ["Mechanical Engineer", "Civil Engineer", "Electrical Engineer", "Chemical Engineer"],
        answer: "Civil Engineer"
    },

    // Medium Level
    {
        question: "What is the primary function of a diode in a circuit?",
        options: ["Amplify signals", "Store charge", "Allow current in one direction", "Convert AC to DC"],
        answer: "Allow current in one direction"
    },
    {
        question: "Which material is commonly used as a semiconductor in electronics?",
        options: ["Copper", "Silicon", "Iron", "Gold"],
        answer: "Silicon"
    },
    {
        question: "What is the primary purpose of a heat exchanger?",
        options: ["Store energy", "Transfer heat between fluids", "Generate electricity", "Reduce friction"],
        answer: "Transfer heat between fluids"
    },

    // Hard Level
    {
        question: "What is the term for the deformation of a material under constant stress over time?",
        options: ["Fatigue", "Creep", "Elasticity", "Plasticity"],
        answer: "Creep"
    },
    {
        question: "Which law states that the sum of currents entering a junction equals the sum of currents leaving it?",
        options: ["Ohm's Law", "Kirchhoff's Voltage Law", "Kirchhoff's Current Law", "Faraday's Law"],
        answer: "Kirchhoff's Current Law"
    },
    {
        question: "What is the efficiency formula for a thermal power plant?",
        options: ["Output/Input", "(Heat Supplied - Heat Rejected) / Heat Supplied", "Work Done / Energy Input", "Power Output / Power Input"],
        answer: "(Heat Supplied - Heat Rejected) / Heat Supplied"
    },
    {
        question: "What is the primary function of a governor in a mechanical system?",
        options: ["Increase speed", "Regulate speed", "Store energy", "Reduce vibration"],
        answer: "Regulate speed"
    }
    ],
    economics: [
    // Easy Level
    {
        question: "What does GDP stand for?",
        options: ["Gross Domestic Product", "General Domestic Product", "Global Domestic Product", "Government Domestic Product"],
        answer: "Gross Domestic Product"
    },
    {
        question: "What is the term for the cost of the next best alternative foregone?",
        options: ["Opportunity Cost", "Sunk Cost", "Fixed Cost", "Variable Cost"],
        answer: "Opportunity Cost"
    },
    {
        question: "What is the primary function of money in an economy?",
        options: ["Medium of exchange", "Source of income", "Tool for saving", "Investment vehicle"],
        answer: "Medium of exchange"
    },

    // Medium Level
    {
        question: "What type of market structure is characterized by a single seller?",
        options: ["Monopoly", "Perfect Competition", "Oligopoly", "Monopsony"],
        answer: "Monopoly"
    },
    {
        question: "What does the law of demand state?",
        options: ["As price decreases, demand increases", "As price increases, supply decreases", "As demand increases, supply decreases", "As supply increases, price decreases"],
        answer: "As price decreases, demand increases"
    },
    {
        question: "What is inflation?",
        options: ["An increase in the general price level", "A decrease in the value of exports", "A rise in unemployment", "An increase in production"],
        answer: "An increase in the general price level"
    },

    // Hard Level
    {
        question: "What is the term for a situation where resources are allocated in the most efficient way possible?",
        options: ["Economic Efficiency", "Market Failure", "Scarcity", "Opportunity Cost"],
        answer: "Economic Efficiency"
    },
    {
        question: "Which curve shows the relationship between unemployment and inflation?",
        options: ["Phillips Curve", "Laffer Curve", "IS Curve", "LM Curve"],
        answer: "Phillips Curve"
    },
    {
        question: "What is the Keynesian multiplier formula?",
        options: ["1 / (1 - MPC)", "1 / (MPC - 1)", "MPC / (1 - MPC)", "1 / MPC"],
        answer: "1 / (1 - MPC)"
    },
    {
        question: "What is the term for the phenomenon where high government borrowing leads to reduced private investment?",
        options: ["Crowding Out", "Fiscal Drag", "Supply Shock", "Stagflation"],
        answer: "Crowding Out"
    }
  ],
history: [
    // Easy Level
    {
        question: "Who was the first President of the United States?",
        options: ["George Washington", "Abraham Lincoln", "Thomas Jefferson", "John Adams"],
        answer: "George Washington"
    },
    {
        question: "Which empire built the Great Wall of China?",
        options: ["Mongol Empire", "Qin Dynasty", "Han Dynasty", "Tang Dynasty"],
        answer: "Qin Dynasty"
    },
    {
        question: "What was the primary purpose of the Silk Road?",
        options: ["To transport goods", "To invade territories", "To train soldiers", "To build monuments"],
        answer: "To transport goods"
    },

    // Medium Level
    {
        question: "Who was known as the 'Iron Lady' of British politics?",
        options: ["Margaret Thatcher", "Queen Victoria", "Theresa May", "Elizabeth I"],
        answer: "Margaret Thatcher"
    },
    {
        question: "What was the main cause of World War I?",
        options: ["Assassination of Archduke Franz Ferdinand", "The Treaty of Versailles", "The rise of Nazi Germany", "The Cold War"],
        answer: "Assassination of Archduke Franz Ferdinand"
    },
    {
        question: "Which ancient civilization was known for its pyramids and pharaohs?",
        options: ["Greek", "Egyptian", "Roman", "Persian"],
        answer: "Egyptian"
    },

    // Hard Level
    {
        question: "What was the name of the ship that carried the Pilgrims to America in 1620?",
        options: ["Mayflower", "Santa Maria", "Endeavour", "Victoria"],
        answer: "Mayflower"
    },
    {
        question: "What event is considered the start of the French Revolution?",
        options: ["Storming of the Bastille", "Reign of Terror", "Execution of Louis XVI", "Napoleon's Coup"],
        answer: "Storming of the Bastille"
    },
    {
        question: "What treaty ended World War I?",
        options: ["Treaty of Paris", "Treaty of Versailles", "Treaty of Ghent", "Treaty of Tordesillas"],
        answer: "Treaty of Versailles"
    },
    {
        question: "Who was the founder of the Maurya Empire in ancient India?",
        options: ["Ashoka", "Chandragupta Maurya", "Harsha", "Bindusara"],
        answer: "Chandragupta Maurya"
    }
],
ps: [
    // Easy Level
    {
        question: "Who is known as the 'Father of the Constitution' in the United States?",
        options: ["James Madison", "George Washington", "Thomas Jefferson", "Benjamin Franklin"],
        answer: "James Madison"
    },
    {
        question: "What is the primary function of the legislative branch of government?",
        options: ["Make laws", "Enforce laws", "Interpret laws", "Amend the constitution"],
        answer: "Make laws"
    },
    {
        question: "What type of government is ruled by a king or queen?",
        options: ["Monarchy", "Democracy", "Oligarchy", "Theocracy"],
        answer: "Monarchy"
    },

    // Medium Level
    {
        question: "What is the term for a system of government where power is divided between a central authority and smaller political units?",
        options: ["Federalism", "Unitary System", "Confederation", "Autocracy"],
        answer: "Federalism"
    },
    {
        question: "Which political philosopher wrote 'The Social Contract'?",
        options: ["Jean-Jacques Rousseau", "John Locke", "Thomas Hobbes", "Voltaire"],
        answer: "Jean-Jacques Rousseau"
    },
    {
        question: "What is the term for a government ruled by a small group of people?",
        options: ["Oligarchy", "Democracy", "Autocracy", "Monarchy"],
        answer: "Oligarchy"
    },

    // Hard Level
    {
        question: "What is the primary purpose of the separation of powers in a government?",
        options: ["To prevent the concentration of power", "To increase government efficiency", "To simplify decision-making", "To reduce the size of government"],
        answer: "To prevent the concentration of power"
    },
    {
        question: "Which international organization was established to maintain world peace after World War II?",
        options: ["United Nations", "League of Nations", "NATO", "World Trade Organization"],
        answer: "United Nations"
    },
    {
        question: "What is the term for the process by which citizens vote to approve or reject a proposed law or amendment?",
        options: ["Referendum", "Impeachment", "Filibuster", "Ratification"],
        answer: "Referendum"
    },
    {
        question: "Who is the political theorist associated with the idea of 'Checks and Balances'?",
        options: ["Montesquieu", "John Stuart Mill", "Niccolò Machiavelli", "Karl Marx"],
        answer: "Montesquieu"
    }
],
pg: [
    // Easy Level
    {
        question: "What is the first step in setting a personal goal?",
        options: ["Identify what you want to achieve", "Create a deadline", "Seek advice", "Start working immediately"],
        answer: "Identify what you want to achieve"
    },
    {
        question: "Which habit is most effective for personal growth?",
        options: ["Consistency", "Procrastination", "Overthinking", "Relying on luck"],
        answer: "Consistency"
    },
    {
        question: "What is mindfulness primarily about?",
        options: ["Living in the present moment", "Planning for the future", "Focusing on past mistakes", "Avoiding challenges"],
        answer: "Living in the present moment"
    },

    // Medium Level
    {
        question: "What is the primary benefit of journaling for personal growth?",
        options: ["Improves handwriting", "Helps track thoughts and progress", "Requires less effort", "Eliminates stress completely"],
        answer: "Helps track thoughts and progress"
    },
    {
        question: "Which of the following is an example of emotional intelligence?",
        options: ["Managing your emotions effectively", "Ignoring others' opinions", "Focusing solely on logic", "Avoiding challenges"],
        answer: "Managing your emotions effectively"
    },
    {
        question: "What does the term 'growth mindset' mean?",
        options: ["Believing abilities can be developed", "Assuming talents are fixed", "Avoiding failure at all costs", "Success is purely based on luck"],
        answer: "Believing abilities can be developed"
    },

    // Hard Level
    {
        question: "Which of these methods is most effective for overcoming procrastination?",
        options: ["Breaking tasks into smaller steps", "Waiting for motivation", "Avoiding deadlines", "Working only when inspired"],
        answer: "Breaking tasks into smaller steps"
    },
    {
        question: "What is the '80/20 rule' in personal growth?",
        options: ["80% effort yields 20% results", "20% of actions lead to 80% of outcomes", "Focus 80% on others and 20% on yourself", "Spend 80% learning and 20% practicing"],
        answer: "20% of actions lead to 80% of outcomes"
    },
    {
        question: "What is the primary purpose of setting SMART goals?",
        options: ["To make goals specific and achievable", "To create vague goals", "To avoid accountability", "To increase complexity"],
        answer: "To make goals specific and achievable"
    },
    {
        question: "Which skill is most important for maintaining long-term personal growth?",
        options: ["Self-discipline", "Multitasking", "Avoiding challenges", "Perfectionism"],
        answer: "Self-discipline"
    }
],
gk: [
    // Tough Level
    {
        question: "What is the longest river in the world by discharge volume of water?",
        options: ["Amazon River", "Nile River", "Yangtze River", "Mississippi River"],
        answer: "Amazon River"
    },
    {
        question: "Which Nobel Prize category was introduced most recently?",
        options: ["Peace", "Literature", "Economic Sciences", "Medicine"],
        answer: "Economic Sciences"
    },
    {
        question: "What is the chemical symbol for the element with the highest atomic number in the periodic table?",
        options: ["Og", "Uuo", "Lv", "Ts"],
        answer: "Og"
    },
    {
        question: "Which ancient city is believed to be the oldest continuously inhabited city in the world?",
        options: ["Jericho", "Damascus", "Byblos", "Athens"],
        answer: "Jericho"
    },
    {
        question: "Which country has the most UNESCO World Heritage Sites as of 2025?",
        options: ["Italy", "China", "Germany", "India"],
        answer: "Italy"
    },
    {
        question: "What is the name of the mathematician who proposed the concept of a 'Turing Machine'?",
        options: ["Alan Turing", "John von Neumann", "Kurt Gödel", "Charles Babbage"],
        answer: "Alan Turing"
    },
    {
        question: "Which treaty ended the Thirty Years' War in 1648?",
        options: ["Treaty of Westphalia", "Treaty of Versailles", "Treaty of Utrecht", "Treaty of Paris"],
        answer: "Treaty of Westphalia"
    },
    {
        question: "Which ancient Greek philosopher is credited with the quote 'Man is the measure of all things'?",
        options: ["Protagoras", "Socrates", "Plato", "Aristotle"],
        answer: "Protagoras"
    },
    {
        question: "Which celestial body has the highest known surface temperature in our solar system?",
        options: ["Venus", "Mercury", "The Sun", "Io"],
        answer: "Venus"
    },
    {
        question: "In which year did the United Nations officially come into existence?",
        options: ["1945", "1948", "1942", "1950"],
        answer: "1945"
    }
]



};
let currentCategory;
let currentQuestionIndex = 0;
let score = 0;

// Load saved quiz state from localStorage
function loadSavedState() {
    const savedState = JSON.parse(localStorage.getItem('quizState'));
    if (savedState) {
        currentCategory = savedState.currentCategory;
        currentQuestionIndex = savedState.currentQuestionIndex;
        score = savedState.score;

        if (currentCategory) {
            document.querySelector('.con1').style.display = 'none';
            document.querySelector('.quiz-container').style.display = 'block';
            loadQuiz(currentCategory, true); // Load quiz with saved state
        }
    }
}

// Save current quiz state to localStorage
function saveQuizState() {
    const state = {
        currentCategory,
        currentQuestionIndex,
        score
    };
    localStorage.setItem('quizState', JSON.stringify(state));
}

// Clear quiz state from localStorage
function clearQuizState() {
    localStorage.removeItem('quizState');
}

// Function to load the quiz for a selected category
function loadQuiz(category, isResuming = false) {
    if (!questionsData[category]) {
        console.error(`No questions found for category: ${category}`);
        return;
    }

    currentCategory = category;

    if (!isResuming) {
        currentQuestionIndex = 0; // Reset question index
        score = 0; // Reset score
    }

    document.querySelector('.con1').style.display = 'none';
    document.querySelector('.quiz-container').style.display = 'block';

    const totalQuestions = questionsData[category].length;
    document.querySelector('.quiz-container').innerHTML = `
        <div class="quiz-content">
            <div class="question-counter">
                Question <span id="current-question-number">${currentQuestionIndex + 1}</span> of <span id="total-questions">${totalQuestions}</span>
            </div>
            <h3 class="question"></h3>
            <div class="options"></div>
            <div class="feedback"></div>
            <p>Score: <span id="current-score">${score}</span></p>
        </div>
    `;

    loadQuestion();
}

// Function to load the current question
function loadQuestion() {
    const questionData = questionsData[currentCategory][currentQuestionIndex];
    if (!questionData) {
        console.error(`Question data not found for index: ${currentQuestionIndex}`);
        return;
    }

    document.querySelector('.question').textContent = questionData.question;
    const optionsContainer = document.querySelector('.options');
    optionsContainer.innerHTML = ''; // Clear previous options

    questionData.options.forEach(option => {
        const button = document.createElement('button');
        button.className = 'option-button';
        button.textContent = option;
        button.onclick = () => checkAnswer(button, option, questionData.answer);
        optionsContainer.appendChild(button);
    });

    document.querySelector('.feedback').textContent = ''; // Clear feedback
    document.getElementById('current-question-number').textContent = currentQuestionIndex + 1; // Update question number
    saveQuizState(); // Save state after loading a question
}

// Function to check the selected answer
function checkAnswer(button, selected, correct) {
    const feedback = document.querySelector('.feedback');
    const buttons = document.querySelectorAll('.option-button');

    // Disable all buttons after selection
    buttons.forEach(btn => btn.disabled = true);

    if (selected === correct) {
        score++;
        feedback.textContent = "Correct!";
        button.style.backgroundColor = "rgba(10,244,10)";
    } else {
        feedback.textContent = `Wrong! The correct answer is ${correct}.`;
        button.style.backgroundColor = "#ff4c4c";
    }

    // Update the score
    document.getElementById('current-score').textContent = score;

    // Move to next question or end quiz
    currentQuestionIndex++;
    if (currentQuestionIndex < questionsData[currentCategory].length) {
        setTimeout(() => {
            loadQuestion();
        }, 1000);
    } else {
        setTimeout(() => {
            endQuiz();
        }, 1000);
    }

    saveQuizState(); // Save state after checking the answer
}

// Function to end the quiz
function endQuiz() {
    const totalQuestions = questionsData[currentCategory].length;
    document.querySelector('.quiz-container').innerHTML = `
        <div class="quiz-content">
            <h2>Quiz Completed</h2>
            <p>Your Score: ${score} / ${totalQuestions}</p>
            <button onclick="restartQuiz()">Restart Quiz</button>
            <button onclick="goBack()">Back to Categories</button>
        </div>
    `;
    clearQuizState(); // Clear state after quiz ends
}

// Function to restart the quiz for the same category
function restartQuiz() {
    loadQuiz(currentCategory);
}

// Function to go back to the category selection
function goBack() {
    currentQuestionIndex = 0; // Reset question index
    score = 0; // Reset score
    document.querySelector('.quiz-container').style.display = 'none';
    document.querySelector('.con1').style.display = 'grid';
    document.querySelector('.quiz-container').innerHTML = ''; // Clear quiz container
    clearQuizState(); // Clear state when going back
}

// Add event listeners to category cards
document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', function () {
        const category = this.dataset.category; // Use data-category attribute
        if (category) {
            loadQuiz(category);
        } else {
            console.error('Category not found in card.');
        }
    });
});

// Load saved state on page load
document.addEventListener('DOMContentLoaded', loadSavedState);
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
$servername = "127.0.0.1";
$username = "root";
$password = "1234";
$dbname = "reviseit";

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

        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid email or password.";
    }
}?>
</body>
</html>