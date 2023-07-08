-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 jan. 2023 à 08:44
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IdAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  PRIMARY KEY (`IdAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`IdAdmin`, `UserName`, `Pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `avoir_nutrition`
--

DROP TABLE IF EXISTS `avoir_nutrition`;
CREATE TABLE IF NOT EXISTS `avoir_nutrition` (
  `IdIngredients` int(11) NOT NULL,
  `IdNutrition` int(11) NOT NULL,
  `quant` float NOT NULL,
  PRIMARY KEY (`IdIngredients`,`IdNutrition`),
  KEY `IdNutrition` (`IdNutrition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avoir_nutrition`
--

INSERT INTO `avoir_nutrition` (`IdIngredients`, `IdNutrition`, `quant`) VALUES
(1, 1, 5),
(1, 2, 10),
(3, 3, 10),
(3, 1, 30),
(2, 6, 10),
(3, 6, 5),
(3, 2, 10),
(5, 6, 9);

-- --------------------------------------------------------

--
-- Structure de la table `contenir_recette`
--

DROP TABLE IF EXISTS `contenir_recette`;
CREATE TABLE IF NOT EXISTS `contenir_recette` (
  `IdRecette` int(11) NOT NULL,
  `IdNews` int(11) NOT NULL,
  PRIMARY KEY (`IdRecette`,`IdNews`),
  KEY `IdNews` (`IdNews`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `diaporama`
--

DROP TABLE IF EXISTS `diaporama`;
CREATE TABLE IF NOT EXISTS `diaporama` (
  `IdDiaporama` int(11) NOT NULL AUTO_INCREMENT,
  `duree` double NOT NULL,
  `IdAdmin` int(11) NOT NULL,
  PRIMARY KEY (`IdDiaporama`),
  KEY `IdAdmin` (`IdAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `diaporama`
--

INSERT INTO `diaporama` (`IdDiaporama`, `duree`, `IdAdmin`) VALUES
(1, 5, 1),
(2, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `durant_saison`
--

DROP TABLE IF EXISTS `durant_saison`;
CREATE TABLE IF NOT EXISTS `durant_saison` (
  `IdIngredients` int(11) NOT NULL,
  `NomSaison` varchar(50) NOT NULL,
  PRIMARY KEY (`IdIngredients`,`NomSaison`),
  KEY `NomSaison` (`NomSaison`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `durant_saison`
--

INSERT INTO `durant_saison` (`IdIngredients`, `NomSaison`) VALUES
(1, 'Printemps'),
(2, 'Automne'),
(3, 'Ete'),
(3, 'Printemps'),
(4, 'Printemps'),
(5, 'Automne'),
(5, 'Ete'),
(6, 'Automne'),
(7, 'Ete'),
(8, 'Ete'),
(9, 'Ete'),
(10, 'Hiver'),
(11, 'Hiver'),
(12, 'Hiver'),
(13, 'Hiver'),
(14, 'Hiver'),
(20, 'Hiver');

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

DROP TABLE IF EXISTS `etape`;
CREATE TABLE IF NOT EXISTS `etape` (
  `IdEtape` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`IdEtape`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`IdEtape`, `numero`, `Description`) VALUES
(1, 1, 'Coupez le poulet en morceaux et faites-le mariner dans une mixture d\'huile d\'olive, de jus de citron, d\'épices tajine (cumin, paprika, cannelle, gingembre) et d\'ail pendant environ 30 minutes.'),
(2, 2, 'Faites fondre de l\'huile d\'olive dans un tajine ou une cocotte à feu moyen. Ajoutez les oignons et faites-les revenir jusqu\'à ce qu\'ils soient tendres.'),
(3, 3, 'Ajoutez le poulet mariné et les légumes (carottes, courgettes, navets) dans le tajine. Ajoutez un peu d\'eau ou de bouillon de poulet et mélangez bien.'),
(4, 4, 'Couvrez et laissez mijoter pendant environ 45 minutes à 1 heure jusqu\'à ce que la viande soit tendre et les légumes soient cuits.'),
(5, 1, 'Préparez la semoule de blé en suivant les instructions sur l\'emballage. Faites-la cuire dans de l\'eau bouillante salée pendant environ 20 minutes.'),
(6, 2, 'Pendant ce temps, préparez les légumes en les coupant en morceaux de taille égale. Faites-les cuire dans une poêle avec un peu d\'huile d\'olive pendant environ 15 minutes.'),
(7, 3, 'Faites cuire la viande dans une poêle avec un peu d\'huile d\'olive jusqu\'à ce qu\'elle soit bien cuite.'),
(8, 4, 'Dans un grand plat à couscous, étalez la semoule de blé cuite, ajoutez les légumes cuits et la viande. Mélangez bien et ajoutez un peu de bouillon de poulet ou de légumes pour donner plus de saveur. Laissez reposer pendant quelques minutes pour que la semoule absorbe le bouillon.'),
(9, 1, 'Préparez la pâte à brik en mélangeant la farine, l\'eau, l\'huile d\'olive et la pincée de sel dans un bol.'),
(10, 2, 'Divisez la pâte en plusieurs petites boules de la taille d\'une balle de ping-pong.'),
(11, 3, 'Aplatissez chaque boule en utilisant un rouleau à pâtisserie ou un rouleau à brik pour obtenir des cercles de pâte fins.'),
(12, 4, 'Déposez un oeuf dans chaque cercle de pâte, et ajoutez des fines tranches de tomate, une feuille de menthe, et un peu de sel et de poivre.'),
(13, 5, 'Pliez les bords de la pâte pour fermer le brik et faites-le frire dans de l\'huile chaude pendant environ 2 minutes de chaque côté jusqu\'à ce qu\'il soit doré.'),
(14, 1, 'Faites revenir les oignons et l\'ail dans une poêle avec un peu d\'huile d\'olive jusqu\'à ce qu\'ils soient tendres.'),
(15, 2, 'Ajoutez les tomates en dés, les épices (cumin, paprika, coriandre) et un peu de sel et de poivre. Laissez mijoter pendant environ 10 minutes.'),
(16, 3, 'Faites des petits trous dans la sauce tomate avec une cuillère et cassez un oeuf dans chacun d\'eux. Couvrez et laissez cuire à feu doux pendant environ 5 minutes ou jusqu\'à ce que les oeufs soient cuits à votre goût.'),
(17, 4, 'Servez chaud accompagné de pain grillé ou de pain pita.'),
(18, 1, 'Préparez les pois chiches en les faisant tremper dans de l eau pendant au moins 12 heures'),
(19, 2, 'Faites cuire les pois chiches dans une casserole d  eau salée jusqu à ce qu ils soient tendres'),
(20, 3, 'Faire griller le pain et le couper en morceaux'),
(21, 4, 'Mélanger les pois chiches cuits, le pain grillé et les épices (sel, poivre, cumin)'),
(22, 5, 'Servez chaud accompagné d une sauce à base de citron et d huile d olive'),
(23, 1, 'Faire bouillir de l eau salée dans une casserole'),
(24, 2, 'Ajouter les pâtes et cuire selon les instructions de l nemballage'),
(25, 3, 'Couper la viande en petits morceaux et la faire cuire dans une poêle avec de l huile d olive'),
(26, 4, 'Ajouter la viande cuite aux pâtes égouttées'),
(27, 5, 'Ajouter les épices (sel, poivre, cumin) et servir chaud'),
(28, 1, 'Laver et couper les légumes (tomates, concombre, oignons) en petits morceaux'),
(29, 2, 'Mélanger les légumes dans un saladier avec de l huile d olive, du citron et des épices (sel, poivre)'),
(30, 3, 'Servir frais'),
(31, 1, 'Eplucher et couper les pommes de terre en rondelles'),
(32, 2, 'Les faire frire dans de l huile jusqu à ce qu elles soient dorées'),
(33, 3, 'Couper la viande en morceaux et la faire cuire dans une poêle avec de l huile d olive'),
(34, 4, 'Mélanger les pommes de terre frittes et la viande cuite dans un plat à four'),
(35, 5, 'Enfourner à 180 degrés pendant 15 minutes'),
(36, 6, 'Servir chaud accompagné de salade verte');

-- --------------------------------------------------------

--
-- Structure de la table `fete`
--

DROP TABLE IF EXISTS `fete`;
CREATE TABLE IF NOT EXISTS `fete` (
  `NomFete` varchar(50) NOT NULL,
  PRIMARY KEY (`NomFete`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fete`
--

INSERT INTO `fete` (`NomFete`) VALUES
('Achoura'),
('Aid'),
('Circoncision'),
('Mariage');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `PathI` varchar(50) NOT NULL,
  `IdRecette` int(11) NOT NULL,
  PRIMARY KEY (`PathI`),
  KEY `IdRecette` (`IdRecette`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`PathI`, `IdRecette`) VALUES
('./img/1.png', 1),
('./img/2.png', 2),
('./img/3.png', 3),
('./img/4.png', 4),
('./img/5.png', 5),
('./img/6.png', 6),
('./img/7.png', 7),
('./img/8.png', 8),
('./img/9.png', 9),
('./img/10.png', 10),
('./img/11.png', 11),
('./img/12.png', 12),
('./img/15.png', 15),
('./img/16.png', 16),
('./img/17.png', 17);

-- --------------------------------------------------------

--
-- Structure de la table `image_diaporama`
--

DROP TABLE IF EXISTS `image_diaporama`;
CREATE TABLE IF NOT EXISTS `image_diaporama` (
  `PathI` varchar(50) NOT NULL,
  `IdDiaporama` varchar(50) NOT NULL,
  PRIMARY KEY (`PathI`,`IdDiaporama`),
  KEY `IdDiaporama` (`IdDiaporama`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image_diaporama`
--

INSERT INTO `image_diaporama` (`PathI`, `IdDiaporama`) VALUES
('./img/1.png', '1'),
('./img/1.png', '2'),
('./img/2.png', '1'),
('./img/3.png', '1'),
('./img/4.png', '1'),
('./img/5.png', '1');

-- --------------------------------------------------------

--
-- Structure de la table `image_ingredient`
--

DROP TABLE IF EXISTS `image_ingredient`;
CREATE TABLE IF NOT EXISTS `image_ingredient` (
  `IdIngredients` int(11) NOT NULL,
  `PathI` varchar(50) NOT NULL,
  PRIMARY KEY (`IdIngredients`,`PathI`),
  KEY `PathI` (`PathI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image_ingredient`
--

INSERT INTO `image_ingredient` (`IdIngredients`, `PathI`) VALUES
(1, './img/i1.png'),
(2, './img/i2.png'),
(3, './img/i3.png'),
(4, './img/i4.png'),
(5, './img/i5.png'),
(6, './img/i6.png'),
(18, './img/i18.png');

-- --------------------------------------------------------

--
-- Structure de la table `image_news`
--

DROP TABLE IF EXISTS `image_news`;
CREATE TABLE IF NOT EXISTS `image_news` (
  `PathI` varchar(50) NOT NULL,
  `IdNews` int(11) NOT NULL,
  PRIMARY KEY (`PathI`,`IdNews`),
  KEY `IdNews` (`IdNews`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image_news`
--

INSERT INTO `image_news` (`PathI`, `IdNews`) VALUES
('./img/a1.png', 3),
('./img/a2.png', 2),
('./img/a3.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `IdIngredients` int(11) NOT NULL AUTO_INCREMENT,
  `NomIngredient` varchar(50) DEFAULT NULL,
  `CaloriesIngredient` double DEFAULT NULL,
  `IsHealthy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdIngredients`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`IdIngredients`, `NomIngredient`, `CaloriesIngredient`, `IsHealthy`) VALUES
(17, 'Botte de coriandre', 4, 'healthy'),
(3, 'Viande rouge', 200, 'unhealthy'),
(4, 'Tomates', 25, 'healthy'),
(5, 'Poivrons', 40, 'healthy'),
(6, 'Oignons', 40, 'healthy'),
(18, 'Olive verte', 22, 'healthy'),
(2, 'Carotte', 30, 'healthy'),
(7, 'Courgettes', 20, 'healthy'),
(16, 'Sel', 0, 'unhealthy'),
(11, 'Poivrons verts', 40, 'healthy'),
(1, 'Oignons rouges', 40, 'healthy'),
(19, 'Cuisse de poulet ', 130, 'healthy'),
(20, 'Botte de persil', 25, 'healthy'),
(21, 'Poivre', 8, 'healthy'),
(22, 'Feuille de brick', 50, 'unhealthy'),
(23, 'Beurre', 102, 'unhealthy'),
(24, 'Pois chiches', 30, 'healthy'),
(25, 'Cannelle', 19, 'healthy'),
(26, 'Nouilles de Rechta ', 180, 'unhealthy'),
(27, 'Dattes', 280, 'healthy'),
(28, 'Lait', 52, 'unhealthy'),
(29, 'Sucre', 600, 'unhealthy'),
(30, 'Pâte sablée', 550, 'unhealthy'),
(31, 'Pomme', 14, 'healthy'),
(32, 'Pois chiches', 150, 'healthy'),
(33, 'Pain', 200, 'normal'),
(34, 'Pâtes', 250, 'normal'),
(35, 'Viande', 250, 'normal'),
(36, 'Tomates', 25, 'healthy'),
(37, 'Concombre', 15, 'healthy'),
(38, 'Oignons', 50, 'healthy'),
(39, 'Pommes de terre', 100, 'nothealthy'),
(40, 'Huile d olive', 120, 'healthy'),
(41, 'Citron', 20, 'healthy'),
(42, 'frik', 79, 'healthy'),
(43, 'miel', 700, 'healthy'),
(44, 'semoul', 500, 'unhealthy'),
(45, 'amond', 300, 'unhealthy'),
(46, 'fromage', 700, 'unhealthy');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `Id_item_menu` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_item_menu` varchar(50) DEFAULT NULL,
  `IdAdmin` int(11) NOT NULL,
  PRIMARY KEY (`Id_item_menu`),
  KEY `IdAdmin` (`IdAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`Id_item_menu`, `Nom_item_menu`, `IdAdmin`) VALUES
(1, 'Accueil', 1);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `IdNews` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` text NOT NULL,
  `Article` text,
  PRIMARY KEY (`IdNews`)
) ENGINE=MyISAM AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`IdNews`, `Titre`, `Article`) VALUES
(1, 'Lesd derniï¿½res tendances en matiï¿½re de cuisine vï¿½gï¿½tale', 'La cuisine vï¿½gï¿½tale est de plus en plus populaire ces derniers temps, avec de nombreux restaurants et chefs cï¿½lï¿½bres adoptant cette approche pour leurs menus. Les lï¿½gumineuses, les noix et les graines sont des ingrï¿½dients clï¿½s de cette cuisine, qui est riche en protï¿½ines et en nutriments. Les plats vï¿½gï¿½taliens sont ï¿½galement souvent plus respectueux de l environnement et peuvent aider ï¿½ rï¿½duire les ï¿½missions de gaz ï¿½ effet de serre.'),
(2, 'Le retour des    recettes et cuisines   rï¿½gionales', 'Les cuisines rï¿½gionales sont en train de faire un retour en force, avec de nombreux chefs et restaurateurs qui se inspirent des ingrï¿½dients et des techniques de leur rï¿½gion d origine pour crï¿½er des plats authentiques et savoureux. Que ce soit la cuisine provenï¿½ale, la cuisine du Nord ou la cuisine indienne, les chefs modernes revisitent les recettes traditionnelles pour les adapter aux goï¿½ts d aujourd-hui.'),
(3, 'Les aaliments fermentï¿½s, la nouvelle tendance culinaire', 'Les aaliments fermentï¿½s tels que le kimchi, le miso et le kombucha sont de plus en plus populaires dans les cuisines du monde entier. Non seulement ils ont un goï¿½t dï¿½licieux, mais ils sont ï¿½galement bons pour la santï¿½, car ils contiennent des probiotiques qui peuvent renforcer le systï¿½me immunitaire et amï¿½liorer la digestion.'),
(72, '0', '0'),
(5, '', ''),
(6, '', ''),
(7, '', ''),
(8, 'malak', 'hjk'),
(9, 'malak', 'jksdx'),
(10, '', ''),
(11, '', ''),
(20, '', ''),
(50, 'jkadx', 'kjsx'),
(51, 'hjds', 'isdo'),
(53, 'hjhjn', 'hjjk'),
(56, '4', '4');

-- --------------------------------------------------------

--
-- Structure de la table `noter_recette`
--

DROP TABLE IF EXISTS `noter_recette`;
CREATE TABLE IF NOT EXISTS `noter_recette` (
  `IdRecette` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `Notation` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdRecette`,`IdUser`),
  KEY `IdUser` (`IdUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `nutrition`
--

DROP TABLE IF EXISTS `nutrition`;
CREATE TABLE IF NOT EXISTS `nutrition` (
  `IdNutrition` int(11) NOT NULL AUTO_INCREMENT,
  `NomNutrition` varchar(50) DEFAULT NULL,
  `Gramme` double DEFAULT NULL,
  PRIMARY KEY (`IdNutrition`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nutrition`
--

INSERT INTO `nutrition` (`IdNutrition`, `NomNutrition`, `Gramme`) VALUES
(2, 'Vitamine B2	', 0),
(1, 'Vitamine A', NULL),
(5, 'Lipides', NULL),
(6, 'Glucides', NULL),
(7, 'Fibres', NULL),
(8, 'Potassium', NULL),
(9, 'Lipides', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `plat_de_fete`
--

DROP TABLE IF EXISTS `plat_de_fete`;
CREATE TABLE IF NOT EXISTS `plat_de_fete` (
  `IdRecette` int(11) NOT NULL,
  `NomFete` varchar(50) NOT NULL,
  PRIMARY KEY (`IdRecette`,`NomFete`),
  KEY `NomFete` (`NomFete`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plat_de_fete`
--

INSERT INTO `plat_de_fete` (`IdRecette`, `NomFete`) VALUES
(1, 'Achoura'),
(1, 'Aid'),
(1, 'Circoncision'),
(10, 'Circoncision'),
(15, 'Aid'),
(15, 'Mariage'),
(16, 'Aid'),
(16, 'Mariage');

-- --------------------------------------------------------

--
-- Structure de la table `preferer`
--

DROP TABLE IF EXISTS `preferer`;
CREATE TABLE IF NOT EXISTS `preferer` (
  `IdRecette` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  PRIMARY KEY (`IdRecette`,`IdUser`),
  KEY `IdUser` (`IdUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `preparer_avec`
--

DROP TABLE IF EXISTS `preparer_avec`;
CREATE TABLE IF NOT EXISTS `preparer_avec` (
  `IdRecette` int(11) NOT NULL,
  `IdIngredients` int(11) NOT NULL,
  PRIMARY KEY (`IdRecette`,`IdIngredients`),
  KEY `IdIngredients` (`IdIngredients`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `preparer_avec`
--

INSERT INTO `preparer_avec` (`IdRecette`, `IdIngredients`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 6),
(1, 16),
(1, 19),
(2, 2),
(2, 5),
(2, 6),
(2, 7),
(2, 11),
(2, 16),
(3, 2),
(3, 6),
(3, 9),
(3, 18),
(4, 3),
(4, 18),
(4, 22),
(4, 23),
(4, 36),
(4, 39),
(4, 40),
(4, 46),
(5, 23),
(5, 25),
(5, 28),
(5, 29),
(5, 30),
(5, 31),
(6, 4),
(6, 5),
(6, 6),
(6, 9),
(6, 10),
(6, 16),
(6, 40),
(6, 44),
(6, 46),
(7, 2),
(7, 10),
(8, 25),
(8, 27),
(8, 28),
(8, 29),
(10, 3),
(10, 6),
(10, 40),
(10, 42),
(11, 1),
(11, 2),
(11, 4),
(11, 5),
(11, 18),
(11, 21),
(12, 1),
(12, 3),
(12, 4),
(12, 16),
(12, 30),
(15, 27),
(15, 29),
(15, 43),
(15, 44),
(15, 45),
(16, 29),
(16, 34),
(16, 43),
(16, 44),
(16, 45),
(17, 28),
(17, 29),
(17, 41),
(17, 43);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `IdRecette` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(50) DEFAULT NULL,
  `catego` varchar(50) DEFAULT NULL,
  `Descript` text,
  `Healthy` varchar(50) DEFAULT NULL,
  `CaloriesRecette` double DEFAULT NULL,
  `Difficulte` varchar(50) DEFAULT NULL,
  `TempsCuisson` varchar(50) DEFAULT NULL,
  `TempsRepos` varchar(50) DEFAULT NULL,
  `TempsPreparation` varchar(50) DEFAULT NULL,
  `IdUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdRecette`),
  KEY `IdUser` (`IdUser`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`IdRecette`, `Titre`, `catego`, `Descript`, `Healthy`, `CaloriesRecette`, `Difficulte`, `TempsCuisson`, `TempsRepos`, `TempsPreparation`, `IdUser`) VALUES
(11, 'Salade Variée', 'entree', 'Une salade algérienne composée de légumes frais', 'healthy', 400, '2', '0', '0', '20', 1),
(3, 'Tajine de poulet aux olives', 'plat', 'Un plat traditionnel algerien a base de poulet, olives et epices, accompagne de semoule de ble.', 'healthy', 700, '3/5', '60min', '0', '30min', 1),
(4, 'Brik a l\'oeuf', 'plat', 'Un plat traditionnel  \r\n algerien a     \r\n     base de pate a brick, oeufs et legumes.', 'not healthy', 500, '2/5', '15min', '0', '10min', 1),
(6, 'Mhadjb', 'Plat', 'Un plat traditionnel algérien à base de semoule', 'not healthy', 200, 'Moyen', '5min', '15 minutes', '45 minutes', 1),
(2, 'Chakchouka', 'plat', 'Un plat traditionnel algerien a base de tomates, poivrons, oignons et oeufs poches, accompagne de pain.', 'healthy', 600, '2/5', '30min', '0', '15min', 1),
(1, 'Couscous royal', 'plat', 'Un plat traditionnel algerien a base de semoule de ble, accompagne de legumes et de viande.', 'healthy', 800, '3/5', '60min', '0', '90min', 1),
(10, 'Soupe de Frik', 'entree', 'Une soupe algérienne à base de pâtes et de viande', 'healthy', 600, '4', '20', '5', '40', 1),
(8, 'Jus de dattes', 'boisson', 'Un jus frais et rafraîchissant à base de dattes et d\'eau', 'not healthy', 150, 'Facile', '0min', '0', '10', 1),
(7, 'Salade de carottes râpées', 'entree', 'Une salade fraîche et croquante, parfaite pour l été', 'healthy', 100, 'Facile', 'omin', '0', '10 minutes', 1),
(5, 'Tarte aux pommes', 'dessert', 'Une tarte traditionnelle, faite maison avec des pommes fraï¿½ches', 'not healthy', 301, '0', '35min', '20min', '8', 2),
(12, 'Les Soufflets', 'entree', 'Un plat algérien à base de pommes de terre et de viande', 'not healthy', 700, '5', '25', '15', '45', 1),
(9, 'salade', 'entree', 'Un plat healthy facile a preparer', 'healthy', 500, '3', '14min', '15', '45', 1),
(15, 'Makroud', 'dessert', 'plat des fete tre connu dans l algerie \r\n', 'not healthy', 1500, '3', '45min', '20min', '1 min', 1),
(16, 'Baqlawa', 'dessert', 'gateau  algerien prestige', 'not healthy', 1500, '5', '45min', '1h20min', '1h', 1),
(17, 'Cherbet', 'boisson', 'Le cherbet est une citronnade ou limonade d’Algérie. On trouve les meilleurs cherbet à Boufarik', 'not healthy', 1600, '2/6', '0min', '0min', '15min', 1);

-- --------------------------------------------------------

--
-- Structure de la table `recettebyadmin`
--

DROP TABLE IF EXISTS `recettebyadmin`;
CREATE TABLE IF NOT EXISTS `recettebyadmin` (
  `IdRecette` int(11) NOT NULL,
  `IdAdmin` int(11) NOT NULL,
  PRIMARY KEY (`IdRecette`,`IdAdmin`),
  KEY `IdAdmin` (`IdAdmin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

DROP TABLE IF EXISTS `saison`;
CREATE TABLE IF NOT EXISTS `saison` (
  `NomSaison` varchar(50) NOT NULL,
  PRIMARY KEY (`NomSaison`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `saison`
--

INSERT INTO `saison` (`NomSaison`) VALUES
('Automne'),
('Ete'),
('Hiver'),
('Printemps');

-- --------------------------------------------------------

--
-- Structure de la table `sous_menu`
--

DROP TABLE IF EXISTS `sous_menu`;
CREATE TABLE IF NOT EXISTS `sous_menu` (
  `Id_item_sous_menu` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_item_sous_menu` varchar(50) DEFAULT NULL,
  `Id_item_menu` int(11) NOT NULL,
  PRIMARY KEY (`Id_item_sous_menu`),
  KEY `Id_item_menu` (`Id_item_menu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `suivre_etape`
--

DROP TABLE IF EXISTS `suivre_etape`;
CREATE TABLE IF NOT EXISTS `suivre_etape` (
  `IdRecette` int(11) NOT NULL,
  `IdEtape` int(11) NOT NULL,
  PRIMARY KEY (`IdRecette`,`IdEtape`),
  KEY `IdEtape` (`IdEtape`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `suivre_etape`
--

INSERT INTO `suivre_etape` (`IdRecette`, `IdEtape`) VALUES
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(8, 18),
(8, 19),
(8, 20),
(8, 21),
(8, 22),
(9, 28),
(9, 29),
(9, 30),
(10, 28),
(10, 29),
(10, 30),
(11, 31),
(11, 32),
(11, 33),
(11, 34),
(11, 35),
(11, 36);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Sexe` varchar(50) DEFAULT NULL,
  `Mail` varchar(50) DEFAULT NULL,
  `DateNaissance` text,
  `MotPasse` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`IdUser`, `Nom`, `Prenom`, `Sexe`, `Mail`, `DateNaissance`, `MotPasse`) VALUES
(1, 'gouasmia', 'malak', 'f', 'jm_gouasmia@esi.dz', '2022-06-01', 'malak');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `PathV` varchar(50) NOT NULL,
  `IdRecette` int(11) NOT NULL,
  PRIMARY KEY (`PathV`),
  KEY `IdRecette` (`IdRecette`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
