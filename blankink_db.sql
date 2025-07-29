-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2025 at 05:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blankink_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `archived_users`
--

CREATE TABLE `archived_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` char(11) NOT NULL CHECK (`phone` regexp '^[0-9]{11}$'),
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `usertype` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archived_users`
--

INSERT INTO `archived_users` (`user_id`, `username`, `password`, `email`, `phone`, `firstname`, `middlename`, `lastname`, `usertype`) VALUES
(8, 'hi', '', 'pol@gmail.com', '09182637722', 'John', 'Pau', 'Paul', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `art_id` int(11) NOT NULL,
  `art_categ_id` varchar(50) NOT NULL,
  `art_name` varchar(50) NOT NULL,
  `art_des` text NOT NULL,
  `date_posted` date NOT NULL,
  `image_path` varchar(400) NOT NULL,
  `likes_count` int(11) NOT NULL,
  `comments_count` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`art_id`, `art_categ_id`, `art_name`, `art_des`, `date_posted`, `image_path`, `likes_count`, `comments_count`, `user_id`) VALUES
(6, 'Traditional Art', 'Biyaya', 'sketch lang hehe', '2025-02-22', 'uploads/biyaya_jarrendahan.png', 0, 0, 0),
(7, 'Artisan Crafts', 'potato planto', 'Thank you for your commission! :)', '2025-02-22', 'uploads/heehee_nhoacamil.png', 0, 0, 0),
(8, 'Traditional Art', 'Munang Portrait', 'baby ko <3<3', '2025-02-22', 'uploads/tux.png', 0, 0, 0),
(9, 'Digital Art', 'wip', 'hmm', '2025-02-22', 'uploads/sneakpeak.png', 0, 0, 0),
(10, 'Traditional Art', 'Doing Ballet', 'hirap mag perspective!', '2025-02-22', 'uploads/Doing-Ballett-liz-drawings.png', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eventss`
--

CREATE TABLE `eventss` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `organized_by` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `street` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_start_time` time NOT NULL,
  `description` text NOT NULL,
  `event_end_date` date NOT NULL,
  `event_end_time` time NOT NULL,
  `image_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventss`
--

INSERT INTO `eventss` (`id`, `event_name`, `organized_by`, `category`, `venue`, `street`, `barangay`, `city`, `province`, `event_start_date`, `event_start_time`, `description`, `event_end_date`, `event_end_time`, `image_path`) VALUES
(12, 'Komiket February 2025', 'Komiket Committee', 'Convention', 'SM Megamall, Megatrade Hall 2', 'corner Doña Julia Vargas Ave', 'Ortigas Center', 'Mandaluyong', 'Metro Manila', '2025-02-08', '11:00:00', 'LOVE KOMIKS & ART AT KOMIKET FEBRUARY! ♥️👑 #Supportlocalcreators, and kick off 2025 with a hearty adventure this Feb 8-9, 11AM-8PM, SM Megamall Megatrade Hall 2 for a weekend of passion-driven komiks, zines, prints, stickers, crafts, & merch of all shapes and sizes! There’ll be games & raffles for all your curious mind out there, so see you there, and don’t be late for tea-time~ 🍵🎩 🐰', '2025-02-09', '20:00:00', 'event_pic/febkomik.jpg'),
(13, 'HUBOG-LIKHA: Latagan At Acoustics', 'UP College of Fine Arts', 'Workshop', 'UP College of Fine Arts - Arts and Design West Hall, Multi-purpose Hall', '', 'Diliman', 'Quezon City', 'Metro Manila', '2025-02-19', '08:00:00', 'HAPPENING TOMORROW: 𝐇𝐔𝐁𝐎𝐆-𝐋𝐈𝐊𝐇𝐀: 𝐋𝐚𝐭𝐚𝐠𝐚𝐧 𝐚𝐭 𝐀𝐜𝐜𝐨𝐮𝐬𝐭𝐢𝐜𝐬 🎨🎶\r\n\r\nNais bigyang buhay ng HUBOG-LIKHA: Latagan at Acoustics Ngayong Fine Arts Month ang Buwan ng Sining sa pagladlad ng mga obra, pagtunog ng gitara\'t kantahan ng mga mag-aaral sa pagdiriwang ng pagtatangi sa buhay estudyante, kabilang ang mga lokal na organisasyon at pormasyon ng kolehiyo. 🎨\r\n​\r\nAbangan sila ngayong miyerkules! ✨', '2025-02-21', '17:00:00', 'event_pic/huboglikha.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` char(11) NOT NULL CHECK (`phone` regexp '^[0-9]{11}$'),
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `usertype` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phone`, `firstname`, `middlename`, `lastname`, `usertype`) VALUES
(7, 'adminako', 'pol', 'adminakopls@gmail.com', '09186293388', '', NULL, '', 'admin'),
(9, 'jwan02', 'pol', 'johnlennonestate@gmail.com', '09182637722', '', NULL, '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archived_users`
--
ALTER TABLE `archived_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `eventss`
--
ALTER TABLE `eventss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archived_users`
--
ALTER TABLE `archived_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `eventss`
--
ALTER TABLE `eventss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
