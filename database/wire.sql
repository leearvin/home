-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2013 年 09 月 13 日 05:03
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wire`
--

-- --------------------------------------------------------

--
-- 表的结构 `cominfo`
--

CREATE TABLE IF NOT EXISTS `cominfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comcode` varchar(20) NOT NULL,
  `comname` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `mac` char(17) NOT NULL,
  `user` varchar(30) NOT NULL,
  `department` varchar(20) NOT NULL,
  `cpu` varchar(20) NOT NULL,
  `memoryCapacity` varchar(20) NOT NULL,
  `memoryType` varchar(10) NOT NULL,
  `motherboardModel` varchar(30) NOT NULL,
  `chipset` varchar(20) NOT NULL,
  `machineRoomPort` varchar(10) NOT NULL,
  `switchNumber` varchar(10) NOT NULL,
  `internet` varchar(10) NOT NULL,
  `sww` varchar(10) NOT NULL,
  `application` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `updateTime` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `cominfo`
--

INSERT INTO `cominfo` (`id`, `comcode`, `comname`, `ip`, `mac`, `user`, `department`, `cpu`, `memoryCapacity`, `memoryType`, `motherboardModel`, `chipset`, `machineRoomPort`, `switchNumber`, `internet`, `sww`, `application`, `description`, `updateTime`) VALUES
(14, '1111', '', '', '', '', '支撑部', 'celeron2.8', '', '一代内存', '', '', '', '', '上网', '有', '', '', '2013-09-13'),
(15, '22', '', '', '', '', '支撑部', 'celeron2.8', '', '一代内存', '', '', '', '', '上网', '有', '', '', '2013-09-13');

-- --------------------------------------------------------

--
-- 表的结构 `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `sex` varchar(9) NOT NULL,
  `birthday` date NOT NULL,
  `company` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `onlineSoft` varchar(30) NOT NULL,
  `account` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `sex` char(3) NOT NULL,
  `birthday` date NOT NULL,
  `entryTime` date NOT NULL,
  `idCardNum` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address1` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
