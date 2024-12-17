document.addEventListener("DOMContentLoaded", function () {
  const collegeInput = document.getElementById("college");
  const departmentDropdown = document.getElementById("department");
  const yearDropdown = document.getElementById("year");
  const semesterDropdown = document.getElementById("semester");
  const subjectDropdown = document.getElementById("subject");
  const topicsContainer = document.getElementById("topics-container");
  const videoTopicHeader = document.querySelector("h1");

  let collegeData = {};

  departmentDropdown.disabled = true;
  yearDropdown.disabled = true;
  semesterDropdown.disabled = true;
  subjectDropdown.disabled = true;

  collegeInput.addEventListener("change", function () {
    const collegeCode = this.value.trim().toLowerCase();

    if (!collegeCode) {
      alert("Please enter a valid college code.");
      return;
    }

    fetch(`./college/${collegeCode}.json`)
      .then((response) => response.json())
      .then((data) => {
        collegeData = data;
        populateDepartments(Object.keys(data));
        departmentDropdown.disabled = false;
      })
      .catch((error) => {
        console.error("Error loading college data:", error);
        alert("Invalid college code or file not found.");
      });
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
    yearDropdown.disabled = true;
    semesterDropdown.disabled = true;
    subjectDropdown.disabled = true;
    topicsContainer.innerHTML = "";
  }

  departmentDropdown.addEventListener("change", function () {
    const selectedDepartment = this.value;

    if (collegeData[selectedDepartment]) {
      const { years } = collegeData[selectedDepartment];
      populateYearDropdown(years);
      yearDropdown.disabled = false;
      semesterDropdown.disabled = true;
      subjectDropdown.disabled = true;
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
      subjectDropdown.disabled = true;
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

        // Add the line connecting parent (topic) to children
        const topicLine = document.createElement("div");
        topicLine.classList.add("topic-line");
        topicItem.appendChild(topicLine);

        const subtopicsContainer = document.createElement("div");
        subtopicsContainer.classList.add("subtopics-container");
        subtopicsContainer.style.display = "none"; // Initially hidden

        if (topic.subheading) {
          const subheadings = Array.isArray(topic.subheading)
            ? topic.subheading
            : topic.subheading.split(","); // Convert string to array if needed

          subheadings.forEach((subheading) => {
            const subheadingItem = document.createElement("p");
            subheadingItem.textContent = subheading.title || subheading;
            subheadingItem.classList.add("subheading-item");

       subheadingItem.addEventListener("click", function () {
         if (subheading.videoLink) {
           const subheadingTitle = subheading.title || subheading;
           const notes = subheading.notes || "No notes available"; // Fetch notes

           // Replace video link handling for Amazon S3/CloudFront
           const videoUrl = encodeURIComponent(subheading.videoLink);
           const subheadingTitleEncoded = encodeURIComponent(subheadingTitle);
           const notesEncoded = encodeURIComponent(notes); // Encode notes

           // Redirect to video page with videoUrl, subheading title, and notes as URL parameters
           window.location.href = `video.html?videoUrl=${videoUrl}&subheadingTitle=${subheadingTitleEncoded}&notes=${notesEncoded}`;

           // Update the video topic header
           videoTopicHeader.textContent = `Video: ${subheadingTitle}`;
         } else {
           alert("No video link available for this subheading.");
         }
       });





            subtopicsContainer.appendChild(subheadingItem);
          });

          // Add the line connecting the main topic to subtopics
          const subtopicLine = document.createElement("div");
          subtopicLine.classList.add("subtopic-line");
          topicItem.appendChild(subtopicLine);
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
          const isVisible =
            subtopicsContainer.style.display === "block" ? true : false;
          subtopicsContainer.style.display = isVisible ? "none" : "block";
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
});
