-- Creation de la base de donnees -- 

CREATE DATABASE IF NOT EXISTS `projet_jeu` DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;


-- Creation de la table "race" --

CREATE TABLE IF NOT EXISTS `projet_jeu`.`race` ( `id_race` INT NOT NULL AUTO_INCREMENT , `nom_race` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL , PRIMARY KEY (`id_race`)) ENGINE = InnoDB;


-- Insertion dans la table race des 4 races presentes par defaut --

INSERT IGNORE INTO `projet_jeu`.`race`(`nom_race`) VALUES ('Humain');
INSERT IGNORE INTO `projet_jeu`.`race`(`nom_race`) VALUES ('Elfe');
INSERT IGNORE INTO `projet_jeu`.`race`(`nom_race`) VALUES ('Nain');
INSERT IGNORE INTO `projet_jeu`.`race`(`nom_race`) VALUES ('Orc');

-- Creation de la table "poste"

CREATE TABLE IF NOT EXISTS `projet_jeu`.`poste` ( `id_poste` INT NOT NULL AUTO_INCREMENT , `nom_poste` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL , PRIMARY KEY (`id_poste`)) ENGINE = InnoDB;

-- Insertion des postes predefinis dans la tables "poste" --

INSERT IGNORE INTO `projet_jeu`.`poste`(`nom_poste`) VALUES ('Gardien');
INSERT IGNORE INTO `projet_jeu`.`poste`(`nom_poste`) VALUES ('Défenseur');
INSERT IGNORE INTO `projet_jeu`.`poste`(`nom_poste`) VALUES ('Milieu');
INSERT IGNORE INTO `projet_jeu`.`poste`(`nom_poste`) VALUES ('Attaquant');

-- Creation de la table "orientation" -- 

CREATE TABLE IF NOT EXISTS `projet_jeu`.`orientation` ( `id_orientation` INT NOT NULL AUTO_INCREMENT , `poste_id` INT NOT NULL , `nom_orientation` VARCHAR(30) NOT NULL , PRIMARY KEY (`id_orientation`)) ENGINE = InnoDB;

-- Indexage de l'attribut "poste_id" pour les cles etrangeres --

ALTER TABLE `projet_jeu`.`orientation` ADD INDEX(`poste_id`);

-- Ajout de la cle etrangere entre les tables "orientations" et "poste"

ALTER TABLE `projet_jeu`.`orientation` ADD CONSTRAINT `FK_orientation_poste` FOREIGN KEY (`poste_id`) REFERENCES `projet_jeu`.`poste`(`id_poste`) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- Insertion des orientations predefinies --

INSERT IGNORE INTO `projet_jeu`.`orientation`(`poste_id`, `nom_orientation`) VALUES (2, 'Latéral');
INSERT IGNORE INTO `projet_jeu`.`orientation`(`poste_id`, `nom_orientation`) VALUES (2, 'Libéro');
INSERT IGNORE INTO `projet_jeu`.`orientation`(`poste_id`, `nom_orientation`) VALUES (3, 'Milieu récupérateur');
INSERT IGNORE INTO `projet_jeu`.`orientation`(`poste_id`, `nom_orientation`) VALUES (3, 'Ailier');
INSERT IGNORE INTO `projet_jeu`.`orientation`(`poste_id`, `nom_orientation`) VALUES (4, 'Meneur de jeu');
INSERT IGNORE INTO `projet_jeu`.`orientation`(`poste_id`, `nom_orientation`) VALUES (4, 'Point d\'appui');

-- Creation de la table "capacite" --

CREATE TABLE IF NOT EXISTS  `projet_jeu`.`capacite` (
    `id_capacite` INT NOT NULL AUTO_INCREMENT ,
    `nom_capacite` VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `type` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `temps_chargement_secondes` INT NOT NULL ,
    `nom_effet` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `duree_secondes_effet` INT NOT NULL , PRIMARY KEY (`id_capacite`),
    UNIQUE `UQ_nom_capacite` (`nom_capacite`)
) ENGINE = InnoDB;

 -- Creation de la table "personnage" --

 CREATE TABLE IF NOT EXISTS `projet_jeu`.`personnage` (
    `id_personnage` BIGINT NOT NULL AUTO_INCREMENT ,
    `nom_personnage` VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `race_id` INT NOT NULL ,
    `endurance` TINYINT NOT NULL ,
    `force` TINYINT NOT NULL ,
    `tacle` TINYINT NOT NULL ,
    `defense` TINYINT NOT NULL ,
    `technique` TINYINT NOT NULL ,
    `vitesse` TINYINT NOT NULL ,
    `intelligence` TINYINT NOT NULL ,
    `tir` TINYINT NOT NULL ,
    `passe` TINYINT NOT NULL ,
    `experience` TINYINT NOT NULL ,
    `niveau` TINYINT NOT NULL ,
    `club_id` BIGINT NULL,
    `illustration` BLOB NULL ,
    `biographie` TEXT NULL ,
    `capacite_1_id` INT NULL,
    `capacite_2_id` INT NULL,
    `poste_id` INT NOT NULL ,
    PRIMARY KEY (`id_personnage`),
    INDEX `index_race_id` (`race_id`),
    INDEX `index_club_id` (`club_id`),
    INDEX `index_capacite_1` (`capacite_1_id`),
    INDEX `index_capacite_2` (`capacite_2_id`),
    INDEX `index_poste_id` (`poste_id`)
) ENGINE = InnoDB;

-- Creation de la table "utilisateur" --

CREATE TABLE IF NOT EXISTS `projet_jeu`.`utilisateur` (
    `id_utilisateur` BIGINT NOT NULL AUTO_INCREMENT ,
    `pseudo` VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `adresse_mail` VARCHAR(250) NOT NULL ,
    `mot_de_passe` VARCHAR(250) NOT NULL ,
    `compte_premium` TINYINT NOT NULL ,
    `personnage_1_id` BIGINT NULL ,
    `personnage_2_id` BIGINT NULL ,
    `personnage_3_id` BIGINT NULL ,
    PRIMARY KEY (`id_utilisateur`),
    INDEX `index_personnage_1` (`personnage_1_id`),
    INDEX `index_personnage_2` (`personnage_2_id`),
    INDEX `index_personnage_3` (`personnage_3_id`),
    UNIQUE `UQ_pseudo` (`pseudo`),
    UNIQUE `UQ_adresse_mail` (`adresse_mail`)
) ENGINE = InnoDB;

-- ajout des cles etrangeres sur "personnage_1_id", "personnage_2_id" et "personnage_3_id" pour lier les tables "utilisateur" et "personnage" --

ALTER TABLE `projet_jeu`.`utilisateur` ADD CONSTRAINT `FK_utilisateur_personnage_1` FOREIGN KEY (`personnage_1_id`) REFERENCES `projet_jeu`.`personnage`(`id_personnage`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `projet_jeu`.`utilisateur` ADD CONSTRAINT `FK_utilisateur_personnage_2` FOREIGN KEY (`personnage_2_id`) REFERENCES `projet_jeu`.`personnage`(`id_personnage`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `projet_jeu`.`utilisateur` ADD CONSTRAINT `FK_utilisateur_personnage_3` FOREIGN KEY (`personnage_3_id`) REFERENCES `projet_jeu`.`personnage`(`id_personnage`) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- Creation de la table "club" --

CREATE TABLE IF NOT EXISTS `projet_jeu`.`club` (
    `id_club` BIGINT NOT NULL AUTO_INCREMENT ,
    `nom_club` VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `proprietaire_id` BIGINT NOT NULL ,
    PRIMARY KEY (`id_club`),
    UNIQUE `UQ_nom_club` (`nom_club`),
    UNIQUE `UQ_proprietaire_id` (`proprietaire_id`)
) ENGINE = InnoDB;

-- Indexage de "proprietaire_id" --

ALTER TABLE `projet_jeu`.`club` ADD INDEX(`proprietaire_id`);

-- ajout de cle etrangere sur "proprietaire_id" pour lier les tables "utilisateur" et "club" --

ALTER TABLE `projet_jeu`.`club` ADD CONSTRAINT `FK_club_utilisateur` FOREIGN KEY (`proprietaire_id`) REFERENCES `projet_jeu`.`utilisateur`(`id_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- Creation de la table "poule" --

CREATE TABLE IF NOT EXISTS `projet_jeu`.`poule` (
    `id_poule` BIGINT NOT NULL AUTO_INCREMENT ,
    `nom_poule` VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `club_id_1` BIGINT NULL ,
    `club_id_2` BIGINT NULL ,
    `club_id_3` BIGINT NULL ,
    `club_id_4` BIGINT NULL ,
    `club_id_5` BIGINT NULL ,
    `club_id_6` BIGINT NULL ,
    `club_id_7` BIGINT NULL ,
    `club_id_8` BIGINT NULL ,
    `club_id_9` BIGINT NULL ,
    `club_id_10` BIGINT NULL ,
    `point_club_1` INT NULL ,
    `point_club_2` INT NULL ,
    `point_club_3` INT NULL ,
    `point_club_4` INT NULL ,
    `point_club_5` INT NULL ,
    `point_club_6` INT NULL ,
    `point_club_7` INT NULL ,
    `point_club_8` INT NULL ,
    `point_club_9` INT NULL ,
    `point_club_10` INT NULL ,
    PRIMARY KEY (`id_poule`),
    INDEX `index_club_id_1` (`club_id_1`),
    INDEX `index_club_id_2` (`club_id_2`),
    INDEX `index_club_id_3` (`club_id_3`),
    INDEX `index_club_id_4` (`club_id_4`),
    INDEX `index_club_id_5` (`club_id_5`),
    INDEX `index_club_id_6` (`club_id_6`),
    INDEX `index_club_id_7` (`club_id_7`),
    INDEX `index_club_id_8` (`club_id_8`),
    INDEX `index_club_id_9` (`club_id_9`),
    INDEX `index_club_id_10` (`club_id_10`)
) ENGINE = InnoDB;

-- Ajout de cles etrangeres pour lier la table "club" et la table "poule" -- 

ALTER TABLE `projet_jeu`.`poule` ADD CONSTRAINT `FK_poule_club_1` FOREIGN KEY (`club_id_1`) REFERENCES `projet_jeu`.`club`(`id_club`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `projet_jeu`.`poule` ADD CONSTRAINT `FK_poule_club_2` FOREIGN KEY (`club_id_2`) REFERENCES `projet_jeu`.`club`(`id_club`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `projet_jeu`.`poule` ADD CONSTRAINT `FK_poule_club_3` FOREIGN KEY (`club_id_3`) REFERENCES `projet_jeu`.`club`(`id_club`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `projet_jeu`.`poule` ADD CONSTRAINT `FK_poule_club_4` FOREIGN KEY (`club_id_4`) REFERENCES `projet_jeu`.`club`(`id_club`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `projet_jeu`.`poule` ADD CONSTRAINT `FK_poule_club_5` FOREIGN KEY (`club_id_5`) REFERENCES `projet_jeu`.`club`(`id_club`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `projet_jeu`.`poule` ADD CONSTRAINT `FK_poule_club_6` FOREIGN KEY (`club_id_6`) REFERENCES `projet_jeu`.`club`(`id_club`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `projet_jeu`.`poule` ADD CONSTRAINT `FK_poule_club_7` FOREIGN KEY (`club_id_7`) REFERENCES `projet_jeu`.`club`(`id_club`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `projet_jeu`.`poule` ADD CONSTRAINT `FK_poule_club_8` FOREIGN KEY (`club_id_8`) REFERENCES `projet_jeu`.`club`(`id_club`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `projet_jeu`.`poule` ADD CONSTRAINT `FK_poule_club_9` FOREIGN KEY (`club_id_9`) REFERENCES `projet_jeu`.`club`(`id_club`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `projet_jeu`.`poule` ADD CONSTRAINT `FK_poule_club_10` FOREIGN KEY (`club_id_10`) REFERENCES `projet_jeu`.`club`(`id_club`) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- Creation de la table "match" --

CREATE TABLE IF NOT EXISTS `projet_jeu`.`match` (
    `id_match` BIGINT NOT NULL AUTO_INCREMENT ,
    `type_match_id` INT NOT NULL ,
    `club_1_id` INT NOT NULL ,
    `club_2_id` INT NOT NULL ,
    `date_match` DATETIME NOT NULL ,
    `score_club_1` INT NOT NULL ,
    `score_club_2` INT NOT NULL ,
    PRIMARY KEY (`id_match`),
    INDEX `index_type_match_id` (`type_match_id`),
    INDEX `index_club_1_id` (`club_1_id`),
    INDEX `index_club_2_id` (`club_2_id`)
) ENGINE = InnoDB;

-- Creation de la table "type_match" -- 

CREATE TABLE IF NOT EXISTS `projet_jeu`.`type_match` (
    `id_type_match` INT NOT NULL AUTO_INCREMENT ,
    `type_match` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
    `points_gagnant` INT NOT NULL ,
    `points_perdant` INT NOT NULL ,
    PRIMARY KEY (`id_type_match`)
) ENGINE = InnoDB;

-- Indexage de "type_match_id" --

ALTER TABLE `projet_jeu`.`match` ADD INDEX(`type_match_id`);

-- Ajout cle etrangere sur "" pour lier les tables "matchs" et "type_match" --

ALTER TABLE `projet_jeu`.`match` ADD CONSTRAINT `FK_match_type_match` FOREIGN KEY (`type_match_id`) REFERENCES `projet_jeu`.`type_match`(`id_type_match`) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- Insertion des deux types de match predefinis dans la table type_match -- 

INSERT IGNORE INTO `projet_jeu`.`type_match`(`type_match`, `points_gagnant`, `points_perdant`) VALUES ('Amical',1,0);
INSERT IGNORE INTO `projet_jeu`.`type_match`(`type_match`, `points_gagnant`, `points_perdant`) VALUES ('Compétitif',15,-15);


-- Insertion de personnages, capacités, utilisateurs et rôles dans le but de tests -- 

INSERT INTO `projet_jeu`.`utilisateur` (`id_utilisateur`, `pseudo`, `adresse_mail`, `mot_de_passe`, `compte_premium`, `personnage_1_id`, `personnage_2_id`, `personnage_3_id`) VALUES (NULL, 'utilisateur_test_1', 'user@mail.com', 'p@ssw0rd', '1', NULL, NULL, NULL);
INSERT INTO `projet_jeu`.`utilisateur` (`id_utilisateur`, `pseudo`, `adresse_mail`, `mot_de_passe`, `compte_premium`, `personnage_1_id`, `personnage_2_id`, `personnage_3_id`) VALUES (NULL, 'utilisateur_test_2', 'user2@mail.com', 'p@ssw0rd', '1', NULL, NULL, NULL);
INSERT INTO `projet_jeu`.`utilisateur` (`id_utilisateur`, `pseudo`, `adresse_mail`, `mot_de_passe`, `compte_premium`, `personnage_1_id`, `personnage_2_id`, `personnage_3_id`) VALUES (NULL, 'utilisateur_test_3', 'user3@mail.com', 'p@ssw0rd', '0', NULL, NULL, NULL);

INSERT INTO `projet_jeu`.`club` (`id_club`, `nom_club`, `proprietaire_id`) VALUES (NULL, 'club_test_1', '1'), (NULL, 'club_test_2', '2');

INSERT INTO `projet_jeu`.`capacite` (`id_capacite`, `nom_capacite`, `type`, `temps_chargement_secondes`, `nom_effet`, `duree_secondes_effet`) VALUES (NULL, 'Duo de Gardiens Fantômes', 'Magie', '300', 'Bouclier', '15'), (NULL, 'Chaussures glissantes', 'Magie', '240', 'Perte de contrôle', '20');

INSERT INTO `projet_jeu`.`personnage` (`id_personnage`, `nom_personnage`, `race_id`, `endurance`, `force`, `tacle`, `defense`, `technique`, `vitesse`, `intelligence`, `tir`, `passe`, `experience`, `niveau`, `club_id`, `illustration`, `biographie`, `capacite_1_id`, `capacite_2_id`, `poste_id`) VALUES (NULL, 'test_personnage_1_gardien', '1', '4', '6', '7', '6', '3', '2', '7', '5', '6', '7', '3', '1', NULL, NULL, '1', NULL, '1'),
 (NULL, 'test_personnage_2_attaquant', '2', '6', '5', '4', '2', '7', '8', '7', '10', '9', '0', '4', NULL, NULL, NULL, '2', NULL, '4');

INSERT INTO `projet_jeu`.`personnage` (`id_personnage`, `nom_personnage`, `race_id`, `endurance`, `force`, `tacle`, `defense`, `technique`, `vitesse`, `intelligence`, `tir`, `passe`, `experience`, `niveau`, `club_id`, `illustration`, `biographie`, `capacite_1_id`, `capacite_2_id`, `poste_id`) VALUES (NULL, 'test_personnage_3_milieu', '4', '9', '7', '7', '5', '6', '7', '8', '6', '9', '0', '0', NULL, NULL, NULL, NULL, NULL, '3');
ALTER TABLE `projet_jeu`.`personnage` CHANGE `force` `strength` TINYINT(4) NOT NULL;
ALTER TABLE `projet_jeu`.`personnage` CHANGE `poste_id` `poste_id` INT(11) NULL;
UPDATE `projet_jeu`.`utilisateur` SET `personnage_1_id`=1,`personnage_2_id`=2 WHERE id_utilisateur = 1;
UPDATE `projet_jeu`.`utilisateur` SET `personnage_1_id`=3 WHERE id_utilisateur = 2;
ALTER TABLE `projet_jeu`.`personnage` CHANGE `illustration` `illustration` LONGBLOB NULL DEFAULT NULL;
ALTER TABLE match RENAME matchs;
INSERT INTO `projet_jeu`.`poule` (`nom_poule`, `club_id_1`, `club_id_2`, `point_club_1`, `point_club_2`) VALUES ('Argent', '1', '2', '0', '0');


INSERT INTO `projet_jeu`.`match` (`id_match`, `type_match_id`, `club_1_id`, `club_2_id`, `date_match`, `score_club_1`, `score_club_2`) VALUES (NULL, '2', '1', '2', '2022-05-27 00:00:00', '0', '0');
