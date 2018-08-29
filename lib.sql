-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 10:06 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--



--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_author`, `book_category`, `stock_qty`, `borrow_qty`, `created_at`, `updated_at`) VALUES
(80, 'IT', 'Stephen King', 5, 25, 0, '2018-04-16 00:22:22', '2018-08-26 01:21:49'),
(86, 'The Exorcist', 'William Peter Blatty', 5, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(97, 'Patriot Games', 'Tom Clancy', 6, 25, 0, '2018-04-16 00:22:22', '2018-04-25 22:29:19'),
(98, 'Hello World PHP', 'Hannah', 9, 25, 0, '2018-04-16 00:22:22', '2018-08-27 23:41:27'),
(99, 'Minecraft', 'Brooks, Max', 9, 25, 0, '2018-04-16 00:22:22', '2018-08-27 23:42:01'),
(100, 'The Darkest Minds', 'Hazli', 6, 25, 0, '2018-04-16 00:22:22', '2018-08-26 01:17:04'),
(101, 'Jangan Benci Cintaku', 'Emy Rotero', 3, 25, 0, '2018-04-16 00:22:22', '2018-08-26 01:14:29'),
(102, 'Boboiboy Galazy X Lawak', 'Azlan', 9, 25, 0, '2018-04-16 00:22:22', '2018-08-27 23:42:01'),
(103, 'Harry Potter and the Deathly Hallows', 'J.K. Rowling', 6, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(118, 'The Kucing Man', 'Hazli', 6, 2, 2, '2018-04-16 00:22:22', '2018-08-26 09:17:24'),
(127, 'Sejarah Malaysia V1', 'Ali Bhai', 9, 24, 1, '2018-04-16 00:22:22', '2018-08-27 23:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--



--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(12, 'Novel', '2018-08-27 23:43:17', '2018-08-27 23:43:17'),
(13, 'Agama', '2018-08-27 23:45:52', '2018-08-27 23:45:52'),
(14, 'Akademik', '2018-08-27 23:45:58', '2018-08-27 23:45:58'),
(15, 'Kanak-kanak', '2018-08-27 23:46:05', '2018-08-27 23:46:05'),
(16, 'Bacaan Umum', '2018-08-27 23:46:12', '2018-08-27 23:46:12'),
(17, 'Fiksyen', '2018-08-27 23:46:18', '2018-08-27 23:46:18'),
(18, 'Bukan Fiksyen', '2018-08-27 23:46:25', '2018-08-27 23:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `issuecounter`
--


--
-- Dumping data for table `issuecounter`
--

INSERT INTO `issuecounter` (`id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-03-31 21:08:19', '2018-03-31 21:08:19'),
(2, 1, '2018-03-31 21:08:19', '2018-03-31 21:08:19'),
(3, 1, '2018-03-31 21:08:19', '2018-03-31 21:08:19'),
(4, 1, '2018-03-31 21:08:19', '2018-03-31 21:08:19'),
(5, 1, '2018-03-31 21:08:19', '2018-03-31 21:08:19'),
(6, 1, '2018-03-31 21:08:19', '2018-03-31 21:08:19'),
(7, 1, '2018-04-02 21:08:19', '2018-04-02 21:08:19'),
(8, 1, '2018-04-02 21:08:19', '2018-04-02 21:08:19'),
(9, 1, '2018-04-02 21:08:19', '2018-04-02 21:08:19'),
(10, 1, '2018-04-02 21:08:19', '2018-04-02 21:08:19'),
(11, 1, '2018-04-02 21:08:19', '2018-04-02 21:08:19'),
(12, 1, '2018-04-02 21:08:19', '2018-04-02 21:08:19'),
(13, 1, '2018-04-02 21:08:19', '2018-04-02 21:08:19'),
(14, 1, '2018-04-06 21:08:19', '2018-04-02 21:08:19'),
(15, 1, '2018-04-06 21:08:19', '2018-04-02 21:08:19'),
(16, 1, '2018-04-06 21:08:19', '2018-04-02 21:08:19'),
(17, 1, '2018-04-06 21:08:19', '2018-04-02 21:08:19'),
(18, 1, '2018-04-06 21:08:19', '2018-04-02 21:08:19'),
(19, 1, '2018-04-03 21:08:19', '2018-04-02 21:08:19'),
(20, 1, '2018-04-03 21:08:19', '2018-04-02 21:08:19'),
(21, 1, '2018-04-03 21:08:19', '2018-04-02 21:08:19'),
(22, 1, '2018-04-03 21:08:19', '2018-04-02 21:08:19'),
(23, 1, '2018-04-03 21:08:19', '2018-04-02 21:08:19'),
(24, 1, '2018-04-03 21:08:19', '2018-04-02 21:08:19'),
(25, 0, '2018-04-03 21:08:19', '2018-04-02 21:08:19'),
(26, 1, '2018-04-03 21:08:19', '2018-04-02 21:08:19'),
(27, 1, '2018-04-04 21:08:19', '2018-04-02 21:08:19'),
(28, 1, '2018-04-04 21:08:19', '2018-04-02 21:08:19'),
(29, 1, '2018-04-04 21:08:19', '2018-04-02 21:08:19'),
(30, 1, '2018-04-04 21:08:19', '2018-04-02 21:08:19'),
(31, 1, '2018-04-04 21:08:19', '2018-04-02 21:08:19'),
(32, 1, '2018-04-04 21:08:19', '2018-04-02 21:08:19'),
(33, 1, '2018-04-04 21:08:19', '2018-04-02 21:08:19'),
(34, 1, '2018-04-04 21:08:19', '2018-04-02 21:08:19'),
(35, 1, '2018-04-05 21:08:19', '2018-04-02 21:08:19'),
(36, 1, '2018-04-05 21:08:19', '2018-04-02 21:08:19'),
(37, 1, '2018-04-11 21:08:19', '2018-04-02 21:08:19'),
(38, 1, '2018-04-11 21:08:19', '2018-04-02 21:08:19'),
(39, 1, '2018-04-11 21:08:19', '2018-04-02 21:08:19'),
(40, 1, '2018-04-11 21:08:19', '2018-04-02 21:08:19'),
(41, 1, '2018-04-11 21:08:19', '2018-04-02 21:08:19'),
(42, 1, '2018-04-05 21:08:19', '2018-04-02 21:08:19'),
(43, 1, '2018-04-05 21:08:19', '2018-04-02 21:08:19'),
(44, 1, '2018-04-05 21:08:19', '2018-04-02 21:08:19'),
(45, 1, '2018-04-05 21:08:19', '2018-04-02 21:08:19'),
(46, 1, '2018-04-06 21:08:19', '2018-04-02 21:08:19'),
(47, 1, '2018-04-06 21:08:19', '2018-04-02 21:08:19'),
(48, 1, '2018-04-06 21:08:19', '2018-04-02 21:08:19'),
(49, 1, '2018-04-06 21:08:19', '2018-04-02 21:08:19'),
(50, 1, '2018-04-07 21:08:19', '2018-04-02 21:08:19'),
(51, 1, '2018-04-07 21:08:19', '2018-04-02 21:08:19'),
(52, 1, '2018-04-07 21:08:19', '2018-04-02 21:08:19'),
(53, 1, '2018-04-07 21:08:19', '2018-04-02 21:08:19'),
(54, 1, '2018-04-07 21:08:19', '2018-04-02 21:08:19'),
(55, 1, '2018-04-07 21:08:19', '2018-04-02 21:08:19'),
(56, 1, '2018-04-07 21:08:19', '2018-04-02 21:08:19'),
(57, 1, '2018-04-07 21:08:19', '2018-04-02 21:08:19'),
(58, 1, '2018-04-07 21:08:19', '2018-04-02 21:08:19'),
(59, 1, '2018-04-08 21:08:19', '2018-04-02 21:08:19'),
(60, 1, '2018-04-08 21:08:19', '2018-04-02 21:08:19'),
(61, 1, '2018-04-08 21:08:19', '2018-04-02 21:08:19'),
(62, 1, '2018-04-08 21:08:19', '2018-04-02 21:08:19'),
(63, 1, '2018-04-08 21:08:19', '2018-04-02 21:08:19'),
(64, 1, '2018-04-08 21:08:19', '2018-04-02 21:08:19'),
(65, 1, '2018-04-08 21:08:19', '2018-04-02 21:08:19'),
(66, 1, '2018-04-08 21:08:19', '2018-04-02 21:08:19'),
(67, 1, '2018-04-08 21:08:19', '2018-04-02 21:08:19'),
(68, 1, '2018-04-08 21:08:19', '2018-04-02 21:08:19'),
(69, 1, '2018-04-09 21:08:19', '2018-04-02 21:08:19'),
(70, 1, '2018-04-09 21:08:19', '2018-04-02 21:08:19'),
(71, 1, '2018-04-09 21:08:19', '2018-04-02 21:08:19'),
(72, 1, '2018-04-09 21:08:19', '2018-04-02 21:08:19'),
(73, 1, '2018-04-09 21:08:19', '2018-04-02 21:08:19'),
(74, 1, '2018-04-09 21:08:19', '2018-04-02 21:08:19'),
(75, 1, '2018-04-09 21:08:19', '2018-04-02 21:08:19'),
(76, 1, '2018-08-26 04:43:15', '2018-08-26 04:43:15'),
(77, 1, '2018-08-26 09:42:40', '2018-08-26 09:42:40'),
(78, 1, '2018-08-26 09:43:18', '2018-08-26 09:43:18'),
(79, 1, '2018-08-27 03:58:48', '2018-08-27 03:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--



--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `member_id`, `book_id`, `issue_qty`, `return_date`, `created_at`, `updated_at`) VALUES
(2, 8241, 118, 1, '2018-08-29', '2018-08-26 01:42:40', '2018-08-26 01:42:40'),
(3, 8241, 118, 1, '2018-08-25', '2018-08-26 01:43:18', '2018-08-26 01:43:18'),
(4, 8241, 127, 1, '2018-08-28', '2018-08-26 19:58:48', '2018-08-26 19:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--



--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `member_blood_group`, `member_reg_no`, `member_nid_no`, `member_email`, `member_dept`, `member_contact`, `created_at`, `updated_at`) VALUES
(8241, 'Loges', 'Uniten', 101088, 950307146039, 'loges_234@yahoo.com', 'IT', 179776019, '2018-08-25 20:35:50', '2018-08-26 01:31:49'),
(8242, 'Hazli', 'Kajang', NULL, 900101012345, 'hazli@gmail.com', NULL, 123456789, '2018-08-26 01:37:59', '2018-08-26 17:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--



--
-- Dumping data for table `migrations`
--


-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--


--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('loges_234@yahoo.com', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--



--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'Admin', 'admin@gmail.com', '$2y$10$LTt4x4quWK0eFMiut3y0dun2vPhFv4qH0/vKusr0z7z/r2XJ5GVPy', 'gNiNY4Zc1rfL5GWSZynxg7WRK5Euemv8Cvl3VcJ8OJqO4YF99GI43OmEV2sl', NULL, NULL),
(3, 0, 'Zureen', 'jjcamelia@gmail.com', '$2y$10$GPF0yON/ezo9p0owsOGEvOuH9SX8vYFaFxFA899e7Ozfas8cYORbC', '5uwoMjLgtpGelmiF8hAAJCT9BubIjww94UxuF1nzZHVibwIxTWx4YElOExSO', '2018-08-27 22:20:14', '2018-08-27 22:20:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `issuecounter`
--
ALTER TABLE `issuecounter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `members_member_nid_no_unique` (`member_nid_no`),
  ADD UNIQUE KEY `members_member_email_unique` (`member_email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `issuecounter`
--
ALTER TABLE `issuecounter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8243;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
