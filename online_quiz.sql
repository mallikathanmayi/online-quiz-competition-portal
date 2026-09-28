-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2026 at 04:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `option1` varchar(100) DEFAULT NULL,
  `option2` varchar(100) DEFAULT NULL,
  `option3` varchar(100) DEFAULT NULL,
  `option4` varchar(100) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `round` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `quiz_id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `round`) VALUES
(1, 3, 'Which function is used to take input from the user?', 'scan()', 'read()', 'input()', 'get()', 'input()', 1),
(2, 3, 'Which keyword is used for loops?', 'loop', 'repeat', 'for', 'iterate', 'for', 1),
(3, 3, 'Which collection stores key-value pairs?', 'List', 'Tuple', 'Dictionary', 'Set', 'Dictionary', 1),
(4, 3, 'Which operator is used for exponentiation?', '^', '**', '*', '%', '**', 1),
(5, 3, 'Which file extension is used for Python files?', '.java', '.py', '.cpp', '.html', '.py', 1),
(6, 2, 'Who developed Java?', 'James Gosling', 'Guido van Rossum', 'Dennis Ritchie', 'Bjarne Stroustrup', 'James Gosling', 1),
(7, 2, 'Which keyword is used to create a class?', 'class', 'Class', 'define', 'new', 'class', 1),
(8, 2, 'Which method is the entry point of a Java program?', 'main()', 'start()', 'run()', 'init()', 'main()', 1),
(9, 2, 'Which symbol is used for single-line comments in Java?', '//', '#', '/* */', '<!-- -->', '//', 1),
(10, 2, 'Which package is imported by default in Java?', 'java.util', 'java.io', 'java.lang', 'java.sql', 'java.lang', 1),
(11, 2, 'Which keyword is used to inherit a class?', 'extends', 'implements', 'inherits', 'super', 'extends', 1),
(12, 2, 'Which data type stores whole numbers?', 'int', 'float', 'char', 'boolean', 'int', 1),
(13, 2, 'Which keyword is used to create an object?', 'create', 'new', 'object', 'make', 'new', 1),
(14, 2, 'Which loop executes at least once?', 'for', 'while', 'do-while', 'foreach', 'do-while', 1),
(15, 2, 'Java is a ______ language.', 'Compiled', 'Interpreted', 'Object-Oriented', 'Markup', 'Object-Oriented', 1),
(16, 1, 'DBMS stands for?', 'Database Management System', 'Data Base Machine System', 'Digital Base Management System', 'Database Machine Software', 'Database Management System', 1),
(17, 1, 'Which language is used to retrieve data from a database?', 'SQL', 'HTML', 'Python', 'Java', 'SQL', 1),
(18, 1, 'Which SQL command is used to display data?', 'SELECT', 'INSERT', 'UPDATE', 'DELETE', 'SELECT', 1),
(19, 1, 'Which key uniquely identifies a record?', 'Primary Key', 'Foreign Key', 'Candidate Key', 'Composite Key', 'Primary Key', 1),
(20, 1, 'Which SQL command is used to insert data?', 'INSERT', 'SELECT', 'DELETE', 'DROP', 'INSERT', 1),
(21, 1, 'Which SQL command is used to modify data?', 'UPDATE', 'ALTER', 'INSERT', 'CREATE', 'UPDATE', 2),
(22, 1, 'Which SQL command is used to remove records?', 'DELETE', 'DROP', 'TRUNCATE', 'REMOVE', 'DELETE', 2),
(23, 1, 'Which SQL clause is used to filter records?', 'WHERE', 'ORDER BY', 'GROUP BY', 'HAVING', 'WHERE', 2),
(24, 1, 'Which normal form removes partial dependency?', '2NF', '1NF', '3NF', 'BCNF', '2NF', 2),
(25, 1, 'MySQL is a?', 'Database Management System', 'Programming Language', 'Operating System', 'Web Browser', 'Database Management System', 2),
(26, 5, 'Who developed C language?', 'Dennis Ritchie', 'James Gosling', 'Guido van Rossum', 'Bjarne Stroustrup', 'Dennis Ritchie', 2),
(27, 5, 'Which function is the entry point of a C program?', 'main()', 'start()', 'run()', 'begin()', 'main()', 2),
(28, 5, 'Which header file is used for printf()?', 'stdio.h', 'math.h', 'string.h', 'stdlib.h', 'stdio.h', 2),
(29, 5, 'Which function is used to read input?', 'scanf()', 'printf()', 'cin', 'gets()', 'scanf()', 2),
(30, 5, 'Which symbol ends a statement in C?', '; ', ':', ',', '.', ';', 2),
(31, 4, 'Which property aligns text to the center?', 'text-align', 'align', 'font-align', 'center', 'text-align', 2),
(32, 4, 'Which property adds space inside an element?', 'padding', 'margin', 'border', 'height', 'padding', 2),
(33, 4, 'Which property makes text bold?', 'font-weight', 'font-style', 'text-align', 'font-size', 'font-weight', 2),
(34, 4, 'Which symbol starts a CSS class selector?', '.', '#', '*', '@', '.', 2),
(35, 5, 'Which data type stores whole numbers?', 'int', 'float', 'char', 'double', 'int', 2),
(36, 5, 'Which loop executes at least once?', 'do...while', 'while', 'for', 'if', 'do...while', 3),
(37, 5, 'Which operator is used for addition?', '+', '-', '*', '/', '+', 3),
(38, 5, 'Which keyword declares a constant?', 'const', 'constant', 'define', 'static', 'const', 3),
(39, 5, 'Which operator checks equality?', '==', '=', '!=', '<=', '==', 3),
(40, 4, 'What does CSS stand for?', 'Cascading Style Sheets', 'Computer Style Sheets', 'Creative Style Sheets', 'Colorful Style Sheets', 'Cascading Style Sheets', 3),
(41, 4, 'Which property changes text color?', 'color', 'font-size', 'background', 'margin', 'color', 3),
(42, 4, 'Which property changes background color?', 'background-color', 'color', 'border', 'margin', 'background-color', 3),
(43, 4, 'Which property changes the font size?', 'font-size', 'font-style', 'font-weight', 'text-align', 'font-size', 3),
(44, 4, 'Which property adds space outside an element?', 'margin', 'padding', 'border', 'width', 'margin', 3),
(45, 4, 'Which CSS property changes the width of an element?', 'width', 'height', 'size', 'length', 'width', 3);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_id` int(11) NOT NULL,
  `quiz_name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`quiz_id`, `quiz_name`, `category`, `duration`) VALUES
(1, 'HTML QUIZ', 'HTML', 10),
(2, 'JAVA QUIZ', 'JAVA', 10),
(3, 'PYTHON QUIZ', 'PYTHON', 10),
(4, 'CSS QUIZ', 'CSS', 10),
(5, 'C QUIZ', 'C', 10);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `total_questions` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `quiz_id`, `score`, `total_questions`, `email`) VALUES
(40, 1, 11, 20, 'mallika@gmail.com'),
(41, 2, 13, 15, 'mallika@gmail.com'),
(42, 3, 10, 10, 'mallika@gmail.com'),
(47, 1, 11, 20, 'mallika@gmail.com'),
(48, 2, 14, 15, 'mallika@gmail.com'),
(49, 3, 10, 10, 'mallika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `college` varchar(150) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `year` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `email`, `phone`, `college`, `branch`, `year`, `password`, `created_at`) VALUES
(6, 'P.Mallika', 'mallika@gmail.com', '1234567890', 'vits', 'CSE', '3rd Year', '123456', '2026-08-16 13:13:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
