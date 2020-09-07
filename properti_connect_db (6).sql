-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 04:59 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `properti_connect_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'Ayanda', 'Temitayo', 'admin', 'admin'),
(2, 'Joe ', 'Dickson', 'dickson', '1233'),
(4, 'Adeopatoye', 'Remilekun', 'skarma', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `businessName` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `about` text NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `clearance` int(1) NOT NULL,
  `package` varchar(100) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `fname`, `lname`, `email`, `businessName`, `phone`, `address`, `about`, `twitter`, `facebook`, `password`, `clearance`, `package`, `profile_pic`, `date`) VALUES
(1, 'Ayanda', 'Temitayo', 'temitayo@gmail.com', 'Teewhy & Co.', '07062168861', '29 shiroro road, minna', 'I am a very loyal person, you can count on me with your money', 'https://www.twitter.com/temitayo', 'https://www.facebook.com/temitayo', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'Basic', '../uploads/user_profile_pics/29-08-2019-1567038362_Ayanda Temitayo-profile-picture.jpg', '2019-08-29'),
(2, 'Akinwale ', 'Zaccheous', 'zack@gmail.com', 'Zack & Partners', '09078543431', '49, Saw mill Garage Paiko. Niger State', 'Zack & Partners delights in giving you the best when it comes to student housing. We offer discount on some of our renting. Try us today', 'https://www.twitter.com/zacheous', 'https://www.facebook.com/zacheous', 'e89820fe1b2285d2136590089f0f137ed70ac452', 1, 'Basic', '../uploads/user_profile_pics/05-09-2019-1567635733_Akinwale  Zaccheous-profile-picture.jpg', '2019-09-04'),
(3, 'David', 'Adoga', 'david@gmail.com', 'Flourish Estate & Valuer Agent', '08123654231', 'Adjacent Radio Nigeria, Shiroro Road Minna', 'I am a registered agent with 15 years of experience. I am available to give you the best of accommodations.', 'https://www.twitter.com/david', 'https://www.facebook.com/david', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'Basic', '../uploads/user_profile_pics/08-09-2019-1567979814_David Adoga-profile-picture.jpg', '2019-09-08'),
(4, 'Awoyemi', 'Adelowo', 'hamed@yahoo.com', 'Awoyemi & Partners', '08064534224', 'Babangida shopping mall, Bida Niger State', 'We believe in building trust and getting you a perfect home for comfort', 'https://www.twitter.com/@iyanu', 'https://www.facebook.com/iyanu', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'Basic', '../uploads/user_profile_pics/29-10-2019-1572303901_Hamed Nasiru-profile-picture.jpg', '2019-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `amenities_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `amenities_name`) VALUES
(1, 'Water'),
(2, 'Electricity'),
(3, 'Garbage'),
(4, 'Personal Transformer'),
(5, 'Maintenace'),
(6, 'Security Services'),
(7, 'Home owners insurance'),
(8, 'Wardrope'),
(9, 'AC Installed');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `open_prop_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `schedule_date` varchar(255) NOT NULL,
  `schedule_time` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact_no` bigint(12) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `open_prop_id`, `agent_id`, `schedule_date`, `schedule_time`, `firstname`, `lastname`, `contact_no`, `message`, `date`) VALUES
(1, 2, 2, 'Saturday, September 07, 2019', '10:00 am', 'Ifeoluwa', 'Precious', 7062168861, 'I am Interested in your property and would like to make a survey of the building. kindly call my line if you will not be available', '2019-09-04 23:45:13'),
(2, 5, 3, 'Friday, September 13, 2019', '10:00 am', 'Kolo', 'Job', 9020341360, 'I am Interested in your property and would like to make a survey of the building', '2019-09-08 23:26:57'),
(3, 3, 1, 'Monday, October 28, 2019', '1:00 pm', 'Ibrahim', 'Bankole', 9017184905, 'I am Interested in your property and would like to make a survey of the building', '2019-10-28 23:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `contact_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `prop_owner` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images_table`
--

CREATE TABLE `images_table` (
  `id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `images_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images_table`
--

INSERT INTO `images_table` (`id`, `prop_id`, `images_path`) VALUES
(1, 1, '../images/uploads/Pink Lodge_crwn c.jpg'),
(2, 1, '../images/uploads/Pink Lodge_deemanuel sink.jpg'),
(3, 2, '../images/uploads/Deemauel Lodge_De emmanul.jpg'),
(4, 2, '../images/uploads/Deemauel Lodge_deemanuel sink.jpg'),
(5, 2, '../images/uploads/Deemauel Lodge_deemanuel.jpg'),
(6, 2, '../images/uploads/Deemauel Lodge_deemauel.jpg'),
(7, 2, '../images/uploads/Deemauel Lodge_deemauel1.jpg'),
(8, 3, '../images/uploads/Las Vegas_las compound.jpg'),
(9, 3, '../images/uploads/Las Vegas_las vx.jpg'),
(10, 3, '../images/uploads/Las Vegas_las vxegasx.jpg'),
(11, 3, '../images/uploads/Las Vegas_lasx vxegas.jpg'),
(12, 3, '../images/uploads/Las Vegas_ty vixllla.jpg'),
(13, 4, '../images/uploads/District 7 Lodge_deemauel1.jpg'),
(14, 4, '../images/uploads/District 7 Lodge_district 7 2.jpg'),
(15, 4, '../images/uploads/District 7 Lodge_district 7 front.jpg'),
(16, 4, '../images/uploads/District 7 Lodge_district 7.jpg'),
(17, 4, '../images/uploads/District 7 Lodge_IMG_8499.JPG'),
(18, 5, '../images/uploads/Al barka lodge_Al barka 2.jpg'),
(19, 5, '../images/uploads/Al barka lodge_Al barka l.jpg'),
(20, 5, '../images/uploads/Al barka lodge_Al barka lodge.jpg'),
(21, 5, '../images/uploads/Al barka lodge_Al barka.jpg'),
(22, 5, '../images/uploads/Al barka lodge_Al brka.jpg'),
(23, 5, '../images/uploads/Al barka lodge_Albarka.jpg'),
(24, 6, '../images/uploads/MM Castle_IMG_8499.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_name`) VALUES
(1, 'Gidan kwano'),
(2, 'Bosso'),
(3, 'Kpakungun'),
(4, 'Gidan Mangoro');

-- --------------------------------------------------------

--
-- Table structure for table `open_property_details`
--

CREATE TABLE `open_property_details` (
  `open_prop_id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `open_property_details`
--

INSERT INTO `open_property_details` (`open_prop_id`, `prop_id`, `day`, `time`, `status`, `date_stamp`) VALUES
(1, 1, 'Thursdays - Saturday', '9:30 pm - 1:00 pm', 'open', '2019-08-29 01:32:43'),
(2, 2, 'Fridays - Saturdays', '9:30 am - 3:00 pm', 'open', '2019-09-04 23:29:30'),
(3, 3, 'Weekends Only', '9:00 am - 5:00 pm', '0', '2019-09-06 03:55:23'),
(4, 5, 'Monday-Friday', '9:00 am - 4:00 pm', 'open', '2019-09-08 23:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `property_details`
--

CREATE TABLE `property_details` (
  `prop_id` int(20) NOT NULL,
  `prop_name` varchar(100) NOT NULL,
  `roomtype_id` int(10) NOT NULL,
  `prop_price` double NOT NULL,
  `proximity` varchar(60) NOT NULL,
  `prop_desc` varchar(255) NOT NULL,
  `featured_img` varchar(255) NOT NULL,
  `location_id` int(20) NOT NULL,
  `prop_address` text NOT NULL,
  `rules` text NOT NULL,
  `vacancy` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `prop_status` varchar(50) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_details`
--

INSERT INTO `property_details` (`prop_id`, `prop_name`, `roomtype_id`, `prop_price`, `proximity`, `prop_desc`, `featured_img`, `location_id`, `prop_address`, `rules`, `vacancy`, `date`, `prop_status`, `agent_id`) VALUES
(1, 'Pink Lodge', 1, 80000, 'Fairly Close to school', 'Pink lodge is one of the best lodge you will be confortable staying. It is very affordable and conducive', '../images/uploads/Pink Lodge.jpg', 1, 'Behind kings villa, Gidan kwano minna', 'No rules', 1, '2019-08-29 01:31:42', 'Approved', 1),
(2, 'Deemauel Lodge', 2, 100000, 'Close to school gate', 'Deemanuel Lodge provides unbeatable facilities to tenants. One of the best lodge available around school environment in Gk', '../images/uploads/Deemauel Lodge.jpg', 1, 'Front of school gate, Gidan kwano', 'None', 2, '2019-09-04 23:27:29', 'Approved', 2),
(3, 'Las Vegas', 2, 120000, 'Fairly Close to school', 'Las Vegas is one of the best lodge available for student accommodation', '../images/uploads/Las Vegas.jpg', 1, 'Front of Albarka lodge', 'No rules', 0, '2019-09-06 03:53:40', 'Approved', 1),
(4, 'District 7 Lodge', 2, 100000, 'Fairly Close to school', 'District 7 Offers affordable pricing in their accommodations with all facilities included', '../images/uploads/District 7 Lodge.jpg', 1, 'Beside AMT lodge', 'No compound Party!', 0, '2019-09-08 23:03:48', 'unApproved', 3),
(5, 'Al barka lodge', 2, 150000, 'Fairly Close to school', 'Albarka lodge is a new house in Gk that has a conducive environment for student comfort. If you need a place to stay throughout your years in school, Albarka lodge is proper', '../images/uploads/Al barka lodge.jpg', 1, 'After winners chapel, front of las vegas', 'No rules', 4, '2019-09-08 23:09:12', 'Approved', 3),
(6, 'MM Castle', 2, 0, '120000', 'MM Castle is one of the most sort after lodges available in the school environment in GK.', '../images/uploads/MM Castle.jpg', 4, 'Minna-bida road, after Abuja lodge', 'No rules', 0, '2019-10-29 00:26:29', 'unApproved', 4);

-- --------------------------------------------------------

--
-- Table structure for table `prop_amenities`
--

CREATE TABLE `prop_amenities` (
  `id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `amenities_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prop_amenities`
--

INSERT INTO `prop_amenities` (`id`, `prop_id`, `amenities_id`) VALUES
(1, 1, '1'),
(2, 1, '2'),
(3, 1, '5'),
(4, 2, '1'),
(5, 2, '2'),
(6, 2, '4'),
(7, 2, '5'),
(8, 2, '8'),
(9, 3, '1'),
(10, 3, '2'),
(11, 3, '4'),
(12, 3, '8'),
(13, 4, '1'),
(14, 4, '2'),
(15, 4, '5'),
(16, 4, '8'),
(17, 5, '1'),
(18, 5, '2'),
(19, 5, '4'),
(20, 5, '5'),
(21, 5, '6'),
(22, 5, '8'),
(23, 6, '1'),
(24, 6, '2'),
(25, 6, '4'),
(26, 6, '6');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `r_id` int(11) NOT NULL,
  `types` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`r_id`, `types`) VALUES
(1, 'Single Room'),
(2, 'Self Contain'),
(3, 'Flat');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stu_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `expectation` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `clearance` varchar(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `tolerance` int(11) NOT NULL,
  `study` int(11) NOT NULL,
  `belongings` int(11) NOT NULL,
  `neatness` int(11) NOT NULL,
  `sleep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stu_id`, `firstname`, `lastname`, `email`, `password`, `gender`, `religion`, `phone`, `descr`, `expectation`, `photo`, `clearance`, `date`, `tolerance`, `study`, `belongings`, `neatness`, `sleep`) VALUES
(1, 'Jane', 'Ugo', 'aisha96@gmail.com', '1234', 'Female', 'Christian', 8032241379, 'Hello, I am a gentle lady for fears God. I dont talk too much', 'Hey, I am looking for a muslim and committed roommate who i can stay with. I already have my accommo', '../uploads/05-09-2019-1567704206_Aisha Tope-profile-picture.jpg', '1', '2019-08-29 11:45:38', 2, 4, 1, 1, 1),
(2, 'Adeopatoye', 'Remilekun', 'remi@gmail.com', '1234', 'Male', 'Christian', 7062168861, 'I am a very jovial and funny person who takes life as simple as anything.', 'Hey, I am looking for a very humble and loyal roommate who i can stay with as roommate', '../uploads/05-09-2019-1567645370_Adeopatoye Remilekun-profile-picture.jpg', '1', '2019-08-29 11:56:36', 5, 3, 2, 2, 1),
(3, 'Suleiman', 'Ahmad', 'fantastic@gmail.com', '12345', 'Male', 'Muslim', 8123454350, 'Hello, I am a jovial person and fun to be with. I don\'t like trouble.', 'Hey, I am looking for a reliable student who i can stay with. He must be God fearing', '../uploads/05-09-2019-1567712676_Suleiman Ahmad-profile-picture.jpg', '1', '2019-09-05 20:30:26', 5, 3, 2, 1, 1),
(4, 'Precious', 'Attah', 'precious123@gmail.com', '1234', 'Female', 'Christian', 9067543323, 'I am an easy going girl. I may be funny atimes but I don\'t take nonsense.', 'Hey, I am looking for a good character lady who is patient enough to accommodate with and who I can stay with without complain', '../uploads/08-09-2019-1567974151_Precious Attah-profile-picture.jpg', '1', '2019-09-08 21:18:18', 1, 4, 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `stu_message`
--

CREATE TABLE `stu_message` (
  `id` int(20) NOT NULL,
  `sender_id` int(20) NOT NULL,
  `reciever_id` int(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_message`
--

INSERT INTO `stu_message` (`id`, `sender_id`, `reciever_id`, `message`) VALUES
(1, 2, 3, 'Hello Ahmad, I saw your details that you were looking for a roomate on 2019-09-05 20:30:26. I would like to get in touch with you, please feel free to contact me in any of my line. Thank You');

-- --------------------------------------------------------

--
-- Table structure for table `users_feedback`
--

CREATE TABLE `users_feedback` (
  `feedback_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `reaction` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `posted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_feedback`
--

INSERT INTO `users_feedback` (`feedback_id`, `firstname`, `lastname`, `email`, `address`, `reaction`, `message`, `date`, `posted`) VALUES
(1, 'Bankole', 'Kehinde', 'kehinde@gmail.com', '55, fate road, Ilorin kwara state', 'Happy', 'This platform as really helped me in period when i was very much in need of accommodation. This is a nice development for Futminna Students', '2019-08-21 21:01:17', 1),
(2, 'Aisha', 'Ahmed', 'aisha96@gmail.com', 'Airforce base Maikunkele Minna', 'Happy', 'Good we are having this in Futminna. I got a roomate via this platform', '2019-08-21 21:05:37', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `contact_index` (`prop_id`);

--
-- Indexes for table `images_table`
--
ALTER TABLE `images_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `open_property_details`
--
ALTER TABLE `open_property_details`
  ADD PRIMARY KEY (`open_prop_id`),
  ADD KEY `open_property_details_index` (`prop_id`);

--
-- Indexes for table `property_details`
--
ALTER TABLE `property_details`
  ADD PRIMARY KEY (`prop_id`),
  ADD KEY `property_index` (`prop_id`);

--
-- Indexes for table `prop_amenities`
--
ALTER TABLE `prop_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prop_amenities_index` (`prop_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `stu_message`
--
ALTER TABLE `stu_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_feedback`
--
ALTER TABLE `users_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images_table`
--
ALTER TABLE `images_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `open_property_details`
--
ALTER TABLE `open_property_details`
  MODIFY `open_prop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `property_details`
--
ALTER TABLE `property_details`
  MODIFY `prop_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prop_amenities`
--
ALTER TABLE `prop_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stu_message`
--
ALTER TABLE `stu_message`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_feedback`
--
ALTER TABLE `users_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD CONSTRAINT `contact_details_ibfk_1` FOREIGN KEY (`prop_id`) REFERENCES `property_details` (`prop_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `open_property_details`
--
ALTER TABLE `open_property_details`
  ADD CONSTRAINT `open_property_details_ibfk_1` FOREIGN KEY (`prop_id`) REFERENCES `property_details` (`prop_id`);

--
-- Constraints for table `prop_amenities`
--
ALTER TABLE `prop_amenities`
  ADD CONSTRAINT `prop_amenities_ibfk_1` FOREIGN KEY (`prop_id`) REFERENCES `property_details` (`prop_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
