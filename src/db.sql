CREATE TABLE CustomerAdmin(
c_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
admin INT(1) NOT NULL
);

ALTER TABLE CustomerAdmin ADD UNIQUE INDEX (username);

CREATE TABLE Product(
p_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
p_name VARCHAR(30) NOT NULL,
p_category VARCHAR(30) NOT NULL,
p_sub VARCHAR(30) NOT NULL,
p_colour VARCHAR(30) NOT NULL,
p_price DECIMAL(5,2) NOT NULL,
p_quantity INT(6) NOT NULL,
p_description VARCHAR(1000)
);


CREATE TABLE Review(
R_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
c_id INT(6) UNSIGNED,
p_id INT(6) UNSIGNED,
foreign key (c_id) references CustomerAdmin(c_id),
foreign key (p_id) references Product(p_id),
star INT(2),
comments VARCHAR(500)
);

CREATE TABLE Question(
Q_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
c_id INT(6) UNSIGNED,
p_id INT(6) UNSIGNED,
foreign key (c_id) references CustomerAdmin(c_id),
foreign key (p_id) references Product(p_id),
content VARCHAR(500)
);

CREATE TABLE Cart(
CA_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
c_id INT(6) UNSIGNED,
p_id INT(6) UNSIGNED,
c_quantity INT(6),
foreign key (p_id) references Product(p_id),
foreign key (c_id) references CustomerAdmin(c_id)
);

CREATE TABLE Favourite(
c_id INT(6) UNSIGNED,
p_id INT(6) UNSIGNED,
foreign key (p_id) references Product(p_id),
foreign key (c_id) references CustomerAdmin(c_id)
);



/*

drop table cart;
drop table question;
drop table review;
drop table product;
drop table CustomerAdmin;
*/