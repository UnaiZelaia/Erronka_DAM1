CREATE DATABASE IF NOT EXISTS canteen_database;
USE canteen_database;

CREATE TABLE IF NOT EXISTS role(
    id_role INTEGER(5) NOT NULL AUTO_INCREMENT,
    role_desc VARCHAR(50) NOT NULL,

    PRIMARY KEY(id_role)
);

CREATE TABLE IF NOT EXISTS user(
    id_user INTEGER(7) NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    username VARCHAR(15) NOT NULL,
    birthdate DATE NOT NULL,
    id_role INTEGER(5) NOT NULL,

    PRIMARY KEY(id_user),
    FOREIGN KEY(id_role) REFERENCES role(id_role)
);

CREATE TABLE IF NOT EXISTS allergies(
    id_allergy INTEGER(6) NOT NULL AUTO_INCREMENT,
    alergy_description VARCHAR(100) NOT NULL,

    PRIMARY KEY(id_allergy)
);


CREATE TABLE IF NOT EXISTS user_allergies(
    id_allergy INTEGER(6) NOT NULL,
    id_user INTEGER(7) NOT NULL,

    PRIMARY KEY(id_allergy, id_user),
    FOREIGN KEY(id_allergy) REFERENCES allergies(id_allergy),
    FOREIGN KEY(id_user) REFERENCES user(id_user)
);


CREATE TABLE IF NOT EXISTS items(
    
)

