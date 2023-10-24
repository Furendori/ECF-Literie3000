CREATE DATABASE literie3000;
USE literie3000

CREATE TABLE matelas (
    id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    marque VARCHAR(250) NOT NULL,
    nom VARCHAR(250) NOT NULL,
    prix DECIMAL(6,2) NOT NULL,
    taille VARCHAR(15) NOT NULL,
    image varchar(255)
);

INSERT INTO matelas (marque, nom, prix, taille, image)
values
("EPEDA", "Matelas Brigitte", 759.00, "90x190", "https://m.media-amazon.com/images/I/71blIwQRdwL.jpg"),
("DREAMWAY", "Matelas Marine", 809.00, "90x190", "https://m.media-amazon.com/images/I/81OzwVtD4fL._AC_UF1000,1000_QL80_.jpg"),
("BULTEX", "Matelas Positive Attitude", 759.00, "140x190", "https://cdn2.conforama.fr/product/image/4e62/G_CNF_Y98382872_B.jpeg"),
("EPEDA", "Matelas Buro Club", 1019.00, "160x200", "https://www.lelit.fr/wp-content/uploads/2021/05/matelas-SAVOY.png");