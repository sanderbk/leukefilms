-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 11:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvcframework`
--

-- --------------------------------------------------------

--
-- Table structure for table `movielist`
--

CREATE TABLE `movielist` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movielist`
--

INSERT INTO `movielist` (`id`, `mid`, `uid`) VALUES
(72, 28, 2),
(94, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `runtime` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `releasedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `categorie`, `trailer`, `runtime`, `image`, `releasedate`) VALUES
(1, 'Dune', 'Feature adaptation of Frank Herbert&#39;s science fiction novel, about the son of a noble family entrusted with the protection of the most valuable asset and most vital element in the galaxy.', 'Action', 'https://www.youtube.com/watch?v=8g18jFHCLXk', 100, 'dune-poster.jpg', '2021-12-08'),
(3, 'Free Guy', 'A bank teller discovers that he&#39;s actually an NPC inside a brutal, open world video game.', 'Action', 'https://www.youtube.com/watch?v=X2m-08cOAbc', 140, 'free-poster.jpg', '2021-12-29'),
(4, 'Venom', 'Eddie Brock attempts to reignite his career by interviewing serial killer Cletus Kasady, who becomes the host of the symbiote Carnage and escapes prison after a failed execution.', 'Adventure', 'https://www.youtube.com/watch?v=-FmWuCgJmxo', 97, 'venom-poster.png', '2021-10-14'),
(5, 'No Time To Die', 'James Bond has left active service. His peace is short-lived when Felix Leiter, an old friend from the CIA, turns up asking for help, leading Bond onto the trail of a mysterious villain armed with dangerous new technology.', 'Action', 'https://www.youtube.com/watch?v=JNwrIbGecPk', 163, 'notime-poster.png', '2021-09-30'),
(6, 'Shang-Chi', 'Shang-Chi, the master of weaponry-based Kung Fu, is forced to confront his past after being drawn into the Ten Rings organization.', 'Adventure', 'https://www.youtube.com/watch?v=8YjFbMbfXaQ', 132, 'shangchi-poster.png', '2021-09-02'),
(30, 'The Conjuring: The Devil Made Me Do It', 'The Warrens investigate a murder that may be linked to a demonic possession.', 'Horror', 'https://www.youtube.com/watch?v=tLFnRAzcaEc', 112, 'The.Conjuring.The.Devil.Made.Me.Do.It.2021.png', '2021-05-26'),
(31, 'The Last Duel', 'King Charles VI declares that Knight Jean de Carrouges settle his dispute with his squire by challenging him to a duel.', 'Action', 'https://www.youtube.com/watch?v=mgygUwPJvYk', 152, 'MV5BZGExZTUzYWQtYWJjZi00OTI4LTk4OGYtNTA2YzcwMmNiZTMxXkEyXkFqcGdeQXVyMTEyMjM2NDc2._V1_SX300.jpg', '2021-10-15'),
(32, 'The Matrix Resurrections', 'The plot is currently unknown.', 'Sci-Fi', 'https://www.youtube.com/watch?v=nNpvWBuTfrc', 148, 'matrix-res.jpg', '2021-12-22'),
(33, 'Spider-Man: No Way Home', 'With Spider-Man&#39;s identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be Spider-Man.', 'Action', 'https://www.youtube.com/watch?v=JfVOs4VSpmA', 148, 'ft-675061-555x823.jpg', '2021-12-17'),
(34, 'Ghostbusters Afterlife', 'When a single mom and her two kids arrive in a small town, they begin to discover their connection to the original Ghostbusters and the secret legacy their grandfather left behind.', 'Adventure', 'https://www.youtube.com/watch?v=ahZFCF--uRY', 123, 'Ghostbusters.Afterlife.2021.png', '2021-11-01'),
(35, 'Don&#39;t Look Up', 'Two low-level astronomers must go on a giant media tour to warn mankind of an approaching comet that will destroy planet Earth.', 'Drama', 'https://www.youtube.com/watch?v=RbIxYm3mKzI', 139, 'Dont.Look.Up.2021.[TopNow.se].png', '2021-12-27'),
(36, 'Munich: The Edge of War', 'A British diplomat travels to Munich in the run-up to World War II, where a former classmate of his from Oxford is also en route, but is working for the German government.', 'Drama', 'https://www.youtube.com/watch?v=AQ7x8odi-OU', 130, 'Munich.The.Edge.of.War.2021.[TopNow.se].png', '2022-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
(1, 2, 'Helloe Helloe Helloe Helloe Helloe first post', 'Helloe Helloe Helloe Helloe Helloe first post content contentcontentcontent', '2021-12-08 14:21:17'),
(2, 2, 'Helloe Helloe Helloe Helloe Helloe 2nd post', 'Helloe Helloe Helloe Helloe Helloe 2nd post content contentcontentcontent', '2021-12-08 14:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'mark', 'mark@mark.com', '$2y$10$o3mLxjtcCTwUGWN/juJPaOVu6KYuYJ4dZP.pM06Qu2enM4IF6HNc.'),
(2, 'henry', 'henry@h.com', '$2y$10$o3mLxjtcCTwUGWN/juJPaOVu6KYuYJ4dZP.pM06Qu2enM4IF6HNc.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movielist`
--
ALTER TABLE `movielist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movielist`
--
ALTER TABLE `movielist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
