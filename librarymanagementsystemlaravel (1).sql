-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 06:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarymanagementsystemlaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_category` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_quantity` int(11) NOT NULL,
  `book_description` varchar(2000) NOT NULL,
  `book_price` varchar(255) NOT NULL DEFAULT 'FREE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_category`, `book_name`, `book_author`, `book_quantity`, `book_description`, `book_price`, `created_at`, `updated_at`) VALUES
(1, 'Science', 'Geopedia: A Brief Compendium of Geologic Curiosities', 'Marcia Bjornerud', 2, 'Discover a treasure trove of bizarre and awe-inspiring geologic wonders that have captured our imagination over the millennia with Geopedia: A Brief Compendium of Geologic Curiosities. From areology (the study of the geology of Mars) to zircon (a mineral that can outlast almost all other materials on Earth), this is an engaging and entertaining lexicon on the diversity of rocks and our interactions with them.\n\nIt covers mythology, geologic processes, and imports from diverse languages, all written with a healthy helping of humour and wit. This pocket-sized book is illustrated, and the hardback comes bound in real cloth, so it’s ideal to toss in your bag and dip into on the go.', 'FREE', '2023-07-12 18:26:22', '2023-07-12 18:57:12'),
(2, 'Science', 'The Science of Can and Can’t: A Physicist’s Journey Through the Land of Counterfactuals', 'Chiara Marletto', 2, 'Most laws of physics tell us what must happen. Throw a ball in the air and it will come back down. But physicist Chiara Marletto, a Research Fellow at the University of Oxford, says that laws like this only tell us part of the story.\n\nThe rest, she says, lie in \'counterfactuals\': things that could be. A notebook could be written in. There is no law of physics that tells us whether it will be – but we can\'t describe what it\'s for without talking about the possibility.\n\nMarletto believes that counterfactual properties like this could hold the key to solving some of the biggest problems in science, from the biology of life, to artificial intelligence, to climate change.', 'FREE', '2023-07-12 18:28:29', '2023-07-12 18:28:29'),
(3, 'Horror', 'Salem’s Lot ', 'Stephen King', 5, 'If you’re looking for a book you won’t be able to put down, reach for Salem’s Lot, one of the earliest books written by Stephen King. This story of a small town overrun by vampires is deliciously chilling. As residents experience a growing list of strange encounters and start putting the pieces together, you’ll feel yourself tensing up in anticipation of the final reveal and confrontation. Sometimes slow burns make the best horror books!', 'FREE', '2023-07-12 18:31:49', '2023-07-12 18:31:49'),
(4, 'Romance', 'Romeo and Juliet', 'William Shakespeare', 6, 'In Romeo and Juliet, Shakespeare creates a violent world, in which two young people fall in love. It is not simply that their families disapprove; the Montagues and the Capulets are engaged in a blood feud.\n\nIn this death-filled setting, the movement from love at first sight to the lovers’ final union in death seems almost inevitable. And yet, this play set in an extraordinary world has become the quintessential story of young love. In part because of its exquisite language, it is easy to respond as if it were about all young lovers.', 'FREE', '2023-07-12 18:33:40', '2023-07-12 18:33:40'),
(5, 'Adventure', 'Don Quixote', 'Miguel de Cervantes', 3, 'Regarded as one of the greatest works in literature, Don Quixote recounts the adventures of Alonso Quixano: a middle-aged man so obsessed with chivalric books that he decides to imitate them and become a knight-errant. So begins his journey to find a faithful squire, save damsels in distress, and fight windmills.', 'FREE', '2023-07-12 18:50:44', '2023-07-12 18:50:44'),
(6, 'Adventure', 'The Three Musketeers', 'Alexandre Dumas', 10, 'In this classic by Dumas, a young man named d’Artagnan joins the Musketeers of the Guard. In doing so, he befriends Athos, Porthos, and Aramis — the King’s most celebrated musketeers — and embarks on a journey of his own.', 'FREE', '2023-07-12 18:51:32', '2023-07-12 18:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `date_borrowed` varchar(255) NOT NULL,
  `schedule_return` varchar(255) NOT NULL,
  `date_returned` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notify` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`id`, `user_id`, `book_id`, `date_borrowed`, `schedule_return`, `date_returned`, `created_at`, `updated_at`, `notify`) VALUES
(1, 5, 1, '2023/07/13', '2023-07-15', NULL, '2023-07-12 18:57:11', '2023-07-13 19:52:20', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(16, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2023_07_04_013529_create_sessions_table', 1),
(20, '2023_07_04_021024_create_books_table', 1),
(21, '2023_07_04_033650_create_pending_borrows_table', 1),
(22, '2023_07_05_014302_add_role_column_to_users_table', 1),
(23, '2023_07_07_014213_create_schedules_table', 1),
(24, '2023_07_07_030413_create_borrowed_books_table', 1),
(25, '2023_07_08_034923_create_notifications_table', 1),
(26, '2023_07_10_031820_add_notified_to_borrowed_books_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('459bd60b-33b4-4382-8668-43252d1d2afe', 'App\\Notifications\\BookNotification', 'App\\Models\\User', 5, '{\"user_id\":5,\"user_name\":\"Caleb Dansen\",\"book_id\":3,\"book_name\":\"Salem\\u2019s Lot \",\"message\":\"Book Id 3, Salem\\u2019s Lot  has now a schedule.\"}', NULL, '2023-07-13 19:45:52', '2023-07-13 19:45:52'),
('962c3bad-5f38-4597-80f6-456ba28e64c2', 'App\\Notifications\\BookReturnNotification', 'App\\Models\\User', 5, '{\"user_id\":5,\"book_id\":1,\"book_name\":\"Geopedia: A Brief Compendium of Geologic Curiosities\",\"book_due_date\":\"2023-07-15\",\"message\":\"You should return Book Id 1, Geopedia: A Brief Compendium of Geologic Curiosities by 2023-07-15 to avoid penalty\"}', NULL, '2023-07-13 19:52:20', '2023-07-13 19:52:20'),
('c4ca7077-9a38-4d0f-944e-28951e853b29', 'App\\Notifications\\BookBorrowed', 'App\\Models\\User', 5, '{\"user_id\":5,\"user_name\":\"Caleb Dansen\",\"book_id\":1,\"book_name\":\"Geopedia: A Brief Compendium of Geologic Curiosities\",\"message\":\"You successfully borrowed Book Id 1, Geopedia: A Brief Compendium of Geologic Curiosities\"}', '2023-07-12 19:12:16', '2023-07-12 18:57:11', '2023-07-12 19:12:16'),
('ce855718-f723-4613-96fa-5d9254932989', 'App\\Notifications\\BookNotification', 'App\\Models\\User', 5, '{\"user_id\":5,\"user_name\":\"Caleb Dansen\",\"book_id\":1,\"book_name\":\"Geopedia: A Brief Compendium of Geologic Curiosities\",\"message\":\"Book Id 1, Geopedia: A Brief Compendium of Geologic Curiosities has now a schedule.\"}', '2023-07-12 18:56:34', '2023-07-12 18:56:21', '2023-07-12 18:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_borrows`
--

CREATE TABLE `pending_borrows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pending_borrows`
--

INSERT INTO `pending_borrows` (`id`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(4, 5, 4, '2023-07-12 18:46:47', '2023-07-12 18:46:47'),
(5, 5, 6, '2023-07-12 18:52:35', '2023-07-12 18:52:35'),
(6, 5, 5, '2023-07-12 18:55:10', '2023-07-12 18:55:10'),
(16, 5, 2, '2023-07-13 19:20:56', '2023-07-13 19:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `user_id`, `book_id`, `date`, `created_at`, `updated_at`) VALUES
(2, 5, 3, '2023/07/15', '2023-07-13 19:45:49', '2023-07-13 19:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CAu3iVyhD8Ecmw3V0utWuvKzd59Gtb9NILWk3MLf', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS0NnZ2JXSWw4d1lRS2JVamdMVXJ1eURtWlZmOG1zRGdDRm5ya1pFeiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1689300328),
('fZFOypNSN2LQpZLIsBEa7pBbCSEmbDxEzKdl4R8L', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaEhnTlpYaFdGUEt1WkhHb1VTc2I0V1JsOHNXTTc5dmt5QXl6QXpaVCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1689300328),
('gpjdGlNlCGHN6PdtCglVx1Bm99qw59SaEq8WYk3E', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicVV2Y1doRzdIZWFhVDJjcEZpUU9rdEdFWDFjT3lGdWtLcTM1aGdnMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRaUERYVFFRaTd1SEpzWVdlb2pjY1llSG5uTmpsOUZiQ1FmaUtjQlVQUVJPWkNQRGs4eHNGNiI7fQ==', 1689655203),
('lUS7bYGQ3PAmuOqvKBRIqC6TFIXlGR1t9tCwacM4', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSFN4OUVYU2FDRTNFTjRHbm9TTDM5Wm1rZFdYaWplT2c2N2JQM2V0RCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1689307171),
('oM97bYabc5VFvx14MD2izAbHQcNJ0C9gI4mdb3P6', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN3R4QmRDN1YyOXVUM2R1SVFBNXlpS2FlZ3FHV2RvWHFPRFZyS2pZbyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1689300323),
('on7QEqgvOsEnDaSrZ2ulKwI4CLMlK08eoGvN5Kn2', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUlFQQmdWcmdSdXVjQTlhMTdlb0RoYTdUcWwyM0ZVU3l3MDdyajVzTiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1689300322),
('phIFg1yeeXTdqVWn6bU4L1Dyfy9Whnozdq8fQHPZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicmdMTVNuUlZ4SWNFVE5tV1JYRE5ETkY3MjdZc20yd0RtRW16S0dHMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1689655116),
('R9vOSSVk6feG1YMSOCLySDPOv5WR5YrP17t8kOJu', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSTFMNHVxaUNqWWdIZHA4T3dXak5MRDNzZWlRMU0zNXJrM3N1QU5EdiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1689300327),
('REZVLo2uNJoHgAOHkdUZWlylAPOcf2s2tIch6hI1', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSjRTcmFKWDAzb3JtaXc1UUxqc3ppWTZWMVpaY2h5M2tzaGJNVGFhciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1689305606),
('zUE0kY35hnD7wnipEq20LaHUMNuzi9DQLP28nry9', 5, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZnplODkwV0lRSmJrNHpNQXF4VVpEOUZDYW5CRUJ5RjJhempSZVRxYiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFpQRFhUUVFpN3VISnNZV2VvamNjWWVIbm5Oamw5RmJDUWZpS2NCVVBRUk9aQ1BEazh4c0Y2Ijt9', 1689300315);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `role`) VALUES
(3, 'Caleb Dansen', 'jhonriyelmente@gmail.com', NULL, '$2y$10$aOGBFpvSGZT/u5tXN7mKLuDpuMbNIBH7.ImLNHj/WTPq6UX0n6jge', NULL, NULL, NULL, NULL, NULL, '2023-07-11 18:32:24', '2023-07-11 18:32:24', 0),
(4, 'Jhon Riyel Mente', 'jhonmente4@gmail.com', '2023-07-12 17:58:34', '$2y$10$m8Td2ucOjBNonXc2UdivK.5p6BJfnr6givWdKN9gTKohjtIJI/scu', NULL, NULL, NULL, NULL, NULL, '2023-07-11 19:24:25', '2023-07-12 17:58:34', 1),
(5, 'Caleb Dansen', 'calebdansen@gmail.com', '2023-07-12 17:36:44', '$2y$10$ZPDXTQQi7uHJsYWeojccYeHnnNjl9FbCQfiKcBUPQROZCPDk8xsF6', NULL, NULL, NULL, NULL, NULL, '2023-07-12 17:33:53', '2023-07-12 17:36:44', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pending_borrows`
--
ALTER TABLE `pending_borrows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pending_borrows`
--
ALTER TABLE `pending_borrows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
