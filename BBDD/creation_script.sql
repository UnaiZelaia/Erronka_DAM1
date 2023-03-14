
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
    balance FLOAT(7, 2),

    PRIMARY KEY(id_user),
    FOREIGN KEY(id_role) REFERENCES role(id_role)
);

CREATE TABLE IF NOT EXISTS allergies(
    id_allergy INTEGER(6) NOT NULL AUTO_INCREMENT,
    allergy_description VARCHAR(100) NOT NULL,

    PRIMARY KEY(id_allergy)
);


CREATE TABLE IF NOT EXISTS user_allergies(
    id_allergy INTEGER(6) NOT NULL,
    id_user INTEGER(7) NOT NULL,

    FOREIGN KEY(id_allergy) REFERENCES allergies(id_allergy),
    FOREIGN KEY(id_user) REFERENCES user(id_user),
    PRIMARY KEY(id_allergy, id_user)
);


CREATE TABLE IF NOT EXISTS items(
    id_item INTEGER(6) NOT NULL AUTO_INCREMENT,
    item_description VARCHAR(100) NOT NULL,
    id_allergy INTEGER(6),

    PRIMARY KEY(id_item),
    FOREIGN KEY(id_allergy) REFERENCES allergies(id_allergy)
);

CREATE TABLE IF NOT EXISTS menu(
    id_menu INTEGER(6) NOT NULL AUTO_INCREMENT,
    type VARCHAR(50) NOT NULL,
    name VARCHAR(100),

    PRIMARY KEY(id_menu)
);


CREATE TABLE IF NOT EXISTS menu_items(
    id_menu INTEGER(6) NOT NULL,
    id_item INTEGER(6) NOT NULL,

    FOREIGN KEY(id_menu) REFERENCES menu(id_menu),
    FOREIGN KEY(id_item) REFERENCES items(id_item),
    PRIMARY KEY(id_menu, id_item)
);


CREATE TABLE IF NOT EXISTS reserve(
    id_user INTEGER(7) NOT NULL,
    id_menu INTEGER(6) NOT NULL,
    menu_date DATE NOT NULL,

    FOREIGN KEY(id_user) REFERENCES user(id_user),
    FOREIGN KEY(id_menu) REFERENCES menu(id_menu),
    PRIMARY KEY(id_user, id_menu, menu_date)
);




-- INSERTS for the 14 mandatory allergens
INSERT INTO allergies(allergy_description)
VALUES ("Gluten"), ("Crustaceans"), ("Eggs"), ("Fish"), ("Peanuts"),
    ("Soy"), ("Dairy"), ("Celery"), ("Mustard"), ("Sesame"), ("Sulphites"),
    ("Lupines"), ("Mollusks"), ("Shelled fruits");

