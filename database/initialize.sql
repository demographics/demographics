-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2015 at 10:42 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demographics`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `content` text NOT NULL,
  `datetime` datetime NOT NULL,
  `member` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `event`, `content`, `datetime`, `member`) VALUES
(2, 3, 'I was there too!', '2015-03-10 15:11:21', 3),
(3, 5, 'I will like to come too!!!', '2015-03-10 15:17:05', 3),
(4, 4, 'Don''t worry, we will be again in the same one...', '2015-03-10 15:18:00', 3),
(5, 4, 'I know brother.. i know..', '2015-03-15 16:22:35', 1),
(8, 5, 'You are welcome!', '2015-05-12 20:16:48', 1),
(12, 10, 'This is an amazing photo indeed!', '2015-05-20 08:01:59', 8),
(13, 10, 'This is truly an amazing photo!', '2015-05-20 08:03:05', 8),
(15, 5, 'Did you have a goof time?', '2015-05-20 08:20:44', 8),
(16, 5, 'By goof did you mean good?', '2015-05-20 08:21:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE IF NOT EXISTS `community` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`id`, `name`) VALUES
(1, 'Peristerona'),
(2, 'Pigi');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `type` enum('memoir','article','property','photo') NOT NULL,
  `content` varchar(800) NOT NULL,
  `datetime` datetime NOT NULL,
  `date` date NOT NULL,
  `view` int(11) NOT NULL,
  `like` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `tags` text
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `type`, `content`, `datetime`, `date`, `view`, `like`, `member`, `tags`) VALUES
(3, 'Went to church', 'memoir', 'Just like any Sunday morning!', '2015-03-10 15:07:30', '2015-03-13', 15, 0, 1, 'church,Sunday'),
(4, 'Studying for exams', 'memoir', 'I am going to fail this class.', '2015-03-10 15:08:32', '2015-03-10', 20, 0, 1, 'Exams,Studying'),
(5, 'On a fieldtrip', 'memoir', 'This is going to be amazing!', '2015-03-10 15:08:59', '2015-03-28', 16, 0, 1, 'Trip'),
(6, 'Doomed', 'memoir', 'Today i realized that i am doomed to fail all of my classes.', '2015-03-20 09:08:55', '2015-03-20', 8, 0, 1, 'doomed,fail,classes,tired'),
(7, 'Sticky keys', 'article', '<p><span style="font-weight: bold;">Sticky </span><span style="font-style: italic;"><span style="text-decoration: underline;">keys</span></span><br></p>', '2015-03-20 19:24:29', '2015-03-28', 9, 0, 1, ''),
(10, 'Awesome photo', 'photo', '<p class="photo-description">This is an awesome photo of an ant.</p><img class="photo-container" src="markers/events/ant.jpg"></img>', '2015-03-20 19:38:57', '2013-03-13', 18, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `marker`
--

CREATE TABLE IF NOT EXISTS `marker` (
  `event` int(11) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `lat` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marker`
--

INSERT INTO `marker` (`event`, `lng`, `lat`) VALUES
(3, 33.634644, 35.225430),
(4, 33.029022, 35.072716),
(5, 33.189697, 34.917465),
(6, 33.506927, 35.143494),
(7, 33.627777, 35.127769),
(10, 32.732391, 34.918594);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `password` varchar(50) NOT NULL,
  `pre74` int(11) NOT NULL,
  `post74` int(11) NOT NULL,
  `picture` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `firstname`, `lastname`, `email`, `birthday`, `gender`, `password`, `pre74`, `post74`, `picture`) VALUES
(1, 'Demetris', 'Paschalides', 'dpasch01@cs.ucy.ac.cy', '1992-02-13', 'M', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1, NULL),
(3, 'Andreas', 'Frangou', 'afragk02@hotmail.com', '1992-03-17', 'M', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, NULL),
(4, 'Panayiotis', 'Pavlides', 'ppana02@cs.ucy.ac.cy', '1821-02-24', 'F', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, NULL),
(5, 'gfds', 'gfds', 'trew@fd.com', '2015-05-05', 'M', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1, NULL),
(6, 'gfds', 'trewttrew', 'rewr@fd.com', '2015-05-08', 'M', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1, NULL),
(7, 'John', 'Smith', 'jsmith@something.com', '1989-07-06', 'M', 'c4ca4238a0b923820dcc509a6f75849b', 2, 2, NULL),
(8, 'Ser', 'dsadas', 'eq@cs.ucy.ac.cy', '2015-05-29', 'M', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1, NULL),
(9, 'Andreas', 'Frangou', 'afragk03@hotmail.com', '2015-05-14', 'M', '0cc175b9c0f1b6a831c399e269772661', 1, 1, NULL),
(10, 'Andreas', 'Frangou', 'afragk05@hotmail.com', '1992-05-03', 'M', '07159c47ee1b19ae4fb9c40d480856c4', 1, 1, NULL),
(11, 'Andreas', 'Frangou', 'afragk09@hotmail.com', '1992-05-03', 'M', '187ef4436122d1cc2f40dc2b92f0eba0', 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `status` enum('seen','unseen') NOT NULL,
  `type` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1155 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `member`, `owner`, `event`, `status`, `type`, `datetime`) VALUES
(1127, 3, 1, 3, 'seen', 1, '2015-03-10 15:11:21'),
(1128, 3, 1, 5, 'seen', 1, '2015-03-10 15:17:05'),
(1129, 3, 1, 4, 'seen', 1, '2015-03-10 15:18:00'),
(1130, 1, 1, 4, 'unseen', 1, '2015-03-15 16:22:35'),
(1131, 1, 1, 1156, 'unseen', 1, '2015-04-01 10:30:35'),
(1132, 1, 1, 1166, 'unseen', 1, '2015-04-01 10:59:05'),
(1133, 1, 1, 1166, 'unseen', 1, '2015-04-01 11:03:51'),
(1134, 1, 1, 1166, 'unseen', 1, '2015-04-01 11:03:57'),
(1135, 1, 1, 1166, 'unseen', 1, '2015-04-01 11:04:00'),
(1136, 1, 1, 1166, 'unseen', 1, '2015-04-01 11:09:18'),
(1137, 1, 1, 1166, 'unseen', 1, '2015-04-01 11:09:25'),
(1138, 1, 1, 1166, 'unseen', 1, '2015-04-01 11:10:07'),
(1139, 1, 1, 1166, 'unseen', 1, '2015-04-01 11:11:07'),
(1140, 1, 1, 1166, 'unseen', 1, '2015-04-01 11:11:16'),
(1141, 1, 1, 1167, 'unseen', 1, '2015-04-01 11:12:46'),
(1142, 1, 1, 3, 'unseen', 1, '2015-05-01 09:01:24'),
(1143, 1, 1, 12, 'unseen', 1, '2015-05-01 09:07:48'),
(1144, 1, 1, 5, 'unseen', 1, '2015-05-12 20:16:48'),
(1145, 1, 1, 6, 'unseen', 1, '2015-05-19 14:38:16'),
(1146, 1, 1, 6, 'unseen', 1, '2015-05-19 14:38:25'),
(1147, 1, 1, 4, 'unseen', 1, '2015-05-20 08:00:35'),
(1148, 8, 1, 10, 'unseen', 1, '2015-05-20 08:01:59'),
(1149, 8, 1, 10, 'unseen', 1, '2015-05-20 08:03:05'),
(1150, 8, 1, 27, 'unseen', 1, '2015-05-20 08:03:35'),
(1151, 8, 1, 5, 'seen', 1, '2015-05-20 08:20:44'),
(1152, 1, 1, 5, 'unseen', 1, '2015-05-20 08:21:45'),
(1153, 1, 1, 43, 'unseen', 1, '2015-05-20 15:43:53'),
(1154, 1, 1, 41, 'unseen', 1, '2015-05-20 15:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `content` text NOT NULL,
  `datetime` datetime NOT NULL,
  `member` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `subject`, `content`, `datetime`, `member`) VALUES
(1, 15, 'Comment one', '2015-04-28 09:12:32', 1),
(2, 15, 'Comment two', '2015-04-28 09:25:01', 1),
(3, 15, 'Comment three', '2015-04-28 09:25:52', 1),
(4, 45, 'New Comment', '2015-05-20 16:37:19', 11);

-- --------------------------------------------------------

--
-- Table structure for table `road`
--

CREATE TABLE IF NOT EXISTS `road` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `path` text NOT NULL,
  `member` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1174 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `road`
--

INSERT INTO `road` (`id`, `name`, `path`, `member`) VALUES
(1170, 'po', '[{"lat":"34.96812428662085","lng":"32.548370361328125"},{"lat":"34.93660780623881","lng":"32.7447509765625"},{"lat":"34.83071390101431","lng":"32.640380859375"},{"lat":"34.773203753940734","lng":"32.746124267578125"},{"lat":"34.83973145942067","lng":"33.0084228515625"},{"lat":"34.914088616906106","lng":"33.213043212890625"}]', 8),
(1166, 'Sample road', '[{"lat":"35.09406896086629","lng":"33.04412841796875"},{"lat":"35.092945313732635","lng":"33.174591064453125"},{"lat":"35.0906979730151","lng":"33.314666748046875"}]', 1),
(1167, 'ghfdhytje', '[{"lat":"35.106428057364255","lng":"32.89581298828125"},{"lat":"35.123278350923385","lng":"32.93426513671875"}]', 1),
(1168, 'defe', '[{"lat":"35.23664622093195","lng":"33.671722412109375"},{"lat":"35.23776788438302","lng":"33.723907470703125"},{"lat":"35.15584570226544","lng":"33.7335205078125"},{"lat":"35.110921809704756","lng":"33.655242919921875"}]', 1),
(1169, 'Sample road 5', '[{"lat":"35.264683153268145","lng":"33.167724609375"},{"lat":"35.25907654252574","lng":"33.28033447265625"},{"lat":"35.27141057410734","lng":"33.402557373046875"},{"lat":"35.20298910562885","lng":"33.43414306640625"},{"lat":"35.107551518679074","lng":"33.486328125"}]', 7),
(1171, 'po', '[{"lat":"34.785611296793306","lng":"32.801055908203125"},{"lat":"34.914088616906106","lng":"33.004302978515625"}]', 8),
(1172, 't54wgetrsdj', '[{"lat":"35.108674964507586","lng":"32.58544921875"},{"lat":"35.108674964507586","lng":"32.7392578125"}]', 1),
(1173, 'sample road 809', '[{"lat":"34.96587351132771","lng":"33.322906494140625"},{"lat":"34.89944783005726","lng":"33.419036865234375"},{"lat":"34.97825201019258","lng":"33.5137939453125"},{"lat":"35.007502842952896","lng":"33.644256591796875"},{"lat":"35.04461384251413","lng":"33.80218505859375"}]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `road_comment`
--

CREATE TABLE IF NOT EXISTS `road_comment` (
  `id` int(11) NOT NULL,
  `road` int(11) NOT NULL,
  `content` text NOT NULL,
  `datetime` datetime NOT NULL,
  `member` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `road_comment`
--

INSERT INTO `road_comment` (`id`, `road`, `content`, `datetime`, `member`) VALUES
(2, 1166, 'tyrh', '2015-04-01 10:59:05', 1),
(3, 1166, 'rr', '2015-04-01 11:03:51', 1),
(4, 1166, 'rewrt', '2015-04-01 11:03:57', 1),
(5, 1166, '', '2015-04-01 11:04:00', 1),
(6, 1166, 'grdshtr', '2015-04-01 11:09:18', 1),
(7, 1166, 'ht', '2015-04-01 11:09:25', 1),
(8, 1166, 'f', '2015-04-01 11:10:07', 1),
(9, 1166, 's', '2015-04-01 11:11:07', 1),
(10, 1166, 'jyejytrjytrjtyjtryjryjrtyjrtyjrtty', '2015-04-01 11:11:16', 1),
(11, 1167, 'gf', '2015-04-01 11:12:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `datetime` datetime NOT NULL,
  `view` int(11) NOT NULL,
  `community` int(11) NOT NULL,
  `member` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `title`, `content`, `datetime`, `view`, `community`, `member`) VALUES
(15, 'Sample one', 'Sample one', '2015-04-27 21:13:46', 0, 1, 1),
(16, 'Sample two', 'Sample two', '2015-04-27 21:22:05', 0, 1, 1),
(17, 'Sample three', 'Sample three', '2015-04-27 21:25:03', 0, 1, 1),
(18, 'Sample four', 'Sample four', '2015-04-27 21:26:09', 0, 1, 1),
(19, 'Sample four', 'Sample four', '2015-04-28 08:28:01', 0, 1, 1),
(20, 'Sample five', 'Sample five\n', '2015-04-28 08:29:12', 0, 1, 1),
(21, 'Sample six', 'Sample six', '2015-04-28 08:32:14', 0, 1, 1),
(23, 'Sample seven', 'Sample seven', '2015-04-28 09:10:39', 0, 1, 1),
(24, '', '', '2015-05-19 14:54:54', 0, 1, 8),
(25, '', '', '2015-05-19 14:55:14', 0, 1, 8),
(26, '', '', '2015-05-19 14:58:42', 0, 1, 8),
(27, '', '', '2015-05-19 15:01:22', 0, 1, 8),
(28, 'asgfd', 'gfdsgfdsg', '2015-05-19 15:02:27', 0, 1, 8),
(29, 'asgfd', 'gfdsgfdsg', '2015-05-19 15:02:34', 0, 1, 8),
(30, 'asgfd', 'gfdsgfdsg', '2015-05-19 15:02:43', 0, 1, 8),
(31, 'asgfd', 'gfdsgfdsg', '2015-05-19 15:02:44', 0, 1, 8),
(32, 'asgfd', 'gfdsgfdsg', '2015-05-19 15:02:45', 0, 1, 8),
(33, 'asgfd', 'gfdsgfdsg', '2015-05-19 15:02:46', 0, 1, 8),
(34, 'asgfd', 'gfdsgfdsg', '2015-05-19 15:02:47', 0, 1, 8),
(35, 'asgfd', 'gfdsgfdsg', '2015-05-19 15:02:48', 0, 1, 8),
(36, '', '', '2015-05-19 15:10:16', 0, 1, 8),
(37, '', '', '2015-05-19 15:10:31', 0, 1, 8),
(38, '', '', '2015-05-19 15:15:42', 0, 1, 8),
(39, '', '', '2015-05-19 15:15:51', 0, 1, 8),
(40, '', '', '2015-05-19 15:16:10', 0, 1, 8),
(41, 'fdsfd', 'g', '2015-05-19 15:20:28', 0, 1, 8),
(42, 'Visit Village', '3-5-2015', '2015-05-20 16:33:32', 0, 2, 11),
(43, 'Festival', 'a', '2015-05-20 16:33:46', 0, 2, 11),
(44, 'Our Church', 'n', '2015-05-20 16:34:12', 0, 2, 11),
(45, 'My new Post', 'New Content', '2015-05-20 16:37:03', 0, 2, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`), ADD KEY `event` (`event`), ADD KEY `member` (`member`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`), ADD KEY `member` (`member`), ADD FULLTEXT KEY `title` (`title`,`tags`);

--
-- Indexes for table `marker`
--
ALTER TABLE `marker`
  ADD PRIMARY KEY (`event`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`), ADD KEY `member` (`member`), ADD KEY `owner` (`owner`), ADD KEY `event` (`event`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`), ADD KEY `subject` (`subject`), ADD KEY `member` (`member`);

--
-- Indexes for table `road`
--
ALTER TABLE `road`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `road_comment`
--
ALTER TABLE `road_comment`
  ADD PRIMARY KEY (`id`), ADD KEY `member` (`member`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`), ADD KEY `community` (`community`), ADD KEY `member` (`member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1155;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `road`
--
ALTER TABLE `road`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1174;
--
-- AUTO_INCREMENT for table `road_comment`
--
ALTER TABLE `road_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`event`) REFERENCES `event` (`id`),
ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`member`) REFERENCES `member` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`member`) REFERENCES `member` (`id`);

--
-- Constraints for table `marker`
--
ALTER TABLE `marker`
ADD CONSTRAINT `marker_ibfk_1` FOREIGN KEY (`event`) REFERENCES `event` (`id`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `subject` (`id`),
ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`member`) REFERENCES `member` (`id`);

--
-- Constraints for table `road_comment`
--
ALTER TABLE `road_comment`
ADD CONSTRAINT `road_comment_ibfk_1` FOREIGN KEY (`member`) REFERENCES `member` (`id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`community`) REFERENCES `community` (`id`),
ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`member`) REFERENCES `member` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
