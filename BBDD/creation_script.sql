DROP DATABASE IF EXISTS canteen;
CREATE DATABASE IF NOT EXISTS canteen;
USE canteen;

CREATE TABLE IF NOT EXISTS role(
    id_role INTEGER(5) NOT NULL AUTO_INCREMENT,
    role_desc VARCHAR(50) NOT NULL,

    PRIMARY KEY(id_role)
);


CREATE TABLE IF NOT EXISTS user(
    id_user INTEGER(7) NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    hash_password VARCHAR(200) NOT NULL,
    -- telephone_num VARCHAR(15) NOT NULL,
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
    item_comment VARCHAR(500),

    PRIMARY KEY(id_item)
);

CREATE TABLE IF NOT EXISTS menu(
    id_menu INTEGER(6) NOT NULL AUTO_INCREMENT,
    course VARCHAR(50) NOT NULL,
    menu_name VARCHAR(100),

    PRIMARY KEY(id_menu)
);


CREATE TABLE IF NOT EXISTS menu_items(
    id_menu INTEGER(6) NOT NULL,
    id_item INTEGER(6) NOT NULL,
    course VARCHAR(50) NOT NULL,


    FOREIGN KEY(id_menu) REFERENCES menu(id_menu),
    FOREIGN KEY(id_item) REFERENCES items(id_item),
    PRIMARY KEY(id_menu, id_item)
);


CREATE TABLE IF NOT EXISTS reserve(
    id_reserve INTEGER(7) NOT NULL AUTO_INCREMENT,
    id_user INTEGER(7) NOT NULL,
    id_menu INTEGER(6) NOT NULL,
    menu_date DATE NOT NULL,

    PRIMARY KEY(id_reserve),
    FOREIGN KEY(id_user) REFERENCES user(id_user),
    FOREIGN KEY(id_menu) REFERENCES menu(id_menu)
);


CREATE TABLE IF NOT EXISTS transactions(
    id_transaction INTEGER(7) NOT NULL AUTO_INCREMENT,
    id_user INTEGER(7) NOT NULL,
    transaction_quantity FLOAT(7,2) NOT NULL,
    transaction_date DATE NOT NULL,
    transaction_method VARCHAR(100) NOT NULL,

    FOREIGN KEY(id_user) REFERENCES user(id_user),
    PRIMARY KEY(id_transaction)
);

CREATE TABLE IF NOT EXISTS item_allergies(
    id_item INTEGER(6) NOT NULL,
    id_allergy INTEGER(6) NOT NULL,

    FOREIGN KEY(id_item) REFERENCES items(id_item),
    FOREIGN KEY(id_allergy) REFERENCES allergies(id_allergy),
    PRIMARY KEY(id_item, id_allergy)
);

-- INSERTS for the roles
INSERT INTO role(id_role, role_desc) 
VALUES  (1, "non-resident"), 
        (2, "resident"), 
        (3, "worker"), 
        (4, "admin");

-- INSERTS for the 14 mandatory allergens
INSERT INTO allergies(allergy_description)
VALUES  ("Gluten"), ("Crustaceans"), ("Eggs"), ("Fish"), ("Peanuts"),
        ("Soy"), ("Dairy"), ("Celery"), ("Mustard"), ("Sesame"), ("Sulphites"),
        ("Lupines"), ("Mollusks"), ("Shelled fruits");

-- INSERTS for the items available in the menus
INSERT INTO items(item_description)
VALUES  ("Macarrones a la boloñesa"), 
        ("Crema de esparragos"), 
        ("Chuleta de cerdo a la plancha con champis"),
        ("Bacalao ajoarriero"), 
        ("Yogurt"), 
        ("Fruta"), 
        ("Ensalada griega"), 
        ("Empanada de verduras"), 
        ("Revuelto de patatas, jamón y pimientos verdes"), 
        ("Atun a la plancha con piperrada"), 
        ("Lentejas con chorizo"), 
        ("Brochetas de verdura con salsa de yogurt"), 
        ("Carne guisada"), 
        ("Chipirones con vinagreta"), 
        ("Sopa minestrone"),
        ("Tosta de gulas y gambas"), 
        ("Salchicha con tomate"), 
        ("Gallo con cebolla caramelizada"), 
        ("Brazo de nata"), 
        ("Paella de carne"), 
        ("Ensalada de calabaza y mango"), 
        ("Huevos fritos con bacon y patatas"),
        ("Corvina con verduritas"), 
        ("Tortellinis con salsa de champis"), 
        ("Montaditos de calabacín, setas y queso"), 
        ("Ternera rebozada con pimientos de piquillo"), 
        ("Lubina con patata panadera"), 
        ("Alubias rojas con morcilla y guindillas"), 
        ("Acelgas a la casera"), 
        ("Pollo asado a la cerveza con croquetas"), 
        ("Maruca en salsa verde"), 
        ("Pastel vasco"), 
        ("Crema de verduras"), 
        ("Tabuele de quinoa y aguacate"), 
        ("Pizza"), 
        ("Salmonetes con tomatito"), 
        ("Arroz con verduras"), 
        ("Hamburguesas con tomate"), 
        ("Ensalada de atún y pimientos morrones"), 
        ("Tortilla de patatas"), 
        ("Garbanzos con chorizo"), 
        ("Merluza de anzuelo a la plancha con puerro frito"), 
        ("Salchichas al vino blanco con puré"), 
        ("Macarrones con pesto de aguacate"), 
        ("Chuleta de cerdo a la plancha con champis");


-- INSERTS for the allergies produced by the items
INSERT INTO item_allergies(id_item, id_allergy)
VALUES  (1, 1), (1, 3),
        (2, 6), (2, 7),
        (4, 4),
        (5, 7),
        (7, 7),
        (8, 1),
        (10, 4),
        (12, 7),
        (14, 2),
        (15, 8), (15, 7), (15, 1), (15, 3),
        (16, 1), (16, 4),
        (19, 1), (19, 7), (19, 3),
        (22, 3),
        (23, 4),
        (24, 1), (24, 3), (24, 7),
        (25, 7), (25, 1),
        (26, 1), (26, 3),
        (27, 4),
        (31, 4), (31, 1),
        (32, 3), (32, 7),
        (33, 7),
        (34, 1),
        (35, 1), (35, 7),
        (36, 4),
        (39, 4), 
        (40, 3), 
        (42, 4),
        (44, 3), (44, 1);


DELIMITER //
CREATE TRIGGER updateBalance
AFTER INSERT ON transactions
FOR EACH ROW
BEGIN
    UPDATE user SET balance = balance + NEW.transaction_quantity
    WHERE id_user = NEW.id_user;
END; //



DELIMITER //
CREATE TRIGGER updateBalanceReserve
AFTER INSERT ON reserve
FOR EACH ROW
BEGIN
    UPDATE user SET balance = balance - 5.7
    WHERE id_user = NEW.id_user;

    INSERT INTO transactions(id_user, transaction_date, transaction_method, transaction_quantity)
    VALUES(NEW.id_user, NEW.menu_date, "Meal reservation", -5.7);

END; //










