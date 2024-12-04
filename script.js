// Keywords for search functionality
let availableKeywords = [
  "HTML",
  "CSS",
  "JavaScript",
  "Python",
  "Java",
  "PHP",
  "Ruby",
  "C",
  "C++",
  "Swift",
  "Kotlin",
  "React",
  "Vue.js",
  "Node.js",
  "Angular",
  "SQL",
  "NoSQL",
  "MongoDB",
  "MySQL",
  "PostgreSQL",
  "Laravel",
  "Bootstrap",
  "Tailwind CSS",
  "Sass",
  "GraphQL",
  "Docker",
  "Kubernetes",
  "REST API",
  "WebSocket",
  "JQuery",
  "Typescript",
  "ASP.NET",
  "Spring Boot",
  "Vuex",
  "Django",
  "Flask",
  "Next.js",
  "Gatsby",
  "Express.js",
  "Unity",
  "Unreal Engine",
  "Pygame",
  "PHP Laravel",
  "Cloud Computing",
  "Machine Learning",
  "Artificial Intelligence",
  "Data Science",
  "Deep Learning",
  "Blockchain",
  "Cybersecurity",
  "Git",
  "GitHub",
  "GitLab",
  "Jenkins",
  "CI/CD",
  "DevOps",
  "AWS",
  "Azure",
  "Google Cloud",
  "Firebase",
  "WordPress",
];

const resultbox = document.querySelector(".result-box");
const inputBox = document.getElementById("search-box");

inputBox.onkeyup = function () {
  let result = [];
  let input = inputBox.value;
  if (input.length) {
    result = availableKeywords.filter((keyword) => {
      return keyword.toLowerCase().includes(input.toLowerCase());
    });
    display(result);
  } else {
    resultbox.innerHTML = ""; // Clear the result box if no input
  }

  if (result.length) {
    resultbox.style.display = "block"; // Show the dropdown if there are results
  } else {
    resultbox.style.display = "none"; // Hide the dropdown if no results
  }
};

function display(result) {
  const content = result.map((list) => {
    return "<li onclick=selectInput(this)>" + list + "</li>";
  });
  resultbox.innerHTML = "<ul>" + content.join("") + "</ul>";
}

function selectInput(list) {
  inputBox.value = list.innerHTML;
  resultbox.innerHTML = ""; // Clear the suggestions after selection
  resultbox.style.display = "none"; // Hide the dropdown after selection
}

// Placeholder typing effect
const placeholderTexts = [
  "Explore New Topics",
  "Discover Your Learning Path",
  "Search for Subjects",
  "What Do You Want to Learn?",
  "Find Courses and Topics",
  "Search for Revision Material",
  "Type to Search Topics",
  "Looking for a Specific Course?",
  "Find Your Favorite Subject",
  "Search for Study Resources",
];

let currentPlaceholderIndex = 0;

// Function to simulate typing effect
function typePlaceholder() {
  const inputField = document.getElementById("search-box");
  let placeholderText = placeholderTexts[currentPlaceholderIndex];
  let i = 0;

  inputField.placeholder = ""; // Clear placeholder
  const typingInterval = setInterval(() => {
    inputField.placeholder += placeholderText[i];
    i++;

    if (i === placeholderText.length) {
      clearInterval(typingInterval); // Stop typing when done
      setTimeout(() => {
        currentPlaceholderIndex =
          (currentPlaceholderIndex + 1) % placeholderTexts.length;
        typePlaceholder(); // Start typing next text
      }, 1000); // Delay before next text
    }
  }, 150); // Typing speed
}

// Books data
const quotes = [
  {
    name: "Albert Einstein",
    quote:
      "Imagination is more important than knowledge. Knowledge is limited. Imagination encircles the world.",
    img: "https://upload.wikimedia.org/wikipedia/commons/d/d3/Albert_Einstein_Head.jpg",
    link: "https://en.wikipedia.org/wiki/Albert_Einstein",
  },
  {
    name: "Marie Curie",
    quote: "Be less curious about people and more curious about ideas.",
    img: "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Marie_Curie_c._1920s.jpg/330px-Marie_Curie_c._1920s.jpg",
    link: "https://en.wikipedia.org/wiki/Marie_Curie",
  },
  {
    name: "Isaac Newton",
    quote:
      "If I have seen further, it is by standing on the shoulders of giants.",
    img: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Portrait_of_Sir_Isaac_Newton%2C_1689_%28brightened%29.jpg/330px-Portrait_of_Sir_Isaac_Newton%2C_1689_%28brightened%29.jpg",
    link: "https://en.wikipedia.org/wiki/Isaac_Newton",
  },
  {
    name: "Stephen Hawking",
    quote: "Intelligence is the ability to adapt to change.",
    img: "https://upload.wikimedia.org/wikipedia/commons/e/eb/Stephen_Hawking.StarChild.jpg",
    link: "https://en.wikipedia.org/wiki/Stephen_Hawking",
  },
  {
    name: "Nelson Mandela",
    quote: "It always seems impossible until it’s done.",
    img: "https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Nelson_Mandela_1994.jpg/330px-Nelson_Mandela_1994.jpg",
    link: "https://en.wikipedia.org/wiki/Nelson_Mandela",
  },
  {
    name: "Mahatma Gandhi",
    quote: "Be the change that you wish to see in the world.",
    img: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/Mahatma-Gandhi%2C_studio%2C_1931.jpg/330px-Mahatma-Gandhi%2C_studio%2C_1931.jpg",
    link: "https://en.wikipedia.org/wiki/Mahatma_Gandhi",
  },
];

// Shuffle quotes and select 3 random ones
function getRandomQuotes() {
  return quotes.sort(() => Math.random() - 0.5).slice(0, 3);
}

// Update cards dynamically
function updateCards() {
  const randomQuotes = getRandomQuotes();

  // Update Card 1
  document.getElementById("title1").textContent = randomQuotes[0].name;
  document.getElementById("desc1").textContent = randomQuotes[0].quote;
  document
    .getElementById("title1")
    .setAttribute("data-link", randomQuotes[0].link);
  document.getElementById("img1").src = randomQuotes[0].img;

  // Update Card 2
  document.getElementById("title2").textContent = randomQuotes[1].name;
  document.getElementById("desc2").textContent = randomQuotes[1].quote;
  document
    .getElementById("title2")
    .setAttribute("data-link", randomQuotes[1].link);
  document.getElementById("img2").src = randomQuotes[1].img;

  // Update Card 3
  document.getElementById("title3").textContent = randomQuotes[2].name;
  document.getElementById("desc3").textContent = randomQuotes[2].quote;
  document
    .getElementById("title3")
    .setAttribute("data-link", randomQuotes[2].link);
  document.getElementById("img3").src = randomQuotes[2].img;
}

// Redirect to profile page
function goToBookPage(cardIndex) {
  const titleId = `title${cardIndex}`;
  const link = document.getElementById(titleId).getAttribute("data-link");
  window.open(link, "_blank");
}

// Update cards on load
window.onload = function () {
  updateCards();
  typePlaceholder();
};
