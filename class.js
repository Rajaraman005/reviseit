document.addEventListener('DOMContentLoaded', function () {
      const departmentDropdown = document.getElementById('department');
      const yearDropdown = document.getElementById('year');
      const semesterDropdown = document.getElementById('semester');
      const subjectDropdown = document.getElementById('subject');
      const topicsContainer = document.getElementById('topics-container');

      // Define year and semester mappings for departments
      const departmentMappings = {
        bsc_cs: { years: 3, semesters: 6 },
        bca: { years: 3, semesters: 6 },
        engineering: { years: 4, semesters: 8 },
        bcom: { years: 3, semesters: 6 },
        ba: { years: 3, semesters: 6 },
        mba: { years: 2, semesters: 4 },
        mca: { years: 2, semesters: 4 },
      };

      // Define subjects and their topics for each department
      const departmentSubjects = {
        bsc_cs: {
          'Maths': ['Calculus', 'Linear Algebra', 'Probability Theory'],
          'Programming': ['C Programming', 'Java Programming', 'Data Structures'],
          'Data Structures': ['Arrays', 'Linked Lists', 'Stacks', 'Queues'],
        },
        bca: {
          'Web Development': ['HTML', 'CSS', 'JavaScript', 'React'],
          'DBMS': ['SQL', 'Normalization', 'ER Modeling'],
          'Networking': ['OSI Model', 'TCP/IP', 'IP Addressing'],
        },
        engineering: {
          'Thermodynamics': ['Laws of Thermodynamics', 'Heat Transfer'],
          'Circuits': ['AC Circuits', 'DC Circuits', 'Power Systems'],
          'Mechanics': ['Statics', 'Dynamics', 'Fluid Mechanics'],
        },
      };

      // Handle department selection
      departmentDropdown.addEventListener('change', function () {
        const selectedDepartment = this.value;
        const mapping = departmentMappings[selectedDepartment];

        if (mapping) {
          populateYearDropdown(mapping.years);
          yearDropdown.disabled = false;
          semesterDropdown.disabled = true;
          subjectDropdown.disabled = true;
          topicsContainer.innerHTML = ''; // Clear topics when changing department
        }
      });

      // Handle year selection
      yearDropdown.addEventListener('change', function () {
        const selectedDepartment = departmentDropdown.value;
        const mapping = departmentMappings[selectedDepartment];

        if (mapping) {
          populateSemesterDropdown(mapping.semesters);
          semesterDropdown.disabled = false;
        }
      });

      // Handle semester selection
      semesterDropdown.addEventListener('change', function () {
        const selectedDepartment = departmentDropdown.value;
        populateSubjects(selectedDepartment);
        subjectDropdown.disabled = false;
      });

      // Populate year dropdown
      function populateYearDropdown(totalYears) {
        yearDropdown.innerHTML = '<option value="" disabled selected>Select Year</option>';
        for (let year = 1; year <= totalYears; year++) {
          const option = document.createElement('option');
          option.value = `${year}st`;
          option.textContent = `${year} Year`;
          yearDropdown.appendChild(option);
        }
      }

      // Populate semester dropdown
      function populateSemesterDropdown(totalSemesters) {
        semesterDropdown.innerHTML = '<option value="" disabled selected>Select Semester</option>';
        for (let semester = 1; semester <= totalSemesters; semester++) {
          const option = document.createElement('option');
          option.value = `${semester}st`;
          option.textContent = `${semester} Semester`;
          semesterDropdown.appendChild(option);
        }
      }

      // Populate subject dropdown based on department
      function populateSubjects(department) {
        subjectDropdown.innerHTML = '<option value="" disabled selected>Select Subject</option>';
        const subjects = departmentSubjects[department];

        for (let subject in subjects) {
          const option = document.createElement('option');
          option.value = subject;
          option.textContent = subject;
          subjectDropdown.appendChild(option);
        }
      }

      // Display topics when a subject is selected
      subjectDropdown.addEventListener('change', function () {
        const selectedDepartment = departmentDropdown.value;
        const selectedSubject = this.value;
        const topics = departmentSubjects[selectedDepartment][selectedSubject];

        topicsContainer.innerHTML = '<h3>Topics:</h3>';
        const topicsList = document.createElement('div');
        topicsList.classList.add('topics');

        topics.forEach(function (topic) {
          const topicItem = document.createElement('div');
          topicItem.classList.add('topic-item');
          topicItem.textContent = topic;
          topicsList.appendChild(topicItem);
        });

        topicsContainer.appendChild(topicsList);
      });
    });