// Keywords for search functionality
let availableKeywords = [
    'HTML', 'CSS', 'JavaScript', 'Python', 'Java', 'PHP', 'Ruby', 'C', 'C++', 'Swift', 'Kotlin', 'React', 'Vue.js',
    'Node.js', 'Angular', 'SQL', 'NoSQL', 'MongoDB', 'MySQL', 'PostgreSQL', 'Laravel', 'Bootstrap', 'Tailwind CSS',
    'Sass', 'GraphQL', 'Docker', 'Kubernetes', 'REST API', 'WebSocket', 'JQuery', 'Typescript', 'ASP.NET', 'Spring Boot',
    'Vuex', 'Django', 'Flask', 'Next.js', 'Gatsby', 'Express.js', 'Unity', 'Unreal Engine', 'Pygame', 'PHP Laravel',
    'Cloud Computing', 'Machine Learning', 'Artificial Intelligence', 'Data Science', 'Deep Learning', 'Blockchain', 'Cybersecurity',
    'Git', 'GitHub', 'GitLab', 'Jenkins', 'CI/CD', 'DevOps', 'AWS', 'Azure', 'Google Cloud', 'Firebase', 'WordPress'
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
        resultbox.innerHTML = ''; // Clear the result box if no input
    }

    if (result.length) {
        resultbox.style.display = 'block'; // Show the dropdown if there are results
    } else {
        resultbox.style.display = 'none'; // Hide the dropdown if no results
    }
};

function display(result) {
    const content = result.map((list) => {
        return "<li onclick=selectInput(this)>" + list + "</li>";
    });
    resultbox.innerHTML = "<ul>" + content.join('') + "</ul>";
}

function selectInput(list) {
    inputBox.value = list.innerHTML;
    resultbox.innerHTML = ''; // Clear the suggestions after selection
    resultbox.style.display = 'none'; // Hide the dropdown after selection
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
    "Search for Study Resources"
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
                currentPlaceholderIndex = (currentPlaceholderIndex + 1) % placeholderTexts.length;
                typePlaceholder(); // Start typing next text
            }, 1000); // Delay before next text
        }
    }, 150); // Typing speed
}

// Books data
const books = [
    {
        title: "Algorithms to Live By",
        description: "A fascinating exploration of how computer algorithms apply to everyday human decision-making.",
        link: "https://www.goodreads.com/book/show/25666050-algorithms-to-live-by", // Actual URL
        img: "https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1454296875i/25666050.jpg"
    },
    {
        title: "Introduction to Computer Science",
        description: "A comprehensive guide for beginners to learn the fundamentals of computer science.",
        link: "https://www.amazon.com/Introduction-Computer-Science/dp/1234567890", // Replace with actual URL
        img: "https://via.placeholder.com/150"
    },
    {
        title: "Data Structures and Algorithms",
        description: "An essential book for mastering data structures and algorithms in computer programming.",
        link: "https://www.amazon.com/Data-Structures-Algorithms/dp/0987654321", // Replace with actual URL
        img: "https://via.placeholder.com/150"
    },
    {
        title: "Digital Logic Design",
        description: "Understand the building blocks of digital electronics and computer systems.",
        link: "https://www.bookstore.com/digital-logic-design", // Replace with actual URL
        img: "https://via.placeholder.com/150"
    },
    {
        title: "Mathematics for Computer Science",
        description: "A detailed book on discrete mathematics for students of computer science.",
        link: "https://www.bookstore.com/mathematics-for-computer-science", // Replace with actual URL
        img: "https://via.placeholder.com/150"
    },
    {
        title: "Cybersecurity Basics",
        description: "Learn the fundamental concepts of cybersecurity and how to protect online systems.",
        link: "https://www.bookstore.com/cybersecurity-basics", // Replace with actual URL
        img: "https://via.placeholder.com/150"
    }
];


// Shuffle books and select 3 random ones
function getRandomBooks() {
    return books.sort(() => Math.random() - 0.5).slice(0, 3);
}

// Update cards dynamically
// Update cards dynamically
function updateCards() {
    const randomBooks = getRandomBooks();

    // Update Card 1
    document.getElementById("title1").textContent = randomBooks[0].title;
    document.getElementById("desc1").textContent = randomBooks[0].description;
    document.getElementById("title1").setAttribute("data-link", randomBooks[0].link);
    document.getElementById("img1").src = randomBooks[0].img; // Update image source

    // Update Card 2
    document.getElementById("title2").textContent = randomBooks[1].title;
    document.getElementById("desc2").textContent = randomBooks[1].description;
    document.getElementById("title2").setAttribute("data-link", randomBooks[1].link);
    document.getElementById("img2").src = randomBooks[1].img; // Update image source

    // Update Card 3
    document.getElementById("title3").textContent = randomBooks[2].title;
    document.getElementById("desc3").textContent = randomBooks[2].description;
    document.getElementById("title3").setAttribute("data-link", randomBooks[2].link);
    document.getElementById("img3").src = randomBooks[2].img; // Update image source
}


// Redirect to book page
function goToBookPage(cardIndex) {
    const titleId = `title${cardIndex}`;
    const link = document.getElementById(titleId).getAttribute("data-link");
    window.open(link, "_blank");
}

// Start typing effect and update cards on load
window.onload = function () {
    typePlaceholder();
    updateCards();
};
