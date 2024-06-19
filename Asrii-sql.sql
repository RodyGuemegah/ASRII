-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-projet-asrii-web.alwaysdata.net
-- Generation Time: Jun 19, 2024 at 04:48 PM
-- Server version: 10.6.17-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet-asrii-web_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `Classe`
--

CREATE TABLE `Classe` (
  `Id_classe` int(11) NOT NULL,
  `Nom_classe` varchar(255) NOT NULL,
  `Id_prof` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Classe`
--

INSERT INTO `Classe` (`Id_classe`, `Nom_classe`, `Id_prof`) VALUES
(2, 'ASRII', 2),
(3, 'DAWII', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Classe_eleve`
--

CREATE TABLE `Classe_eleve` (
  `Id_classe_eleve` int(11) NOT NULL,
  `Id_classe` int(11) NOT NULL,
  `Id_eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Classe_eleve`
--

INSERT INTO `Classe_eleve` (`Id_classe_eleve`, `Id_classe`, `Id_eleve`) VALUES
(1, 2, 5),
(2, 2, 6),
(4, 3, 17);

-- --------------------------------------------------------

--
-- Table structure for table `Cours`
--

CREATE TABLE `Cours` (
  `Id_cours` int(11) NOT NULL,
  `Nom_Cours` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Cours`
--

INSERT INTO `Cours` (`Id_cours`, `Nom_Cours`) VALUES
(1, 'Shell'),
(2, 'Linux');

-- --------------------------------------------------------

--
-- Table structure for table `Emplois_du_temps_eleve`
--

CREATE TABLE `Emplois_du_temps_eleve` (
  `Id_emp` int(11) NOT NULL,
  `Nom_fichier` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Emplois_du_temps_eleve`
--

INSERT INTO `Emplois_du_temps_eleve` (`Id_emp`, `Nom_fichier`, `Date`, `Id_user`) VALUES
(1, 'test.pdf', '2024-05-01', 6),
(2, 'test2.pdf', '2024-06-01', 6);

-- --------------------------------------------------------

--
-- Table structure for table `Emplois_du_temps_enseignant`
--

CREATE TABLE `Emplois_du_temps_enseignant` (
  `Id_emp` int(11) NOT NULL,
  `Nom_fichier` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Emplois_du_temps_enseignant`
--

INSERT INTO `Emplois_du_temps_enseignant` (`Id_emp`, `Nom_fichier`, `Date`, `Id_user`) VALUES
(1, 'EDT-juin.pdf', '2024-06-03', 2),
(2, 'EDT-juillet.pdf', '2024-06-29', 2),
(3, 'EDT-aout.pdf', '2024-07-29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fait_cour_de`
--

CREATE TABLE `fait_cour_de` (
  `Id_cours` int(11) NOT NULL,
  `Id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fait_cour_de`
--

INSERT INTO `fait_cour_de` (`Id_cours`, `Id_user`) VALUES
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Notes`
--

CREATE TABLE `Notes` (
  `Id_note` int(11) NOT NULL,
  `Id_user` int(11) NOT NULL,
  `Id_cours` int(11) NOT NULL,
  `Contenu_note` varchar(255) NOT NULL,
  `Note` int(11) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Notes`
--

INSERT INTO `Notes` (`Id_note`, `Id_user`, `Id_cours`, `Contenu_note`, `Note`, `DATE`) VALUES
(1, 6, 1, 'évaluation écrit', 11, '2024-06-14'),
(2, 9, 1, 'évaluation pc', 14, '2024-06-15'),
(7, 6, 2, 'Pas bien', 7, '2024-06-15'),
(12, 5, 2, 'Evaluation commande linux', 11, '2024-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `Offre_alternance`
--

CREATE TABLE `Offre_alternance` (
  `Id_alt` int(11) NOT NULL,
  `Contenu_alt` varchar(255) NOT NULL,
  `Id_user` int(11) DEFAULT NULL,
  `Validation_oa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Offre_alternance`
--

INSERT INTO `Offre_alternance` (`Id_alt`, `Contenu_alt`, `Id_user`, `Validation_oa`) VALUES
(1, 'testfdsfdsfds', 6, 1),
(2, '2eme ', 5, 1),
(3, 'xqda', 11, 1),
(4, 'cd', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Projet`
--

CREATE TABLE `Projet` (
  `Id_pro` int(11) NOT NULL,
  `Contenu_pro` varchar(255) NOT NULL,
  `Id_user` int(11) DEFAULT NULL,
  `Validation_prj` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Projet`
--

INSERT INTO `Projet` (`Id_pro`, `Contenu_pro`, `Id_user`, `Validation_prj`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec turpis nec mi facilisis fermentum. Praesent id dui ut eros ultricies fermentum. Quisque sed dictum erat, ut ultricies augue. Vivamus nec lacinia risus. Donec sit amet libero sed mauris sa', 6, 1),
(3, 'tes projet ', 2, 1),
(4, 'dsf', 11, 1),
(5, 'jkh', 11, 1),
(6, 'dza', 11, 1),
(7, 'cqd', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Support`
--

CREATE TABLE `Support` (
  `Id_sup` int(11) NOT NULL,
  `Nom_sup` varchar(100) NOT NULL,
  `Nom_fichier` varchar(100) NOT NULL,
  `Id_user` int(11) NOT NULL,
  `Id_cours` int(11) NOT NULL,
  `Date_ajout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Support`
--

INSERT INTO `Support` (`Id_sup`, `Nom_sup`, `Nom_fichier`, `Id_user`, `Id_cours`, `Date_ajout`) VALUES
(15, 'pdfExme', '../pdf/supportCours/pdfExme.pdf', 2, 2, '2024-05-22'),
(17, 'Olivier', '../pdf/supportCours/Olivier.pdf', 2, 2, '2024-05-24'),
(18, 'test linux', '../pdf/supportCours/test linux.pdf', 2, 2, '2024-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `Id_user` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Date_creation` date NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL,
  `Token` varchar(255) NOT NULL,
  `Siret` int(11) DEFAULT NULL,
  `Privilege` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`Id_user`, `Nom`, `Prenom`, `Mail`, `Date_creation`, `Mot_de_passe`, `Token`, `Siret`, `Privilege`) VALUES
(2, 'david', 'valerius', 'david.valeriuss@gmail.com', '2024-05-22', '$2y$10$uTrktBZMiKwkCHO6NDbiQOPLSjnst5b5GSTkNHKPKXqro.TOeH/gm', '', 478451, 3),
(5, 'Antoine', 'deMe', 'test.fake@gmail.com', '2024-05-22', '$2y$10$PtnqlM2fpUuAdZDfLnRHk.mr0iTCRmZsdvBoRVX6z932tNq2UKGgC', '', 676545, 4),
(6, 'Baptiste', '', 'bacxicoc@gmail.com', '2024-05-22', '$2y$10$dLPARIHhZqqdgPEJvsC0zOKNSX33EDyXAF2fM9BBXf6A5xyvOLLDu', 'b9444e0e7943adb3bdf433a6ea376cee1123ededc9988dc3554e2d5c06b3f911', 123, 4),
(9, 'Sara', 'manoharan', 'saramanoharan1@gmail.com', '2024-05-24', '$2y$10$DTlnzL362UP/etUfo2bZcOCBOlpgWrZjpJOjBsPOBbT27a3dbz0Gy', '9373e8b58be948e38330f8acdd2b1ad61985ffa35ff552cec6b85cbefe3ac92b', 7894621, 4),
(10, 'Root', '', 'root@root.com', '2024-06-03', '$2y$10$B5rXOuPHdGmVbm43fAhFYu0bysuISb07fKleXxvCuXNDd0rYXAU8u', '7b8a9cf81586d3547a80e94ab538ce5d595d39b9d61b3b3fd958c9a071821653', 123456, 2),
(11, 'Ma', '', 'saramanoharan2@gmail.com', '2024-06-03', '$2y$10$4dcgnVzkgwQwfk4iDC1dBuxu.x9.rzvNHTDdCnocoBLxHuRkk2.sC', 'dea2c745052ab6c53b787068c6bbbe9f175bd409345e69830cf47f7044938088', 125975369, 2),
(14, 'Admin', 'administrateur', 'admin@gmail.com', '2024-06-17', '$2y$10$llH6.KhVBHm9DR5rbl8SCe387T9/J30LPAz/HCk0fMC0Ri.ff5zWm', '', 0, 1),
(16, 'Petit', 'Romain', 'Romain@hotmail.com', '2024-06-18', '$2y$10$RaSt7XAyN9s0S8OcWsLP6eJ1kUNOot1Z5SQzTZvkGnB.2oP7Ila6i', '', 0, 0),
(17, 'Ateel', 'Elise', 'Elise@iut.com', '2024-06-19', '', '', NULL, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Classe`
--
ALTER TABLE `Classe`
  ADD PRIMARY KEY (`Id_classe`);

--
-- Indexes for table `Classe_eleve`
--
ALTER TABLE `Classe_eleve`
  ADD PRIMARY KEY (`Id_classe_eleve`);

--
-- Indexes for table `Cours`
--
ALTER TABLE `Cours`
  ADD PRIMARY KEY (`Id_cours`);

--
-- Indexes for table `Emplois_du_temps_eleve`
--
ALTER TABLE `Emplois_du_temps_eleve`
  ADD PRIMARY KEY (`Id_emp`),
  ADD KEY `Emplois_du_temps_User_FK` (`Id_user`);

--
-- Indexes for table `Emplois_du_temps_enseignant`
--
ALTER TABLE `Emplois_du_temps_enseignant`
  ADD PRIMARY KEY (`Id_emp`),
  ADD KEY `Emplois_du_temps_User_FK` (`Id_user`);

--
-- Indexes for table `fait_cour_de`
--
ALTER TABLE `fait_cour_de`
  ADD PRIMARY KEY (`Id_cours`,`Id_user`),
  ADD KEY `fait_cour_de_User0_FK` (`Id_user`);

--
-- Indexes for table `Notes`
--
ALTER TABLE `Notes`
  ADD PRIMARY KEY (`Id_note`,`Id_user`,`Id_cours`),
  ADD KEY `Notes_User_FK` (`Id_user`),
  ADD KEY `Notes_Cours0_FK` (`Id_cours`);

--
-- Indexes for table `Offre_alternance`
--
ALTER TABLE `Offre_alternance`
  ADD PRIMARY KEY (`Id_alt`),
  ADD KEY `Offre_alternance_User_FK` (`Id_user`);

--
-- Indexes for table `Projet`
--
ALTER TABLE `Projet`
  ADD PRIMARY KEY (`Id_pro`),
  ADD KEY `Projet_User_FK` (`Id_user`);

--
-- Indexes for table `Support`
--
ALTER TABLE `Support`
  ADD PRIMARY KEY (`Id_sup`),
  ADD KEY `Support_User_FK` (`Id_user`),
  ADD KEY `Support_Cours0_FK` (`Id_cours`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Classe`
--
ALTER TABLE `Classe`
  MODIFY `Id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Classe_eleve`
--
ALTER TABLE `Classe_eleve`
  MODIFY `Id_classe_eleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Cours`
--
ALTER TABLE `Cours`
  MODIFY `Id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Emplois_du_temps_eleve`
--
ALTER TABLE `Emplois_du_temps_eleve`
  MODIFY `Id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Emplois_du_temps_enseignant`
--
ALTER TABLE `Emplois_du_temps_enseignant`
  MODIFY `Id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Notes`
--
ALTER TABLE `Notes`
  MODIFY `Id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Offre_alternance`
--
ALTER TABLE `Offre_alternance`
  MODIFY `Id_alt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Projet`
--
ALTER TABLE `Projet`
  MODIFY `Id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Support`
--
ALTER TABLE `Support`
  MODIFY `Id_sup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Emplois_du_temps_eleve`
--
ALTER TABLE `Emplois_du_temps_eleve`
  ADD CONSTRAINT `Emplois_du_temps_User_FK` FOREIGN KEY (`Id_user`) REFERENCES `User` (`Id_user`);

--
-- Constraints for table `fait_cour_de`
--
ALTER TABLE `fait_cour_de`
  ADD CONSTRAINT `fait_cour_de_Cours_FK` FOREIGN KEY (`Id_cours`) REFERENCES `Cours` (`Id_cours`),
  ADD CONSTRAINT `fait_cour_de_User0_FK` FOREIGN KEY (`Id_user`) REFERENCES `User` (`Id_user`);

--
-- Constraints for table `Notes`
--
ALTER TABLE `Notes`
  ADD CONSTRAINT `Notes_Cours0_FK` FOREIGN KEY (`Id_cours`) REFERENCES `Cours` (`Id_cours`),
  ADD CONSTRAINT `Notes_User_FK` FOREIGN KEY (`Id_user`) REFERENCES `User` (`Id_user`);

--
-- Constraints for table `Offre_alternance`
--
ALTER TABLE `Offre_alternance`
  ADD CONSTRAINT `Offre_alternance_User_FK` FOREIGN KEY (`Id_user`) REFERENCES `User` (`Id_user`);

--
-- Constraints for table `Projet`
--
ALTER TABLE `Projet`
  ADD CONSTRAINT `Projet_User_FK` FOREIGN KEY (`Id_user`) REFERENCES `User` (`Id_user`);

--
-- Constraints for table `Support`
--
ALTER TABLE `Support`
  ADD CONSTRAINT `Support_Cours0_FK` FOREIGN KEY (`Id_cours`) REFERENCES `Cours` (`Id_cours`),
  ADD CONSTRAINT `Support_User_FK` FOREIGN KEY (`Id_user`) REFERENCES `User` (`Id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
