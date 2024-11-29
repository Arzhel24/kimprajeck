-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2024 at 02:56 AM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `title`, `description`) VALUES
(1, 'Wild Life', 'Wild Life'),
(2, 'Food and Beverages', 'This is yummy!'),
(3, 'Science &amp; Technology', 'Science &amp; Technology'),
(4, 'Arts &amp; Crafts', 'Express your artistic side.'),
(5, 'Music and Dances', 'Spread good vibes through music.'),
(6, 'Uncategorized', 'This is general category for all posts.'),
(9, 'Celebrity', 'Latest news regarding famous people.'),
(11, 'Kpop', 'KOREAN ARTISTS');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(1, 'Amazing', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n', '1730521168Screenshot 2023-07-20 201548.png', '2024-11-02 02:28:13', 2, 12, 0),
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1730514839Screenshot 2023-05-20 211424.png', '2024-11-02 02:33:59', 3, 13, 0),
(3, 'Kentucky Fried Children', 'Kentucky Fried Children Kentucky Fried Children', '1731979799bg5.png', '2024-11-02 03:11:03', 1, 12, 1),
(4, 'Music and Dances', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '1730521369Screenshot 2023-08-04 211025.png', '2024-11-02 03:18:39', 1, 12, 0),
(12, 'AHAHAAHAHAH', 'AHAHAAHAHAHAHAHAAHAHAHAHAHAAHAHAHAHAHAAHAHAH', '1730525903Screenshot 2023-06-30 191240.png', '2024-11-02 05:38:23', 6, 12, 0),
(13, 'EHEHEHEHEHEHEH', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1730529627Screenshot 2023-08-07 172119.png', '2024-11-02 05:47:57', 1, 12, 0),
(14, 'MINECRAFT', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1730540925Screenshot 2023-08-05 172202.png', '2024-11-02 06:02:25', 1, 12, 0),
(16, 'AHHASDHjlsjdlajdlajdnasdnasdnas', '1kdshdhkhdfkasdhfksdhf;kalsdhf;kld234j2oudfsldfjs.dhnksdlnfd', '1731977476chocolate-cookie-frappe.png', '2024-11-19 00:51:16', 3, 18, 0),
(17, 'FRIES', 'DHAKJSASHGDJKASGDJASGDASDBVNMXBCMNXBCMZXNSboiujiohadhasdHASdas', '1731979183bur.jpg', '2024-11-19 00:55:09', 1, 18, 0),
(18, 'YUYEUYUEYUYEUYEEE', 'K{P{PKASJDLAJSDLKASJDLKAJSDHASIUE$A(U&amp;*A(R&amp;FSIYFHKJASHD', '1731979109wallp.jpg', '2024-11-19 01:18:04', 1, 19, 0),
(19, 'PARK JEONGWOO', 'I LOVE U', '1731980539pjw.jpg', '2024-11-19 01:40:15', 1, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(10, 'Jackie', 'Bondoc', 'Jackie', 'jackie@gmail.com', '$2y$10$RLlNXH55Oc1UVBjeuNgdkO80m7qioFfqLitT/7LxDBHlvKWDF6PIK', '1730455112Screenshot 2023-08-02 153737.png', 0),
(11, 'Ahiezer', 'Gwen', 'Shryden', 'shryden@gmail.com', '$2y$10$wSZI4HFoj6HrVPk/ZwDnsuh3BUPpO5ShFwSoWSQ/7iEG5TJS8qU/m', '1730455138Screenshot 2023-08-04 221803.png', 1),
(12, 'Thomas', 'Vincent', 'Tewleaps', 'tewleaps@gmail.com', '$2y$10$Ms2jOj66t9ht0TSScpYlcuqtot15.jZl03rA0MyQoSNjZOzxEGJyS', '1730455159Screenshot 2023-08-07 171055.png', 1),
(13, 'Kimberly', 'Feliselda', 'Asahi', 'jinaniKun@gmail.com', '$2y$10$/4Z.2Zups2kQpsRO4HHHCeTMHN3UevQea2a9tdGAm7CCDBefIm3Ea', '1730507770Screenshot 2024-02-12 013725.png', 0),
(18, 'Otep', 'Veyang', 'Veyang', 'otepveyang@gmail.com', '$2y$10$KPxlEuAusdXXy/E36CcI3.J/2dicg2slceycZVqwbj4esHMgFOpE.', '1731977436win.jpg', 0),
(19, 'Aira', 'Nunag', 'Aira', 'aira@gmail.com', '$2y$10$7LwniDErjH/FMKsBDqRrV.3EtcGsdmaqzNhGQs6UKFXP34Drit.5q', '1731979047kari.jpg', 0),
(20, 'Kimberly', 'Feliselda', 'Exusiai', 'exusiai@gmail.com', '$2y$10$w2OxQj4FsfYdDlB35zIuee6Fn/jjYP0V8n2awY4zefoxJu.7v46m6', '1731981016pjw.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`ID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
