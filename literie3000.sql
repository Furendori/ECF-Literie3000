CREATE DATABASE literie3000;
USE literie3000

CREATE TABLE matelas (
    id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    marque VARCHAR(250) NOT NULL,
    nom VARCHAR(250) NOT NULL,
    prix DECIMAL(6,2) NOT NULL,
    taille VARCHAR(15) NOT NULL
);

INSERT INTO matelas (marque, nom, prix, taille)
values
("EPEDA", "Matelas Brigitte", 759.00, "90x190"),
("DREAMWAY", "Matelas Marine", 809.00, "90x190"),
("BULTEX", "Matelas Positive Attitude", 759.00, "140x190"),
("EPEDA", "Matelas Buro Club", 1019.00, "160x200");