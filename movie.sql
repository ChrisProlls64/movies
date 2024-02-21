-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 20 fév. 2024 à 22:38
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `movies`
--

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `releaseDate` date DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `note` float DEFAULT NULL,
  `synopsis` text,
  `trailer` varchar(500) DEFAULT NULL,
  `slider` tinyint(4) DEFAULT NULL,
  `imgSlider` varchar(250) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`id`, `title`, `slug`, `releaseDate`, `duration`, `director`, `poster`, `note`, `synopsis`, `trailer`, `slider`, `imgSlider`, `created`, `updated`) VALUES
(96, 'Le monde de Némo', 'le-monde-de-nemo', '2003-11-26', '01:55:00', 'Andrew Stanton, Lee Unkrich', 'le-monde-de-nemo.jpg', 4.7, 'Nemo, un jeune poisson-clown, s\'égare de son récif de corail et se perd dans le vaste océan. Son père Marin part à sa recherche et affronte divers dangers pour le retrouver.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/TKi8VJmBuLs?si=ryQokr2ItY6te8ld\" title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 'le-monde-de-nemo-slider.', '2024-01-25 17:06:01', '2024-02-20 19:18:57'),
(109, 'Le Garçon et le Héron', 'le-garcon-et-le-heron', '2023-11-01', '02:03:00', 'Hayao Miyazaki ', 'le-garcon-et-le-heron.jpg', 4.2, 'Après la disparition de sa mère dans un incendie, Mahito, un jeune garçon de 11 ans, doit quitter Tokyo pour partir vivre à la campagne dans le village où elle a grandi. Il s’installe avec son père dans un vieux manoir situé sur un immense domaine où il rencontre un héron cendré qui devient petit à petit son guide et l’aide au fil de ses découvertes et questionnements à comprendre le monde qui l\'entoure et percer les mystères de la vie.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/Q2aTi0BQXek?si=wXuVz6pbxANLrHOe\" title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 'le-garcon-et-le-heron-slider.', '2024-01-30 10:04:13', '2024-02-20 19:19:09'),
(110, 'Mars Express', 'mars-express', '2023-11-22', '01:25:00', 'Jérémie Périn', 'mars-express.jpg', 4.2, 'En l’an 2200, Aline Ruby, détective privée obstinée, et Carlos Rivera son partenaire androïde sont embauchés par un riche homme d’affaires afin de capturer sur Terre une célèbre hackeuse. Au fil de leur enquête, ils seront confrontés aux plus sombres secrets de leur cité.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/7iroDVDTPco?si=rQwoqyVvopzvxZFY\" title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, NULL, '2024-01-30 10:16:54', '2024-02-20 19:19:21'),
(111, 'Pokémon', 'pokemon', '2016-11-30', '01:45:00', 'Rob Letterman', 'pokemon.jpg', 3.1, 'Après la disparition de Harry Goodman, un détective privé, son fils Tim va tenter de découvrir ce qui s’est passé.  Le détective Pikachu, ancien partenaire de Harry, participe alors à l’enquête : un super-détective adorable à la sagacité hilarante, qui en laisse plus d’un perplexe, dont lui-même.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/1roy4o4tqQM?si=GDfQF5tEkXfPzU0G\" title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, NULL, '2024-02-01 10:32:16', '2024-02-20 19:19:27'),
(112, 'Léo, la fabuleuse histoire de Léonard de Vinci', 'leo-la-fabuleuse-histoire-de-leonard-de-vinci', '2024-01-31', '01:37:00', 'Jim Capobianco, Pierre-Luc Granjon', 'leo-la-fabuleuse-histoire-de-leonard-de-vinci.jpg', 3.6, 'Bienvenue dans la Renaissance ! Une époque où artistes, savants, rois et reines inventent un monde nouveau. Parmi eux, un curieux personnage passe ses journées à dessiner d’étranges machines et à explorer les idées les plus folles. Observer la lune, voler comme un oiseau, découvrir les secrets de la médecine… il rêve de changer le monde. Embarquez pour un voyage avec le plus grand des génies, Léonard de Vinci !', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/z5My1jT2f1M?si=RxO6k_NVAe5Ve-l2\" title=\"YouTube video player\"  allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 'leo-la-fabuleuse-histoire-de-leonard-de-vinci-slider.', '2024-02-02 16:35:23', '2024-02-20 19:19:33'),
(144, 'Avatar', 'avatar', '2009-12-16', '02:42:00', 'James Cameron', 'avatar.jpg', 4.3, '  Malgré sa paralysie, Jake Sully, un ancien marine immobilisé dans un fauteuil roulant, est resté un combattant au plus profond de son être. Il est recruté pour se rendre à des années-lumière de la Terre, sur Pandora, où de puissants groupes industriels exploitent un minerai rarissime destiné à résoudre la crise énergétique sur Terre. Parce que l\'atmosphère de Pandora est toxique pour les humains, ceux-ci ont créé le Programme Avatar, qui permet à des ', 'https://www.youtube.com/watch?v=O1CzgULNRGs', 1, 'toto', '2024-02-10 15:43:57', '2024-02-10 15:57:37'),
(146, 'Là-haut', 'la-haut', '2009-07-29', '01:35:00', 'Pete Docter, Bob Peterson ', 'la-haut.jpg', 4.6, 'Carl Fredricksen, un vendeur de ballons à la retraite, est prêt pour sa dernière chance de s’envoler. Il attache des milliers de ballons à sa maison et se dirige vers le monde perdu de ses rêves d’enfant. Mais, à son insu, Carl embarque Russell, un garçon de 8 ans là au mauvais endroit au mauvais moment. Ce duo improbable va se faire de nouveaux amis, comme Doug, un chien avec un collier spécial qui lui permet de parler, et Kevin, un oiseau qui ne peut pas voler. Carl réalise vite que les plus grandes aventures de la vie ne sont pas celles qu’on croit.', 'https://youtu.be/p-TdCD6DBfM?si=rqltsSRFTnR-TS1p', NULL, NULL, '2024-02-10 16:28:33', '2024-02-10 16:28:33'),
(147, 'Nicky Larson - City Hunter: Angel Dust', 'nicky-larson-city-hunter-angel-dust', '2024-01-24', '01:36:00', 'Kazuyoshi Takeuchi, Kenji Kodama', 'nicky-larson-city-hunter-angel-dust.jpg', 2.4, 'Le détective privé Nicky Larson et sa partenaire Laura acceptent une mission étrangement simple : retrouver un chat ! En parallèle, une lieutenante de la police enquête sur l\'Angel Dust, une technologie mystérieuse. Mais attention, le trio des Cat\'s Eye est aussi sur le coup !', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/8LJFMracfNc?si=-kv1KIu0LSGygX0N\" title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, NULL, '2024-02-17 11:57:49', '2024-02-20 19:19:50'),
(148, 'Migration', 'migration', '2023-12-06', '01:22:00', 'Benjamin Renner, Guylo Homsy', 'migration.jpg', 3.8, 'La famille Colvert se lance dans un périple vers la Jamaïque mais leur plan si bien tracé va vite battre de l’aile. La tournure aussi chaotique et inattendue que vont prendre les évènements va les changer à jamais et leur apprendre beaucoup plus qu’ils ne l’auraient imaginé.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/cQfo0HJhCnE?si=UCfOYFl3TDmp5WUw\" title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 'migration-slider.', '2024-02-17 14:57:14', '2024-02-20 23:00:07'),
(149, 'Soul', 'soul', '2020-12-25', '01:40:00', 'Pete Docter, Kemp Powers', 'soul.jpg', 4.3, 'Au moment où Joe pense que son rêve est désormais à portée de main, un pas malencontreux l’expédie dans un endroit fantastique où il est obligé de réfléchir à nouveau à la signification d’avoir une âme. C’est là qu’il se lie d’amitié avec 22, une âme qui ne pense pas que la vie sur Terre soit aussi bien que ce qu’on veut bien lui faire croire...', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/3IZkCUGGhgY?si=K5RmueGcubLu4p3G\" title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, 'soul-slider.', '2024-02-18 14:55:26', '2024-02-20 19:20:02'),
(153, 'En avant', 'en-avant', '2020-03-04', '01:42:00', 'Dan Scanlon', 'en-avant.jpg', 3.6, 'Dans la banlieue d\'un univers imaginaire, deux frères elfes se lancent dans une quête extraordinaire pour découvrir s\'il reste encore un peu de magie dans le monde.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/XRF6uuubGcI?si=f2yrQ3slaR_Zq-rQ\" title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, NULL, '2024-02-18 15:58:53', '2024-02-20 19:20:11'),
(158, 'Spider-Man : Across The Spider-Verse', 'spider-man-across-the-spider-verse', '2023-05-31', '02:21:00', 'Joaquim Dos Santos, Kemp Powers, Justin Thompson ', 'spider-man--across-the-spider-verse.jpg', 4.1, 'Après avoir retrouvé Gwen Stacy, Spider-Man, le sympathique héros originaire de Brooklyn, est catapulté à travers le Multivers, où il rencontre une équipe de Spider-Héros chargée d\'en protéger l\'existence. Mais lorsque les héros s\'opposent sur la façon de gérer une nouvelle menace, Miles se retrouve confronté à eux et doit redéfinir ce que signifie être un héros afin de sauver les personnes qu\'il aime le plus.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/iZSRP2UYtO4?si=z_3VEyuvOZYrztl4\" title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, NULL, '2024-02-20 22:42:07', '2024-02-20 23:34:02'),
(159, 'Le Royaume des abysses', 'le-royaume-des-abysses', '2024-02-21', '01:52:00', 'Tian Xiaopeng | Par Tian Xiaopeng', 'le-royaume-des-abysses.jpg', 4, 'Shenxiu, une fillette de 10 ans, est aspirée dans les profondeurs marines durant une croisière familiale. Elle découvre l’univers fantastique des abysses, un monde inconnu peuplé d’incroyables créatures. Dans ce lieu mystérieux émerge le Restaurant des abysses, dirigé par l’emblématique Capitaine Nanhe. Poursuivis par le Fantôme Rouge, leur route sera semée d’épreuves et de nombreux secrets. Leur odyssée sous-marine ne fait que commencer.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/erZ8bvVddOo?si=1_kCcafp-s1X5tLG\" title=\"YouTube video player\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, NULL, '2024-02-20 22:52:22', '2024-02-20 22:52:22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
