-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 12:09 PM
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
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `option1` text DEFAULT NULL,
  `option2` text DEFAULT NULL,
  `option3` text DEFAULT NULL,
  `option4` text DEFAULT NULL,
  `correct_option` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_option`) VALUES
(1, 'What does HTTPS stand for?', 'Hyper Text Transfer Protocol Secure', 'Hyper Transfer Text Protocol Secure', 'Hyper Text Transport Protocol Secure', 'Hyper Transfer Text Protocol Standard', 1),
(2, 'What is the primary function of a firewall?', 'To monitor network traffic', 'To block unwanted network traffic', 'To encrypt network traffic', 'To manage user permissions', 2),
(3, 'Which of the following is a common type of malware?', 'Trojan horse', 'Anti-virus software', 'Firewall', 'Backup software', 1),
(4, 'What is a phishing attack?', 'An attempt to trick users into revealing personal information', 'An attack that exploits system vulnerabilities', 'A method of encrypting data', 'A type of antivirus software', 1),
(5, 'What is the purpose of multi-factor authentication (MFA)?', 'To provide an additional layer of security', 'To manage user roles', 'To reduce network bandwidth usage', 'To improve password strength', 1),
(6, 'What does the term \"encryption\" mean?', 'The process of encoding data to protect it from unauthorized access', 'The process of increasing data size', 'The process of reducing data size', 'The process of managing user access to data', 1),
(7, 'What is a Denial of Service (DoS) attack?', 'An attempt to make a service unavailable by overwhelming it with traffic', 'An attempt to steal sensitive data from a server', 'An attempt to bypass security systems', 'An attempt to inject malicious code into a system', 1),
(8, 'What is a botnet?', 'A network of infected computers controlled by an attacker', 'A type of computer virus', 'A type of firewall', 'A type of data encryption', 1),
(9, 'Which of the following is a secure password policy?', 'Using a combination of letters, numbers, and symbols', 'Using only your name as a password', 'Using the same password for multiple sites', 'Sharing your password with trusted friends', 1),
(10, 'What does the term \"social engineering\" refer to?', 'Manipulating people into revealing sensitive information', 'A method for securing data with encryption', 'A technique for managing user access', 'A type of network monitoring tool', 1),
(11, 'What is the main goal of a penetration test?', 'To identify vulnerabilities in a system', 'To create a backup of critical data', 'To monitor network traffic', 'To manage system updates', 1),
(12, 'Which of the following is an example of a strong password?', 'P@ssw0rd123', 'password123', '123456', 'admin', 1),
(13, 'What is a zero-day vulnerability?', 'A security flaw that is exploited before the vendor can release a patch', 'A vulnerability that is fixed by a security patch', 'A vulnerability that only affects offline systems', 'A vulnerability caused by human error', 1),
(14, 'What does \"patch management\" refer to?', 'The process of applying security updates to software and systems', 'The process of securing network traffic', 'The process of managing user permissions', 'The process of monitoring network traffic', 1),
(15, 'What is the purpose of an antivirus program?', 'To detect and remove malicious software from a computer', 'To monitor network traffic', 'To encrypt sensitive files', 'To perform backups of critical data', 1),
(16, 'What is two-factor authentication (2FA)?', 'A security method where two forms of identification are required to access an account', 'A method of encrypting data', 'A method of improving system performance', 'A process to delete unwanted files from a computer', 1),
(17, 'What is SQL injection?', 'A technique where malicious SQL statements are inserted into a form input to access a database', 'A method of encrypting sensitive data', 'A method of creating strong passwords', 'A tool for monitoring network traffic', 1),
(18, 'What does VPN stand for?', 'Virtual Private Network', 'Virtual Protected Network', 'Very Protected Network', 'Virtual Password Network', 1),
(19, 'What is the purpose of an intrusion detection system (IDS)?', 'To monitor and detect malicious activity on a network', 'To manage network traffic', 'To encrypt network communications', 'To store sensitive data securely', 1),
(20, 'What is ransomware?', 'Malware that encrypts files and demands payment for decryption', 'A type of firewall software', 'A tool for creating backups of data', 'Software for managing user permissions', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(5, 'faiza', '$2y$10$5RPv9CEXT7Mo4/o8k2.9P.xS5wUEMVoIiEpEgUAcK87I46N/MhFBO'),
(9, 'Ahsan', '$2y$10$h/3ck5mzS6meXH6gbc.KeO0qKocjCZY5N3ZBnPT3e5FztmXXoCNGW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
