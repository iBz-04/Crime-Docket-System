
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.2
-- Author: iBz

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ob_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` text NOT NULL,
  `second_name` text NOT NULL,
  `atp_id` varchar(100) NOT NULL,
  `admin_role` varchar(50) NOT NULL,
  `admin_pswrd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `second_name`, `atp_id`, `admin_role`, `admin_pswrd`) VALUES
(11, 'Ibrah', 'Ibrahim Rayamah', '11', 'Admin', 'ibz.1');

-- --------------------------------------------------------

--
-- Table structure for table `cases_table`
--

CREATE TABLE `cases_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `incident_id` int(11) NOT NULL,
  `incident_type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `incident_date` varchar(100) NOT NULL,
  `incident_time` time NOT NULL,
  `reported_date` varchar(100) NOT NULL,
  `reported_time` time NOT NULL,
  `reporter_name` text NOT NULL,
  `reporter_emp_id` varchar(100) NOT NULL,
  `ob_entrant` text NOT NULL,
  `incident_desc` mediumtext NOT NULL,
  `action_taken` mediumtext NOT NULL,
  `case_category` varchar(50) NOT NULL,
  `case_status` varchar(50) NOT NULL,
  `image_one` varchar(255) NOT NULL,
  `image_two` varchar(255) NOT NULL,
  `image_three` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `followedup_table`
--

CREATE TABLE `followedup_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `ob_number` int(11) NOT NULL,
  `incident_type` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `incident_date` varchar(100) NOT NULL,
  `follower_name` text NOT NULL,
  `case_desc` varchar(1000) NOT NULL,
  `action_taken` varchar(1000) NOT NULL,
  `case_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `incident_types`
--

CREATE TABLE `incident_types` (
  `id` int(11) UNSIGNED NOT NULL,
  `inctype_name` varchar(255) NOT NULL,
  `added_by` text NOT NULL,
  `added_on` datetime NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases_table`
--
ALTER TABLE `cases_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followedup_table`
--
ALTER TABLE `followedup_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_types`
--
ALTER TABLE `incident_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cases_table`
--
ALTER TABLE `cases_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followedup_table`
--
ALTER TABLE `followedup_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incident_types`
--
ALTER TABLE `incident_types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
