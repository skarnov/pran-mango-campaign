-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2020 at 04:08 PM
-- Server version: 10.1.44-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pranmango_campaign`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `pk_client_id` bigint(20) NOT NULL,
  `fb_id` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `volunteer_status` enum('yes','no') DEFAULT NULL,
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`pk_client_id`, `fb_id`, `client_name`, `volunteer_status`, `create_time`, `create_date`, `created_by`, `modify_time`, `modify_date`, `modified_by`) VALUES
(1, '570725887115862', 'Sk Obi', 'yes', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '10222327889286998', 'RifAt ShoAb', 'yes', NULL, NULL, NULL, NULL, NULL, NULL),
(5, '1254845144710594', 'Md Sariful Islam Sajib', 'yes', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_relation`
--

CREATE TABLE `content_relation` (
  `pk_relation_id` bigint(20) NOT NULL,
  `fk_page_id` int(2) NOT NULL,
  `page_section` varchar(50) DEFAULT NULL,
  `fk_content_id` bigint(20) DEFAULT NULL,
  `seo_content` text,
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content_relation`
--

INSERT INTO `content_relation` (`pk_relation_id`, `fk_page_id`, `page_section`, `fk_content_id`, `seo_content`, `create_time`, `create_date`, `created_by`, `modify_time`, `modify_date`, `modified_by`) VALUES
(1, 1, 'gallery', 1, NULL, NULL, NULL, NULL, '07:05:00', '2020-01-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_19_000000_create_configuration_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('obi.prog@gmail.com', '$2y$10$qvCADbiG1ZMZurC0IUCcw.wy0sUpT7Z3wPXZosLVsqU2TMoANam/C', '2020-01-16 00:49:46'),
('admin@me.com', '$2y$10$vm2z.PXFPLWcNjKYua8S1.fswMsiExmxwLghwUhoo7lPLiA6FUT76', '2020-01-16 02:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `pk_problem_id` int(10) NOT NULL,
  `fb_id` varchar(100) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `occupation` varchar(75) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `ward` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `main_problem` text,
  `solve_suggestion` text,
  `self_suggestion` text,
  `volunteer` enum('yes','no') DEFAULT NULL,
  `suggestion` text,
  `problem_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`pk_problem_id`, `fb_id`, `gender`, `age`, `occupation`, `area`, `ward`, `city`, `main_problem`, `solve_suggestion`, `self_suggestion`, `volunteer`, `suggestion`, `problem_status`, `create_time`, `create_date`, `created_by`, `modify_time`, `modify_date`, `modified_by`) VALUES
(3, '570725887115862', 'male', 23, 'Software Engineer', 'Mirpur 1', '7', 'north', 'মিরপুর, মোহাম্মদপুর, রায়েরবাগ ও আশপাশের কিছু এলাকায় এবং পুরান ঢাকায় আবারও গ্যাস-সংকট দেখা দিয়েছে। সরু পাইপের কারণে স্বল্প চাপের সমস্যা ছাড়াও রাজেন্দ্রপুরে সিটি গেট স্টেশনে সংরক্ষণ ও রক্ষণাবেক্ষণ কাজের কারণে কিছু এলাকায় সরবরাহ বন্ধ রাখায় গ্যাস-সংকট বেড়েছে বলে তিতাস গ্যাস কোম্পানির কর্মকর্তারা জানিয়েছেন।', 'ডেমরা ও জয়দেবপুরের মতো রাজেন্দ্রপুরে তিতাসের ডিআরএস রয়েছে। গ্যাসক্ষেত্র থেকে এসব স্টেশনে গ্যাস জমা হয়। পরে বিভিন্ন স্থানে ওই গ্যাস বিতরণ করা হয়। রাজেন্দ্রপুর থেকে প্রধানত মিরপুর, মোহাম্মদপুর, ধানমন্ডি, আমিনবাজার, সাভারসহ বিভিন্ন স্থানে গ্যাস যায়।\r\nচলতি সপ্তাহের শুরুতে রাজেন্দ্রপুরে ডিআরএস সংরক্ষণ কাজ শুরু হয়। সংরক্ষণ কাজের জন্য সঞ্চালন ও বিতরণ লাইন বন্ধ রাখায় সবচেয়ে বেশি প্রভাব পড়েছে মিরপুরের ডিওএইচএসে। এ ছাড়া মোহাম্মদপুরের শেখেরটেক, আদাবর, ধানমন্ডি ২৮ নম্বর সড়ক, রায়েরবাজারেও কয়েক দিন ধরে গ্যাস-সংকট চলছে। এসব এলাকার বাসিন্দারা গত মঙ্গলবার তিতাস গ্যাস কোম্পানির জরুরি নিয়ন্ত্রণকক্ষে অভিযোগ করেছেন।\r\nতবে তিতাসের দায়িত্বশীল কয়েকজন কর্মকর্তা জানান, অত্যন্ত জরুরি বলেই রাজেন্দ্রপুরে ডিআরএস সংরক্ষণ কাজ করতে হচ্ছে। সেখানে কাজ শেষ হতে আরও চার থেকে পাঁচ দিন সময় লাগতে পারে।', 'No', 'no', 'No', 'active', '08:53:01', '2020-01-27', NULL, '09:11:52', '2020-01-27', NULL),
(4, '570725887115862', 'male', 23, 'Software Engineer', 'Mirpur 1', '7', 'north', 'মিরপুর, মোহাম্মদপুর, রায়েরবাগ ও আশপাশের কিছু এলাকায় এবং পুরান ঢাকায় আবারও গ্যাস-সংকট দেখা দিয়েছে। সরু পাইপের কারণে স্বল্প চাপের সমস্যা ছাড়াও রাজেন্দ্রপুরে সিটি গেট স্টেশনে সংরক্ষণ ও রক্ষণাবেক্ষণ কাজের কারণে কিছু এলাকায় সরবরাহ বন্ধ রাখায় গ্যাস-সংকট বেড়েছে বলে তিতাস গ্যাস কোম্পানির কর্মকর্তারা জানিয়েছেন।', 'ডেমরা ও জয়দেবপুরের মতো রাজেন্দ্রপুরে তিতাসের ডিআরএস রয়েছে। গ্যাসক্ষেত্র থেকে এসব স্টেশনে গ্যাস জমা হয়। পরে বিভিন্ন স্থানে ওই গ্যাস বিতরণ করা হয়। রাজেন্দ্রপুর থেকে প্রধানত মিরপুর, মোহাম্মদপুর, ধানমন্ডি, আমিনবাজার, সাভারসহ বিভিন্ন স্থানে গ্যাস যায়।\r\nচলতি সপ্তাহের শুরুতে রাজেন্দ্রপুরে ডিআরএস সংরক্ষণ কাজ শুরু হয়। সংরক্ষণ কাজের জন্য সঞ্চালন ও বিতরণ লাইন বন্ধ রাখায় সবচেয়ে বেশি প্রভাব পড়েছে মিরপুরের ডিওএইচএসে। এ ছাড়া মোহাম্মদপুরের শেখেরটেক, আদাবর, ধানমন্ডি ২৮ নম্বর সড়ক, রায়েরবাজারেও কয়েক দিন ধরে গ্যাস-সংকট চলছে। এসব এলাকার বাসিন্দারা গত মঙ্গলবার তিতাস গ্যাস কোম্পানির জরুরি নিয়ন্ত্রণকক্ষে অভিযোগ করেছেন।\r\nতবে তিতাসের দায়িত্বশীল কয়েকজন কর্মকর্তা জানান, অত্যন্ত জরুরি বলেই রাজেন্দ্রপুরে ডিআরএস সংরক্ষণ কাজ করতে হচ্ছে। সেখানে কাজ শেষ হতে আরও চার থেকে পাঁচ দিন সময় লাগতে পারে।', 'No', 'no', 'No', 'active', '08:53:01', '2020-01-27', NULL, '11:51:11', '2020-01-30', NULL),
(5, '570725887115862', 'male', 23, 'Software Engineer', 'Mirpur 1', '7', 'north', 'মিরপুর, মোহাম্মদপুর, ', 'ডেমরা ও জয়দেবপুরের মতো রাজেন্দ্রপুরে তিতাসের ডিআরএস রয়েছে। গ্যাসক্ষে', 'No', 'no', 'No', 'active', '08:53:01', '2020-01-27', NULL, '11:51:14', '2020-01-30', NULL),
(6, '10222327889286998', 'male', 30, 'Private Service', 'Uttara', '3', 'north', 'X, Y Z', 'ABCD', ':/', 'yes', 'jani na', 'inactive', '04:26:00', '2020-01-29', NULL, '11:51:04', '2020-01-30', NULL),
(7, '1254845144710594', 'male', 23, 'Buiness', 'uttara', '1', 'north', 'আপনার এলাকার মূল তিনটি সমস্যা:', 'কিভাবে এই সমস্যাগুলোর সমাধান করা যায় বলে মনে করেন?', 'এই সমস্যা মোকাবেলায় আপনি নিজের কি কি ভুমিকা আছে বলে মনে করেন?', 'yes', 'প্রাণ ম্যাংগো এর মতো ব্র্যান্ড এই সমস্যা মোকাবেলায় কি ভূমিকা রাখতে পারে?', 'inactive', '09:25:23', '2020-01-30', NULL, '05:43:16', '2020-02-03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_configurations`
--

CREATE TABLE `tbl_configurations` (
  `pk_config_id` bigint(2) NOT NULL,
  `app_name` varchar(255) DEFAULT NULL,
  `copyright_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_configurations`
--

INSERT INTO `tbl_configurations` (`pk_config_id`, `app_name`, `copyright_info`) VALUES
(1, 'Pran Mango Campaign', '© Campaign 2020. Built with love by 3DEVs IT Ltd.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents`
--

CREATE TABLE `tbl_contents` (
  `pk_content_id` bigint(20) NOT NULL,
  `fk_content_id` bigint(20) DEFAULT '0',
  `content_slug` varchar(20) NOT NULL,
  `content_serial` int(3) DEFAULT NULL,
  `content_title` varchar(150) DEFAULT NULL,
  `content_subtitle` varchar(255) DEFAULT NULL,
  `content_description` text,
  `additional_info` text,
  `external_link` text,
  `featured_image` text,
  `content_status` enum('published','unpublished') DEFAULT NULL,
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contents`
--

INSERT INTO `tbl_contents` (`pk_content_id`, `fk_content_id`, `content_slug`, `content_serial`, `content_title`, `content_subtitle`, `content_description`, `additional_info`, `external_link`, `featured_image`, `content_status`, `create_time`, `create_date`, `created_by`, `modify_time`, `modify_date`, `modified_by`) VALUES
(1, 0, 'gallery', NULL, 'Basic', NULL, NULL, NULL, NULL, NULL, 'published', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'gallery', NULL, NULL, NULL, NULL, NULL, NULL, 'gallery_0_1580118959.jpg', NULL, '09:55:59', '2020-01-27', 1, NULL, NULL, NULL),
(3, 1, 'gallery', NULL, NULL, NULL, NULL, NULL, NULL, 'gallery_1_1580118960.jpg', NULL, '09:55:59', '2020-01-27', 1, NULL, NULL, NULL),
(4, 1, 'gallery', NULL, NULL, NULL, NULL, NULL, NULL, 'gallery_2_1580118960.jpg', NULL, '09:55:59', '2020-01-27', 1, NULL, NULL, NULL),
(5, 1, 'gallery', NULL, NULL, NULL, NULL, NULL, NULL, 'gallery_3_1580118960.jpg', NULL, '09:55:59', '2020-01-27', 1, NULL, NULL, NULL),
(6, 1, 'gallery', NULL, NULL, NULL, NULL, NULL, NULL, 'gallery_4_1580118960.jpg', NULL, '09:55:59', '2020-01-27', 1, NULL, NULL, NULL),
(7, 1, 'gallery', NULL, NULL, NULL, NULL, NULL, NULL, 'gallery_5_1580118960.jpg', NULL, '09:55:59', '2020-01-27', 1, NULL, NULL, NULL),
(8, 1, 'gallery', NULL, NULL, NULL, NULL, NULL, NULL, 'gallery_6_1580118960.jpg', NULL, '09:55:59', '2020-01-27', 1, NULL, NULL, NULL),
(9, 1, 'gallery', NULL, NULL, NULL, NULL, NULL, NULL, 'gallery_7_1580118960.jpg', NULL, '09:55:59', '2020-01-27', 1, NULL, NULL, NULL),
(10, 1, 'gallery', NULL, NULL, NULL, NULL, NULL, NULL, 'gallery_0_1580119818.jpg', NULL, '10:10:18', '2020-01-27', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `pk_page_id` int(2) NOT NULL,
  `page_slug` varchar(20) NOT NULL,
  `page_name` varchar(25) NOT NULL,
  `page_type` enum('default','additional') DEFAULT NULL,
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`pk_page_id`, `page_slug`, `page_name`, `page_type`, `create_time`, `create_date`, `created_by`, `modify_time`, `modify_date`, `modified_by`) VALUES
(1, 'home', 'Home', 'default', NULL, NULL, NULL, '07:05:00', '2020-01-28', 1),
(2, 'about', 'About', 'default', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'contact', 'Contact', 'default', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'terms', 'Terms And Conditions', 'default', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'privacy', 'Privacy Policy', 'default', NULL, NULL, NULL, NULL, NULL, NULL);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@pran.com', NULL, '$2y$10$QT3I9dCn.ofhM4FcdV1aauhfrXrDfQWWKzMN6cbdVUhexsZwhV9W.', 'Mm2TkQiwdXBZOMh21JR01kwpGEXADBqC2GoRkl1UY51WXeJ6MYGJ1YBu1YMm', '2020-01-15 05:28:19', '2020-01-30 07:15:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`pk_client_id`);

--
-- Indexes for table `content_relation`
--
ALTER TABLE `content_relation`
  ADD PRIMARY KEY (`pk_relation_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`pk_problem_id`);

--
-- Indexes for table `tbl_configurations`
--
ALTER TABLE `tbl_configurations`
  ADD PRIMARY KEY (`pk_config_id`);

--
-- Indexes for table `tbl_contents`
--
ALTER TABLE `tbl_contents`
  ADD PRIMARY KEY (`pk_content_id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`pk_page_id`),
  ADD UNIQUE KEY `page_slug` (`page_slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `pk_client_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `content_relation`
--
ALTER TABLE `content_relation`
  MODIFY `pk_relation_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `pk_problem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_configurations`
--
ALTER TABLE `tbl_configurations`
  MODIFY `pk_config_id` bigint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contents`
--
ALTER TABLE `tbl_contents`
  MODIFY `pk_content_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `pk_page_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
