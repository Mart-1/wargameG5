CREATE TABLE utilisateurs (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(512) NOT NULL,
    session_token VARCHAR(64) DEFAULT NULL,
    profilepicture BYTEA
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
('Flag{2nd_0rder_SQLi_1s_fun}', 'Flag{2nd_0rder_SQLi_1s_fun}', 'Flag{2nd_0rder_SQLi_1s_fun}', 'Flag{2nd_0rder_SQLi_1s_fun}'),
('Flag{D3fault_@dmin_Cr3ds}', 'Flag{D3fault_@dmin_Cr3ds}', 'Vulnfood', '$2y$10$MSE1OloZlt0EKw2VQC3y/O5ZGYBV0UGe7c1r46oQACVZZYBAGoa7C'),
('lobel', 'martin', 'martin@gmail.com', '$2y$10$1PaubEeosNqdTRwgTCIPjOp/0kZLGC7dZn9Gi26hr3X8Lach/Sim2');