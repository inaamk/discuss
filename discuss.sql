-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 02:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `art_id` int(100) NOT NULL,
  `u_id` int(100) NOT NULL,
  `art_title` text NOT NULL,
  `art_text` longtext NOT NULL,
  `art_image` text NOT NULL,
  `art_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `art_link` text NOT NULL,
  `cat_id` int(100) NOT NULL,
  `like_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`art_id`, `u_id`, `art_title`, `art_text`, `art_image`, `art_time`, `art_link`, `cat_id`, `like_id`) VALUES
(6, 1, 'The Basic Story Outline', 'w;qfoubjlwqnpod908guiyvhqbwjjdopiacd8yv7yujhn mp[09q8widguyvhj smnmml;kpqi0987wiydvhjcnm;kp0i9q8gidwvch m09q8wdiguqvhsc mxnjop90q87wdiyfvhjc smnmO', 'Basic-Story.png', '2020-08-07 19:56:49', 'Basic-Story', 9, 0),
(7, 1, 'The Basic Story Outline 1', 'The articles in English grammar are the and a/an, and in certain contexts some. \"An\" and \"a\" are modern forms of the Old English \"an\", which in Anglian dialects was the number \"one\" (compare \"on\" in Saxon dialects) and survived into Modern Scots as the number \"owan\". Both \"on\" (respelled \"one\" by the Norman language) and \"an\" survived into Modern English, with \"one\" used as the number and \"an\" (\"a\", before nouns that begin with a consonant sound) as an indefinite article.\r\n\r\nIn English grammar, articles are frequently considered part of a broader category called determiners, which contains articles, demonstratives (such as \"this\" and \"that\"), possessive determiners (such as \"my\" and \"his\"), and quantifiers (such as \"all\" and \"few\").[1] Articles and other determiners are also sometimes counted as a type of adjective, since they describe the words that they precede.[2]', 'hi.png', '2020-08-07 20:23:04', 'hi', 3, 0),
(8, 1, 'The Indefinite Article', 'An article (with the linguistic glossing abbreviation art) is a word that is used with a noun (as a standalone word or a prefix or suffix) to specify grammatical definiteness of the noun, and in some languages extending to volume or numerical scope.\r\n\r\nThe articles in English grammar are the and a/an, and in certain contexts some. \"An\" and \"a\" are modern forms of the Old English \"an\", which in Anglian dialects was the number \"one\" (compare \"on\" in Saxon dialects) and survived into Modern Scots as the number \"owan\". Both \"on\" (respelled \"one\" by the Norman language) and \"an\" survived into Modern English, with \"one\" used as the number and \"an\" (\"a\", before nouns that begin with a consonant sound) as an indefinite article.', 'no-one.png', '2020-08-07 20:41:31', 'no-one', 1, 0),
(9, 1, 'The Indefinite Article', 'Hello world\r\nknow everything\r\nnone of them\r\nbyebye', 'hello.png', '2020-08-15 21:04:04', 'hello', 9, 0),
(10, 2, 'What Are Articles?', 'hello\r\nnsug d\r\nhdigd djuuhf\r\nikjergp\r\nerlkhiopr\r\niougv.', 'what.png', '2020-08-16 12:27:42', 'what', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Politics'),
(2, 'Health'),
(3, 'Sciences'),
(4, 'Sports'),
(5, 'Technical Information'),
(6, 'Education'),
(7, 'Cooking'),
(8, 'Fashion'),
(9, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `u_id` int(255) NOT NULL,
  `art_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(255) NOT NULL,
  `u_name` text NOT NULL,
  `u_email` text NOT NULL,
  `u_username` text NOT NULL,
  `u_pass` text NOT NULL,
  `u_birthday` text NOT NULL,
  `u_location` text NOT NULL,
  `u_gender` text NOT NULL,
  `u_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_username`, `u_pass`, `u_birthday`, `u_location`, `u_gender`, `u_image`) VALUES
(1, 'Inaam Kabbara', 'inaam_kabbara@hotmail.com', 'Nano', '7e6aa2854f325311bfef5eccfceb36a7', 'August/18/1989', 'Lebanon', 'female', 'Nano.png'),
(2, 'Nazih Kabbara', 'nazih@gmail.com', 'nazih', 'b913571260d4d9bc8f58e8f725b6318b', 'November/17/1989', 'Lebanon', 'male', 'nazih.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `art_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
