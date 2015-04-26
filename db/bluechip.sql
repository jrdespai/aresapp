-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: bluechip.cquy7bbypghg.us-west-2.rds.amazonaws.com:3306
-- Generation Time: Apr 26, 2015 at 01:05 AM
-- Server version: 5.6.22-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bluechip`
--

-- --------------------------------------------------------

--
-- Table structure for table `gameQueue`
--

CREATE TABLE IF NOT EXISTS `gameQueue` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `teamID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Waiting Line for random games' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `playerName` text NOT NULL,
  `playerEmail` text NOT NULL,
  `playerUserName` text NOT NULL,
  `playerId` int(8) NOT NULL AUTO_INCREMENT,
  `playerWins` int(3) NOT NULL,
  `playerLosses` int(3) NOT NULL,
  `playerCity` text NOT NULL,
  `playerState` text NOT NULL,
  `playerPhone` text NOT NULL,
  `playerPosition` text NOT NULL,
  `playerPassword` text NOT NULL,
  PRIMARY KEY (`playerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`playerName`, `playerEmail`, `playerUserName`, `playerId`, `playerWins`, `playerLosses`, `playerCity`, `playerState`, `playerPhone`, `playerPosition`, `playerPassword`) VALUES
('Cool Kid', 'CoolK@gmail.com', 'Coolio89', 11, 0, 0, 'Gilbert', 'AZ', '4801234567', '', 'sha256:1000:hZ7KPXTlQLyKHHaCrQS6cUUbw09Lf9lx:zU/9uE4v2VdL2to0t8SL8F1AyIlkUqD3'),
('John Tucker', 'JT@gmail.com', 'JTuck', 12, 0, 0, 'Gilbert', 'AZ', '4803459817', '', 'sha256:1000:gw0oHn46MclveXqHG9eWW5CV3UN1xt7E:YMIU2JjRTo+k/cBPi4bKD0gBuT4XIxdp');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `teamId` int(7) NOT NULL AUTO_INCREMENT,
  `teamName` text CHARACTER SET utf16 NOT NULL,
  `teamCaptain` text NOT NULL,
  `teamSport` text NOT NULL,
  `teamCity` text NOT NULL,
  `teamState` text NOT NULL,
  `teamWins` int(3) NOT NULL,
  `teamLosses` int(3) NOT NULL,
  PRIMARY KEY (`teamId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamId`, `teamName`, `teamCaptain`, `teamSport`, `teamCity`, `teamState`, `teamWins`, `teamLosses`) VALUES
(11, 'cools Kids', 'coolio89', 'Soccer', 'Gilbert', 'AZ', 0, 0),
(12, 'cools2Kids', 'coolio89', 'Baseball', 'Gilbert', 'AZ', 0, 0),
(13, 'Jeff''s Team', 'Jeff', 'Basketball', 'Gilbert', 'AZ', 0, 0),
(14, 'Ashley''s Team', 'Ashley', 'Softball', 'Gilbert', 'AZ', 0, 0),
(17, 'GO Big', 'JTuck', 'Wrestiling', 'Chandler', 'AZ', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teamplayer`
--

CREATE TABLE IF NOT EXISTS `teamplayer` (
  `teamId` int(8) NOT NULL,
  `playerId` int(8) NOT NULL,
  PRIMARY KEY (`teamId`,`playerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teamplayer`
--

INSERT INTO `teamplayer` (`teamId`, `playerId`) VALUES
(11, 11),
(11, 12),
(13, 12),
(15, 12),
(16, 12),
(17, 12);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
