-- TSA1: Tasks for Today Management System
-- Database Schema and Sample Data

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
  `created_at` DATETIME NOT NULL
);

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------

CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `full_name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `created_at` DATETIME NOT NULL
);

-- --------------------------------------------------------
-- Dumping data for table `tasks`
-- --------------------------------------------------------
-- 8 records spanning 3+ dates including today (2026-09-28)

INSERT INTO `tasks` (`id`, `title`, `status`, `task_date`, `created_at`) VALUES
(1, 'Review project requirements', 'completed', '2026-09-25', '2026-09-25 09:00:00'),
(2, 'Create database schema', 'completed', '2026-09-25', '2026-09-25 10:00:00'),
(3, 'Design user interface mockups', 'completed', '2026-09-26', '2026-09-26 09:00:00'),
(4, 'Implement authentication module', 'pending', '2026-09-27', '2026-09-27 09:00:00'),
(5, 'Write unit tests for controllers', 'pending', '2026-09-27', '2026-09-27 14:00:00'),
(6, 'Deploy application to staging server', 'pending', '2026-09-28', '2026-09-28 09:00:00'),
(7, 'Conduct user acceptance testing', 'pending', '2026-09-28', '2026-09-28 10:00:00'),
(8, 'Prepare final presentation', 'pending', '2026-09-28', '2026-09-28 11:00:00'),
(9, 'Documentation and code review', 'pending', '2026-09-29', '2026-09-29 09:00:00'),
(10, 'Submit final deliverables', 'pending', '2026-09-30', '2026-09-30 17:00:00');

-- --------------------------------------------------------
-- Dumping data for table `users`
-- --------------------------------------------------------
-- Exactly 1 demo record

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `created_at`) VALUES
(1, 'haydenyu', 'Hayden Bert Y. Yu', 'haydenyu@student.edu', '2026-09-24 12:00:00');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
