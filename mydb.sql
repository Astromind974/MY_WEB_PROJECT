DROP DATABASE IF EXISTS test;
CREATE DATABASE test;

USE test;

CREATE TABLE Users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    bio TEXT,
    country VARCHAR(2) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Users (email, password, firstname, lastname, bio, country)
VALUES 
    ('hello@world.com', 'password', 'Thomas', 'STONE', 'i love strangers!', 'US'),
    ('hola@munda.com', 'contraseña', 'Javier', 'RODRIGUEZ', 'Me gustan los extranjeros!', 'MX'),
    ('bonjour@monde.com', 'mot de passe', 'Jean', 'DUBOIS', "J'aime les etrangers!", 'FR');

SELECT * FROM Users
