-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2016 at 05:49 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `create_admin_id` int(11) NOT NULL,
  `update_admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `phone`, `user_id`, `active`, `isdelete`, `created_at`, `updated_at`, `create_admin_id`, `update_admin_id`) VALUES
(2, 'Basel Gmail', 'basel1090@gmail.com', '0820132323', 0, 1, 0, '2016-10-23 13:52:30', '2016-10-23 13:52:30', 1, 0),
(3, 'Basel Yahoo', 'basel1090@yahoo.com', '0820132323', 0, 0, 0, '2016-10-23 13:55:25', '2016-10-23 13:55:34', 1, 1),
(4, 'Basel Gmail', 'b1090@gmail.com', '0820132323', 2, 1, 0, '2016-11-13 15:20:57', '2016-11-13 15:20:57', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_link`
--

CREATE TABLE IF NOT EXISTS `admin_link` (
  `admin_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`,`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_link`
--

INSERT INTO `admin_link` (`admin_id`, `link_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `isdelete` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `create_admin_id` int(11) NOT NULL,
  `update_admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `details`, `image`, `active`, `isdelete`, `created_at`, `updated_at`, `create_admin_id`, `update_admin_id`) VALUES
(1, 'Demo Article Go Here ', '<p>Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here </p><p><iframe frameborder="0" src="//www.youtube.com/embed/h9pyw6HZDEs" width="640" height="360" class="note-video-clip"></iframe><br></p><p><b><i>Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here \r\n\r\nDemo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here Demo Article Go Here </i></b></p>', '582487ae5062f.jpg', 1, 0, '2016-10-20 14:35:31', '2016-11-10 14:43:58', 1, 1),
(2, 'Other Article Go Here ', 'Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here \r\n\r\n\r\nOther Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here Other Article Go Here ', '582487cb0770e.jpg', 1, 0, '2016-10-20 14:41:33', '2016-11-10 14:44:27', 1, 1),
(3, 'About Us', '<p>dfghfdgfh</p>', '582487bf77961.jpg', 1, 0, '2016-10-25 13:40:04', '2016-11-10 14:44:16', 1, 1),
(4, 'About Us with new image', '<p>Image Resize</p>', '582487b73fe2b.jpg', 1, 0, '2016-10-25 13:47:44', '2016-11-10 14:44:07', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `parentid` int(11) NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `showinmenu` tinyint(1) NOT NULL,
  `orderid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `title`, `url`, `parentid`, `icon`, `showinmenu`, `orderid`) VALUES
(1, 'Articles', '#', 0, 'fa fa-file', 1, 1),
(2, 'Manage Articles', '/CMS/Article/', 1, 'icon-list', 1, 1),
(3, 'Add New Article', '/CMS/Article/add', 1, 'fa fa-plus', 1, 0),
(4, 'Sliders', '#', 0, 'fa fa-tv', 1, 2),
(5, 'Manage Sliders', '/CMS/Slider/', 4, 'icon-list', 1, 1),
(6, 'Add New Slider', '/CMS/Slider/add', 4, 'fa fa-plus', 1, 0),
(7, 'Menus', '#', 0, 'fa fa-list', 1, 1),
(8, 'Manage Menus', '/CMS/Menu/', 7, 'icon-list', 1, 1),
(9, 'Add New Menu', '/CMS/Menu/add', 7, 'fa fa-plus', 1, 1),
(10, 'Static Pages', '#', 0, 'fa fa-file', 1, 1),
(11, 'Manage Pages', '/CMS/StaticPage/', 10, 'icon-list', 1, 1),
(12, 'Add New Page', '/CMS/StaticPage/add', 10, 'fa fa-plus', 1, 1),
(13, 'Admins', '#', 0, 'fa fa-user', 1, 5),
(14, 'Manage Admins', '/CMS/Admin/', 13, 'icon-list', 1, 1),
(15, 'Add New Admin', '/CMS/Admin/add', 13, 'fa fa-plus', 1, 1),
(16, 'Admin Permissions', '/CMS/Admin/permission', 13, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `newwindow` tinyint(4) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `isdelete` tinyint(4) NOT NULL,
  `update_admin_id` int(11) NOT NULL,
  `create_admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `url`, `active`, `newwindow`, `parent_id`, `created_at`, `updated_at`, `isdelete`, `update_admin_id`, `create_admin_id`) VALUES
(1, 'Home Page', '/', 1, 0, 0, '2016-10-23 14:50:01', '2016-10-23 14:50:01', 0, 0, 1),
(2, 'About Us', '#', 1, 0, 0, '2016-10-23 14:50:08', '2016-10-23 14:50:08', 0, 0, 1),
(3, 'Profile', '/FrontEnd/page/1', 1, 0, 2, '2016-10-23 14:51:00', '2016-11-10 15:44:54', 0, 1, 1),
(4, 'Our History', '/FrontEnd/page/2', 1, 0, 2, '2016-10-23 14:51:44', '2016-11-10 15:44:39', 0, 1, 1),
(5, 'Contact Us', '/FrontEnd/contact', 1, 0, 0, '2016-11-10 15:11:29', '2016-11-10 15:11:29', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `newwindow` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `isdelete` tinyint(1) NOT NULL,
  `create_admin_id` int(11) NOT NULL,
  `update_admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `subtitle`, `url`, `image`, `active`, `newwindow`, `created_at`, `updated_at`, `isdelete`, `create_admin_id`, `update_admin_id`) VALUES
(1, 'New Year', '', '', '5824818c909c9.jpg', 1, 1, '2016-10-23 14:35:09', '2016-11-10 14:39:06', 0, 1, 1),
(2, 'Slider Title', 'Sub Title', 'http://google.com', '582481a1e2529.jpg', 1, 1, '2016-10-25 14:03:52', '2016-11-10 14:38:53', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `static_page`
--

CREATE TABLE IF NOT EXISTS `static_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `isdelete` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `create_admin_id` int(11) NOT NULL,
  `update_admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `static_page`
--

INSERT INTO `static_page` (`id`, `title`, `details`, `image`, `active`, `isdelete`, `created_at`, `updated_at`, `create_admin_id`, `update_admin_id`) VALUES
(1, 'About Us', '<p><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here.</span></p><p><span style="line-height: 18.5714px;"><br></span></p><p><b><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span><span style="line-height: 18.5714px;">About Us Content Go Here </span></b><span style="line-height: 18.5714px;"><br></span><br></p>', '582495ab4af74.jpg', 1, 0, '2016-10-23 14:04:22', '2016-11-10 15:43:39', 1, 1),
(2, 'Our History', '<p><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span></p><p><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><br></p><p><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><span style="line-height: 18.5714px;">Our History Go here&nbsp;</span><br></p>', '582494a7c9dd2.jpg', 1, 0, '2016-10-25 14:04:21', '2016-11-10 15:39:20', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Basel', 'b1090@live.com', '$2y$10$AgxT/f/GW2nVGjvGtDItPebOuudrai3VeWQ5HldrPIslq/0WP121u', 'USiGz5V7fntWVrN7np8IYh45wYVB8AOahgAIap0Zm5vKr60d5hqPeYzbtz9z', '2016-11-13 13:05:52', '2016-11-13 13:25:39'),
(2, 'Basel Gmail', 'b1090@gmail.com', '$2y$10$8vK3D985W55bRsVsuBvZZOcOjyAFC/yx1oSif01IoCOeSMRZYPuFm', 'OyDyWipkdAlP6Fuc0GRT6GhUbNGA0Dq5UqGlvVDF3YboyF0GXxYQMLL0mM54', '2016-11-13 13:20:57', '2016-11-13 13:42:13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
