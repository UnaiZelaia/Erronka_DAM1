INSERT INTO canteen.allergies (allergy_description) VALUES
	 ('Gluten'),
	 ('Crustaceans'),
	 ('Eggs'),
	 ('Fish'),
	 ('Peanuts'),
	 ('Soy'),
	 ('Dairy'),
	 ('Celery'),
	 ('Mustard'),
	 ('Sesame');
INSERT INTO canteen.allergies (allergy_description) VALUES
	 ('Sulphites'),
	 ('Lupines'),
	 ('Mollusks'),
	 ('Shelled fruits');
INSERT INTO canteen.items (item_description,item_comment) VALUES
	 ('Macarrones a la boloñesa',NULL),
	 ('Crema de esparragos',NULL),
	 ('Chuleta de cerdo a la plancha con champis',NULL),
	 ('Bacalao ajoarriero',NULL),
	 ('Yogurt',NULL),
	 ('Fruta',NULL),
	 ('Ensalada griega',NULL),
	 ('Empanada de verduras',NULL),
	 ('Revuelto de patatas, jamón y pimientos verdes',NULL),
	 ('Atun a la plancha con piperrada',NULL);
INSERT INTO canteen.items (item_description,item_comment) VALUES
	 ('Lentejas con chorizo',NULL),
	 ('Brochetas de verdura con salsa de yogurt',NULL),
	 ('Carne guisada',NULL),
	 ('Chipirones con vinagreta',NULL),
	 ('Sopa minestrone',NULL),
	 ('Tosta de gulas y gambas',NULL),
	 ('Salchicha con tomate',NULL),
	 ('Gallo con cebolla caramelizada',NULL),
	 ('Brazo de nata',NULL),
	 ('Paella de carne',NULL);
INSERT INTO canteen.items (item_description,item_comment) VALUES
	 ('Ensalada de calabaza y mango',NULL),
	 ('Huevos fritos con bacon y patatas',NULL),
	 ('Corvina con verduritas',NULL),
	 ('Tortellinis con salsa de champis',NULL),
	 ('Montaditos de calabacín, setas y queso',NULL),
	 ('Ternera rebozada con pimientos de piquillo',NULL),
	 ('Lubina con patata panadera',NULL),
	 ('Alubias rojas con morcilla y guindillas',NULL),
	 ('Acelgas a la casera',NULL),
	 ('Pollo asado a la cerveza con croquetas',NULL);
INSERT INTO canteen.items (item_description,item_comment) VALUES
	 ('Maruca en salsa verde',NULL),
	 ('Pastel vasco',NULL),
	 ('Crema de verduras',NULL),
	 ('Tabuele de quinoa y aguacate',NULL),
	 ('Pizza',NULL),
	 ('Salmonetes con tomatito',NULL),
	 ('Arroz con verduras',NULL),
	 ('Hamburguesas con tomate',NULL),
	 ('Ensalada de atún y pimientos morrones',NULL),
	 ('Tortilla de patatas',NULL);
INSERT INTO canteen.items (item_description,item_comment) VALUES
	 ('Garbanzos con chorizo',NULL),
	 ('Merluza de anzuelo a la plancha con puerro frito',NULL),
	 ('Salchichas al vino blanco con puré',NULL),
	 ('Macarrones con pesto de aguacate',NULL),
	 ('Chuleta de cerdo a la plancha con champis',NULL);
INSERT INTO canteen.menu (meal,menu_name) VALUES
	 ('Lunch','default');
INSERT INTO canteen.`role` (role_desc) VALUES
	 ('non-resident'),
	 ('resident'),
	 ('worker'),
	 ('admin');
INSERT INTO canteen.item_allergies (id_item,id_allergy) VALUES
	 (1,1),
	 (1,3),
	 (2,6),
	 (2,7),
	 (4,4),
	 (5,7),
	 (7,7),
	 (8,1),
	 (10,4),
	 (12,7);
INSERT INTO canteen.item_allergies (id_item,id_allergy) VALUES
	 (14,2),
	 (15,1),
	 (15,3),
	 (15,7),
	 (15,8),
	 (16,1),
	 (16,4),
	 (19,1),
	 (19,3),
	 (19,7);
INSERT INTO canteen.item_allergies (id_item,id_allergy) VALUES
	 (22,3),
	 (23,4),
	 (24,1),
	 (24,3),
	 (24,7),
	 (25,1),
	 (25,7),
	 (26,1),
	 (26,3),
	 (27,4);
INSERT INTO canteen.item_allergies (id_item,id_allergy) VALUES
	 (31,1),
	 (31,4),
	 (32,3),
	 (32,7),
	 (33,7),
	 (34,1),
	 (35,1),
	 (35,7),
	 (36,4),
	 (39,4);
INSERT INTO canteen.item_allergies (id_item,id_allergy) VALUES
	 (40,3),
	 (42,4),
	 (44,1),
	 (44,3);
INSERT INTO canteen.menu_items (id_menu,id_item,course) VALUES
	 (1,1,'1'),
	 (1,3,'2'),
	 (1,4,'2'),
	 (1,5,'3'),
	 (1,6,'3'),
	 (1,7,'1');
INSERT INTO canteen.`user` (name,surname,email,hash_password,birthdate,id_role,balance) VALUES
	 ('unai','zelaia','unai@gmail.com','$2y$10$M5wVDzOhxLPg892d7C.PMuStpgHXtjKD.ud/nx3kP4LPdvXQrNTam','1998-01-17',1,-79.8),
	 ('default','default','default@cook.uni','$2y$10$AvIlyMvG.iL2qxF7EPt0veU7usWvRdcevF4sE8qg8VoZdqb1fatQy','2023-01-10',4,-5.7);
INSERT INTO canteen.reserve (id_user,id_menu,menu_date) VALUES
	 (1,1,'0023-04-19'),
	 (1,1,'2023-04-20'),
	 (2,1,'2023-04-19'),
	 (1,1,'2023-04-19'),
	 (1,1,'2023-04-19'),
	 (1,1,'2023-04-19'),
	 (1,1,'2023-04-19'),
	 (1,1,'2023-04-19'),
	 (1,1,'2023-04-19');
INSERT INTO canteen.transactions (id_user,transaction_quantity,transaction_date,transaction_method) VALUES
	 (1,-5.7,'0023-04-19','Meal reservation'),
	 (1,-5.7,'2023-04-20','Meal reservation'),
	 (2,-5.7,'2023-04-19','Meal reservation'),
	 (1,-5.7,'2023-04-19','Meal reservation'),
	 (1,-5.7,'2023-04-19','Meal reservation'),
	 (1,-5.7,'2023-04-19','Meal reservation'),
	 (1,-5.7,'2023-04-19','Meal reservation'),
	 (1,-5.7,'2023-04-19','Meal reservation'),
	 (1,-5.7,'2023-04-19','Meal reservation'),
	 (1,-5.7,'2023-04-19','Meal reservation');
INSERT INTO canteen.transactions (id_user,transaction_quantity,transaction_date,transaction_method) VALUES
	 (1,-5.7,'2023-04-19','Meal reservation'),
	 (1,-5.7,'2023-04-19','Meal reservation');
