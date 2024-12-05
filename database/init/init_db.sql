-- Création de la table utilisateurs
CREATE TABLE utilisateurs (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(512) NOT NULL
);

-- Création de la table produits
CREATE TABLE produits (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description VARCHAR(512) NOT NULL,
    prix VARCHAR(50) NOT NULL
);

-- Insertion de données dans la table produits
INSERT INTO produits (nom, description, prix) VALUES
('Pain', 'Un pain frais cuit au four', '2.50€'),
('Potirons', 'Potirons de saison, parfaits pour la soupe', '3.00€'),
('Mandarines', 'Mandarines juteuses et sucrées', '4.00€');