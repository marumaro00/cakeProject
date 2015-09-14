CREATE TABLE IF NOT EXISTS purchase_order_status(
	id INT(10) NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY(id)
)ENGINE=InnoDB;
INSERT INTO purchase_order_status VALUES(NULL,'Paid'),(NULL,'Unpaid'),(NULL,'Partial'),(NULL,'Owing');

CREATE TABLE IF NOT EXISTS supplier_item_status(
	id INT(10) NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB;
INSERT INTO supplier_item_status VALUES(NULL,'selling'),(NULL,'not selling'),(NULL,'deleted');

CREATE TABLE IF NOT EXISTS item_type(
	id INT(10) NOT NULL AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB;
INSERT INTO item_type VALUES(NULL,'stockable'),(NULL,'non-stockable'),(NULL,'service');

CREATE TABLE IF NOT EXISTS unit_type(
	id INT(10) NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB;
INSERT INTO unit_type VALUES(NULL,'measure'),(NULL,'store');