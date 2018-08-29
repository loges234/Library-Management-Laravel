-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2018 at 11:06 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

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

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_category` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL DEFAULT '0',
  `borrow_qty` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_author`, `book_category`, `stock_qty`, `borrow_qty`, `created_at`, `updated_at`) VALUES
(32, 'The Shadow of the Wind', 'Carlos Ruiz Zafón', 2, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(33, 'Lonesome Dove', 'Larry McMurtry', 2, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(34, 'Cold Mountain', 'Charles Frazier', 2, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(57, 'Bitten', 'Kelley Armstrong', 3, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(58, 'Bloodlines', 'Richelle Mead', 3, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(59, 'Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling', 4, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(60, 'City of Bones', 'Cassandra Clare', 4, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(61, 'Divergent', 'Veronica Roth', 4, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(62, 'The Lightning Thief', 'Rick Riordan', 4, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(77, 'The Red Pyramid', 'Rick Riordan', 4, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(78, 'Dark Lover', 'J.R. Ward', 4, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(80, 'It', 'Stephen King', 5, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(81, 'Salem\'s Lot', 'Stephen King', 5, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(82, 'Pet Sematary', 'Stephen King', 5, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(86, 'The Exorcist', 'William Peter Blatty', 5, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(87, 'The Haunting of Hill House', 'Shirley Jackson', 5, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(88, 'The Silence of the Lambs', 'Thomas Harris', 5, 25, 0, '2018-04-16 00:22:22', '2018-04-25 22:30:01'),
(89, 'Jurassic Park', 'Michael Crichton', 6, 25, 0, '2018-04-16 00:22:22', '2018-04-25 22:29:50'),
(90, 'The Hobbit', 'J.R.R. Tolkien', 6, 25, 0, '2018-04-16 00:22:22', '2018-04-25 22:29:31'),
(97, 'Patriot Games', 'Tom Clancy', 6, 25, 0, '2018-04-16 00:22:22', '2018-04-25 22:29:19'),
(98, 'The Three Musketeers', 'Alexandre Dumas', 6, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(99, 'Ice Station', 'Matthew Reilly', 6, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(100, 'Black Order', 'James Rollins', 6, 25, 0, '2018-04-16 00:22:22', '2018-04-25 22:28:55'),
(101, 'Seven Deadly Wonders', 'Matthew Reilly', 6, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(102, 'World Without End', 'Ken Follett', 6, 25, 0, '2018-04-16 00:22:22', '2018-04-25 22:28:47'),
(103, 'Harry Potter and the Deathly Hallows', 'J.K. Rowling', 6, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(118, 'Real Life Lesson From Quran', 'Muhammad Bilal Lakhani', 8, 25, 0, '2018-04-16 00:22:22', '2018-04-16 00:22:22'),
(127, 'Sejarah Malaysia V1', 'Ali Bhai', 2, 25, 1, '2018-04-16 00:22:22', '2018-08-25 20:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mystery', '2018-04-16 00:22:23', '2018-04-16 00:22:23'),
(2, 'Historical', '2018-04-16 00:22:23', '2018-04-16 00:22:23'),
(3, 'Romance', '2018-04-16 00:22:23', '2018-04-16 00:22:23'),
(4, 'Children', '2018-04-16 00:22:23', '2018-04-16 00:22:23'),
(5, 'Horror', '2018-04-16 00:22:23', '2018-04-16 00:22:23'),
(6, 'Action-Adventure Novels', '2018-04-16 00:22:23', '2018-04-16 00:22:23'),
(7, 'Arabic', '2018-04-16 00:22:23', '2018-04-16 00:22:23'),
(8, 'Islamic', '2018-04-16 00:22:23', '2018-04-16 00:22:23'),
(9, 'Uncategorized', '2018-04-16 00:22:23', '2018-04-16 00:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `issuecounter`
--

CREATE TABLE `issuecounter` (
  `id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(76, 1, '2018-08-26 04:43:15', '2018-08-26 04:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_qty` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `member_id`, `book_id`, `issue_qty`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 8241, 127, 1, '2018-09-01', '2018-08-25 20:43:15', '2018-08-25 20:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(10) UNSIGNED NOT NULL,
  `member_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_blood_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_reg_no` int(11) DEFAULT NULL,
  `member_nid_no` bigint(20) NOT NULL,
  `member_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_dept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_contact` int(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `member_blood_group`, `member_reg_no`, `member_nid_no`, `member_email`, `member_dept`, `member_contact`, `created_at`, `updated_at`) VALUES
(8241, 'Loges', 'Uniten', 101088, 95030714603999, 'loges_234@yahoo.com', 'IT', 1797760191, '2018-08-25 20:35:50', '2018-08-25 20:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_19_143556_create_books_table', 1),
(4, '2018_01_26_112948_create_issues_table', 1),
(5, '2018_01_26_180653_create_members_table', 1),
(6, '2018_02_12_174739_create_categories_table', 1),
(7, '2018_02_16_200412_create_issue_counter_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('loges_234@yahoo.com', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@gmail.com', '$2y$10$LTt4x4quWK0eFMiut3y0dun2vPhFv4qH0/vKusr0z7z/r2XJ5GVPy', 'HBtQzO4GnDEuYN6GH59dJ1TJEBAffgo7OqQIsbhEI3BkaVzltCfBsxJTryEO', NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `issuecounter`
--
ALTER TABLE `issuecounter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8242;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
