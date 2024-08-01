-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2018 at 12:35 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`username`, `password`, `email`, `fname`, `phone`, `type`) VALUES
('admin', 'admin', 'admin@gmail.com', 'admin', '2147483647', 'admin'),
('pravesh', 'pravesh', 'rawatpravesh0016@gmail.com', 'Pravesh Rawat', '0992642003', 'student'),
('pratish', 'pratish', 'prathish.21cs079.nc@cambridge.edu.in', 'Pratish Raj Singh', '0992628310', 'student'),
('sumit', 'sumit', 'sumitbangar59@gmail.com', 'sumit bangar', '988766363', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `stat_id` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `st_status` varchar(10) NOT NULL,
  `stat_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`stat_id`, `course`, `st_status`, `stat_date`) VALUES
('1', 'algo', 'Present', '2018-11-14'),
('2', 'algo', 'Present', '2018-11-13'),
('1', 'algo', 'Absent', '2018-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `st_id` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `st_status` varchar(30) NOT NULL,
  `st_name` varchar(30) NOT NULL,
  `st_dept` varchar(30) NOT NULL,
  `st_batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `st_id` varchar(20) NOT NULL,
  `st_name` varchar(20) NOT NULL,
  `st_dept` varchar(20) NOT NULL,
  `st_batch` int(4) NOT NULL,
  `st_sem` int(11) NOT NULL,
  `st_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES
('1', 'Pravesh', 'CSE', 2020, 2, 'rawatpravesh0016@gmail.com'),
('2', 'Nitish Sihmar', 'CSE', 2020, 3, 'sihmar.nitish@gmail.com'),
('3', 'Shivam Singh', 'CSE', 2020, 3, 'shivam@gmail.com'),
('4', 'Tushar Garg', 'CSE', 2020, 3, 'tushar@gmail.com');

INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS002 ', 'Abhishek HB', 'CSE', 2021, 6, 'abhishekabhishek6529@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS004', 'Aditya', 'CSE', 2021, 6, 'kulkarniaditya1104@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS005', 'akash m n', 'CSE', 2021, 6, 'akashnambai38@gmail.com ');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS007', 'Arpitha. R', 'CSE', 2021, 6, 'siddalingaiahramesh576@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1aj21cs008', 'Arun Kumar P A', 'CSE', 2021, 6, 'arun8951057570@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS009', 'Asima sadiya kouser ', 'CSE', 2021, 6, 'asimasadiya21@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS010', 'AYESHA TAHOORA', 'CSE', 2021, 6, 'ayeshatahoora461@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS011 ', 'B S Rishitha ', 'CSE', 2021, 6, 'Rishitha.21cs011.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS012', 'B shreya', 'CSE', 2021, 6, 'shreyu102003@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS013', 'B.Nainisha', 'CSE', 2021, 6, 'nainishaammu@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS014', 'Bharath G V', 'CSE', 2021, 6, 'bharath.21cs014.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS015', 'Bhargavi M V ', 'CSE', 2021, 6, 'bhargavimv.21cs015.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS017', 'Brunda M C', 'CSE', 2021, 6, 'brundamc2003@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS018', 'Chandan MS', 'CSE', 2025, 6, 'chandanmsreddy@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS019', 'CHANDAN P', 'CSE', 2023, 6, 'chandan.21cs019.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS023', 'Darshan Badiger', 'CSE', 2021, 6, 'darshancb48@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS024', 'Darshan Kumar Bhandari', 'CSE', 2021, 6, 'darshan.21cs024.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS025', 'Dayana Sthuthi ', 'CSE', 2021, 6, 'dayana.21cs025.nc@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS027', 'DUDALA TEJA ', 'CSE', 2024, 6, 'tejanaidu069@gmail.co');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS029', 'Gagan Gowda K R', 'CSE', 2021, 6, 'gagandarshan22@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS030', 'Ganavi S', 'CSE', 2021, 6, 'ganaviparna@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS034', 'HemanthT ', 'CSE', 2022, 6, 'hemanth20028@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS035', 'Hemanth V', 'CSE', 2024, 6, 'hemanth21062003@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS037', 'Jayanth C R ', 'CSE', 2021, 6, 'crjayanth19@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1aj21cs040', 'Karthik D M ', 'CSE', 2024, 6, 'karthikdm262002@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS049', 'Lavanya R Shetty', 'CSE', 2021, 6, 'lavanyarshetty@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS051', 'Likitha N', 'CSE', 2021, 6, 'likithan.21cs051.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1aj21cs052', 'L.Nandini', 'CSE', 2024, 6, 'nandinilomada@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS055', 'M. Kishore naidu', 'CSE', 2024, 6, 'kishore.21cs055.nc@cambridge.edu.in ');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS056', 'Madhan Kumar V ', 'CSE', 2021, 6, 'madank.21cs056.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS057 ', 'Madhura B G ', 'CSE', 2021, 6, 'Madhura.21cs057.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS059', 'Manushree.H', 'CSE', 2021, 6, 'manushree.21cs059.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS060', 'Meghana C D', 'CSE', 2021, 6, 'meghanacd2003@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS061', 'Midhunya V ', 'CSE', 2021, 6, 'midhunyavelumani@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS062', 'Mohammad idrees wani', 'CSE', 2021, 6, 'idreeswani.21cs062.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS063 ', 'Mohammed Zubair ', 'CSE', 2021, 6, 'mohammedzubair4940@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS066', 'Pravallika.M', 'CSE', 2021, 6, 'pravallikareddymorrappagari@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS067', 'Namana', 'CSE', 2021, 6, 'namana.21cs067.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS068', 'Navya Shree V G ', 'CSE', 2021, 6, 'navyashree.21cs068.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS070', 'Neha R', 'CSE', 2021, 6, 'neharevanaik@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS071', 'NISARGA.R', 'CSE', 2021, 6, 'nisarga.21cs071.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS073', 'NISHA N', 'CSE', 2021, 6, 'nisha.21cs073.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS074', 'Nithin jain V P ', 'CSE', 2021, 6, 'nithinjain.21cs074.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS075', 'P.Ankitha', 'CSE', 2021, 6, 'ankitha.21cs075.nc@cambridge.edu..');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS077', 'Prajwal N J', 'CSE', 2021, 6, 'prajwal.21cs077.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS078', 'Pranathi Shetty A K', 'CSE', 2024, 6, 'pranathi.21cs078.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS079', 'Pratish Raj Singh', 'CSE', 2021, 6, 'prathish.21cs079.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS080', 'Preksha kalgudi ', 'CSE', 2021, 6, 'prekshakalgudi@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS081', 'Preksha Rajaram ', 'CSE', 2021, 6, 'preksha.21cs081.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS082', 'PUTLURU MADHAVANARASIMHA ', 'CSE', 2021, 6, 'madhav4944@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS083', 'Rakshith K M ', 'CSE', 2021, 6, 'rakshithm.21cs083.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS085', 'S N MOHAMMAD SIDDIQ BASHA ', 'CSE', 2021, 6, 'mohammadsiddiqbasha.21cs085.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS086', 'S N Pradeep ', 'CSE', 2021, 6, 'snpradeep003@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS087 ', 'Sachin.M ', 'CSE', 2021, 6, 'gowdasachin344@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS088', 'Sai Kiran.S', 'CSE', 2021, 6, 'Saikirangowda007@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS089', 'sampada s', 'CSE', 2024, 6, 'sampadareddys4@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS090', 'Shaik Shameer', 'CSE', 2023, 6, 'shaikshameer9391711564@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS093', 'Shashank N', 'CSE', 2021, 6, 'shashank.21cs093.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS094', 'Shivaprasad B R', 'CSE', 2021, 6, 'shivaprasadbr0349@gmail.com ');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1aj21cs095', 'Shravani.g', 'CSE', 2021, 6, 'Shravani.21cs095.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS096', 'SNEHA D U ', 'CSE', 2021, 6, 'sneha.21cs096.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS097', 'SOUJANYA M', 'CSE', 2021, 6, 'soujanya.21cs097.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1aj21cs100', 'Stalin ', 'CSE', 2021, 6, 'rstalin404@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS103', 'Swati', 'CSE', 2021, 6, 'chikkegoudaswati@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS104', 'Syed Mohammad ', 'CSE', 2021, 6, 'syedmohammad.21cs104.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS105', 'Thanushree M Galigowdar ', 'CSE', 2021, 6, 'thanushreemgthanu@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS106', 'VADDE SHANKAR', 'CSE', 2021, 6, 'vaddeshankar18@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS110 ', 'Vivek Surya Vamshi ', 'CSE', 2021, 6, 'viveksurya2002@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS115 ', 'Praveen Kumar P E ', 'CSE', 2021, 6, 'praveenpvl1616@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ21CS116', 'Sangeeth S', 'CSE', 2023, 6, 'sangeethsrinivasan09@gmail.com');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ22CS400', 'Arun Kumar M G', 'CSE', 2021, 6, 'arunkumarmg.22cs400@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ22CS404', 'Manish Kumar', 'CSE', 2021, 6, 'manishkumar.aj22cs404@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ22CS406', 'Padmavati Bhaskar Mukri ', 'CSE', 2024, 6, 'padmavati.22cs406.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ22CS408 ', 'SALMA S N', 'CSE', 2022, 6, 'snsalma.22cs408.nc@cambridge.edu.in');
INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES ('1AJ22CS414', 'Vinay Kumar H C ', 'CSE', 2021, 6, 'vinay70196hc@gmail.com');



-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tc_id` varchar(20) NOT NULL,
  `tc_name` varchar(20) NOT NULL,
  `tc_dept` varchar(20) NOT NULL,
  `tc_email` varchar(30) NOT NULL,
  `tc_course` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tc_id`, `tc_name`, `tc_dept`, `tc_email`, `tc_course`) VALUES
('1', 'Sumit Bangar', 'cse', 'sumit@gmail.com', 'SE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `stat_id` (`stat_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tc_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`stat_id`) REFERENCES `students` (`st_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
