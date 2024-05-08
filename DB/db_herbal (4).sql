-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 01:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_herbal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Sreejith', 'sreejith@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointment_id` int(11) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `patient_address` varchar(500) NOT NULL,
  `patient_contact` varchar(10) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `patient_gender` varchar(10) NOT NULL,
  `patient_age` varchar(10) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `booking_time` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `appointment_status` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`appointment_id`, `patient_name`, `patient_address`, `patient_contact`, `reason`, `patient_gender`, `patient_age`, `doctor_id`, `booking_time`, `user_id`, `appointment_status`) VALUES
(5, 'bibin', 'vagjakka', '768903', 'stomach pain', 'Male', '18', 13, '2023-09-23 12:01:07', '3', '1'),
(6, 'joel', 'kjslkjksh', '8228206', 'head injury', 'Male', '19', 13, '2023-09-23 12:16:39', '3', '2'),
(7, 'jerson', 'hjgjhfvgnv', '786786', 'jhjkghg', 'Male', '20', 13, '2023-09-23 12:18:05', '1', '0'),
(8, 'vishnu vp', 'fsgsdgsdg', '3675858', 'food poison', 'Male', '20', 18, '2023-09-23 12:28:10', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_availability`
--

CREATE TABLE `tbl_availability` (
  `availability_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `from_time` varchar(30) NOT NULL,
  `to_time` varchar(30) NOT NULL,
  `Days` char(1) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_availability`
--

INSERT INTO `tbl_availability` (`availability_id`, `doctor_id`, `from_time`, `to_time`, `Days`, `status`) VALUES
(7, 13, '09:30', '18:00', '1', '0'),
(8, 13, '09:30', '18:00', '2', '0'),
(9, 13, '09:30', '18:00', '3', '0'),
(10, 13, '09:30', '18:00', '4', '0'),
(11, 13, '09:30', '18:00', '5', '0'),
(12, 13, '09:30', '18:00', '6', '0'),
(13, 13, '09:30', '18:00', '7', '0'),
(14, 18, '09:00', '12:00', '1', '0'),
(15, 18, '09:00', '12:00', '2', '0'),
(16, 18, '09:00', '12:00', '3', '0'),
(17, 18, '16:00', '18:00', '4', '0'),
(18, 18, '15:00', '18:00', '5', '0'),
(19, 18, '16:00', '19:00', '6', '0'),
(20, 18, '16:00', '18:00', '7', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(30) NOT NULL DEFAULT '0',
  `booking_amount` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_amount`, `user_id`, `booking_status`) VALUES
(1, '0', 0, 0, '0'),
(2, '0', 0, 1, '0'),
(3, '0', 0, 3, '0'),
(4, '0', 0, 3, '0'),
(5, '0', 0, 3, '0'),
(6, '0', 0, 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL DEFAULT 0,
  `cart_status` varchar(30) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_quantity`, `cart_status`, `product_id`, `booking_id`) VALUES
(1, 0, '0', 6, 1),
(2, 0, '0', 6, 2),
(3, 0, '0', 4, 3),
(4, 0, '0', 4, 4),
(5, 0, '0', 7, 5),
(6, 0, '0', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Car'),
(2, 'Bike'),
(3, 'Train'),
(4, 'Cycle'),
(5, 'Walk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_date` varchar(30) NOT NULL,
  `complaint_details` varchar(500) NOT NULL,
  `complaint_status` varchar(500) NOT NULL,
  `complaint_reply` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `complaint_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_date`, `complaint_details`, `complaint_status`, `complaint_reply`, `user_id`, `product_id`, `complaint_title`) VALUES
(1, '2023-08-12', '', 'hgfgfghfggvb', '', 0, 0, 'why'),
(2, '2023-08-12', 'hgyuhgjh', 'kkkk', '', 0, 0, 'why');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`) VALUES
(1, 'Kaya Chikitsa'),
(2, 'Shalya Tantra'),
(3, ' Shalakya Tantra'),
(4, ' Kaumarbhritya'),
(5, 'Agad Tantra'),
(6, 'Bhut Vidya'),
(7, 'Rasayan'),
(8, 'Vajikaran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Thiruvanathapuram'),
(2, 'Kollam'),
(3, 'Pathanamthitta'),
(5, 'Kottayam'),
(6, 'Idukki'),
(7, 'Eranakulam'),
(8, 'Thrissur'),
(9, 'Palakkad'),
(10, 'Malappuram'),
(11, 'Kozhikode'),
(12, 'Wayanad'),
(13, 'Kannur'),
(17, 'Kasargod');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(30) NOT NULL,
  `doctor_photo` varchar(500) NOT NULL,
  `doctor_proof` varchar(500) NOT NULL,
  `department_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `doctor_gender` varchar(30) NOT NULL,
  `doctor_email` varchar(50) NOT NULL,
  `doctor_address` varchar(500) NOT NULL,
  `doctor_dob` varchar(20) NOT NULL,
  `doctor_designation` varchar(30) NOT NULL,
  `doctor_contact` varchar(30) NOT NULL,
  `doctor_password` varchar(30) NOT NULL,
  `doctor_vstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctor_id`, `doctor_name`, `doctor_photo`, `doctor_proof`, `department_id`, `place_id`, `doctor_gender`, `doctor_email`, `doctor_address`, `doctor_dob`, `doctor_designation`, `doctor_contact`, `doctor_password`, `doctor_vstatus`) VALUES
(13, 'Sreejith', 'OIP.jpeg', 'R.jpeg', 3, 1, 'M', 'sreejithdoctor@gmail.com', 'Kollamparambil Kadapra Mannar PO Niranam\r\nNiranam church', '2003-04-21', 'BAMS', '3675858', '4321', 1),
(15, 'shanumon', 'R.jpeg', 'OIP.jpeg', 3, 5, 'Male', 'shanu@gmail.com', 'jskksksnsnnxm,mx', '2002-09-25', 'BAMS', '6799078653', '123456', 2),
(16, 'vishnu vp', '', '', 0, 0, '', '', '', '', '', '', '', 2),
(17, 'Sreejith K S', 'funny-kids-having-fun-winter-season_29937-6498.avif', 'images (1).jpeg', 4, 3, 'Male', 'doctor@gmail.com', 'Kollamparambil Kadapra Mannar PO Niranam\r\nNiranam church', '1998-05-21', 'BAMS', '81246765', '1234567', 2),
(18, 'vishnu vp', 'R.jpeg', 'OIP (1).jpeg', 1, 1, 'Male', 'doctorvishnu@gmail.com', 'fsgsdgsdg', '2000-04-06', 'BAMS', '7890123564', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(30) NOT NULL,
  `transaction_amount` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'Neyyattinkara', 1),
(2, 'Thiruvalla', 3),
(3, 'Pala', 5),
(4, 'Adoor', 3),
(5, 'Kothamangalam', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_photo` varchar(500) NOT NULL,
  `product_details` varchar(500) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `update_date` varchar(10) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_photo`, `product_details`, `subcategory_id`, `update_date`, `shop_id`, `product_price`) VALUES
(4, 'medicine', 'OIP (1).jpeg', 'hjdhjasgdhjasf', 1, '2023-07-31', 1, 0),
(6, 'medicine', 'R.jpeg', 'whduduqhdjkqhfk', 2, '2023-08-12', 1, 500),
(7, 'sticker', '1000_F_202641883_KEQMxrJUF8AHorLrCjFt0PuDjsXJgIrq.jpg', 'saehrhr', 3, '', 0, 500),
(8, 'sticker', '1000_F_202641883_KEQMxrJUF8AHorLrCjFt0PuDjsXJgIrq.jpg', 'saehrhr', 3, '2023-09-06', 0, 500),
(9, 'health', 'grains.jpg', 'grain', 1, '2023-09-06', 0, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_date` varchar(30) NOT NULL,
  `review_content` varchar(500) NOT NULL,
  `rating_count` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_date`, `review_content`, `rating_count`, `product_id`) VALUES
(1, '2023-08-12', 'rtdgfdgfhguy', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(30) NOT NULL,
  `shop_logo` varchar(30) NOT NULL,
  `shop_proof` varchar(30) NOT NULL,
  `place_id` int(11) NOT NULL,
  `shop_email` varchar(50) NOT NULL,
  `shop_address` varchar(500) NOT NULL,
  `shop_contact` varchar(30) NOT NULL,
  `shop_password` varchar(30) NOT NULL,
  `shop_vstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_logo`, `shop_proof`, `place_id`, `shop_email`, `shop_address`, `shop_contact`, `shop_password`, `shop_vstatus`) VALUES
(1, 'Vishnu', 'C:xampp	mpphp303.tmp', 'C:xampp	mpphp313.tmp', 4, 'vishnu@gmail.com', 'Kollamparambil Kadapra Mannar PO Niranam\r\nNiranam church', '812467', '1234', 1),
(2, 'health', 'OIP.jpeg', 'R.jpeg', 5, 'health@gmail.com', 'frsdfgsdgs', '4', 'sree', 2),
(3, 'Bibin/', '54693.jpg', '14358.jpg', 3, 'bibin@gmail.com', 'vagjakka', '9963281/', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `update_date` varchar(30) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `update_date`, `stock_quantity`, `product_id`) VALUES
(1, '', 5, 0),
(2, '', 10, 0),
(3, '', 11, 0),
(4, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(1, 'Swift', 1),
(2, 'Cosmic', 4),
(3, 'Omini', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_contact` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `place_id` varchar(30) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_dob` varchar(20) NOT NULL,
  `user_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_address`, `place_id`, `user_gender`, `user_dob`, `user_password`) VALUES
(1, 'Sreejith', '7890123564/', 'sreejithksreenivasan376@gmail.com', 'Kollamparambil Kadapra Mannar PO Niranam', '4', 'M', '2003-04-21', '123456'),
(3, 'Sreejith K S', '7283939', 'sreejithksreenivasan5@gmail.com', 'Kollamparambil Kadapra Mannar PO Niranam\r\nNiranam church', '1', 'Male', '2000-06-13', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `tbl_availability`
--
ALTER TABLE `tbl_availability`
  ADD PRIMARY KEY (`availability_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_availability`
--
ALTER TABLE `tbl_availability`
  MODIFY `availability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
