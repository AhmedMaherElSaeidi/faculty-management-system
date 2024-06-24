# Faculty Management System

## Project Description

The Faculty Management System is designed to streamline communication between faculty and students, provide access to course materials, and facilitate online course registration. It supports three user roles: Admin, Professor, and Student, each with specific functionalities tailored to their needs.

## System Functionalities

### 1. User Roles

- **Admin**: Responsible for system administration.
- **Professor**: Faculty members who manage courses and assessments.
- **Student**: Users who enroll in courses and access educational resources.

### 2. Admin Features

- **Manage Levels**: Ability to define hierarchical levels (e.g., lv1, lv2, lv3, lv4).
- **Add Subjects**: Including name, code, description, level (selected from a dropdown), and semester.
- **Manage Professors**: Enter details such as first name, last name, degree, gender, national ID, date of birth, and department. Admin assigns usernames and passwords for login.
- **Create Courses**: Assign subjects to professors, allocate classrooms, and schedule courses on specific days and times (2-hour duration).
- **Search Professors**: Filter by department to update or delete their information.
- **List Registered Students**: View and manage student data within the system.

### 3. Student Features

- **Register Information**: Input personal details like name, age, email, password, phone number, and academic level.
- **View Courses**: After logging in, students can access a list of available courses.
- **Enroll in Courses**: Register for courses, ensuring no overlap in schedule with enrolled courses.
- **View Timetable**: See registered courses displayed in a weekly timetable format.
- **Upload Answers**: Submit answer files for questions posed by professors in specific courses.
- **View Transcript**: Access a table-formatted transcript displaying registered courses and grades.

### 4. Professor Features

- **View Assigned Courses**: Review courses assigned by the admin.
- **Pose Questions**: Add text-based questions for students to answer via file uploads.
- **Grade Students**: Assess student submissions and assign grades accordingly.

## Getting Started

To start the Faculty Management System:

1. **Clone Repository**: Clone the project repository.
2. **Database Setup**: Import the `facultymanagementsystem.sql` file to initialize the database schema and load initial data.
3. **Run the Application**: Launch the application using `xampp`.

