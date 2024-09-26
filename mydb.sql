DROP DATABASE IF EXISTS test;
CREATE DATABASE test;

USE test;

CREATE TABLE monsters(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255),
    faction VARCHAR(255) NOT NULL,
    rarity VARCHAR(255) NOT NULL,
    cost INT,
    attack INT,
    hp INT,
    bio TEXT NOT NULL,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO monsters (name, image, faction, rarity, cost, attack, hp, bio)
VALUES 
    ("Nemia", "/storage/images/nemia.png", "Horde", "Champion", 8, 4, 6, "Steal hp when attacking, Sumon Vino in the battle, When killing a unit gain + 2 attack"),
    ("Rune Knight", "/storage/images/runeknight.png", "Arcane", "Common", 3, 2, 4, "All damage taken -1"),
    ("Idol", "/storage/images/idol.jpg", "Order", "Epic", 7, 2, 10, "+ 2 attack and hp to ally monster, All damage taken -1");
