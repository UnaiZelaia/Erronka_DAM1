INSERT INTO canteen.`user` (name,surname,email,hash_password,birthdate,id_role,balance) VALUES
	 ('unai','zelaia','unai@gmail.com','$2y$10$M5wVDzOhxLPg892d7C.PMuStpgHXtjKD.ud/nx3kP4LPdvXQrNTam','1998-01-17',1,0.0),
	 ('default','default','default@cook.uni','$2y$10$AvIlyMvG.iL2qxF7EPt0veU7usWvRdcevF4sE8qg8VoZdqb1fatQy','2023-01-10',4,-5.7);

INSERT INTO canteen.menu (meal,menu_name) VALUES
	 ('Lunch','default');
INSERT INTO canteen.menu_items (id_menu,id_item,course) VALUES
	 (1,1,'1'),
	 (1,3,'2'),
	 (1,4,'2'),
	 (1,5,'3'),
	 (1,6,'3'),
	 (1,7,'1');
INSERT INTO canteen.reserve (id_user,id_menu,menu_date) VALUES
	 (2,1,'2023-04-21');

INSERT INTO canteen.transactions (id_user,transaction_quantity,transaction_date,transaction_method) VALUES
	 (2,-5.7,'2023-04-21','Meal reservation'),
	 (1,-5.7,'2023-04-21','Meal reservation');
