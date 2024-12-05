CREATE TABLE utilisateurs (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(512) NOT NULL,
    session_token VARCHAR(64) DEFAULT NULL
);

CREATE TABLE produits (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description VARCHAR(512) NOT NULL,
    prix VARCHAR(50) NOT NULL
);

CREATE TABLE commandes (
    id SERIAL PRIMARY KEY,
    utilisateur_id INT NOT NULL,
    nombre_pain INT,
    nombre_potiron INT,
    nombre_mandarines INT,
    CONSTRAINT fk_utilisateur
        FOREIGN KEY (utilisateur_id)
        REFERENCES utilisateurs(id)
);

INSERT INTO produits (nom, description, prix) VALUES
('Pain', 'Un pain frais cuit au four', '2.50€'),
('Potirons', 'Potirons de saison, parfaits pour la soupe', '3.00€'),
('Mandarines', 'Mandarines juteuses et sucrées', '4.00€');

INSERT INTO utilisateurs(nom, prenom, email, password) VALUES
('root', 'root', 'root', 'root');