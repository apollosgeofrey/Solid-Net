-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 11:48 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solidnetservices`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_screen_content`
--

CREATE TABLE `home_screen_content` (
  `id` int(250) NOT NULL,
  `content_type` varchar(100) NOT NULL,
  `image_path_name` varchar(100) NOT NULL,
  `header` varchar(150) NOT NULL,
  `header_color` varchar(50) NOT NULL,
  `text_value` text NOT NULL,
  `text_color` varchar(50) NOT NULL,
  `date_added` varchar(150) NOT NULL,
  `added_by` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_screen_content`
--

INSERT INTO `home_screen_content` (`id`, `content_type`, `image_path_name`, `header`, `header_color`, `text_value`, `text_color`, `date_added`, `added_by`) VALUES
(1, 'default', '', 'Experienced And Quality Training!', '#0856e7', 'We Offer Professional And Quality Training For Both The Installation And Maintenance Of Solar Power Systems, Closed-Circuit Television (CCTV), The Use, Repairs And Maintenance Of Multifuctional Printers All At Low Discounts And Affordable Prices.', '', '2020-11-10 (Tuesday)  03:00:35 pm', 'Geofrey Apollos'),
(2, 'default', '', 'Closed-Circuit Television (CCTV)', '#0856e7', 'Installation, Maintenance and Sales of Video Surveillance Systems such as Internal and External Dome CCTV Cameras, Bullet CCTV Cameras, C-Mount CCTV Cameras, Day/Night CCTV Cameras, Network/IP CCTV Cameras, Wireless CCTV Cameras, PTZ Pan Tilt & Zoom Cameras, Infrared/Night Vision CCTV Cameras and many more.', '', '2020-11-10 (Tuesday)  03:00:35 pm', 'Apollos Geofrey'),
(3, 'default', '', 'Solar Power Systems', '#0856e7', 'We carry out Solar Power Systems Installation and Maintenance. Services here include DC Home/Office Lighting System, DC Security Lighting System, UPS/AC Inverters, Dock to Dawn Street Light, Sale of Consumables associated to Solar Power Systems.', '', '2020-11-10 (Tuesday)  03:00:35 pm', 'Apollos Geofrey'),
(4, 'default', '', 'Print &amp; Copy Services', '#0856e7', 'We Are Well Known For Multifunctional Printing Services Such As Large-format Printing, Thesis Printing, Finishing/Binding, Business Cards, Printing Of Surveniars, Sales Of Printers &amp;amp; Other Machines, Sales Of Spare Components And Many Other Consumables.', '', '2020-11-10 (Tuesday)  08:55:46 pm', 'Geofrey Apollos'),
(10, 'slide_image', 'Server_Pics/201110203205.png', '', '', '', '', '2020-11-10 (Tuesday)  08:32:05 pm', 'Geofrey Apollos'),
(11, 'slide_image', 'Server_Pics/201110203220.png', '', '', '', '', '2020-11-10 (Tuesday)  08:32:20 pm', 'Geofrey Apollos');

-- --------------------------------------------------------

--
-- Table structure for table `product_issued`
--

CREATE TABLE `product_issued` (
  `id` int(250) NOT NULL,
  `product_name_issued` varchar(150) NOT NULL,
  `product_decription_issued` text NOT NULL,
  `product_quantity_issued` varchar(100) NOT NULL,
  `Amount_Paid` varchar(200) NOT NULL,
  `product_serial_number_issued` varchar(200) NOT NULL,
  `product_issued_by` varchar(150) NOT NULL,
  `product_time_issued` varchar(50) NOT NULL,
  `product_issued_to` varchar(200) NOT NULL,
  `product_receivers_phone_number` varchar(100) NOT NULL,
  `product_receivers_email` varchar(150) NOT NULL,
  `product_receivers_address` text NOT NULL,
  `surname` varchar(100) NOT NULL,
  `othername` varchar(150) NOT NULL,
  `receipt_number` varchar(150) NOT NULL,
  `product_price_per_each_issued` varchar(200) NOT NULL,
  `LPO_NO` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_issued`
--

INSERT INTO `product_issued` (`id`, `product_name_issued`, `product_decription_issued`, `product_quantity_issued`, `Amount_Paid`, `product_serial_number_issued`, `product_issued_by`, `product_time_issued`, `product_issued_to`, `product_receivers_phone_number`, `product_receivers_email`, `product_receivers_address`, `surname`, `othername`, `receipt_number`, `product_price_per_each_issued`, `LPO_NO`) VALUES
(1, 'Developer', 'B1219645 Type 28 Developer', '1', '33600', 'B1219645', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  04:40:53 pm', 'Deeper Life Bible Church, Karu Region', '08158594455', '', 'Church Secretariat', 'Deeper', 'Life', '201028164053', '33600', ''),
(4, 'Developer', 'B1219645 Type 28 Developer', '1', '8000', '', 'Geofrey Apollos', '2020-11-07 (Saturday)  02:39:36 pm', 'Wuyep Samuel', '', '', '', 'Wuyep', 'Samuel', '201107143937', '33600', '1111111111'),
(5, 'Developer', 'B1219645 Type 28 Developer', '1', '8000', '', 'Geofrey Apollos', '2020-11-07 (Saturday)  03:15:22 pm', 'Wuyep Samuel', '', '', '', 'Wuyep', 'Samuel', '201107151522', '33600', '1111111111');

-- --------------------------------------------------------

--
-- Table structure for table `product_stored`
--

CREATE TABLE `product_stored` (
  `id` int(250) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_decription` text NOT NULL,
  `product_quantity` varchar(150) NOT NULL,
  `product_price_per_each` varchar(200) NOT NULL,
  `product_image_name` varchar(100) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `time_date_added` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_stored`
--

INSERT INTO `product_stored` (`id`, `product_name`, `product_decription`, `product_quantity`, `product_price_per_each`, `product_image_name`, `added_by`, `time_date_added`) VALUES
(1, 'Developer', 'B1219645 Type 28 Developer', '2', '33600', 'Sample_photos/201028163545.png', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  04:35:45 pm'),
(2, 'Toner', 'MP301 Black', '3', '13750', 'Sample_photos/201027164432.jpg', 'Oluwadare Sunday', '2020-10-27 (Tuesday)  04:44:32 pm'),
(3, 'Toner', 'MPC2503 Black 1', '2', '48000', 'Sample_photos/201027164848.jpg', 'Oluwadare Sunday', '2020-10-27 (Tuesday)  04:48:48 pm'),
(4, 'Toner', 'MPC2503 Black 2', '3', '48000', 'Sample_photos/201027165212.jpg', 'Oluwadare Sunday', '2020-10-27 (Tuesday)  04:52:12 pm'),
(5, 'Toner', 'MPC2503 Magenta 1', '4', '55000', 'Sample_photos/201027165926.jpg', 'Oluwadare Sunday', '2020-10-27 (Tuesday)  04:59:26 pm'),
(6, 'Toner', 'MPC2503 Magenta 2', '1', '55000', 'Sample_photos/201028111512.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:15:12 am'),
(7, 'Toner', 'MPC2503 Cyan 1', '2', '55000', 'Sample_photos/201028111733.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:17:33 am'),
(8, 'Toner', 'MPC2503 Yellow 1', '2', '55000', 'Sample_photos/201028111838.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:18:38 am'),
(9, 'Toner', 'MP2501 Toner', '14', '13750', 'Sample_photos/201028111939.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:19:39 am'),
(10, 'Toner', 'MP2000 Toner', '5', '13750', 'Sample_photos/201028112028.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:20:28 am'),
(11, 'Toner', 'MP3353 Toner', '7', '22500', 'Sample_photos/201028112340.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:23:40 am'),
(12, 'Toner', 'MPC2550 Yellow', '1', '', 'Sample_photos/201028112616.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:26:16 am'),
(13, 'Toner', 'MPC2550 Magenta', '2', '', 'Sample_photos/201028112733.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:27:33 am'),
(14, 'Toner', 'MPC2550 Cyan', '1', '', 'Sample_photos/201028112836.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:28:36 am'),
(15, 'Toner', 'MPC3502 Yellow', '1', '48000', 'Sample_photos/201028113003.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:30:03 am'),
(16, 'Toner', 'MPC3000 Yellow', '1', '48000', 'Sample_photos/201028113059.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:30:59 am'),
(17, 'Toner', 'MP5002 Black', '4', '41800', 'Sample_photos/201028113506.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:35:06 am'),
(18, 'Spare Part', 'Cover: Vertical Transport D039-2936', '1', '18500', 'Sample_photos/201028115629.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  11:56:29 am'),
(19, 'Spare Part', 'Hot Roller AE01-1117', '2', '', 'Sample_photos/201028120315.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  12:03:15 pm'),
(20, 'Spare Part', 'Charge Roller AD02-7018', '7', '', 'Sample_photos/201028120835.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  12:08:35 pm'),
(21, 'Spare Part', 'Charge Roller AD02-7012', '5', '', 'Sample_photos/201028121108.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  12:11:08 pm'),
(22, 'Spare Part', 'MP2554 OPC Drum', '3', '', 'Sample_photos/201028121539.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  12:15:39 pm'),
(23, 'Spare Part', 'MP7502 Staple Refill', '2', '', 'Sample_photos/201028122356.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  12:23:56 pm'),
(24, 'Spare Part', 'Transfer Belt Cleaning Blade AD04-1126', '1', '24300', 'Sample_photos/201028123058.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  12:30:58 pm'),
(25, 'Spare Part', 'MPC3300 Charge Roller', '4', '', 'Sample_photos/201028125243.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  12:52:43 pm'),
(26, 'Spare Part', 'MP5002 Transfer Casing', '1', '28500', 'Sample_photos/201028125936.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  12:59:36 pm'),
(27, 'Spare Part', 'AE01-1128 (MP3353) Upper Fuser Roller', '1', '', 'Sample_photos/201028131758.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  01:17:58 pm'),
(28, 'Spare Part', 'AE01-0099 (MP5002) Hot Roller', '6', '', 'Sample_photos/201028132142.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  01:21:42 pm'),
(29, 'Spare Part', 'AD041114 (1027) Cleaning Blade', '8', '11750', 'Sample_photos/201028133314.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  01:33:14 pm'),
(30, 'Spare Part', 'MP2000/MP2501/MP2555 Cleaning Blade', '2', '11750', 'Sample_photos/201028133700.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  01:37:00 pm'),
(31, 'Spare Part', 'AE04-5099 (MP5002) Cleaning Web', '3', '43800', 'Sample_photos/201028134117.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  01:41:17 pm'),
(32, 'Spare Part MPC2003', 'D1882212 (MPC2003) Transfer Belt Blade', '2', '', '', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  02:41:12 pm'),
(33, 'Spare Part', 'MPC2030 Drum Cleaning Blade', '3', '11750', 'Sample_photos/201028135025.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  01:50:25 pm'),
(34, 'Spare Part', 'D202-4313 (MP3350) Development Unit', '1', '63450', 'Sample_photos/201028135927.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  01:59:27 pm'),
(35, 'Spare Part', 'B411-1027 (1027) Development Unit', '1', '63450', 'Sample_photos/201028140339.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  02:03:39 pm'),
(36, 'Spare Part', 'MP201/MP301 OPC Drum', '2', '18500', 'Sample_photos/201028142007.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  02:20:07 pm'),
(37, 'Spare Part', 'MPC2000 Drum Lubricant Blade', '2', '11750', 'Sample_photos/201028142632.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  02:26:32 pm'),
(38, 'Spare Part', 'MP3300 W/B - 2', '2', '11750', 'Sample_photos/201028142858.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  02:28:58 pm'),
(39, 'Spare Part', 'MP3300 W/B - 1', '1', '11750', 'Sample_photos/201028143017.jpg', 'Oluwadare Sunday', '2020-10-28 (Wednesday)  02:30:17 pm');

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE `users_admin` (
  `id` int(200) NOT NULL,
  `sur_name` varchar(100) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_numebr` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `activation_status` varchar(100) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `date_time_reg` varchar(50) NOT NULL,
  `secret_questions` varchar(150) NOT NULL,
  `secret_answer` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`id`, `sur_name`, `first_name`, `email_address`, `phone_numebr`, `password`, `activation_status`, `rank`, `date_time_reg`, `secret_questions`, `secret_answer`) VALUES
(1, 'Geofrey', 'Apollos', 'apollosgeofrey@gmail.com ', '+2348095635395', '0809563539', '1', '3', 'MASTER TIMER', 'MASTER REQUEST', 'MASTER ANSWER'),
(2, 'Natural', 'Talented', 'naturaltalented00@gmail.com', '08176981110', '0809563539', '1', '1', '2020-10-23 (Friday)  11:36:36 pm', 'What was the name of the town you were born?', 'Magatha'),
(3, 'Oluwadare', 'Sunday', 'sunjayng@gmail.com', '+234 803 137 2878', '123456789', '1', '3', 'Originator', 'Master Administrator ', 'Master Administrator ');

-- --------------------------------------------------------

--
-- Table structure for table `visitedmembers`
--

CREATE TABLE `visitedmembers` (
  `id` int(250) NOT NULL,
  `dater` varchar(100) NOT NULL,
  `timer` varchar(100) NOT NULL,
  `ipaddr` varchar(100) NOT NULL,
  `browser_os` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pics` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_screen_content`
--
ALTER TABLE `home_screen_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_issued`
--
ALTER TABLE `product_issued`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stored`
--
ALTER TABLE `product_stored`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitedmembers`
--
ALTER TABLE `visitedmembers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_screen_content`
--
ALTER TABLE `home_screen_content`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_issued`
--
ALTER TABLE `product_issued`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_stored`
--
ALTER TABLE `product_stored`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitedmembers`
--
ALTER TABLE `visitedmembers`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
