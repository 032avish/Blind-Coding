-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql306.ezyro.com
-- Generation Time: May 07, 2021 at 03:51 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezyro_28430230_login_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Roll_Number` varchar(10) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Roll_Number`, `Pass`, `flag`) VALUES
('1', 'pass', 1),
('2', 'jayshree', 0),
('205120038', 'jayshree@2023', 0),
('205120026', 'charu@2023', 0),
('205120027', 'deepeeka@2023', 0),
('205120097', 'shivam@2023', 0),
('205120103', 'simran@2023', 0),
('205120104', 'sonu@2023', 0),
('205120110', 'yasser@2023', 0),
('205119078', 'ravi@2023', 0),
('205119038', 'harsh@2023', 0),
('205119006', 'akanksha@2023', 0),
('205119062', 'nitil@2023', 0),
('205119084', 'ritu@2023', 0),
('205119028', 'darshni@2023', 0),
('205119073', 'rahul@2023', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `Question_no` int(2) NOT NULL,
  `statement` mediumtext NOT NULL,
  `Input_format` mediumtext NOT NULL,
  `Output_format` mediumtext NOT NULL,
  `Constraints` mediumtext NOT NULL,
  `Sample_input` mediumtext NOT NULL,
  `Sample_output` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`Question_no`, `statement`, `Input_format`, `Output_format`, `Constraints`, `Sample_input`, `Sample_output`) VALUES
(1, 'Question:1\r\nSorting\r\nOne common task for computers is to sort data. For example, people might want to see all their files on a computer sorted by size. Since sorting is a simple problem with many different possible solutions, it is often used to introduce the study of algorithms.\r\n\r\nInsertion Sort\r\nThese challenges will cover Insertion Sort, a simple and intuitive sorting algorithm. We will first start with a nearly sorted list.\r\n\r\nInsert element into sorted list\r\nGiven a sorted list with an unsorted number  in the rightmost cell, can you write some simple code to insert  into the array so that it remains sorted?\r\n\r\nSince this is a learning exercise, it won\'t be the most efficient way of performing the insertion. It will instead demonstrate the brute-force method in detail.\r\n\r\nAssume you are given the array  indexed . Store the value of . Now test lower index values successively from  to  until you reach a value that is lower than , at  in this case. Each time your test fails, copy the value at the lower index to the current index and print your array. When the next lower indexed value is smaller than , insert the stored value at the current index and print the entire array.', '\r\nThe first line contains the integer n, the size of the array arr.\r\nThe next line contains  space-separated integers .', 'Print the array as a row of space-separated integers each time there is a shift or insertion.', '1<= n <= 1000\r\n-10000<= arr[i] <= 10000', '5\r\n2 4 6 8 3', '2 4 6 8 8 \r\n2 4 6 6 8 \r\n2 4 4 6 8 \r\n2 3 4 6 8 '),
(2, 'Question :2You are provided with a vector of  n integers. Then, you are given 2 queries. For the first query, you are provided with 1 integer, which denotes a position in the vector. The value at this position in the vector needs to be erased. The next query consists of 2 integers denoting a range of the positions in the vector. The elements which fall under that range should be removed. The second query is performed on the updated vector which we get after performing the first query.\r\nThe following are some useful vector functions:', 'The first line of the input contains an integer .The next line contains  space separated integers(1-based index).The third line contains a single integer ,denoting the position of an element that should be removed from the vector.The fourth line contains two integers  and  denoting the range that should be erased from the vector inclusive of a and exclusive of b.', 'Print the size of the vector in the first line and the elements of the vector after the two erase operations in the second line separated by space.', '1 <= N < 10^5\r\n1 <= x<= N\r\n1<= a <= b<=x', '6\r\n1 4 6 2 8 9\r\n2\r\n2 4', '3\r\n1 8 9'),
(3, 'Question 3:\r\nnbfdfjhgfcgyv\r\ngfyujfgyujnmbhguijhgh', '3564645845jhgfdgyhjbgvf', '3656548hvgfcdgyuhkj', '35214874896542', '123.456896542154', '4\r\n75\\4\r\n1455456845');

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE `text` (
  `Roll_Number` int(10) NOT NULL,
  `Question` int(11) NOT NULL,
  `Language` varchar(50) NOT NULL,
  `Code` mediumtext NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `text`
--

INSERT INTO `text` (`Roll_Number`, `Question`, `Language`, `Code`, `time`) VALUES
(1, 2, 'Cpp', 'fmnnmvfgfdgfg\r\nhf\r\nh', '00:00:10'),
(1, 3, 'Python', 'vbvnbgjghgh jgjgj', '00:00:21'),
(1, 1, 'C', 'fdvdbfbdfbmdfkjdkjgdgjggd\r\nfhgghj\r\nhj\r\ng\r\nhfh', '00:00:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Roll_Number`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`Question_no`);

--
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`Roll_Number`,`Question`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
