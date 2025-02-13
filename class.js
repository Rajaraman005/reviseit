document.addEventListener("DOMContentLoaded", function () {
  const collegeInput = document.getElementById("college");
  const departmentDropdown = document.getElementById("department");
  const yearDropdown = document.getElementById("year");
  const semesterDropdown = document.getElementById("semester");
  const subjectDropdown = document.getElementById("subject");
  const topicsContainer = document.getElementById("topics-container");
  const videoTopicHeader = document.querySelector("h1");

  let collegeData = {};

  // Disable dropdowns initially
  [departmentDropdown, yearDropdown, semesterDropdown, subjectDropdown].forEach(
    (dropdown) => (dropdown.disabled = true)
  );

  collegeInput.addEventListener("change", function () {
    const collegeCode = this.value.trim().toLowerCase();

    if (!collegeCode) {
      alert("Please enter a valid college code.");
      return;
    }

    const url = `https://raw.githubusercontent.com/Rajaraman005/reviseit/main/college/${encodeURIComponent(
      collegeCode
    )}.json`;

    fetch(url)
      .then((response) => {
        if (!response.ok) {
          throw new Error(
            `Network response was not ok. Status: ${response.status}`
          );
        }
        return response.json();
      })
      .then((data) => {
        collegeData = data;
        populateDepartments(Object.keys(data));
        departmentDropdown.disabled = false;
      })
      .catch((error) => {
        console.error("Error loading college data:", error);
        alert("Invalid college code or file not found.");
      });

    console.log("Fetching URL:", url);
  });

  function populateDepartments(departments) {
    departmentDropdown.innerHTML =
      '<option value="" disabled selected>Select Department</option>';
    departments.forEach((department) => {
      const option = document.createElement("option");
      option.value = department;
      option.textContent = department.toUpperCase();
      departmentDropdown.appendChild(option);
    });

    // Reset dependent dropdowns and topics
    resetDropdowns([yearDropdown, semesterDropdown, subjectDropdown]);
    topicsContainer.innerHTML = "";
  }

  departmentDropdown.addEventListener("change", function () {
    const selectedDepartment = this.value;

    if (collegeData[selectedDepartment]) {
      const { years } = collegeData[selectedDepartment];
      populateYearDropdown(years);
      yearDropdown.disabled = false;

      // Reset dependent dropdowns and topics
      resetDropdowns([semesterDropdown, subjectDropdown]);
      topicsContainer.innerHTML = "";
    }
  });

  yearDropdown.addEventListener("change", function () {
    const selectedYear = parseInt(this.value);
    const selectedDepartment = departmentDropdown.value;

    if (collegeData[selectedDepartment]) {
      const { semesters } = collegeData[selectedDepartment];
      populateSemesterDropdown(selectedYear, semesters);
      semesterDropdown.disabled = false;

      // Reset dependent dropdowns and topics
      resetDropdowns([subjectDropdown]);
      topicsContainer.innerHTML = "";
    }
  });

  semesterDropdown.addEventListener("change", function () {
    const selectedDepartment = departmentDropdown.value;
    const selectedSemester = parseInt(this.value);

    if (collegeData[selectedDepartment]) {
      const selectedSemesterData =
        collegeData[selectedDepartment].semesters[selectedSemester];
      const subjects = selectedSemesterData?.subjects;
      if (subjects) {
        populateSubjects(subjects);
        subjectDropdown.disabled = false;
      } else {
        alert("Subjects data not found for this semester.");
        subjectDropdown.disabled = true;
        topicsContainer.innerHTML = "";
      }
    }
  });

  subjectDropdown.addEventListener("change", function () {
    const selectedDepartment = departmentDropdown.value;
    const selectedSemester = semesterDropdown.value;
    const selectedSubject = this.value;

    const subjects =
      collegeData[selectedDepartment]?.semesters[selectedSemester]?.subjects;
    const topics = subjects ? subjects[selectedSubject] : null;

    topicsContainer.innerHTML = "<h3>Topics:</h3>";

    if (topics && topics.length > 0) {
      const topicsList = document.createElement("div");

      topics.forEach((topic, index) => {
        const topicItem = document.createElement("div");
        topicItem.classList.add("topic-item");

        const mainTopic = document.createElement("button");
        mainTopic.textContent = topic.topic || "No Heading Available";
        mainTopic.classList.add("main-topic");
        mainTopic.setAttribute("data-index", index);

        const topicLine = document.createElement("div");
        topicLine.classList.add("topic-line");
        topicItem.appendChild(topicLine);

        const subtopicsContainer = document.createElement("div");
        subtopicsContainer.classList.add("subtopics-container");
        subtopicsContainer.style.display = "none";

        if (topic.subheading) {
          const subheadings = Array.isArray(topic.subheading)
            ? topic.subheading
            : topic.subheading.split(",");

          subheadings.forEach((subheading) => {
            const subheadingItem = document.createElement("p");
            subheadingItem.textContent = subheading.title || subheading;
            subheadingItem.classList.add("subheading-item");

            subheadingItem.addEventListener("click", function () {
              if (subheading.videoLink) {
                const subheadingTitle = subheading.title || subheading;
                const notes = subheading.notes || "No notes available";

                const videoUrl = encodeURIComponent(subheading.videoLink);
                const subheadingTitleEncoded =
                  encodeURIComponent(subheadingTitle);
                const notesEncoded = encodeURIComponent(notes);

                window.location.href = `video.php?videoUrl=${videoUrl}&subheadingTitle=${subheadingTitleEncoded}&notes=${notesEncoded}`;

                videoTopicHeader.textContent = `Video: ${subheadingTitle}`;
              } else {
                alert("No video link available for this subheading.");
              }
            });

            subtopicsContainer.appendChild(subheadingItem);
          });
        } else {
          subtopicsContainer.innerHTML = "<p>No subheadings available</p>";
        }

        topicItem.appendChild(mainTopic);
        topicItem.appendChild(subtopicsContainer);
        topicsList.appendChild(topicItem);

        mainTopic.addEventListener("click", function () {
          const allSubtopics = document.querySelectorAll(
            ".subtopics-container"
          );
          allSubtopics.forEach((container) => {
            if (container !== subtopicsContainer) {
              container.style.display = "none";
            }
          });
          subtopicsContainer.style.display =
            subtopicsContainer.style.display === "block" ? "none" : "block";
        });
      });

      topicsContainer.appendChild(topicsList);
      topicsContainer.style.display = "block";
    } else {
      topicsContainer.innerHTML += "<p>No topics available.</p>";
      topicsContainer.style.display = "none";
    }
  });

  function populateYearDropdown(totalYears) {
    yearDropdown.innerHTML =
      '<option value="" disabled selected>Select Year</option>';
    for (let year = 1; year <= totalYears; year++) {
      const option = document.createElement("option");
      option.value = year;
      option.textContent = `${year} Year`;
      yearDropdown.appendChild(option);
    }
  }

  function populateSemesterDropdown(selectedYear, semesters) {
    semesterDropdown.innerHTML =
      '<option value="" disabled selected>Select Semester</option>';

    const totalSemesters = Object.keys(semesters).slice(0, selectedYear * 2);

    totalSemesters.forEach((semester) => {
      const option = document.createElement("option");
      option.value = semester;
      option.textContent = `${semester} Semester`;
      semesterDropdown.appendChild(option);
    });
  }

  function populateSubjects(subjects) {
    subjectDropdown.innerHTML =
      '<option value="" disabled selected>Select Subject</option>';
    for (let subject in subjects) {
      const option = document.createElement("option");
      option.value = subject;
      option.textContent = subject;
      subjectDropdown.appendChild(option);
    }
  }

  function resetDropdowns(dropdowns) {
    dropdowns.forEach((dropdown) => {
      dropdown.innerHTML =
        '<option value="" disabled selected>Select Option</option>';
      dropdown.disabled = true;
    });
  }
});

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
