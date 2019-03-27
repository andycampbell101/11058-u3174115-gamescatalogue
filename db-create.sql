CREATE DATABASE game_catalogue;

use game_catalogue;

CREATE TABLE games (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	gamename VARCHAR(30) NOT NULL,
	gameconsolebrand VARCHAR(50) NOT NULL,
	gameconsolename VARCHAR(50) NOT NULL,
	gameyear VARCHAR(30),
	date TIMESTAMP
);

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    date TIMESTAMP
);
