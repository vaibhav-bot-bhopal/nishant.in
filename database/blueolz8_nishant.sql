-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 02:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blueolz8_nishant`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `original_name`, `filename`, `file_size`, `file_path`, `created_at`, `updated_at`) VALUES
(34, 'SDTRx1.jpg', '7fe76a976749b2c9e13ddf3e5d327e32ba63e2c1.jpg', 1178373, 'C:\\xampp\\htdocs\\nishant.in\\storage\\app/public/gallery\\7fe76a976749b2c9e13ddf3e5d327e32ba63e2c1.jpg', '2021-07-06 23:48:11', '2021-07-06 23:48:11'),
(35, 'SDTRx11.jpg', '182ed336f56ff3095533989962b38230209d2744.jpg', 1283584, 'C:\\xampp\\htdocs\\nishant.in\\storage\\app/public/gallery\\182ed336f56ff3095533989962b38230209d2744.jpg', '2021-07-06 23:48:34', '2021-07-06 23:48:34'),
(36, 'SDTRx12.jpg', '99b6903b98d4a35d6390b2d765dfdc3949d388bc.jpg', 610093, 'C:\\xampp\\htdocs\\nishant.in\\storage\\app/public/gallery\\99b6903b98d4a35d6390b2d765dfdc3949d388bc.jpg', '2021-07-06 23:48:34', '2021-07-06 23:48:34'),
(37, 'SDTRx17.jpg', '05937e63552024ef7ab14c001d6cfd009dbfa508.jpg', 1403598, 'C:\\xampp\\htdocs\\nishant.in\\storage\\app/public/gallery\\05937e63552024ef7ab14c001d6cfd009dbfa508.jpg', '2021-07-06 23:48:35', '2021-07-06 23:48:35'),
(38, 'SDTRx19.jpg', '768c0035825535f86c8682fc9b2c28bd44f7f505.jpg', 1252853, 'C:\\xampp\\htdocs\\nishant.in\\storage\\app/public/gallery\\768c0035825535f86c8682fc9b2c28bd44f7f505.jpg', '2021-07-06 23:48:35', '2021-07-06 23:48:35'),
(39, 'SDTRx26.jpg', 'c57ab5ae820e5e437bf821f739630474a1abe975.jpg', 1046261, 'C:\\xampp\\htdocs\\nishant.in\\storage\\app/public/gallery\\c57ab5ae820e5e437bf821f739630474a1abe975.jpg', '2021-07-06 23:48:35', '2021-07-06 23:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_27_070436_create_news_englishes_table', 1),
(5, '2021_03_01_073111_create_testimonials_table', 2),
(6, '2021_03_25_072441_create_galleries_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news_englishes`
--

CREATE TABLE `news_englishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mimages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_englishes`
--

INSERT INTO `news_englishes` (`id`, `title`, `slug`, `date`, `discription`, `image`, `mimages`, `created_at`, `updated_at`) VALUES
(49, 'The Legend of Kukraj', 'the-legend-of-kukraj-2', '2021-03-15', '<p style=\"text-align:justify;\">So let me tell you a story. The story of Kukraj. It goes back over 600 years.<br>This forest which is now Ranthambhore tiger reserve, was just a forest back then and Allauddin Khilji was the ruler of Sawai Madhopur. The only people who would cross this dense jungle were the moghia tribesmen, or the occasional traders.<br>Once there was a group of tribal people who had a huge dog with them. Dogs can sense a predator and warn you so most people kept dogs with them. Although this one they say was the size of a St. Bernard.<br>One day a rich trader travelling to Ranthambhore stumbled upon them. He noticed this dog and offered to buy it. The tribesmen, reluctant at first, gave up the dog for a handsome amount of money.<br>After only a few days, the trader, enters his house to find blood and flesh in his room. He thought the dog must have killed some cat for himself. The trader, a religious man, got so furiated that he started beating the dog badly. The dog yelped and ran away from his house.<br>A few days went by and the trader happened to cross the forest again. On this visit he went to the tribesmen to tell them about the incident but he was shocked to find the dog sleeping there. Apparently when it was beaten, instinctively it ran back to his original owners. The trader, complaining about the money he had paid for the dog lifted a big rock and smashed the dog\'s skull with it. It died then and there.<br>When he returned home he shared the whole incident with his wife, taking pride in how he had killed the dog with brutality. The woman was in shock after hearing the account. She started to cry. The trader was confused!<br>And then she told him what had happened...<br>One day when the trader was out, a giant snake entered his chamber. His wife was alone at home with no one around to help. She started yelling for help. And this dog came running into the room. Upon seeing the snake he started fighting with it and eventually killed it and saved the lady.<br>The trader felt deep, deep guilt when he learned the truth. He rode back to the tribesmen, sad and apologetic, and sat by the place where he had killed the magnificent dog, and wept for a long time cursing himself for his sin.<br>Afterwards he constructed a small temple there, in memory of the \'great dog\'. It happens to be there still and is the only temple in the world made in the name of a dog. That valley later got named Kukraj ghati after the dog. Kuk comes from sanskrit word kukkur meaning Dog, and so Kukraj means Lord of Dogs.</p><p>Today Kukraj ghati lies in an area where the terrain is so tough that tourism had to be closed. A few years back when it was still open, Raees Bhai, the oldest safari driver in Ranthambhore was returning with his guests very late in the evening. Suddenly he whispered \"sahab tiger, tiger, tiger!\"<br>The European tourists were thrilled to find a tiger at twilight. But Raees noticed that the tiger (most probably T42, a dominant male) was acting strange. He was sitting with his head slightly bowed, ears down and shoulders shivering. He was wagging the end of his tail vigorously, which in cats, shows confusion or fear.<br>What Raees saw next would have made anyone numb... A large, shaggy dog, grey in color, the size of a young cow, was walking towards them. The huge tiger was cowering in its presence. The dog simply took a stroll on the dirt track in front of them, came right up to the gypsy, sniffed it, looked straight into the eyes of its occupants, and walked away in the direction of the tomb of Kukraj and vanished into the dense forest...</p><p style=\"text-align:justify;\">In August 2014, we spent 11 days straight without seeing a tiger. Our guide insisted that we prayed to Kukraj. We finished the agarbatti n stuff, sat in our gypsy and \"kaawwwwww!\" a sambhar deer gave a distressed alarm call from somewhere. Suddenly atleast 20-30 langurs started running and climbed the trees. Then she appeared. Tigress T19 Krishna. Then one, two, three all her cubs followed her. Sun setting in the backdrop, and four tigers walking towards us. Regal, almost magical it was.</p>', '1615808724Kukraj.jpeg', '', '2021-03-15 06:15:24', '2021-04-12 02:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `discription`, `image`, `created_at`, `updated_at`) VALUES
(14, 'Rob Sullivan', 'Nishant has been a great asset to our Disneynature Tiger team throughout three years of production and is a huge pleasure to work with. He’s an excellent communicator, and a consummate diplomat, with solid technical knowledge and field skills to back it up. Nishant’s understanding of animal behaviour is a great help when assisting our expert cameramen in the jungle. His silky drone skills and hands-on gimbal experience have been invaluable, and he is always great company on location.', '1615895140avatar.jpg', '2021-03-16 06:15:41', '2021-03-16 06:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_as`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$ODsjXA1Fzn/v6GWCDbBmieNDpZD3NQAPxFWOLIBjxI17rOec.VXSq', 'admin', 0, NULL, '2021-02-27 03:15:13', '2021-07-17 06:28:57'),
(2, 'SuperU', 'super@gmail.com', NULL, '$2y$10$9lDJrdk/EBVJbwCrE8mtQetrXBNU6im5197WyYSsME7noy1KXHZ6q', 'superadmin', 0, NULL, '2021-02-27 07:12:52', '2021-02-27 07:12:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_englishes`
--
ALTER TABLE `news_englishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_englishes`
--
ALTER TABLE `news_englishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
