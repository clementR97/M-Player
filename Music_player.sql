-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 25 juin 2024 à 13:58
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
-- Base de données : `Music_player`
--

-- --------------------------------------------------------

--
-- Structure de la table `Musique`
--

CREATE TABLE `Musique` (
  `ID` int(11) NOT NULL,
  `Nom_Album` varchar(30) DEFAULT NULL,
  `Date_Ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Description` varchar(255) DEFAULT NULL,
  `Lien_musique` varchar(255) DEFAULT NULL,
  `Style_musique` varchar(50) DEFAULT NULL,
  `Lien_Image_Album` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Musique`
--

INSERT INTO `Musique` (`ID`, `Nom_Album`, `Date_Ajout`, `Description`, `Lien_musique`, `Style_musique`, `Lien_Image_Album`) VALUES
(1, 'r', '2024-06-12 19:30:34', 'r', 'uploads/mp3/music.mp3', 'Hip-hop', 'uploads/images/rabbit.png'),
(2, 'lr', '2024-06-12 19:36:44', 'f', 'uploads/mp3/music.mp3', 'Hip-hop', 'uploads/images/rabbit.png'),
(6, 'magnolia', '2024-06-15 02:25:38', 'un mix', 'uploads/mp3/magnolias dance.mp3', 'Autres styles', 'uploads/images/category.png'),
(7, 'HERE COME A THROUGH', '2024-06-17 17:28:27', 'musique avec rythme', 'uploads/mp3/Here Comes a Thought  Steven Universe  Cartoon Network.mp3', 'Rock', 'uploads/images/instagram-2.png');

-- --------------------------------------------------------

--
-- Structure de la table `Users_Music`
--

CREATE TABLE `Users_Music` (
  `ID_Users` int(11) DEFAULT NULL,
  `ID_Musics` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Users_Music`
--

INSERT INTO `Users_Music` (`ID_Users`, `ID_Musics`) VALUES
(3, 1),
(5, 6),
(5, 7);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Date_de_naissance` date DEFAULT NULL,
  `Adresse_mail` varchar(100) DEFAULT NULL,
  `Numero_telephone` varchar(20) DEFAULT NULL,
  `Mot_de_passe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`ID`, `Nom`, `Prenom`, `Date_de_naissance`, `Adresse_mail`, `Numero_telephone`, `Mot_de_passe`) VALUES
(3, 'cle', 'rol', '1999-02-16', 'cle@rol.com', '1', '$2y$10$M8CHQLpffl.af/yEjOevTuGjhn7.J2jZR1u8vpbs6VZSVExHMZ4Qm'),
(4, 'marc', 'épierre', '1956-05-11', 'marc@depierre.com', '3', '$2y$10$A4vmImne.h5NLWNaYn5geOmE1cx4osN0EO8AI//LZrETtOl0RzbVW'),
(5, 'test', 'test', '1990-11-01', 'test@mail.com', '01', '$2y$10$mW61giXVr9JeaoIKZ9LIIOztW..PCb6Xl1EXLJYOUFeBGCwEq9fW.'),
(6, 'Roland', 'Clement', NULL, 'clementroland52@gmail.com', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Musique`
--
ALTER TABLE `Musique`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Users_Music`
--
ALTER TABLE `Users_Music`
  ADD KEY `musique_utilisateur` (`ID_Musics`),
  ADD KEY `utilisateur_musique` (`ID_Users`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Musique`
--
ALTER TABLE `Musique`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Users_Music`
--
ALTER TABLE `Users_Music`
  ADD CONSTRAINT `musique_utilisateur` FOREIGN KEY (`ID_Musics`) REFERENCES `Musique` (`ID`),
  ADD CONSTRAINT `utilisateur_musique` FOREIGN KEY (`ID_Users`) REFERENCES `Utilisateur` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
