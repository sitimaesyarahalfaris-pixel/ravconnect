-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_ravconnect
CREATE DATABASE IF NOT EXISTS `db_ravconnect` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_ravconnect`;

-- Dumping structure for table db_ravconnect.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.cache: ~0 rows (approximately)

-- Dumping structure for table db_ravconnect.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.cache_locks: ~0 rows (approximately)

-- Dumping structure for table db_ravconnect.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.countries: ~195 rows (approximately)
INSERT INTO `countries` (`id`, `name`, `code`, `flag_url`, `image_url`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'Afghanistan', 'AF', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(2, 'Albania', 'AL', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(3, 'Algeria', 'DZ', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(4, 'Andorra', 'AD', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(5, 'Angola', 'AO', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(6, 'Antigua and Barbuda', 'AG', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(7, 'Argentina', 'AR', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(8, 'Armenia', 'AM', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(9, 'Australia', 'AU', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(10, 'Austria', 'AT', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(11, 'Azerbaijan', 'AZ', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(12, 'Bahamas', 'BS', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(13, 'Bahrain', 'BH', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(14, 'Bangladesh', 'BD', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(15, 'Barbados', 'BB', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(16, 'Belarus', 'BY', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(17, 'Belgium', 'BE', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(18, 'Belize', 'BZ', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(19, 'Benin', 'BJ', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(20, 'Bhutan', 'BT', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(21, 'Bolivia', 'BO', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(22, 'Bosnia and Herzegovina', 'BA', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(23, 'Botswana', 'BW', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(24, 'Brazil', 'BR', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(25, 'Brunei', 'BN', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(26, 'Bulgaria', 'BG', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(27, 'Burkina Faso', 'BF', NULL, NULL, 0, '2025-12-05 11:52:55', '2025-12-05 12:21:22'),
	(28, 'Burundi', 'BI', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(29, 'Cabo Verde', 'CV', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(30, 'Cambodia', 'KH', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(31, 'Cameroon', 'CM', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(32, 'Canada', 'CA', NULL, NULL, 1, '2025-12-05 11:52:56', '2025-12-05 12:21:23'),
	(33, 'Central African Republic', 'CF', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(34, 'Chad', 'TD', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(35, 'Chile', 'CL', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(36, 'China', 'CN', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(37, 'Colombia', 'CO', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(38, 'Comoros', 'KM', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(39, 'Congo (Congo-Brazzaville)', 'CG', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(40, 'Congo (Congo-Kinshasa)', 'CD', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(41, 'Costa Rica', 'CR', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(42, 'Croatia', 'HR', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(43, 'Cuba', 'CU', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(44, 'Cyprus', 'CY', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(45, 'Czechia', 'CZ', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(46, 'Denmark', 'DK', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(47, 'Djibouti', 'DJ', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(48, 'Dominica', 'DM', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(49, 'Dominican Republic', 'DO', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(50, 'Ecuador', 'EC', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(51, 'Egypt', 'EG', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(52, 'El Salvador', 'SV', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(53, 'Equatorial Guinea', 'GQ', NULL, NULL, 0, '2025-12-05 11:52:56', '2025-12-05 12:21:22'),
	(54, 'Eritrea', 'ER', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(55, 'Estonia', 'EE', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(56, 'Eswatini', 'SZ', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(57, 'Ethiopia', 'ET', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(58, 'Fiji', 'FJ', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(59, 'Finland', 'FI', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(60, 'France', 'FR', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(61, 'Gabon', 'GA', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(62, 'Gambia', 'GM', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(63, 'Georgia', 'GE', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(64, 'Germany', 'DE', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(65, 'Ghana', 'GH', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(66, 'Greece', 'GR', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(67, 'Grenada', 'GD', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(68, 'Guatemala', 'GT', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(69, 'Guinea', 'GN', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(70, 'Guinea-Bissau', 'GW', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(71, 'Guyana', 'GY', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(72, 'Haiti', 'HT', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(73, 'Honduras', 'HN', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(74, 'Hungary', 'HU', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(75, 'Iceland', 'IS', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(76, 'India', 'IN', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(77, 'Indonesia', 'ID', NULL, '/storage/country_headers/KMSiOeC0Kn0JOo2vPXzmu3OcyrxiHJ9hpQDzdA2S.jpg', 1, '2025-12-05 11:52:57', '2025-12-05 13:13:26'),
	(78, 'Iran', 'IR', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(79, 'Iraq', 'IQ', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(80, 'Ireland', 'IE', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(81, 'Israel', 'IL', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(82, 'Italy', 'IT', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(83, 'Jamaica', 'JM', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(84, 'Japan', 'JP', NULL, '/storage/country_headers/jrjuafUOcTENOlZoStRJ7UNKDLhz3bbSmxtB6i48.jpg', 0, '2025-12-05 11:52:57', '2025-12-05 16:32:00'),
	(85, 'Jordan', 'JO', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(86, 'Kazakhstan', 'KZ', NULL, NULL, 0, '2025-12-05 11:52:57', '2025-12-05 12:21:22'),
	(87, 'Kenya', 'KE', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(88, 'Kiribati', 'KI', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(89, 'Kuwait', 'KW', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(90, 'Kyrgyzstan', 'KG', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(91, 'Laos', 'LA', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(92, 'Latvia', 'LV', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(93, 'Lebanon', 'LB', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(94, 'Lesotho', 'LS', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(95, 'Liberia', 'LR', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(96, 'Libya', 'LY', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(97, 'Liechtenstein', 'LI', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(98, 'Lithuania', 'LT', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(99, 'Luxembourg', 'LU', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(100, 'Madagascar', 'MG', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(101, 'Malawi', 'MW', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(102, 'Malaysia', 'MY', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(103, 'Maldives', 'MV', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(104, 'Mali', 'ML', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(105, 'Malta', 'MT', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(106, 'Marshall Islands', 'MH', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(107, 'Mauritania', 'MR', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(108, 'Mauritius', 'MU', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(109, 'Mexico', 'MX', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(110, 'Micronesia', 'FM', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(111, 'Moldova', 'MD', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(112, 'Monaco', 'MC', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(113, 'Mongolia', 'MN', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(114, 'Montenegro', 'ME', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(115, 'Morocco', 'MA', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(116, 'Mozambique', 'MZ', NULL, NULL, 0, '2025-12-05 11:52:58', '2025-12-05 12:21:22'),
	(117, 'Myanmar', 'MM', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(118, 'Namibia', 'NA', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(119, 'Nauru', 'NR', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(120, 'Nepal', 'NP', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(121, 'Netherlands', 'NL', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(122, 'New Zealand', 'NZ', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(123, 'Nicaragua', 'NI', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(124, 'Niger', 'NE', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(125, 'Nigeria', 'NG', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(126, 'North Korea', 'KP', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(127, 'North Macedonia', 'MK', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(128, 'Norway', 'NO', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(129, 'Oman', 'OM', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(130, 'Pakistan', 'PK', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(131, 'Palau', 'PW', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(132, 'Palestine', 'PS', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(133, 'Panama', 'PA', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(134, 'Papua New Guinea', 'PG', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(135, 'Paraguay', 'PY', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(136, 'Peru', 'PE', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(137, 'Philippines', 'PH', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(138, 'Poland', 'PL', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(139, 'Portugal', 'PT', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(140, 'Qatar', 'QA', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(141, 'Romania', 'RO', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(142, 'Russia', 'RU', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(143, 'Rwanda', 'RW', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(144, 'Saint Kitts and Nevis', 'KN', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(145, 'Saint Lucia', 'LC', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(146, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL, 0, '2025-12-05 11:52:59', '2025-12-05 12:21:22'),
	(147, 'Samoa', 'WS', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(148, 'San Marino', 'SM', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(149, 'Sao Tome and Principe', 'ST', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(150, 'Saudi Arabia', 'SA', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(151, 'Senegal', 'SN', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(152, 'Serbia', 'RS', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(153, 'Seychelles', 'SC', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(154, 'Sierra Leone', 'SL', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(155, 'Singapore', 'SG', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(156, 'Slovakia', 'SK', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(157, 'Slovenia', 'SI', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(158, 'Solomon Islands', 'SB', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(159, 'Somalia', 'SO', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(160, 'South Africa', 'ZA', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(161, 'South Korea', 'KR', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(162, 'South Sudan', 'SS', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(163, 'Spain', 'ES', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(164, 'Sri Lanka', 'LK', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(165, 'Sudan', 'SD', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(166, 'Suriname', 'SR', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(167, 'Sweden', 'SE', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(168, 'Switzerland', 'CH', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(169, 'Syria', 'SY', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(170, 'Taiwan', 'TW', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(171, 'Tajikistan', 'TJ', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(172, 'Tanzania', 'TZ', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(173, 'Thailand', 'TH', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(174, 'Timor-Leste', 'TL', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(175, 'Togo', 'TG', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(176, 'Tonga', 'TO', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(177, 'Trinidad and Tobago', 'TT', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(178, 'Tunisia', 'TN', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(179, 'Turkey', 'TR', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(180, 'Turkmenistan', 'TM', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(181, 'Tuvalu', 'TV', NULL, NULL, 0, '2025-12-05 11:53:00', '2025-12-05 12:21:22'),
	(182, 'Uganda', 'UG', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(183, 'Ukraine', 'UA', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(184, 'United Arab Emirates', 'AE', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(185, 'United Kingdom', 'GB', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(186, 'United States', 'US', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(187, 'Uruguay', 'UY', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(188, 'Uzbekistan', 'UZ', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(189, 'Vanuatu', 'VU', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(190, 'Vatican City', 'VA', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(191, 'Venezuela', 'VE', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(192, 'Vietnam', 'VN', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(193, 'Yemen', 'YE', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(194, 'Zambia', 'ZM', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22'),
	(195, 'Zimbabwe', 'ZW', NULL, NULL, 0, '2025-12-05 11:53:01', '2025-12-05 12:21:22');

-- Dumping structure for table db_ravconnect.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_ravconnect.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.jobs: ~0 rows (approximately)

-- Dumping structure for table db_ravconnect.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.job_batches: ~0 rows (approximately)

-- Dumping structure for table db_ravconnect.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_11_18_000001_create_products_table', 1),
	(5, '2025_11_18_000002_create_product_stocks_table', 1),
	(6, '2025_11_18_000003_create_orders_table', 1),
	(7, '2025_11_18_000004_create_payments_table', 1),
	(8, '2025_11_18_000005_create_settings_table', 1),
	(9, '2025_11_18_000006_create_countries_table', 1),
	(10, '2025_11_18_000007_create_product_country_table', 1),
	(11, '2025_11_19_000008_create_order_product_table', 1),
	(12, '2025_12_03_000009_add_assigned_at_to_product_stocks_table', 1),
	(13, '2025_12_03_000010_add_image_url_to_countries_table', 1),
	(14, '2025_12_05_000012_add_whatsapp_to_users_table', 1),
	(15, '2025_12_05_000013_create_user_bank_infos_table', 1),
	(16, '2025_12_05_153642_create_withdrawals_table', 1);

-- Dumping structure for table db_ravconnect.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `product_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reff_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esim_stock_id` bigint unsigned DEFAULT NULL,
  `status` enum('pending','paid','expired','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `delivery_status` enum('pending','delivered','manual') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total` bigint unsigned NOT NULL DEFAULT '0',
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_product_id_foreign` (`product_id`),
  KEY `orders_esim_stock_id_foreign` (`esim_stock_id`),
  CONSTRAINT `orders_esim_stock_id_foreign` FOREIGN KEY (`esim_stock_id`) REFERENCES `product_stocks` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.orders: ~5 rows (approximately)
INSERT INTO `orders` (`id`, `user_id`, `product_id`, `name`, `email`, `whatsapp`, `reff_id`, `deposit_id`, `esim_stock_id`, `status`, `delivery_status`, `total`, `expired_at`, `created_at`, `updated_at`) VALUES
	(15, 8, 5, 'Putra Anggara Maulana', 'putra@gmail.com', '088293568958', 'order-20251205202348-8', 'Y4tMX1VOdR8FLWWURpGV', 5, 'paid', 'delivered', 606, '2025-12-05 14:23:51', '2025-12-05 13:23:51', '2025-12-05 13:24:38'),
	(16, 9, 5, 'Xchi', 'xchi@gmail.com', '088293568958', 'order-20251206013443-9', '7t6heP3TcQ8wWaKcroeQ', 6, 'paid', 'delivered', 606, '2025-12-05 19:34:45', '2025-12-05 18:34:46', '2025-12-05 18:35:28'),
	(17, 2, 5, 'Admin', 'admin@ravconnect.com', '', 'order-20251206112200-2', '6Mwh0fr3lhWyO6YPkJtj', NULL, 'pending', 'pending', 609, '2025-12-06 05:22:02', '2025-12-06 04:22:02', '2025-12-06 04:22:02'),
	(19, 2, 5, 'Admin', 'admin@ravconnect.com', '', 'order-20251206141125-2', 'gH1ue3B2gfwvI0p13ZfU', NULL, 'pending', 'pending', 609, '2025-12-06 08:11:28', '2025-12-06 07:11:28', '2025-12-06 07:11:28'),
	(20, 10, 5, 'testfinal', 'testfinal@gmail.com', '088293568958', 'order-20251206141511-10', 'wISNDbIZfDRU1XzDMiel', 7, 'paid', 'delivered', 609, '2025-12-06 08:15:13', '2025-12-06 07:15:14', '2025-12-06 07:15:53');

-- Dumping structure for table db_ravconnect.order_product
CREATE TABLE IF NOT EXISTS `order_product` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int unsigned NOT NULL DEFAULT '1',
  `unit_price` decimal(12,2) DEFAULT NULL,
  `meta` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_product_order_id_foreign` (`order_id`),
  KEY `order_product_product_id_foreign` (`product_id`),
  CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.order_product: ~0 rows (approximately)

-- Dumping structure for table db_ravconnect.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table db_ravconnect.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `status` enum('pending','paid','failed','expired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_string` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_va` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tambahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_order_id_foreign` (`order_id`),
  CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.payments: ~5 rows (approximately)
INSERT INTO `payments` (`id`, `order_id`, `method`, `amount`, `status`, `payment_url`, `transaction_id`, `qr_image`, `qr_string`, `bank`, `tujuan`, `atas_nama`, `nomor_va`, `tambahan`, `expired_at`, `created_at`, `updated_at`) VALUES
	(15, 15, 'QRISFAST', 606.00, 'pending', NULL, 'Y4tMX1VOdR8FLWWURpGV', 'https://atlantich2h.com/qr/Y4tMX1VOdR8FLWWURpGV', '00020101021226610016ID.CO.SHOPEE.WWW01189360091800209988050208209988050303UME51440014ID.CO.QRIS.WWW0215ID20232405136140303UME5204481453033605406606.005802ID5905MITRA6012KOTA BANDUNG61054061462220518140569113409994023630463F0', NULL, NULL, NULL, NULL, '0', '2025-12-05 14:23:51', '2025-12-05 13:23:51', '2025-12-05 13:23:51'),
	(16, 16, 'QRISFAST', 606.00, 'pending', NULL, '7t6heP3TcQ8wWaKcroeQ', 'https://atlantich2h.com/qr/7t6heP3TcQ8wWaKcroeQ', '00020101021226610016ID.CO.SHOPEE.WWW01189360091800209988050208209988050303UME51440014ID.CO.QRIS.WWW0215ID20232405136140303UME5204481453033605406606.005802ID5905MITRA6012KOTA BANDUNG6105406146222051815995797368969797563046E0F', NULL, NULL, NULL, NULL, '0', '2025-12-05 19:34:45', '2025-12-05 18:34:46', '2025-12-05 18:34:46'),
	(17, 17, 'QRISFAST', 609.00, 'pending', NULL, '6Mwh0fr3lhWyO6YPkJtj', 'https://atlantich2h.com/qr/6Mwh0fr3lhWyO6YPkJtj', '00020101021226610016ID.CO.SHOPEE.WWW01189360091800209988050208209988050303UME51440014ID.CO.QRIS.WWW0215ID20232405136140303UME5204481453033605406609.005802ID5905MITRA6012KOTA BANDUNG610540614622205181401748616931908736304321D', NULL, NULL, NULL, NULL, '0', '2025-12-06 05:22:02', '2025-12-06 04:22:02', '2025-12-06 04:22:02'),
	(19, 19, 'QRISFAST', 609.00, 'pending', NULL, 'gH1ue3B2gfwvI0p13ZfU', 'https://atlantich2h.com/qr/gH1ue3B2gfwvI0p13ZfU', '00020101021226610016ID.CO.SHOPEE.WWW01189360091800209988050208209988050303UME51440014ID.CO.QRIS.WWW0215ID20232405136140303UME5204481453033605406609.005802ID5905MITRA6012KOTA BANDUNG61054061462220518136486040944131709630446DF', NULL, NULL, NULL, NULL, '0', '2025-12-06 08:11:28', '2025-12-06 07:11:28', '2025-12-06 07:11:28'),
	(20, 20, 'QRISFAST', 609.00, 'pending', NULL, 'wISNDbIZfDRU1XzDMiel', 'https://atlantich2h.com/qr/wISNDbIZfDRU1XzDMiel', '00020101021226610016ID.CO.SHOPEE.WWW01189360091800209988050208209988050303UME51440014ID.CO.QRIS.WWW0215ID20232405136140303UME5204481453033605406609.005802ID5905MITRA6012KOTA BANDUNG610540614622205181513922269373130536304FD62', NULL, NULL, NULL, NULL, '0', '2025-12-06 08:15:13', '2025-12-06 07:15:14', '2025-12-06 07:15:14');

-- Dumping structure for table db_ravconnect.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(12,2) NOT NULL,
  `quota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auto_delivery` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.products: ~1 rows (approximately)
INSERT INTO `products` (`id`, `name`, `description`, `price`, `quota`, `validity`, `operator`, `auto_delivery`, `active`, `created_at`, `updated_at`) VALUES
	(5, 'Indonesia 1GB 20Hari', 'Testing Product', 400.00, '1024', '20', 'Telkomsel', 1, 1, '2025-12-05 11:58:01', '2025-12-06 04:01:58');

-- Dumping structure for table db_ravconnect.product_country
CREATE TABLE IF NOT EXISTS `product_country` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `country_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_country_product_id_foreign` (`product_id`),
  KEY `product_country_country_id_foreign` (`country_id`),
  CONSTRAINT `product_country_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_country_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.product_country: ~1 rows (approximately)
INSERT INTO `product_country` (`id`, `product_id`, `country_id`, `created_at`, `updated_at`) VALUES
	(11, 5, 77, NULL, NULL);

-- Dumping structure for table db_ravconnect.product_stocks
CREATE TABLE IF NOT EXISTS `product_stocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('available','used') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `assigned_at` timestamp NULL DEFAULT NULL,
  `iccid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smdp_plus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_stocks_product_id_foreign` (`product_id`),
  KEY `product_stocks_user_id_foreign` (`user_id`),
  CONSTRAINT `product_stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_stocks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.product_stocks: ~3 rows (approximately)
INSERT INTO `product_stocks` (`id`, `product_id`, `user_id`, `sku`, `status`, `assigned_at`, `iccid`, `activation_code`, `smdp_plus`, `qr_image_url`, `created_at`, `updated_at`) VALUES
	(5, 5, 8, NULL, 'used', '2025-12-05 13:24:38', 'testing123', 'test123', 'test123', '/storage/qr_images/1MsgJtSRJZDIJ2YpCCYSoKsehczSir8tY3liLTqP.png', '2025-12-05 13:18:12', '2025-12-05 13:24:38'),
	(6, 5, 9, NULL, 'used', '2025-12-05 18:35:28', 'test123', 'test123', 'test123', '/storage/qr_images/C7A0xOMKfKmRYwvZNRjV9ZcxpuNUiWvDPnCwuzCc.png', '2025-12-05 18:32:52', '2025-12-05 18:35:28'),
	(7, 5, 10, NULL, 'used', '2025-12-06 07:15:53', 'test123', 'test123t', 'test123', '/storage/qr_images/KCwiqWxdLB4ca3qGzrD7sKX0jtU8e36jw1rwJigC.png', '2025-12-06 04:21:44', '2025-12-06 07:15:53');

-- Dumping structure for table db_ravconnect.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('ESvVUwQJyxc8UpPjkp3xfBv1iP221D4TUzFWpRzz', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWW5EWGZqdTRLSFhoeHBoZkpQVEg1NWZMNWVSRUQyb0ZCbVBTMDlqaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9nYWxsZmx5LXN0b25lbGlrZS1yaWtraS5uZ3Jvay1mcmVlLmRldi9teS1lc2ltIjtzOjU6InJvdXRlIjtzOjc6Im15LWVzaW0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDtzOjk6Im9yZGVyX2lkcyI7YToxOntpOjA7aToyMDt9czoxMjoicGF5bWVudF9kYXRhIjthOjIyOntzOjI6ImlkIjtpOjIwO3M6ODoib3JkZXJfaWQiO2k6MjA7czo2OiJtZXRob2QiO3M6ODoiUVJJU0ZBU1QiO3M6NjoiYW1vdW50IjtzOjY6IjYwOS4wMCI7czo2OiJzdGF0dXMiO3M6Nzoic3VjY2VzcyI7czoxMToicGF5bWVudF91cmwiO047czoxNDoidHJhbnNhY3Rpb25faWQiO3M6MjA6IndJU05EYklaZkRSVTFYekRNaWVsIjtzOjg6InFyX2ltYWdlIjtzOjQ3OiJodHRwczovL2F0bGFudGljaDJoLmNvbS9xci93SVNORGJJWmZEUlUxWHpETWllbCI7czo5OiJxcl9zdHJpbmciO3M6MjI0OiIwMDAyMDEwMTAyMTIyNjYxMDAxNklELkNPLlNIT1BFRS5XV1cwMTE4OTM2MDA5MTgwMDIwOTk4ODA1MDIwODIwOTk4ODA1MDMwM1VNRTUxNDQwMDE0SUQuQ08uUVJJUy5XV1cwMjE1SUQyMDIzMjQwNTEzNjE0MDMwM1VNRTUyMDQ0ODE0NTMwMzM2MDU0MDY2MDkuMDA1ODAySUQ1OTA1TUlUUkE2MDEyS09UQSBCQU5EVU5HNjEwNTQwNjE0NjIyMjA1MTgxNTEzOTIyMjY5MzczMTMwNTM2MzA0RkQ2MiI7czo0OiJiYW5rIjtOO3M6NjoidHVqdWFuIjtOO3M6OToiYXRhc19uYW1hIjtOO3M6ODoibm9tb3JfdmEiO047czo4OiJ0YW1iYWhhbiI7czoxOiIwIjtzOjEwOiJleHBpcmVkX2F0IjtzOjE5OiIyMDI1LTEyLTA2IDE1OjE1OjEzIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI1LTEyLTA2IDE0OjE1OjEzIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjI3OiIyMDI1LTEyLTA2VDA3OjE1OjE0LjAwMDAwMFoiO3M6NzoicmVmZl9pZCI7czoyMzoib3JkZXItMjAyNTEyMDYxNDE1MTEtMTAiO3M6Nzoibm9taW5hbCI7czozOiI2MDkiO3M6MzoiZmVlIjtzOjM6IjIwOSI7czoxMToiZ2V0X2JhbGFuY2UiO3M6MzoiNDAwIjtzOjY6Im1ldG9kZSI7czoyMToiRS1XYWxsZXQgUVJJUyBJTlNUQU5UIjt9fQ==', 1765005363),
	('m3nmLrUZPBbk3vLVDo2meKsSCPy2DdJB63d6qiOp', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoia3FDMlF1b2RlZlNCc1dNaEVUYmNLYzdIbFJYT0g4WjRSWVk1c1pTeSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjYxOiJodHRwOi8vZ2FsbGZseS1zdG9uZWxpa2Utcmlra2kubmdyb2stZnJlZS5kZXYvYWRtaW4vb3JkZXJzLzIwIjtzOjU6InJvdXRlIjtzOjE3OiJhZG1pbi5vcmRlcnMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo5OiJvcmRlcl9pZHMiO2E6MTp7aTowO2k6MTk7fX0=', 1765005521);

-- Dumping structure for table db_ravconnect.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.settings: ~5 rows (approximately)
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'promo_banner', 'Diskon 20% untuk pelanggan baru!', '2025-12-05 11:53:01', '2025-12-05 11:53:01'),
	(2, 'faq', 'Q: Bagaimana cara aktivasi eSIM?\\nA: Setelah pembayaran, QR code akan dikirim ke email Anda.', '2025-12-05 11:53:01', '2025-12-05 11:53:01'),
	(3, 'available_payment_methods', '["QRISFAST"]', '2025-12-05 13:23:04', '2025-12-05 13:23:04'),
	(4, 'withdrawal_info', '{"withdraw_bank_code":"shopeepay","withdraw_bank_name":"ShopeePay","withdraw_account_number":"085706074934","withdraw_account_holder":"Ravli","withdraw_email":"support@ravconnect.my.id","withdraw_phone":null}', '2025-12-05 15:56:25', '2025-12-06 03:25:52'),
	(5, 'recommended_products', '["5"]', '2025-12-05 16:58:07', '2025-12-05 16:58:19');

-- Dumping structure for table db_ravconnect.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `whatsapp`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'Admin', 'admin@ravconnect.com', NULL, '$2y$12$pBJLtz5LgKKiX3Heg7mPL.Ku5KZK6ZopjobcFsaI8jf08wr1SpjUO', NULL, 1, NULL, '2025-12-05 11:52:54', '2025-12-05 11:52:54'),
	(8, 'Putra Anggara Maulana', 'putra@gmail.com', NULL, '$2y$12$dNtXwa8pxd48fLq3Zg0HOuiiOUjXiXgjJYVrJDURi7qhXfpGmnr4K', '088293568958', 0, NULL, '2025-12-05 13:19:08', '2025-12-05 13:19:08'),
	(9, 'Xchi', 'xchi@gmail.com', NULL, '$2y$12$OGIKkm7tOvUkg/c1VXtUfexO87O9HYVHXamfAOOuSrcCdQH0XpyEe', '088293568958', 0, NULL, '2025-12-05 18:34:02', '2025-12-06 07:07:45'),
	(10, 'testfinal', 'testfinal@gmail.com', NULL, '$2y$12$Yf.LAFmBzAWvoiqU3PAIMuNbXF8S23vAAEBIlYSYwa1OH3Bk1n.Rm', '088293568958', 0, NULL, '2025-12-06 07:14:52', '2025-12-06 07:14:52');

-- Dumping structure for table db_ravconnect.user_bank_infos
CREATE TABLE IF NOT EXISTS `user_bank_infos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `bank_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_bank_infos_user_id_foreign` (`user_id`),
  CONSTRAINT `user_bank_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.user_bank_infos: ~0 rows (approximately)

-- Dumping structure for table db_ravconnect.withdrawals
CREATE TABLE IF NOT EXISTS `withdrawals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `fee` int NOT NULL DEFAULT '0',
  `total_deducted` int NOT NULL,
  `api_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ravconnect.withdrawals: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
