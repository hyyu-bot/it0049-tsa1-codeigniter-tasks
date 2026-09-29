-- TSA2: Tasks for Today Management System - Full CRUD and Auth
-- Database Schema and Sample Data
-- Updated with: password column, is_archived for soft deletes

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `tsa1_db`;
USE `tsa1_db`;

-- --------------------------------------------------------
-- Table structure for table `tasks`
-- --------------------------------------------------------

CREATE TABLE `tasks` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(150) NOT NULL,
  `status` VARCHAR(20) NOT NULL DEFAULT 'pending',
  `task_date` DATE NOT NULL,
  `is_archived` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL
);

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------

CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `full_name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME NOT NULL
);

-- --------------------------------------------------------
-- Dumping data for table `tasks`
-- --------------------------------------------------------
-- 10 records spanning 5 dates (2026-09-26 to 2026-09-30)
-- Tasks 1-2 updated from 09-25 to 09-26 per user request

INSERT INTO `tasks` (`id`, `title`, `status`, `task_date`, `is_archived`, `created_at`, `updated_at`) VALUES
(1, 'Review project requirements', 'completed', '2026-09-26', 0, '2026-09-25 09:00:00', NULL),
(2, 'Create database schema', 'completed', '2026-09-26', 0, '2026-09-25 10:00:00', NULL),
(3, 'Design user interface mockups', 'completed', '2026-09-26', 0, '2026-09-26 09:00:00', NULL),
(4, 'Implement authentication module', 'pending', '2026-09-27', 0, '2026-09-27 09:00:00', NULL),
(5, 'Write unit tests for controllers', 'pending', '2026-09-27', 0, '2026-09-27 14:00:00', NULL),
(6, 'Deploy application to staging server', 'pending', '2026-09-28', 0, '2026-09-28 09:00:00', NULL),
(7, 'Conduct user acceptance testing', 'pending', '2026-09-28', 0, '2026-09-28 10:00:00', NULL),
(8, 'Prepare final presentation', 'pending', '2026-09-28', 0, '2026-09-28 11:00:00', NULL),
(9, 'Documentation and code review', 'pending', '2026-09-29', 0, '2026-09-29 09:00:00', NULL),
(10, 'Submit final deliverables', 'pending', '2026-09-30', 0, '2026-09-30 17:00:00', NULL);

-- --------------------------------------------------------
-- Dumping data for table `users`
-- --------------------------------------------------------
-- Exactly 1 demo record with hashed password

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `password`, `created_at`) VALUES
(1, 'haydenyu', 'Hayden Bert Y. Yu', 'haydenyu@student.edu', MD5('admin123'), '2026-09-24 12:00:00');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
