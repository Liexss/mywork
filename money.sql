-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-09-08 15:51:52
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money`
--

-- --------------------------------------------------------

--
-- 表的结构 `announce`
--

CREATE TABLE `announce` (
  `announce_id` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `is_post` int(11) NOT NULL DEFAULT '1',
  `enclosure` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `manager`
--

CREATE TABLE `manager` (
  ` account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_post` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `reward`
--

CREATE TABLE `reward` (
  `prize_id` int(11) NOT NULL,
  `prize_name` varchar(255) NOT NULL,
  `money` varchar(11) NOT NULL,
  `level` varchar(32) DEFAULT NULL,
  `enclosure` varchar(255) DEFAULT NULL,
  `is_post` int(11) NOT NULL DEFAULT '1',
  `auditor` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `reward_apply`
--

CREATE TABLE `reward_apply` (
  `prize_id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `state` char(3) NOT NULL,
  `auditor_now` varchar(255) DEFAULT NULL,
  `submit_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `apply_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `reward_apply`
--

INSERT INTO `reward_apply` (`prize_id`, `student_id`, `state`, `auditor_now`, `submit_time`, `end_time`, `file_name`, `apply_level`) VALUES
(1, '2017212212001', '待审批', NULL, '2019-08-10 00:00:00', NULL, '二等奖学金', NULL),
(2, '2017212212002', '待审批', NULL, '2019-08-09 00:00:00', NULL, '三等奖学金', NULL),
(3, '2017212212003', '待审批', NULL, '2019-08-09 00:00:00', NULL, '一等奖学金', NULL),
(4, '2017212212004', '待审批', NULL, '2019-08-07 00:00:00', NULL, '优秀等奖学金', NULL),
(6, '2017212212002', '待审批', NULL, '2019-08-09 00:00:00', NULL, '三等奖学金', NULL),
(7, '2017212212002', '待审批', NULL, '2019-08-09 00:00:00', NULL, '三等奖学金', NULL),
(8, '2017212212002', '待审批', NULL, '2019-08-09 00:00:00', NULL, '三等奖学金', NULL),
(9, '2017212212002', '待审批', NULL, '2019-08-09 00:00:00', NULL, '三等奖学金', NULL),
(10, '2017212212002', '待审批', NULL, '2019-08-09 00:00:00', NULL, '三等奖学金', NULL),
(11, '2017212212002', '待审批', NULL, '2019-08-09 00:00:00', NULL, '三等奖学金', NULL),
(12, '2017212212002', '待审批', NULL, '2019-08-09 00:00:00', NULL, '三等奖学金', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `student_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `college` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  `is_post` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `college` varchar(255) DEFAULT NULL,
  `is_post` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`announce_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (` account`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`prize_id`);

--
-- Indexes for table `reward_apply`
--
ALTER TABLE `reward_apply`
  ADD PRIMARY KEY (`prize_id`,`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `reward_apply`
--
ALTER TABLE `reward_apply`
  MODIFY `prize_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
