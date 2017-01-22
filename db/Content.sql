-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 25 Décembre 2016 à 12:13
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `garage`
--

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`usr_id`, `usr_username`, `usr_password`, `usr_salt`, `usr_role`) VALUES
(1, 'root', 'NLaszlRd6JjDBQe7h0e2zmaBmYMX8vhHXM/lDIp0f0CmZsQL0UuIwqFESw/07hSALPaHqYuC6Htc1Ie9Tkzm5g==', '67c0eb893bae628266bc29b', 'ROLE_ADMIN'),
(3, 'admin', 'erVFNA74+xU1QT704lptiw/kSpThH/0pc6uNa8kh8PMNI0GXPDzrdhWSLL+N0v4xx1QpaRV81C/pKHHQy2xhFw==', '00f4824667eb54b4206d46b', 'ROLE_ADMIN');

--
-- Contenu de la table `voiture`
--

INSERT INTO `voiture` (`vtr_id`, `vtr_model`, `vtr_marque`, `vtr_annee`, `vtr_kilometrage`, `vtr_carburant`, `vtr_boite`) VALUES
(1, 'X5', 'BMW', 2015, 130000, 'Essence', 'Automatique');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
