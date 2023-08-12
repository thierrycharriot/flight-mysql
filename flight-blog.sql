-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 21 sep. 2022 à 07:39
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `flight_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_article` int(11) NOT NULL,
  `title` varchar(180) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `author` varchar(180) DEFAULT NULL,
  `id_author` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `title`, `content`, `author`, `id_author`, `id_category`, `created_at`) VALUES
(1, 'Title 001', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse finibus nisl vel dui dapibus blandit. Ut eu orci ut neque luctus sollicitudin. Nulla sit amet ligula at nunc consequat varius nec vitae lacus. Aliquam vitae dolor ut erat suscipit vestibulum. Phasellus in risus odio. Aliquam turpis dui, aliquet sed ultrices sed, commodo vitae elit. Fusce efficitur, massa eget accumsan efficitur, tortor justo tristique enim, quis fringilla ex velit a libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi elementum est et mauris suscipit tristique. Etiam imperdiet justo a mollis dapibus. Aenean aliquam auctor viverra. ', 'Auteur 001', 1, 1, '2022-09-19 00:00:00'),
(2, 'Title 002', 'Suspendisse potenti. Donec sed ipsum eu sem luctus dignissim. Proin viverra venenatis lorem tincidunt bibendum. Donec arcu nisi, posuere feugiat sollicitudin id, suscipit in arcu. Maecenas viverra arcu at risus malesuada, in fermentum nisl bibendum. Praesent ornare tortor quis nulla laoreet efficitur. Phasellus dapibus lorem vitae dolor faucibus suscipit. Morbi eget dui feugiat, sagittis sem at, vehicula orci. Suspendisse a diam a elit dignissim auctor. Aliquam vitae commodo augue, a blandit quam. Curabitur convallis finibus leo. ', 'Auteur 002', 2, 2, '2022-09-19 08:36:05'),
(3, 'Title 003', 'Aenean molestie ullamcorper velit ac elementum. Ut cursus arcu nunc. Quisque ligula diam, vehicula vel orci vel, lacinia tempor dui. Curabitur interdum porta ipsum, imperdiet iaculis nulla dignissim sed. Mauris sed condimentum nulla. Cras convallis elementum arcu. Cras blandit iaculis neque, ac gravida arcu cursus eu. Vivamus tempus aliquet elit ac mattis. ', 'Auteur 003', 3, 3, '2022-09-19 08:37:33'),
(4, 'Title 004', 'Donec commodo nibh eu nisl tristique, bibendum mollis ante consectetur. Duis a mi non mauris sollicitudin iaculis a et magna. Curabitur dui dolor, blandit et arcu ac, cursus accumsan lectus. Aliquam congue fringilla libero. Nam suscipit sollicitudin est. In hac habitasse platea dictumst. In diam odio, porta eu nulla eget, accumsan rhoncus augue. Donec pulvinar massa orci, vel scelerisque turpis vestibulum sit amet. Vivamus interdum fringilla metus tincidunt pharetra. Maecenas pulvinar in tortor nec facilisis. Praesent vel luctus felis, vel consequat massa. Donec velit nulla, fermentum suscipit feugiat sit amet, blandit non mauris. Nunc sed suscipit risus, et accumsan nisi. In vel tellus imperdiet, tempus nulla id, iaculis sem. ', 'Auteur 001', 1, 4, '2022-09-19 11:50:53'),
(5, 'Title 005', 'Duis elementum orci id purus lobortis vehicula. Aliquam hendrerit lobortis tellus. Vestibulum varius sagittis lorem a condimentum. Ut tincidunt nunc sed est bibendum, a interdum leo pretium. Duis posuere turpis et nulla accumsan, et lobortis purus imperdiet. Mauris porttitor elit eget elit interdum auctor. Maecenas mattis consequat libero nec convallis. Vestibulum ac efficitur nibh. Phasellus tempus nibh ipsum, sit amet malesuada diam iaculis vitae. Mauris non lacinia purus. Pellentesque scelerisque magna eu lacus congue venenatis vel eget mauris. Donec ultrices venenatis urna, faucibus venenatis purus sollicitudin ac. Proin ullamcorper vestibulum nunc ac congue. Nunc dictum blandit diam, ac ultrices turpis tempor eget. ', 'Auteur 002', 2, 5, '2022-09-19 11:51:26'),
(6, 'Title 006', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla id nisl felis. Cras lacus eros, consequat a leo id, semper hendrerit elit. In et lectus ac nunc maximus dictum. Mauris tempus, lorem a lobortis porttitor, lectus leo semper tortor, sit amet bibendum erat justo eu lectus. In sit amet diam maximus, porttitor tellus ut, convallis purus. Duis placerat diam arcu, a varius turpis fringilla eu. Donec dui purus, aliquet quis erat ut, rhoncus feugiat massa. ', 'Auteur 003', 3, 6, '2022-09-19 11:52:29'),
(7, 'Title 007', 'Etiam a mattis felis. Nulla rutrum mollis lorem ac bibendum. Vestibulum sit amet sagittis purus. Quisque ex turpis, viverra ut mi lacinia, tristique auctor lorem. Sed id mauris non mauris pellentesque sagittis. Vestibulum ornare laoreet lacinia. Integer bibendum faucibus euismod. Nulla facilisi. Donec quis dictum purus, eget tincidunt justo. ', 'Auteur 001', 1, 1, '2022-09-19 11:52:50'),
(8, 'Title 008', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis faucibus libero a elit blandit semper. Donec velit velit, sodales vel ante sit amet, lacinia sagittis dolor. Integer eget egestas urna, eget vulputate est. In id sem pellentesque, condimentum nibh in, ultrices quam. Nunc pulvinar varius dolor ut tincidunt. Phasellus congue eget purus non volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas sollicitudin lorem ut faucibus cursus. Cras eget est bibendum, scelerisque risus a, auctor ligula. Phasellus vestibulum at eros quis rutrum. Suspendisse sapien libero, pellentesque ut imperdiet vitae, lobortis vitae lectus. ', 'Auteur 002', 2, 2, '2022-09-19 11:53:14'),
(9, 'Title 009', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam hendrerit eros sed felis dignissim egestas. Vivamus laoreet ante justo. Curabitur eleifend interdum nibh, sed dignissim lacus ultrices vitae. Morbi lacinia ipsum eget tellus sodales, ac egestas nisl lacinia. Nulla risus orci, fringilla dapibus facilisis vel, ornare sed tortor. Vivamus ex tellus, efficitur id nunc a, scelerisque iaculis lectus. In hac habitasse platea dictumst. Ut vulputate scelerisque nisi non pretium. Quisque viverra ante vel elit commodo, vitae viverra velit hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In nec est interdum nisi rutrum laoreet. Vestibulum odio turpis, tempus vel lorem gravida, luctus pulvinar massa. Aliquam ullamcorper, velit ac malesuada hendrerit, nisl leo viverra dolor, tincidunt tempus nunc orci ut tellus. Aenean placerat libero metus, et interdum magna condimentum non. Aenean congue consequat sapien, vel sodales arcu cursus eget. ', 'Auteur 003', 3, 3, '2022-09-19 11:53:32'),
(10, 'Title 010', 'Etiam placerat vestibulum lacus, nec lacinia risus hendrerit a. Cras semper mi eu congue viverra. Nam quis leo aliquam nulla venenatis feugiat. Etiam efficitur magna in magna feugiat, non tristique tortor dapibus. Donec elementum hendrerit purus, at varius lorem condimentum et. Proin viverra sollicitudin diam in rhoncus. Donec id urna molestie, efficitur odio eu, congue orci. ', 'Auteur 001', 1, 4, '2022-09-19 11:53:48'),
(11, 'Title 011', ' Nam quis nulla nulla. Duis dapibus convallis enim in laoreet. Praesent nunc urna, pretium eget aliquam in, luctus ullamcorper nisi. Donec auctor vitae mauris in semper. In dapibus velit in tortor porttitor, et vulputate felis faucibus. Nam facilisis dictum orci ut ultricies. Proin eu consequat leo. Sed a metus ipsum. Sed ut quam porttitor, scelerisque lacus at, volutpat massa. Quisque in metus vulputate, facilisis quam vel, fringilla urna. Etiam sit amet sagittis dolor. Donec a erat eget ante blandit pharetra. Nullam laoreet consequat magna. Cras in elit eget dui bibendum semper. Nullam fermentum non nisl vitae viverra. ', 'Auteur 002', 2, 5, '2022-09-19 11:54:05'),
(12, 'Title 012', 'Sed at tortor at urna aliquam fringilla non a augue. Vestibulum et facilisis eros. Donec finibus sed ipsum eget rhoncus. Nulla facilisis, dui a finibus commodo, dolor ipsum dictum magna, ut posuere orci ante at erat. Sed commodo interdum dui, eu luctus quam porttitor ac. Etiam feugiat ultricies lacinia. Sed condimentum convallis nisi ac dictum. Mauris magna mi, pretium eget tortor ac, elementum dapibus nunc. ', 'Auteur 003', 3, 6, '2022-09-19 11:54:23'),
(13, 'Title 013', 'Morbi risus ligula, tincidunt nec vulputate non, dapibus et elit. Vestibulum nunc dui, auctor quis vulputate sed, elementum cursus augue. Aliquam malesuada arcu egestas felis pharetra, aliquet luctus nisi elementum. Nunc neque elit, hendrerit eu pretium in, ornare quis velit. Maecenas vel elit auctor, interdum lectus eu, posuere erat. Aenean ac tristique tortor. Pellentesque eget dui in metus faucibus sodales. Ut suscipit fermentum hendrerit. Nullam quis risus gravida, suscipit nulla et, semper mi. Donec posuere ligula arcu, ut sagittis massa hendrerit non. Sed vel eros scelerisque, fringilla dolor eu, elementum sem. Phasellus tristique libero est, semper pulvinar erat pulvinar eget. Maecenas id commodo augue. Cras turpis turpis, suscipit a sodales ullamcorper, ultrices quis magna. Maecenas justo nibh, suscipit convallis neque vel, aliquet venenatis justo. ', 'Auteur 001', 1, 1, '2022-09-19 11:54:40'),
(14, 'Title 014', 'Nulla vitae quam purus. Aenean vestibulum metus sit amet nisi rhoncus gravida. Nullam ornare, enim non convallis ultrices, velit quam vestibulum nibh, id porta neque lectus tincidunt dolor. Proin tristique pellentesque arcu. Vivamus eros nulla, imperdiet eget faucibus sit amet, ultrices rhoncus justo. Praesent interdum faucibus suscipit. Donec eu odio cursus, condimentum eros ac, venenatis velit. Vivamus sed blandit massa, nec semper sem. Donec pharetra eros libero, vitae efficitur magna rhoncus fringilla. Vestibulum mi velit, rhoncus at orci porttitor, tincidunt varius tellus. Fusce vestibulum nisl arcu, at tempor sapien luctus sed. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin semper arcu magna, quis cursus nulla sollicitudin quis. ', 'Auteur 002', 2, 2, '2022-09-19 11:54:59'),
(15, 'Title 015', 'Nullam et leo ut elit vehicula ultricies eu nec nisi. Aliquam a varius velit. Ut pulvinar id turpis in semper. Maecenas in diam semper risus pharetra efficitur id ultrices arcu. Suspendisse et libero in neque convallis convallis sed eu arcu. Pellentesque vehicula scelerisque tincidunt. Aliquam at ullamcorper eros. Aenean eget auctor mauris. Pellentesque bibendum leo ac tortor vehicula scelerisque. ', 'Auteur 003', 3, 3, '2022-09-19 11:55:15');

-- --------------------------------------------------------

--
-- Structure de la table `authors`
--

CREATE TABLE `authors` (
  `id_author` int(11) NOT NULL,
  `firstname` varchar(180) DEFAULT NULL,
  `lastname` varchar(180) DEFAULT NULL,
  `pseudo` varchar(180) DEFAULT NULL,
  `mail` varchar(180) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `authors`
--

INSERT INTO `authors` (`id_author`, `firstname`, `lastname`, `pseudo`, `mail`) VALUES
(1, 'Author', '001', 'author001', 'author001@chez.lui'),
(2, 'Author', '002', 'author002', 'author002@chez.lui'),
(3, 'Author', '002', 'author003', 'author003@chez.lui');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(180) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `description`) VALUES
(1, 'Category 001', 'Description category 001'),
(2, 'Category 002', 'Description category 002'),
(3, 'Category 003', 'Description category 003'),
(4, 'Category 004', 'Description category 004'),
(5, 'Category 005', 'Description category 005'),
(6, 'Category 006', 'Description category 006');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_author` (`id_author`),
  ADD KEY `id_category` (`id_category`);

--
-- Index pour la table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id_author`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `authors`
--
ALTER TABLE `authors`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `authors` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
