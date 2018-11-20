-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 11:55 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `curd`
--

CREATE TABLE `curd` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `facebook_link` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `file_name`) VALUES
(1, 'xdfdg', 'curd1.sql');

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

CREATE TABLE `mobiles` (
  `id` int(11) NOT NULL,
  `model_no` varchar(30) NOT NULL,
  `mobile_name` varchar(30) NOT NULL,
  `company` varchar(40) NOT NULL,
  `mobile_category` text NOT NULL,
  `price` double(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobiles`
--

INSERT INTO `mobiles` (`id`, `model_no`, `mobile_name`, `company`, `mobile_category`, `price`) VALUES
(13, 'SM-G615FZKUINS', 'Samsung Galaxy On Max (Black, ', 'Samsung', 'Smartphones', 20800.00),
(14, ' SM-G955FZKGINS', 'Samsung Galaxy S8 Plus (Midnig', 'Samsung', 'Smartphones', 18300.00),
(15, 'MN0X2HN/A', 'Apple iPhone 6s (Silver, 32 GB', 'Apple', 'Smartphones', 50000.00),
(16, 'MQ8E2HN/A', 'Apple iPhone 8 Plus (Silver, 6', 'Apple', 'Smartphones', 60200.00),
(17, ' R1 R829', 'OPPO R1 R829 (Black, 16 GB) (', 'OPPO', 'Smartphones', 19000.00),
(18, 'F1', 'OPPO F1 (Gold, 16 GB) (3 GB R', 'OPPO', 'Smartphones', 15500.00),
(19, 'MZB5602IN', 'Redmi 4A (Gold, 32 GB) (3 GB ', 'Xiomi', 'Smartphones', 5999.00),
(20, 'MZB5653IN', 'Mi A1', 'Xiomi', 'Smartphones', 17500.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(20) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Madhuri Bhamare', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_multi_form`
--

CREATE TABLE `tbl_multi_form` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `contact_num` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_multi_form`
--

INSERT INTO `tbl_multi_form` (`user_id`, `firstname`, `lastname`, `contact_num`, `email`, `gender`, `city`, `address`, `education`, `designation`) VALUES
(1, 'Gauri', 'shinde', '8956234565', 'swap@gmail.com', 'Female', 'Nashik', 'Kalwan', 'bcs', 'Trainee'),
(2, 'Priya', 'Shewalkar', '8956234565', 'priyanka@gmail.com', 'Female', 'Nashik', 'Deola', 'Msc(Comp)', 'Trainee'),
(3, 'Gauri', 'shinde', '8956234565', 'swap@gmail.com', 'Male', 'Nashik', 'Nashik', 'bcs', 'bjk vj');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_sub_category` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `on_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_description`, `product_price`, `product_status`, `product_category`, `product_sub_category`, `product_image`, `on_created`, `is_deleted`) VALUES
(3, 'Sketchers', 'sketchers', '500', 1, '1', '22', '', '2018-10-18 12:40:27', 0),
(5, 'Sarri', 'designer saari', '900', 1, '21', '26', '', '2018-10-17 07:28:51', 0),
(6, 'festival saari', 'festival saari in fresh stock', '1500', 1, '21', '26', '', '2018-10-17 07:28:35', 0),
(8, 'INC.5', 'inc', '2000', 1, '1', '22', '', '2018-10-17 07:29:21', 0),
(9, 'New Kids Shirt', 'New Kids Shirt', '200', 1, '18', '27', '', '2018-10-17 07:38:34', 0),
(10, 'kids pants', 'kids pants', '200', 1, '18', '27', '', '2018-10-17 07:39:13', 0),
(11, 'Kids Shirt6', 'Kids Shirt', '500', 1, '18', '27', '', '2018-10-17 09:52:45', 1),
(12, 'Kids Shirt6', 'Kids Shirt', '500', 1, '18', '27', '', '2018-10-17 09:52:38', 1),
(13, 'Kids Shirt', 'Kids Shirt', '500', 1, '18', '27', '', '2018-10-17 09:52:28', 1),
(14, 'Kids Shirt', 'Kids Shirt', '500', 1, '18', '27', '', '2018-10-17 09:54:07', 0),
(15, 'ykuyk', 'uykuk', 'hkhjk', 1, '18', '27', 'Desert.jpg', '2018-10-19 08:57:59', 1),
(16, 'fcghh', 'Kids Shirt', '500', 1, '1', '22', 'Desert.jpg', '2018-10-19 08:57:46', 1),
(17, 'fcghh', 'Kids Shirt', '500', 1, '1', '22', 'Desert.jpg', '2018-10-19 08:56:08', 1),
(18, 'efert', 'etet', '500', 1, '18', '27', 'Jellyfish.jpg', '2018-10-19 08:56:19', 1),
(19, 'efert', 'etet', '500', 1, '18', '27', 'Jellyfish.jpg', '2018-10-19 08:56:29', 1),
(20, 'wewre', 'fgretg', '500', 1, '1', '22', 'Jellyfish.jpg', '2018-10-19 08:56:37', 1),
(21, 'wewre', 'fgretg', '500', 1, '1', '22', 'Jellyfish.jpg', '2018-10-19 08:56:46', 1),
(22, 'wewre', 'fgretg', '500', 1, '1', '22', 'Jellyfish.jpg', '2018-10-19 08:56:56', 1),
(23, 'Kids Shirt', 'dfef', '2000', 1, '1', '23', 'daisy-pollen-flower-nature-87840.jpeg', '2018-10-19 07:27:13', 0),
(24, 'Kids Shirt', 'dfef', '2000', 1, '1', '23', 'daisy-pollen-flower-nature-87840.jpeg', '2018-10-19 07:28:11', 0),
(25, 'Kids Shirt', 'dfef', '2000', 1, '1', '23', 'daisy-pollen-flower-nature-87840.jpeg', '2018-10-19 08:58:58', 1),
(26, 'Kids Shirt', 'dfef', '2000', 1, '1', '23', 'daisy-pollen-flower-nature-87840.jpeg', '2018-10-19 08:59:07', 1),
(27, 'Kids Shirt', 'dfef', '2000', 1, '1', '23', 'daisy-pollen-flower-nature-87840.jpeg', '2018-10-19 08:59:17', 1),
(28, 'Kids Shirt', 'dfef', '2000', 1, '1', '23', 'daisy-pollen-flower-nature-87840.jpeg', '2018-10-19 08:58:50', 1),
(29, 'Kids Shirt', 'dfef', '2000', 1, '1', '23', 'daisy-pollen-flower-nature-87840.jpeg', '2018-10-19 08:58:37', 1),
(30, 'Kids Shirt', 'dfef', '2000', 1, '1', '23', 'daisy-pollen-flower-nature-87840.jpeg', '2018-10-19 08:58:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE `tbl_product_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_description` varchar(200) NOT NULL,
  `category_status` tinyint(1) NOT NULL,
  `parent_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`category_id`, `category_name`, `category_description`, `category_status`, `parent_category_id`) VALUES
(1, 'Mens', 'Mens Wear', 1, 0),
(18, 'Kids Wear', 'Kids Wear', 1, 0),
(21, 'Women', 'women', 1, 0),
(22, 'Mens Shoes', 'mens shoes', 1, 1),
(23, 'Mens Goggle', 'mens goggle', 1, 1),
(24, 'ladiese Watch', 'ladiese watch', 1, 21),
(25, 'WomensKurti', 'woens kurti', 1, 21),
(26, 'designer saari', 'designer saari', 1, 21),
(27, 'Kids Shirt', 'Kids Shirt', 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `profile` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id`, `name`, `address`, `phone`, `email`, `gender`, `password`, `profile`, `created`) VALUES
(4, 'Madhuri Bhamare', 'Pune', '9405843920', 'madhuri@gmail.com', 'female', '5f4dcc3b5aa765d61d8327deb882cf99', 'Chrysanthemum_2018-10-08_1538997002.jpg', '2018-10-08 14:36:42'),
(5, 'Pooja', 'Kalwan', '8956234556', 'pooja@gmail.com', 'female', '5f4dcc3b5aa765d61d8327deb882cf99', 'Jellyfish_2018-10-08_1538997020.jpg', '2018-10-08 11:10:20'),
(6, 'Harshali', 'Nashik Road', '784546891346', 'harshali@gmail.com', 'Array', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tulips_2018-10-08_1538997034.jpg', '2018-10-08 11:10:34'),
(7, 'Priyanka', 'Kalwan', '8956234556', 'priyanka@gmail.com', 'female', '5f4dcc3b5aa765d61d8327deb882cf99', 's3_2018-10-08_1538997054.jpg', '2018-10-08 11:10:54'),
(8, 'Mayank', 'Nashik', '8956234556', 'mayank@gmail.com', 'male', '5f4dcc3b5aa765d61d8327deb882cf99', '814kig83F+L._UX522__2018-10-08_1538997481.jpg', '2018-10-08 11:18:01'),
(10, 'Neha', 'Nashik', '8956234556', 'neha@gmail.com', 'female', '5f4dcc3b5aa765d61d8327deb882cf99', 'Koala_2018-10-08_1538997499.jpg', '2018-10-08 11:18:19'),
(11, 'Nehal', 'nasjik', '8956234556', 'nehal@gmail.com', 'female', '5f4dcc3b5aa765d61d8327deb882cf99', 's2_2018-10-08_1538997064.jpg', '2018-10-08 11:11:04'),
(12, 'Pratik', 'nashik', '89', 'pratik@gmail.com', 'male', 'e10adc3949ba59abbe56e057f20f883e', 's1_2018-10-08_1538997074.jpg', '2018-10-08 11:11:14'),
(13, 'Swapanali', 'Kalwan', '8956234556', 'swapna@gmail.com', 'female', 'e10adc3949ba59abbe56e057f20f883e', 's2_2018-10-08_1538997462.jpg', '2018-10-08 11:17:42'),
(14, 'new', 'new', '8956234556', 'new@gmail.com', 'female', 'e10adc3949ba59abbe56e057f20f883e', 'Desert_2018-10-08_1538997778.jpg', '2018-10-08 11:22:58'),
(15, 'Suchita Ahire', 'Deola', '8956234590', 'suchita@gmail.com', 'female', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tulips_2018-10-08_1539007933.jpg', '2018-10-08 14:58:13'),
(16, 'Vrushali', 'Kalwan', '8956234556', 'vrushali@gmail.com', 'female', 'e10adc3949ba59abbe56e057f20f883e', '', '2018-10-13 10:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_hobby` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_gender`, `user_password`, `user_contact`, `user_city`, `user_hobby`) VALUES
(23, 'Ganesh', 'ganesh@gmail.com', 'Male', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Cooking,Swiming'),
(24, 'Pranoti', 'pranoti@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Cooking,Reading'),
(25, 'Ganu', 'ganu@gmail.com', 'Male', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Cooking,Reading'),
(26, 'Kunal Bhamare', 'kunal@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Mumbai', 'Cooking,Reading'),
(27, 'Madhuri', 'madhuribhamare6@gmai', 'Female', 'password', '8956234556', 'Pune', 'Cooking,Reading'),
(28, 'Madhuri', 'madhuribhamare6@gmai', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Pune', 'Cooking,Reading'),
(29, 'Madhuri', 'madhuribhamare6@gmai', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Pune', 'Cooking,Reading'),
(30, 'Manisha', 'manisha@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Cooking,Reading'),
(31, 'Karishma', 'kari@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Playing,Reading'),
(32, 'Usha', 'usha@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Cooking,Reading,Swim'),
(33, 'Pooja', 'pooja@gmail.com', 'Female', '9596029122618c5f53f9f012a1023941', '8956234556', 'Pune', 'Cooking,Playing'),
(34, 'Pooja', 'pooja@gmail.com', 'Female', '9596029122618c5f53f9f012a1023941', '8956234556', 'Pune', 'Cooking,Playing'),
(35, 'Ganu', 'ganu@gmail.com', 'Male', '0f1173c60984292bd3b8c8ce5e6d124b', '8956234556', 'Mumbai', 'Cooking,Playing'),
(36, 'Ganu', 'ganu@gmail.com', 'Male', '0f1173c60984292bd3b8c8ce5e6d124b', '8956234556', 'Mumbai', 'Cooking,Playing'),
(37, 'Ganu', 'ganu@gmail.com', 'Male', '0f1173c60984292bd3b8c8ce5e6d124b', '8956234556', 'Mumbai', 'Cooking,Playing'),
(38, 'Suresh', 'suresh@gmail.com', 'Male', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Playing,Swimming'),
(39, 'SAYALI', 'sayali@gmail.com,', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Pune', 'Cooking,Playing'),
(40, 'Snehal', 'snehal@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Pune', 'Playing,Reading'),
(41, 'Snehal', 'snehal@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Pune', 'Playing,Reading'),
(42, 'Snehal', 'snehal@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Pune', 'Playing,Reading'),
(43, 'Snehal', 'snehal@gmail.com', 'Female', 'e529a9cea4a728eb9c5828b13b22844c', '8956234556', 'Nashik', 'Cooking,Playing'),
(44, 'Girish', 'girish@gmail.com', 'Male', 'e529a9cea4a728eb9c5828b13b22844c', '8956234556', 'Pune', 'Cooking,Reading'),
(45, 'Girish', 'girish@gmail.com', 'Male', 'e529a9cea4a728eb9c5828b13b22844c', '8956234556', 'Pune', 'Cooking,Reading'),
(46, 'Girish', 'girish@gmail.com', 'Male', 'e529a9cea4a728eb9c5828b13b22844c', '8956234556', 'Pune', 'Cooking,Reading'),
(47, 'Snehal', 'snehal@gmail.com', 'Female', '304eb4e7fe9b24bcd958d70d9322a5d8', '8956234556', 'Mumbai', 'Cooking,Playing'),
(48, 'Paresh', 'paresh@gmail.com', 'Male', 'e32dbdca118281061ee192b6720d0aa9', '8956234556', 'Mumbai', 'Cooking,Reading'),
(49, 'Madhuri', 'madhuribhamare6@gmai', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Cooking,Reading'),
(50, 'Vishakha', 'vishakha@gmail.com', 'female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Mumbai', 'Reading,Dancing'),
(51, 'Mayuri', 'mayuri@gmail.com', 'female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Cooking,Reading'),
(52, 'Shweta', 'shweta@gmail.com', 'female', '25d55ad283aa400af464c76d713c07ad', '8956234556', 'Mumbai', 'Reading,Dancing'),
(53, 'Mansi', 'mansi@gmail.com', 'female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Cooking,Dancing'),
(54, 'Sayali', 'sayali@gmail.com', 'female', '25d55ad283aa400af464c76d713c07ad', '8956234556', 'Nashik', 'Cooking,Reading'),
(55, 'Prashant', 'prashant@gmail.com', 'male', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Mumbai', 'Reading,Swiming'),
(56, 'Vrushali', 'vrushali@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '905623455', 'Mumbai', 'Swiming'),
(57, 'Suchita', 'suchita@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Cooking,Dancing'),
(58, 'Pooja', 'pooja@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Reading,Dancing'),
(59, 'Rutuja', 'rutuja@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Cooking,Reading'),
(60, 'Priya Shewalkar', 'priya@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99', '8956234556', 'Nashik', 'Cooking,Reading'),
(61, 'teju', 'teju@gmail.com', 'Female', '25d55ad283aa400af464c76d713c07ad', '8956234556', 'Mumbai', 'Cooking,Reading');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curd`
--
ALTER TABLE `curd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_multi_form`
--
ALTER TABLE `tbl_multi_form`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curd`
--
ALTER TABLE `curd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_multi_form`
--
ALTER TABLE `tbl_multi_form`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
