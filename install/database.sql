-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 10:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcheck_ratelab_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@site.com', 'admin', NULL, '63747a0a5f9291668577802.jpeg', '$2y$10$DPcZdU5ncDNJqfcQyNRYuuvyj4QKYq1QLVcxJ/TNqELQN/JkyxAvO', 'QppjjIRpfRR6L1huADoYbtSGc1TErPKVwm2r5gN7Ac6YSQgtMw4AyEEM56He', NULL, '2022-11-16 03:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `click_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `impression` int(11) NOT NULL DEFAULT 0,
  `click` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'ENABLE⇾1 , DISABLE→0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'ENABLE⇾1 , DISABLE→0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 2 COMMENT 'APPROVED⇾1, PENDING⇾2, REJECTED⇾3',
  `avg_rating` decimal(5,2) NOT NULL DEFAULT 0.00,
  `admin_feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'object',
  `support` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'help section',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>enable, 2=>disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extensions`
--

INSERT INTO `extensions` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tawk-chat', 'Tawk.to', 'Key location is shown bellow', 'tawky_big.png', '<script>\r\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n                        (function(){\r\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\n                        s1.async=true;\r\n                        s1.src=\"https://embed.tawk.to/{{app_key}}\";\r\n                        s1.charset=\"UTF-8\";\r\n                        s1.setAttribute(\"crossorigin\",\"*\");\r\n                        s0.parentNode.insertBefore(s1,s0);\r\n                        })();\r\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"------\"}}', 'twak.png', 0, '2019-10-18 23:16:05', '2022-10-26 08:08:27'),
(2, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha3.png', '\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\n<div class=\"g-recaptcha\" data-sitekey=\"{{site_key}}\" data-callback=\"verifyCaptcha\"></div>\n<div id=\"g-recaptcha-error\"></div>', '{\"site_key\":{\"title\":\"Site Key\",\"value\":\"6LdPC88fAAAAADQlUf_DV6Hrvgm-pZuLJFSLDOWV\"},\"secret_key\":{\"title\":\"Secret Key\",\"value\":\"6LdPC88fAAAAAG5SVaRYDnV2NpCrptLg2XLYKRKB\"}}', 'recaptcha.png', 0, '2019-10-18 23:16:05', '2022-11-16 06:41:08'),
(3, 'custom-captcha', 'Custom Captcha', 'Just put any random string', 'customcaptcha.png', NULL, '{\"random_key\":{\"title\":\"Random String\",\"value\":\"SecureString\"}}', 'na', 0, '2019-10-18 23:16:05', '2022-11-16 03:33:52'),
(4, 'google-analytics', 'Google Analytics', 'Key location is shown bellow', 'google_analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{app_key}}\"></script>\r\n                <script>\r\n                  window.dataLayer = window.dataLayer || [];\r\n                  function gtag(){dataLayer.push(arguments);}\r\n                  gtag(\"js\", new Date());\r\n                \r\n                  gtag(\"config\", \"{{app_key}}\");\r\n                </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"------\"}}', 'ganalytics.png', 0, NULL, '2022-10-26 08:08:11'),
(7, 'fb-comment', 'Facebook Comment ', 'Key location is shown bellow', 'Facebook.png', '<div id=\"fb-root\"></div><script async defer crossorigin=\"anonymous\" src=\"https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId={{app_key}}&autoLogAppEvents=1\"></script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"713047905830100\"}}', 'fb_com.PNG', 0, NULL, '2022-10-19 00:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_keys` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_values` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"seo_image\":\"1\",\"keywords\":[\"review\",\"rating\",\"compnay\",\"ltd\",\"business review\",\"business rating\",\"company rating\"],\"description\":\"RateLab is a business review platform. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi dolorem itaque laudantium aut, quibusdam amet, nemo quaerat, fuga facere corrupti quos dolorum. Blanditiis, exercitationem quia aliquam sit temporibus enim aspernatur repudiandae inventore, corporis vero quo animi beatae laborum ullam distinctio vel laudantium modi! Libero perferendis necessitatibus saepe deleniti illo officiis.\",\"social_title\":\"RateLab - Business Review Platform\",\"social_description\":\"RateLab is a business review platform. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi dolorem itaque laudantium aut, quibusdam amet, nemo quaerat, fuga facere corrupti quos dolorum. Blanditiis, exercitationem quia aliquam sit temporibus enim aspernatur repudiandae inventore, corporis vero quo animi beatae laborum ullam distinctio vel laudantium modi! Libero perferendis necessitatibus saepe deleniti illo officiis.\",\"image\":\"637481a682bec1668579750.png\"}', '2020-07-04 23:42:52', '2022-11-16 03:52:30'),
(24, 'about.content', '{\"has_image\":\"1\",\"heading\":\"Latest News\",\"sub_heading\":\"Register New Account\",\"description\":\"fdg sdfgsdf g ggg\",\"about_icon\":\"<i class=\\\"las la-address-card\\\"><\\/i>\",\"background_image\":\"60951a84abd141620384388.png\",\"about_image\":\"5f9914e907ace1603867881.jpg\"}', '2020-10-28 00:51:20', '2021-05-07 10:16:28'),
(25, 'blog.content', '{\"heading\":\"Our Latest News\",\"subheading\":\"Blog Post\"}', '2020-10-28 00:51:34', '2022-10-23 02:57:07'),
(26, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Maecenas nisi libero, gravida eget pulvinar quis, faucibus in ipsum. Mauris maximus sagittis velit, et cursus arcu bibendum\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"description_nic\":\"asdf asdf\",\"icon\":\"<i class=\\\"fab fa-algolia\\\"><\\/i>\",\"image\":\"6354d1192dbf01666502937.jpg\"}', '2020-10-28 00:57:19', '2022-10-23 04:18:51'),
(27, 'contact_us.content', '{\"title\":\"Contact Us\"}', '2020-10-28 00:59:19', '2022-10-23 03:11:00'),
(28, 'counter.content', '{\"heading\":\"Latest News\",\"sub_heading\":\"Register New Account\"}', '2020-10-28 01:04:02', '2020-10-28 01:04:02'),
(31, 'social_icon.element', '{\"title\":\"Facebook\",\"social_icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"url\":\"https:\\/\\/www.facebook.com\\/\"}', '2020-11-12 04:07:30', '2022-10-23 03:28:36'),
(33, 'feature.content', '{\"heading\":\"asdf\",\"sub_heading\":\"asdf\"}', '2021-01-03 23:40:54', '2021-01-03 23:40:55'),
(34, 'feature.element', '{\"title\":\"asdf\",\"description\":\"asdf\",\"feature_icon\":\"asdf\"}', '2021-01-03 23:41:02', '2021-01-03 23:41:02'),
(35, 'service.element', '{\"trx_type\":\"withdraw\",\"service_icon\":\"<i class=\\\"las la-highlighter\\\"><\\/i>\",\"title\":\"asdfasdf\",\"description\":\"asdfasdfasdfasdf\"}', '2021-03-06 01:12:10', '2021-03-06 01:12:10'),
(36, 'service.content', '{\"trx_type\":\"deposit\",\"heading\":\"asdf fffff\",\"subheading\":\"555\"}', '2021-03-06 01:27:34', '2022-03-30 08:07:06'),
(39, 'banner.content', '{\"heading\":\"Accelerate brand growth with Reviews and Loyalty\",\"subheading\":\"Read reviews. Write reviews. Find companies.\",\"has_image\":\"1\",\"image\":\"6353a8fcb56c71666427132.jpg\"}', '2021-05-02 06:09:30', '2022-10-22 05:55:32'),
(41, 'cookie.data', '{\"short_desc\":\"We may use cookies or any other tracking technologies when you visit our website, including any other media form, mobile website, or mobile application related or connected to help customize the Site and improve your experience.\",\"description\":\"<div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">What information do we collect?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">How do we protect your information?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">All provided delicate\\/credit data is sent through Stripe.<br>After an exchange, your private data (credit cards, social security numbers, financials, and so on) won\'t be put away on our workers.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">Do we disclose any information to outside parties?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">We don\'t sell, exchange, or in any case move to outside gatherings by and by recognizable data. This does exclude confided in outsiders who help us in working our site, leading our business, or adjusting you, since those gatherings consent to keep this data private. We may likewise deliver your data when we accept discharge is suitable to follow the law, implement our site strategies, or ensure our own or others\' rights, property, or wellbeing.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">Children\'s Online Privacy Protection Act Compliance<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">We are consistent with the prerequisites of COPPA (Children\'s Online Privacy Protection Act), we don\'t gather any data from anybody under 13 years old. Our site, items, and administrations are completely coordinated to individuals who are in any event 13 years of age or more established.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">Changes to our Privacy Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">If we decide to change our privacy policy, we will post those changes on this page.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">How long we retain your information?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">At the point when you register for our site, we cycle and keep your information we have about you however long you don\'t erase the record or withdraw yourself (subject to laws and guidelines).<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">What we don\\u2019t do with your data<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">We don\'t and will never share, unveil, sell, or in any case give your information to different organizations for the promoting of their items or administrations.<\\/p><\\/div>\",\"status\":1}', '2020-07-04 23:42:52', '2022-09-22 07:29:55'),
(42, 'policy_pages.element', '{\"title\":\"Privacy Policy\",\"details\":\"<div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">What information do we collect?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">How do we protect your information?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">All provided delicate\\/credit data is sent through Stripe.<br \\/>After an exchange, your private data (credit cards, social security numbers, financials, and so on) won\'t be put away on our workers.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Do we disclose any information to outside parties?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t sell, exchange, or in any case move to outside gatherings by and by recognizable data. This does exclude confided in outsiders who help us in working our site, leading our business, or adjusting you, since those gatherings consent to keep this data private. We may likewise deliver your data when we accept discharge is suitable to follow the law, implement our site strategies, or ensure our own or others\' rights, property, or wellbeing.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Children\'s Online Privacy Protection Act Compliance<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We are consistent with the prerequisites of COPPA (Children\'s Online Privacy Protection Act), we don\'t gather any data from anybody under 13 years old. Our site, items, and administrations are completely coordinated to individuals who are in any event 13 years of age or more established.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Changes to our Privacy Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">If we decide to change our privacy policy, we will post those changes on this page.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">How long we retain your information?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">At the point when you register for our site, we cycle and keep your information we have about you however long you don\'t erase the record or withdraw yourself (subject to laws and guidelines).<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">What we don\\u2019t do with your data<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t and will never share, unveil, sell, or in any case give your information to different organizations for the promoting of their items or administrations.<\\/p><\\/div>\"}', '2021-06-09 08:50:42', '2021-06-09 08:50:42'),
(43, 'policy_pages.element', '{\"title\":\"Terms of Service\",\"details\":\"<div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We claim all authority to dismiss, end, or handicap any help with or without cause per administrator discretion. This is a Complete independent facilitating, on the off chance that you misuse our ticket or Livechat or emotionally supportive network by submitting solicitations or protests we will impair your record. The solitary time you should reach us about the seaward facilitating is if there is an issue with the worker. We have not many substance limitations and everything is as per laws and guidelines. Try not to join on the off chance that you intend to do anything contrary to the guidelines, we do check these things and we will know, don\'t burn through our own and your time by joining on the off chance that you figure you will have the option to sneak by us and break the terms.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><ul class=\\\"font-18\\\" style=\\\"padding-left:15px;list-style-type:disc;font-size:18px;\\\"><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Configuration requests - If you have a fully managed dedicated server with us then we offer custom PHP\\/MySQL configurations, firewalls for dedicated IPs, DNS, and httpd configurations.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Software requests - Cpanel Extension Installation will be granted as long as it does not interfere with the security, stability, and performance of other users on the server.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Emergency Support - We do not provide emergency support \\/ Phone Support \\/ LiveChat Support. Support may take some hours sometimes.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Webmaster help - We do not offer any support for webmaster related issues and difficulty including coding, &amp; installs, Error solving. if there is an issue where a library or configuration of the server then we can help you if it\'s possible from our end.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Backups - We keep backups but we are not responsible for data loss, you are fully responsible for all backups.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">We Don\'t support any child porn or such material.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">No spam-related sites or material, such as email lists, mass mail programs, and scripts, etc.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">No harassing material that may cause people to retaliate against you.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">No phishing pages.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">You may not run any exploitation script from the server. reason can be terminated immediately.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">If Anyone attempting to hack or exploit the server by using your script or hosting, we will terminate your account to keep safe other users.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Malicious Botnets are strictly forbidden.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Spam, mass mailing, or email marketing in any way are strictly forbidden here.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Malicious hacking materials, trojans, viruses, &amp; malicious bots running or for download are forbidden.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Resource and cronjob abuse is forbidden and will result in suspension or termination.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Php\\/CGI proxies are strictly forbidden.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">CGI-IRC is strictly forbidden.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">No fake or disposal mailers, mass mailing, mail bombers, SMS bombers, etc.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">NO CREDIT OR REFUND will be granted for interruptions of service, due to User Agreement violations.<\\/li><\\/ul><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Terms &amp; Conditions for Users<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">Before getting to this site, you are consenting to be limited by these site Terms and Conditions of Use, every single appropriate law, and guidelines, and concur that you are answerable for consistency with any material neighborhood laws. If you disagree with any of these terms, you are restricted from utilizing or getting to this site.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Support<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">Whenever you have downloaded our item, you may get in touch with us for help through email and we will give a valiant effort to determine your issue. We will attempt to answer using the Email for more modest bug fixes, after which we will refresh the center bundle. Content help is offered to confirmed clients by Tickets as it were. Backing demands made by email and Livechat.<\\/p><p class=\\\"my-3 font-18 font-weight-bold\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">On the off chance that your help requires extra adjustment of the System, at that point, you have two alternatives:<\\/p><ul class=\\\"font-18\\\" style=\\\"padding-left:15px;list-style-type:disc;font-size:18px;\\\"><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Hang tight for additional update discharge.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Or on the other hand, enlist a specialist (We offer customization for extra charges).<\\/li><\\/ul><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Ownership<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">You may not guarantee scholarly or selective possession of any of our items, altered or unmodified. All items are property, we created them. Our items are given \\\"with no guarantees\\\" without guarantee of any sort, either communicated or suggested. On no occasion will our juridical individual be subject to any harms including, however not restricted to, immediate, roundabout, extraordinary, accidental, or significant harms or different misfortunes emerging out of the utilization of or powerlessness to utilize our items.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Warranty<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t offer any guarantee or assurance of these Services in any way. When our Services have been modified we can\'t ensure they will work with all outsider plugins, modules, or internet browsers. Program similarity ought to be tried against the show formats on the demo worker. If you don\'t mind guarantee that the programs you use will work with the component, as we can not ensure that our systems will work with all program mixes.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Unauthorized\\/Illegal Usage<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">You may not utilize our things for any illicit or unapproved reason or may you, in the utilization of the stage, disregard any laws in your locale (counting yet not restricted to copyright laws) just as the laws of your nation and International law. Specifically, it is disallowed to utilize the things on our foundation for pages that advance: brutality, illegal intimidation, hard sexual entertainment, bigotry, obscenity content or warez programming joins.<br \\/><br \\/>You can\'t imitate, copy, duplicate, sell, exchange or adventure any of our segment, utilization of the offered on our things, or admittance to the administration without the express composed consent by us or item proprietor.<br \\/><br \\/>Our Members are liable for all substance posted on the discussion and demo and movement that happens under your record.<br \\/><br \\/>We hold the chance of hindering your participation account quickly if we will think about a particularly not allowed conduct.<br \\/><br \\/>If you make a record on our site, you are liable for keeping up the security of your record, and you are completely answerable for all exercises that happen under the record and some other activities taken regarding the record. You should quickly inform us, of any unapproved employments of your record or some other penetrates of security.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Fiverr, Seoclerks Sellers Or Affiliates<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We do NOT ensure full SEO campaign conveyance within 24 hours. We make no assurance for conveyance time by any means. We give our best assessment to orders during the putting in of requests, anyway, these are gauges. We won\'t be considered liable for loss of assets, negative surveys or you being prohibited for late conveyance. If you are selling on a site that requires time touchy outcomes, utilize Our SEO Services at your own risk.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Payment\\/Refund Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">No refund or cash back will be made. After a deposit has been finished, it is extremely unlikely to invert it. You should utilize your equilibrium on requests our administrations, Hosting, SEO campaign. You concur that once you complete a deposit, you won\'t document a debate or a chargeback against us in any way, shape, or form.<br \\/><br \\/>If you document a debate or chargeback against us after a deposit, we claim all authority to end every single future request, prohibit you from our site. False action, for example, utilizing unapproved or taken charge cards will prompt the end of your record. There are no special cases.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Free Balance \\/ Coupon Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We offer numerous approaches to get FREE Balance, Coupons and Deposit offers yet we generally reserve the privilege to audit it and deduct it from your record offset with any explanation we may it is a sort of misuse. If we choose to deduct a few or all of free Balance from your record balance, and your record balance becomes negative, at that point the record will naturally be suspended. If your record is suspended because of a negative Balance you can request to make a custom payment to settle your equilibrium to actuate your record.<\\/p><\\/div>\"}', '2021-06-09 08:51:18', '2021-06-09 08:51:18'),
(44, 'maintenance.data', '{\"description\":\"<div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"text-align: center; font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">What information do we collect?<\\/h3><p class=\\\"font-18\\\" style=\\\"text-align: center; margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\\/p><\\/div>\"}', '2020-07-04 23:42:52', '2022-05-11 03:57:17'),
(45, 'footer.content', '{\"heading\":\"Footer\",\"description\":\"Dolor sit amet consectetur adipisicing elit. Eligendi illo consequuntur eaque. Quidem saepe molestiae ducimus maiores . and Dolor sit amet consectetur adipisicing elit. Eligendi illo consequuntur eaque. Quidem saepe molestiae ducimus maiores.\"}', '2022-10-22 06:16:30', '2022-10-25 10:45:09'),
(46, 'category.content', '{\"heading\":\"Browse Super Companies by Category\"}', '2022-10-22 12:03:02', '2022-10-22 12:03:02'),
(47, 'choose_reason.content', '{\"heading\":\"Why would you give a review of our platform\",\"subheading\":\"Why Ratelab\"}', '2022-10-22 12:14:23', '2022-10-25 11:05:29'),
(48, 'choose_reason.element', '{\"title\":\"Trusted Platform\",\"description\":\"Animi corporis et exercitationem natus, dolore adipisci optio sunt, eum, voluptas minus laudantium aliquam pariatur in. Tenetur atque eligendi consequatur rem.\",\"icon\":\"<i class=\\\"fas fa-handshake fa-3x\\\"><\\/i>\"}', '2022-10-22 12:14:57', '2022-10-22 12:14:57'),
(49, 'choose_reason.element', '{\"title\":\"Loyalty and Rewards\",\"description\":\"Animi corporis et exercitationem natus, dolore adipisci optio sunt, eum, voluptas minus laudantium aliquam pariatur in. Tenetur atque eligendi consequatur rem.\",\"icon\":\"<i class=\\\"far fa-gem fa-3x\\\"><\\/i>\"}', '2022-10-22 12:15:16', '2022-10-22 12:15:16'),
(50, 'choose_reason.element', '{\"title\":\"Reviews and Ratings\",\"description\":\"Animi corporis et exercitationem natus, dolore adipisci optio sunt, eum, voluptas minus laudantium aliquam pariatur in. Tenetur atque eligendi consequatur rem.\",\"icon\":\"<i class=\\\"las la-star fa-3x\\\"><\\/i>\"}', '2022-10-22 12:15:34', '2022-10-22 12:15:34'),
(51, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Concerns over Bangladesh\'s biggest project under sanctions on Russia\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\n\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\n\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"description_nic\":\"<br \\/>\",\"image\":\"6354d2c7288001666503367.jpg\"}', '2022-10-23 03:06:07', '2022-10-23 04:41:19'),
(52, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Nothing can describe that feeling when you\'ve won a Test match with your team.\",\"description\":\"<strong style=\\\"margin:0px;padding:0px;color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\">Lorem Ipsum<\\/strong><span style=\\\"color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\">\\u00a0is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<\\/span><br \\/>\",\"description_nic\":\"<br \\/>\",\"icon\":\"<i class=\\\"fas fa-angle-double-right\\\"><\\/i>\",\"image\":\"6354d2f9e9a741666503417.jpg\"}', '2022-10-23 03:06:57', '2022-10-23 03:06:58'),
(53, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Musk says Starlink active in Ukraine as Russian invasion disrupts internet\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\n\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\n\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"description_nic\":\"<br \\/>\",\"icon\":\"<i class=\\\"fab fa-accusoft\\\"><\\/i>\",\"image\":\"6354d3223fe191666503458.jpg\"}', '2022-10-23 03:07:38', '2022-10-23 04:43:12');
INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(54, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Maecenas nisi libero, gravida eget pulvinar quis, faucibus in ipsum. Mauris maximus sagittis velit, et cursus arcu bibendum\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\n\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\n\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"description_nic\":\"<br \\/>\",\"image\":\"6354d342a0e011666503490.jpeg\"}', '2022-10-23 03:08:10', '2022-10-23 04:41:50'),
(55, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Maecenas nisi libero, gravida eget pulvinar quis, faucibus in ipsum. Mauris maximus sagittis velit, et cursus arcu bibendum\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\n\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\\r\\n\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"description_nic\":\"<br \\/>\",\"icon\":\"<i class=\\\"fab fa-adn\\\"><\\/i>\",\"image\":\"6354d367445a11666503527.jpg\"}', '2022-10-23 03:08:47', '2022-10-23 04:43:46'),
(56, 'breadcrumb.content', '{\"has_image\":\"1\",\"image\":\"6354d380899a21666503552.jpg\"}', '2022-10-23 03:09:12', '2022-10-23 03:09:12'),
(57, 'company_list_section.content', '{\"title\":\"Want to give a review?\",\"button_name\":\"Join Us\",\"button_url\":\"user\\/login\"}', '2022-10-23 03:10:42', '2022-10-25 07:06:23'),
(58, 'contact_us.element', '{\"title\":\"Address\",\"icon\":\"<i class=\\\"la la-address-card\\\"><\\/i>\",\"content\":\"West-Uttara, Texas-1230, USA\"}', '2022-10-23 03:11:40', '2022-10-24 11:10:50'),
(59, 'contact_us.element', '{\"title\":\"Mobile\",\"icon\":\"<i class=\\\"la la-mobile\\\"><\\/i>\",\"content\":\"+880123456789\"}', '2022-10-23 03:12:16', '2022-10-24 11:10:56'),
(60, 'contact_us.element', '{\"title\":\"E-mail\",\"icon\":\"<i class=\\\"la la-envelope\\\"><\\/i>\",\"content\":\"demo.support@gmail.com\"}', '2022-10-23 03:12:45', '2022-10-24 11:11:02'),
(61, 'cta.content', '{\"heading\":\"Give reviews or building brand trust\",\"subheading\":\"Lorem recusandae minima asperiores libero. Expedita consectetur tenetur itaque distinctio animi, officiis illum dolorem excepturi minus blanditiis nam porro dignissimos commodi numquam soluta quam.\"}', '2022-10-23 03:16:35', '2022-10-25 11:07:48'),
(62, 'cta.element', '{\"title\":\"Give Your Real Review\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur fugiat iure, sunt rerum saepe odit atque porro exercitationem enim dolor asperiores. Aliquam quo, iure ullam sed perferendis corrupti odit earum atque porro exercitationem.\",\"icon\":\"<i class=\\\"fas fa-book-reader fa-3x\\\"><\\/i>\",\"url\":\"user\\/login\",\"button_name\":\"Join Us\"}', '2022-10-23 03:20:47', '2022-10-23 03:50:28'),
(63, 'cta.element', '{\"title\":\"Show Your Brand Trust\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur fugiat iure, sunt rerum saepe odit atque porro exercitationem enim dolor asperiores. Aliquam quo, iure ullam sed perferendis corrupti odit earum atque porro exercitationem.\",\"icon\":\"<i class=\\\"las la-hand-holding-heart fa-3x\\\"><\\/i>\",\"url\":\"user\\/register\",\"button_name\":\"Get Started\"}', '2022-10-23 03:21:54', '2022-10-25 11:08:42'),
(64, 'email_authentication.content', '{\"heading\":\"Verify Your Email\",\"subheading\":\"A 6 digit verification code has been sent to your email, please check your email and submit that code.\",\"has_image\":\"1\",\"image\":\"6354d702a6a731666504450.jpg\"}', '2022-10-23 03:24:10', '2022-10-23 03:24:10'),
(65, 'faq.content', '{\"heading\":\"FAQ\'s\",\"subheading\":\"Asking If you have any question?\",\"has_image\":\"1\",\"image\":\"6354d740ce1931666504512.jpg\"}', '2022-10-23 03:25:12', '2022-10-23 03:25:13'),
(66, 'forgot_password.content', '{\"heading\":\"Recovery Your Account\",\"subheading\":\"Enter your email or username then submit to reset your password.\",\"has_image\":\"1\",\"image\":\"6354d761444551666504545.jpg\"}', '2022-10-23 03:25:45', '2022-10-24 09:55:46'),
(67, 'login.content', '{\"greeting\":\"Welcome Back\",\"heading\":\"Login to your account\",\"has_image\":\"1\",\"image\":\"6354d7761797e1666504566.jpg\"}', '2022-10-23 03:26:06', '2022-10-23 03:26:06'),
(68, 'mobile_authentication.content', '{\"heading\":\"Verify Your Mobile Number\",\"subheading\":\"A 6 digit verification code has been sent to your mobile please check your inbox and submit that code.\",\"has_image\":\"1\",\"image\":\"6354d787a42771666504583.jpg\"}', '2022-10-23 03:26:23', '2022-10-23 03:26:23'),
(69, 'register.content', '{\"heading\":\"Create an Account\",\"has_image\":\"1\",\"image\":\"6354d7ae2cd0e1666504622.jpg\"}', '2022-10-23 03:27:02', '2022-10-23 03:27:02'),
(70, 'reset_password.content', '{\"heading\":\"Reset Password\",\"subheading\":\"Your account is verified successfully. Now you can change your password. Please enter a strong password and don\'t share it with anyone.\",\"has_image\":\"1\",\"image\":\"6354d7c056f141666504640.jpg\"}', '2022-10-23 03:27:20', '2022-10-24 10:24:15'),
(71, 'review.content', '{\"heading\":\"Recent Reviews\"}', '2022-10-23 03:27:36', '2022-10-23 03:27:36'),
(72, 'social_icon.element', '{\"title\":\"Twitter\",\"social_icon\":\"<i class=\\\"lab la-twitter\\\"><\\/i>\",\"url\":\"https:\\/\\/www.twitter.com\\/\"}', '2022-10-23 03:28:16', '2022-10-23 03:28:16'),
(73, 'social_icon.element', '{\"title\":\"Instragram\",\"social_icon\":\"<i class=\\\"lab la-instagram\\\"><\\/i>\",\"url\":\"https:\\/\\/www.instragram.com\\/\"}', '2022-10-23 03:29:22', '2022-10-23 03:29:22'),
(74, 'social_icon.element', '{\"title\":\"https:\\/\\/www.pinterest.com\\/login\\/\",\"social_icon\":\"<i class=\\\"fab fa-pinterest-p\\\"><\\/i>\",\"url\":\"https:\\/\\/www.pinterest.com\\/login\\/\"}', '2022-10-23 03:29:49', '2022-10-23 03:29:49'),
(75, 'social_icon.element', '{\"title\":\"Youtube\",\"social_icon\":\"<i class=\\\"fab fa-youtube\\\"><\\/i>\",\"url\":\"https:\\/\\/www.youtube.com\\/\"}', '2022-10-23 03:30:05', '2022-10-23 03:30:05'),
(76, 'testimonial.content', '{\"heading\":\"What Client Says About Us\",\"subheading\":\"Our User Review\",\"has_image\":\"1\",\"image\":\"6354d8c143bee1666504897.jpg\"}', '2022-10-23 03:31:37', '2022-10-23 03:31:37'),
(77, 'verification_code.content', '{\"heading\":\"Verify Your Email\",\"subheading\":\"A 6 digit verification code has been sent to your email please check your email and submit that code.\",\"has_image\":\"1\",\"image\":\"6354d8d72be551666504919.jpg\"}', '2022-10-23 03:31:59', '2022-10-24 09:59:04'),
(78, 'testimonial.element', '{\"name\":\"Ar Raad\",\"address\":\"Washinton DC , USA\",\"quote\":\"Hi , i \'m Ar Raad, from USA .Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur fugiat iure, sunt rerum saepe odit atque porro exercitationem enim dolor asperiores. Aliquam quo, iure ullam sed perferendis corrupti odit earum atque porro. That is my say about to this nice platform.\",\"has_image\":\"1\",\"image\":\"6354dee02fa141666506464.jpg\"}', '2022-10-23 03:57:44', '2022-10-23 03:57:44'),
(79, 'testimonial.element', '{\"name\":\"David Doe\",\"address\":\"Florida, Texas, USA\",\"quote\":\"Hi , i \'m David Doe, from USA .Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur fugiat iure, sunt rerum saepe odit atque porro exercitationem enim dolor asperiores. Aliquam quo, iure ullam sed perferendis corrupti odit earum atque porro. That is my say about to this nice platform.\",\"has_image\":\"1\",\"image\":\"6354df261f44e1666506534.jpg\"}', '2022-10-23 03:58:54', '2022-10-23 03:58:54'),
(80, 'testimonial.element', '{\"name\":\"Emma Walton\",\"address\":\"Rotorua, New Zealand\",\"quote\":\"Hi , i \'m Emma Walton, from Rotorua, New Zealand.Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur fugiat iure, sunt rerum saepe odit atque porro exercitationem enim dolor asperiores. Aliquam quo, iure ullam sed perferendis corrupti odit earum atque porro. That is my say about to this nice platform.\",\"has_image\":\"1\",\"image\":\"6354dfa5b82b91666506661.jpg\"}', '2022-10-23 04:01:01', '2022-10-23 04:01:01'),
(81, 'testimonial.element', '{\"name\":\"Britt Robertson\",\"address\":\"North Carolina\",\"quote\":\"Hi , i \'m Britt Robertson, from North Carolina. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur fugiat iure, sunt rerum saepe odit atque porro exercitationem enim dolor asperiores. Aliquam quo, iure ullam sed perferendis corrupti odit earum atque porro. That is my say about to this nice platform.\",\"has_image\":\"1\",\"image\":\"6354dffc6b82b1666506748.jpg\"}', '2022-10-23 04:02:28', '2022-10-23 04:02:28'),
(82, 'faq.element', '{\"question\":\"Why you will use is Ratelab?\",\"answer\":\"The most inflicted reason of use ratelab is\\u00a0 lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porttitor in nisi non efficitur. Curabitur porta, arcu malesuada efficitur ultricies, lectus risus imperdiet orci, ut varius ante enim non risus. Duis volutpat orci eget vulputate sollicitudin. Vestibulum commodo est ut velit porttitor pretium. Integer aliquet arcu mauris, vel cursus elit pulvinar a. Duis ante dui, aliquam dapibus lobortis sed, dignissim nec justo. Morbi mattis quam at enim rhoncus, sit amet feugiat urna eleifend. Donec molestie iaculis velit, et sodales sem dignissim in. Mauris ac dignissim diam. In fringilla quis justo id lacinia. Nam ante sapien, porttitor sed varius eu, egestas sed justo. Aenean placerat velit eget arcu elementum placerat. Nam sollicitudin volutpat diam ac lacinia. Suspendisse nec augue et ante rutrum porttitor.<br \\/>\"}', '2022-10-25 10:52:45', '2022-10-25 10:52:45'),
(83, 'faq.element', '{\"question\":\"Why is the platform considered the best?\",\"answer\":\"Considering the best for\\u00a0\\u00a0<span style=\\\"font-size:1rem;\\\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porttitor in nisi non efficitur. Curabitur porta, arcu malesuada efficitur ultricies, lectus risus imperdiet orci, ut varius ante enim non risus. Duis volutpat orci eget vulputate sollicitudin. Vestibulum commodo est ut velit porttitor pretium. Integer aliquet arcu mauris, vel cursus elit pulvinar a. Duis ante dui, aliquam dapibus lobortis sed, dignissim nec justo. Morbi mattis quam at enim rhoncus, sit amet feugiat urna eleifend. Donec molestie iaculis velit, et sodales sem dignissim in. Mauris ac dignissim diam. In fringilla quis justo id lacinia. Nam ante sapien, porttitor sed varius eu, egestas sed justo. Aenean placerat velit eget arcu elementum placerat. Nam sollicitudin volutpat diam ac lacinia. Suspendisse nec augue et ante rutrum porttitor.<\\/span>\"}', '2022-10-25 10:55:35', '2022-10-25 10:55:35'),
(84, 'faq.element', '{\"question\":\"How does the platform enrich my company?\",\"answer\":\"Main point of the platform is\\u00a0Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porttitor in nisi non efficitur. Curabitur porta, arcu malesuada efficitur ultricies, lectus risus imperdiet orci, ut varius ante enim non risus. Duis volutpat orci eget vulputate sollicitudin. Vestibulum commodo est ut velit porttitor pretium. Integer aliquet arcu mauris, vel cursus elit pulvinar a. Duis ante dui, aliquam dapibus lobortis sed, dignissim nec justo. Morbi mattis quam at enim rhoncus, sit amet feugiat urna eleifend. Donec molestie iaculis velit, et sodales sem dignissim in. Mauris ac dignissim diam. In fringilla quis justo id lacinia. Nam ante sapien, porttitor sed varius eu, egestas sed justo. Aenean placerat velit eget arcu elementum placerat. Nam sollicitudin volutpat diam ac lacinia. Suspendisse nec augue et ante rutrum porttitor.\"}', '2022-10-25 10:58:19', '2022-10-25 10:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_text` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency text',
  `cur_sym` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency symbol',
  `email_from` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_color` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_config` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'email configuration',
  `sms_config` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `global_shortcodes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kv` tinyint(1) NOT NULL DEFAULT 0,
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'email verification, 0 - dont check, 1 - check',
  `en` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'email notification, 0 - dont send, 1 - send',
  `sv` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'mobile verication, 0 - dont check, 1 - check',
  `sn` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'sms notification, 0 - dont send, 1 - send',
  `force_ssl` tinyint(1) NOT NULL DEFAULT 0,
  `maintenance_mode` tinyint(1) NOT NULL DEFAULT 0,
  `secure_password` tinyint(1) NOT NULL DEFAULT 0,
  `agree` tinyint(1) NOT NULL DEFAULT 0,
  `language` tinyint(1) NOT NULL DEFAULT 1,
  `registration` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Off	, 1: On',
  `active_template` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `cur_text`, `cur_sym`, `email_from`, `email_template`, `sms_body`, `sms_from`, `base_color`, `secondary_color`, `mail_config`, `sms_config`, `global_shortcodes`, `kv`, `ev`, `en`, `sv`, `sn`, `force_ssl`, `maintenance_mode`, `secure_password`, `agree`, `language`, `registration`, `active_template`, `system_info`, `created_at`, `updated_at`) VALUES
(1, 'Ratelab', 'USD', '$', 'info@viserlab.com', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody><tr>\r\n      <td height=\"50\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n          <tbody><tr>\r\n            <td align=\"center\" width=\"600\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                    <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                <tbody><tr>\r\n                  <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n                          <a href=\"#\">\r\n                            <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"https://i.imgur.com/Z1qtvtV.png\" alt=\"img\">\r\n                          </a>\r\n                        </td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello {{fullname}} ({{username}})</td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n                          <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                            <tbody><tr>\r\n                              <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\">{{message}}</td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n                    <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n                          © 2021 <a href=\"#\">{{site_name}}</a>&nbsp;. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"></td>\r\n    </tr>\r\n  </tbody></table>', 'hi {{fullname}} ({{username}}), {{message}}', 'ViserAdmin', 'e8be20', '2f6206', '{\"name\":\"php\"}', '{\"name\":\"nexmo\",\"clickatell\":{\"api_key\":\"----------------\"},\"infobip\":{\"username\":\"------------8888888\",\"password\":\"-----------------\"},\"message_bird\":{\"api_key\":\"-------------------\"},\"nexmo\":{\"api_key\":\"----------------------\",\"api_secret\":\"----------------------\"},\"sms_broadcast\":{\"username\":\"----------------------\",\"password\":\"-----------------------------\"},\"twilio\":{\"account_sid\":\"-----------------------\",\"auth_token\":\"---------------------------\",\"from\":\"----------------------\"},\"text_magic\":{\"username\":\"-----------------------\",\"apiv2_key\":\"-------------------------------\"},\"custom\":{\"method\":\"get\",\"url\":\"https:\\/\\/hostname\\/demo-api-v1\",\"headers\":{\"name\":[\"api_key\"],\"value\":[\"test_api 555\"]},\"body\":{\"name\":[\"from_number\"],\"value\":[\"5657545757\"]}}}', '{\n    \"site_name\":\"Name of your site\",\n    \"site_currency\":\"Currency of your site\",\n    \"currency_symbol\":\"Symbol of currency\"\n}', 0, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 'basic', '[]', NULL, '2022-11-16 06:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 1, '2020-07-06 03:47:55', '2022-04-09 03:47:04'),
(5, 'Hindi', 'hn', 0, '2020-12-29 02:20:07', '2022-04-09 03:47:04'),
(9, 'Bangla', 'bn', 0, '2021-03-14 04:37:41', '2022-03-30 12:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `notification_logs`
--

CREATE TABLE `notification_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `sender` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_from` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_to` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_type` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_templates`
--

CREATE TABLE `notification_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcodes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_status` tinyint(1) NOT NULL DEFAULT 1,
  `sms_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_templates`
--

INSERT INTO `notification_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(7, 'PASS_RESET_CODE', 'Password - Reset - Code', 'Password Reset', '<div style=\"font-family: Montserrat, sans-serif;\">We have received a request to reset the password for your account on&nbsp;<span style=\"font-weight: bolder;\">{{time}} .<br></span></div><div style=\"font-family: Montserrat, sans-serif;\">Requested From IP:&nbsp;<span style=\"font-weight: bolder;\">{{ip}}</span>&nbsp;using&nbsp;<span style=\"font-weight: bolder;\">{{browser}}</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{operating_system}}&nbsp;</span>.</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><br style=\"font-family: Montserrat, sans-serif;\"><div style=\"font-family: Montserrat, sans-serif;\"><div>Your account recovery code is:&nbsp;&nbsp;&nbsp;<font size=\"6\"><span style=\"font-weight: bolder;\">{{code}}</span></font></div><div><br></div></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><div><font size=\"4\" color=\"#CC0000\"><br></font></div>', 'Your account recovery code is: {{code}}', '{\"code\":\"Verification code for password reset\",\"ip\":\"IP address of the user\",\"browser\":\"Browser of the user\",\"operating_system\":\"Operating system of the user\",\"time\":\"Time of the request\"}', 1, 0, '2021-11-03 12:00:00', '2022-03-20 20:47:05'),
(8, 'PASS_RESET_DONE', 'Password - Reset - Confirmation', 'You have reset your password', '<p style=\"font-family: Montserrat, sans-serif;\">You have successfully reset your password.</p><p style=\"font-family: Montserrat, sans-serif;\">You changed from&nbsp; IP:&nbsp;<span style=\"font-weight: bolder;\">{{ip}}</span>&nbsp;using&nbsp;<span style=\"font-weight: bolder;\">{{browser}}</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{operating_system}}&nbsp;</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{time}}</span></p><p style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></p><p style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><font color=\"#ff0000\">If you did not change that, please contact us as soon as possible.</font></span></p>', 'Your password has been changed successfully', '{\"ip\":\"IP address of the user\",\"browser\":\"Browser of the user\",\"operating_system\":\"Operating system of the user\",\"time\":\"Time of the request\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-05 03:46:35'),
(9, 'ADMIN_SUPPORT_REPLY', 'Support - Reply', 'Reply Support Ticket', '<div><p><span data-mce-style=\"font-size: 11pt;\" style=\"font-size: 11pt;\"><span style=\"font-weight: bolder;\">A member from our support team has replied to the following ticket:</span></span></p><p><span style=\"font-weight: bolder;\"><span data-mce-style=\"font-size: 11pt;\" style=\"font-size: 11pt;\"><span style=\"font-weight: bolder;\"><br></span></span></span></p><p><span style=\"font-weight: bolder;\">[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</span></p><p>----------------------------------------------</p><p>Here is the reply :<br></p><p>{{reply}}<br></p></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', 'Your Ticket#{{ticket_id}} :  {{ticket_subject}} has been replied.', '{\"ticket_id\":\"ID of the support ticket\",\"ticket_subject\":\"Subject  of the support ticket\",\"reply\":\"Reply made by the admin\",\"link\":\"URL to view the support ticket\"}', 1, 1, '2019-09-14 13:14:22', '2021-11-04 09:38:55'),
(10, 'EVER_CODE', 'Verification - Email', 'Please verify your email address', '<br><div><div style=\"font-family: Montserrat, sans-serif;\">Thanks For joining us.<br></div><div style=\"font-family: Montserrat, sans-serif;\">Please use the below code to verify your email address.<br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Your email verification code is:<font size=\"6\"><span style=\"font-weight: bolder;\">&nbsp;{{code}}</span></font></div></div>', '---', '{\"code\":\"Email verification code\"}', 1, 0, '2021-11-03 12:00:00', '2022-04-03 02:32:07'),
(11, 'SVER_CODE', 'Verification - SMS', 'Verify Your Mobile Number', '---', 'Your phone verification code is: {{code}}', '{\"code\":\"SMS Verification Code\"}', 0, 1, '2021-11-03 12:00:00', '2022-03-20 19:24:37'),
(12, 'COMPANY_APPROVE', 'Company-Approved', 'Your company is approved by authority', '<div>The {{name}} has been approved successfully </div>\r\n<div>by {{site}}.</div>\r\n<div>Authority feedback:\'{{feedback}}\'</div>', 'The {{name}} has been approved successfully \r\n<div>by {{site}}.', '{\"name\":\"Company name\",\"site\":\"Website name\",\"feedback\":\"Admin feedback\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:50:16'),
(13, 'COMPANY_REJECT', 'Company-Reject', 'Your company is rejected by authority', '<div>The {{name}} has been rejected by {{site}} authority.</div>\r\n<div>Authority feedback:  \'{{feedback}}\'</div>', 'The {{name}} has been rejected successfully \r\n<div>by {{site}}.', '{\"name\":\"Company name\",\"site\":\"Website name\",\"feedback\":\"Admin feedback\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempname` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'template name',
  `secs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `tempname`, `secs`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'HOME', '/', 'templates.basic.', '[\"category\",\"choose_reason\",\"review\",\"cta\",\"testimonial\",\"faq\",\"blog\"]', 1, '2020-07-11 06:23:58', '2022-10-25 11:10:54'),
(4, 'Blog', 'blog', 'templates.basic.', NULL, 1, '2020-10-22 01:14:43', '2020-10-22 01:14:43'),
(5, 'Contact', 'contact', 'templates.basic.', NULL, 1, '2020-10-22 01:14:53', '2022-10-25 11:10:39'),
(19, 'Review', 'review', 'templates.basic.', '[\"review\"]', 0, '2022-11-14 06:47:46', '2022-11-14 06:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `rating` tinyint(1) NOT NULL DEFAULT 0,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

CREATE TABLE `support_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_message_id` int(10) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_ticket_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT 0,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `priority` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = Low, 2 = medium, 3 = heigh',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'contains full address',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: banned, 1: active',
  `kyc_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: email unverified, 1: email verified',
  `sv` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: mobile unverified, 1: mobile verified',
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_complete` tinyint(1) NOT NULL DEFAULT 0,
  `ver_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'verification send time',
  `ban_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_ip` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_logs`
--
ALTER TABLE `notification_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_attachments`
--
ALTER TABLE `support_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notification_logs`
--
ALTER TABLE `notification_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_templates`
--
ALTER TABLE `notification_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_attachments`
--
ALTER TABLE `support_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
