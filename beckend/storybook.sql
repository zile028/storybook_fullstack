-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 01:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storybook`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Natures'),
(2, 'Sports'),
(3, 'Books');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `visibility_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `image`, `category_id`, `user_id`, `created_at`, `updated_at`, `visibility_id`) VALUES
(6, 'Prvi post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mauris leo, mattis cursus mi laoreet, condimentum ornare diam. Proin blandit erat eu volutpat ultrices. Ut id libero nec ipsum sollicitudin feugiat. Suspendisse pulvinar nisi eu finibus faucibus. Suspendisse ac lobortis neque. Sed mollis ornare sagittis. Nullam eleifend venenatis nunc id scelerisque. Aenean nec arcu libero.\r\nPraesent viverra lobortis feugiat. Proin vitae orci id tellus feugiat semper at condimentum sapien. Maecenas lacinia leo a ipsum ornare, quis varius massa lobortis. Phasellus varius gravida purus, luctus elementum tellus feugiat quis. Nulla eget ultricies magna, et pulvinar enim. In pretium arcu in eros porttitor aliquam. Ut ac leo diam. Integer fringilla efficitur nisi tincidunt laoreet. Nullam at pharetra purus, ornare molestie est. Fusce blandit tellus nec volutpat euismod. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ut ligula ac ante tempus malesuada. Fusce maximus non ex ut lobortis. Praesent efficitur consectetur lorem, et venenatis quam lacinia vel.\r\nPraesent id lacus urna. Aliquam vitae dolor vulputate, consectetur massa mollis, consectetur est. Integer in porttitor metus, non vestibulum ante. Sed sem eros, tempus finibus condimentum vitae, tempor sed sapien. Nullam dictum, elit a volutpat condimentum, eros nunc faucibus libero, non ultrices nunc leo et sapien. Nullam non tincidunt nisi, vel ultricies libero. Donec blandit tincidunt odio ut posuere. Quisque id mauris a eros pharetra bibendum. Vivamus sit amet dolor ultricies, porttitor urna non, finibus quam. Vivamus condimentum fringilla purus quis auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec in ligula eu diam cursus pharetra. Aenean vestibulum est elit, vitae molestie ex venenatis a. Nam ut luctus mi. Nam vehicula ornare risus at tempor. Nunc vulputate velit eget orci sollicitudin, vel lacinia ipsum auctor.\r\nUt facilisis sem ac augue venenatis sagittis. Quisque convallis malesuada orci, vitae lacinia eros pretium nec. Aenean dapibus elit non arcu faucibus, in vulputate lorem ultrices. Donec et turpis eu arcu ullamcorper sollicitudin. Mauris commodo suscipit congue. Ut ut suscipit tortor. Quisque nec purus purus. Integer non urna ultrices, condimentum elit non, tristique ipsum. Mauris non felis vel ipsum auctor facilisis eget nec enim. Curabitur cursus lacus ipsum, at consectetur orci semper non. Nullam nisi nisi, varius ut pulvinar quis, vestibulum at metus. Sed vel quam massa. Sed velit massa, bibendum sed nulla eu, malesuada hendrerit justo. Aenean auctor est quis egestas dignissim. Proin faucibus elit sit amet mi mollis sollicitudin. ', '', 3, 2, '2023-01-02 08:29:23', '2023-01-03 22:48:22', 1),
(7, 'Drugi post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mauris leo, mattis cursus mi laoreet, condimentum ornare diam. Proin blandit erat eu volutpat ultrices. Ut id libero nec ipsum sollicitudin feugiat. Suspendisse pulvinar nisi eu finibus faucibus. Suspendisse ac lobortis neque. Sed mollis ornare sagittis. Nullam eleifend venenatis nunc id scelerisque. Aenean nec arcu libero.\r\nPraesent viverra lobortis feugiat. Proin vitae orci id tellus feugiat semper at condimentum sapien. Maecenas lacinia leo a ipsum ornare, quis varius massa lobortis. Phasellus varius gravida purus, luctus elementum tellus feugiat quis. Nulla eget ultricies magna, et pulvinar enim. In pretium arcu in eros porttitor aliquam. Ut ac leo diam. Integer fringilla efficitur nisi tincidunt laoreet. Nullam at pharetra purus, ornare molestie est. Fusce blandit tellus nec volutpat euismod. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ut ligula ac ante tempus malesuada. Fusce maximus non ex ut lobortis. Praesent efficitur consectetur lorem, et venenatis quam lacinia vel.\r\nPraesent id lacus urna. Aliquam vitae dolor vulputate, consectetur massa mollis, consectetur est. Integer in porttitor metus, non vestibulum ante. Sed sem eros, tempus finibus condimentum vitae, tempor sed sapien. Nullam dictum, elit a volutpat condimentum, eros nunc faucibus libero, non ultrices nunc leo et sapien. Nullam non tincidunt nisi, vel ultricies libero. Donec blandit tincidunt odio ut posuere. Quisque id mauris a eros pharetra bibendum. Vivamus sit amet dolor ultricies, porttitor urna non, finibus quam. Vivamus condimentum fringilla purus quis auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec in ligula eu diam cursus pharetra. Aenean vestibulum est elit, vitae molestie ex venenatis a. Nam ut luctus mi. Nam vehicula ornare risus at tempor. Nunc vulputate velit eget orci sollicitudin, vel lacinia ipsum auctor.', NULL, 2, 2, '2023-01-02 09:08:35', NULL, 2),
(8, 'Drugi post - izmenjen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mauris leo, mattis cursus mi laoreet, condimentum ornare diam. Proin blandit erat eu volutpat ultrices. Ut id libero nec ipsum sollicitudin feugiat. Suspendisse pulvinar nisi eu finibus faucibus. Suspendisse ac lobortis neque. Sed mollis ornare sagittis. Nullam eleifend venenatis nunc id scelerisque. Aenean nec arcu libero.\r\nPraesent viverra lobortis feugiat. Proin vitae orci id tellus feugiat semper at condimentum sapien. Maecenas lacinia leo a ipsum ornare, quis varius massa lobortis. Phasellus varius gravida purus, luctus elementum tellus feugiat quis. Nulla eget ultricies magna, et pulvinar enim. In pretium arcu in eros porttitor aliquam. Ut ac leo diam. Integer fringilla efficitur nisi tincidunt laoreet. Nullam at pharetra purus, ornare molestie est. Fusce blandit tellus nec volutpat euismod. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ut ligula ac ante tempus malesuada. Fusce maximus non ex ut lobortis. Praesent efficitur consectetur lorem, et venenatis quam lacinia vel.\r\nPraesent id lacus urna. Aliquam vitae dolor vulputate, consectetur massa mollis, consectetur est. Integer in porttitor metus, non vestibulum ante. Sed sem eros, tempus finibus condimentum vitae, tempor sed sapien. Nullam dictum, elit a volutpat condimentum, eros nunc faucibus libero, non ultrices nunc leo et sapien. Nullam non tincidunt nisi, vel ultricies libero. Donec blandit tincidunt odio ut posuere. Quisque id mauris a eros pharetra bibendum. Vivamus sit amet dolor ultricies, porttitor urna non, finibus quam. Vivamus condimentum fringilla purus quis auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec in ligula eu diam cursus pharetra. Aenean vestibulum est elit, vitae molestie ex venenatis a. Nam ut luctus mi. Nam vehicula ornare risus at tempor. Nunc vulputate velit eget orci sollicitudin, vel lacinia ipsum auctor.', '1672696148.jpg', 1, 2, '2023-01-02 14:27:52', '2023-01-02 21:49:08', 1),
(9, 'Poslednji post', 'Tekst poslednjeg posta.', NULL, 3, 2, '2023-01-02 21:57:03', '2023-01-02 21:57:12', 3),
(10, 'First projetc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mauris leo, mattis cursus mi laoreet, condimentum ornare diam. Proin blandit erat eu volutpat ultrices. Ut id libero nec ipsum sollicitudin feugiat. Suspendisse pulvinar nisi eu finibus faucibus. Suspendisse ac lobortis neque. Sed mollis ornare sagittis. Nullam eleifend venenatis nunc id scelerisque. Aenean nec arcu libero. Praesent viverra lobortis feugiat. Proin vitae orci id tellus feugiat semper at condimentum sapien. Maecenas lacinia leo a ipsum ornare, quis varius massa lobortis. Phasellus varius gravida purus, luctus elementum tellus feugiat quis. Nulla eget ultricies magna, et pulvinar enim. In pretium arcu in eros porttitor aliquam. Ut ac leo diam. Integer fringilla efficitur nisi tincidunt laoreet. Nullam at pharetra purus, ornare molestie est. Fusce blandit tellus nec volutpat euismod. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ut ligula ac ante tempus malesuada. Fusce maximus non ex ut lobortis. Praesent efficitur consectetur lorem, et venenatis quam lacinia vel. Praesent id lacus urna.', '1673260876.jpg', 1, 1, '2023-01-09 10:41:16', '2023-01-09 11:17:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `title` varchar(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `first_name`, `last_name`, `role`, `created_at`, `updated_at`, `email`, `password`) VALUES
(1, 'ms', 'Milica', 'Peric', 'user', '2022-12-26 23:42:51', '2023-01-09 11:17:18', 'milica@gmail.com', '$2y$10$mculdIHoBk0eg6yIXGVWiexiWmdCvR37qfei789PUXv6I/yA9iphu'),
(2, 'mr', 'Dejan', 'Zivkovic', 'admin', '2022-12-26 23:43:18', '2022-12-29 22:22:01', 'dejan@gmail.com', '$2y$10$YViA9KlVzC.vJP0tKovGj.AzqAkcJVJpzrVCEZp/16zKh0b2g.EzC');

-- --------------------------------------------------------

--
-- Table structure for table `visibility`
--

CREATE TABLE `visibility` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visibility`
--

INSERT INTO `visibility` (`id`, `name`) VALUES
(1, 'Public'),
(2, 'Private'),
(3, 'Friends');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`id`, `post_id`, `user_id`) VALUES
(4, 8, 2),
(7, 6, 1),
(8, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visibility`
--
ALTER TABLE `visibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visibility`
--
ALTER TABLE `visibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
