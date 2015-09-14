CREATE TABLE IF NOT EXISTS item (
	id INT(10) NOT NULL AUTO_INCREMENT,
	code VARCHAR(25) NOT NULL, 
	name VARCHAR(255) NOT NULL,
	category_id INT(10),
	description VARCHAR(255),
	item_type_id INT(10) NOT NULL,
	store_unit INT(10) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY(category_id)
		REFERENCES item_category(id)
		ON DELETE CASCADE,
	FOREIGN KEY(item_type_id)
		REFERENCES item_type(id)
		ON DELETE CASCADE,
	FOREIGN KEY (store_unit)
		REFERENCES unit(id)
		ON DELETE CASCADE,
	UNIQUE (code)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS item_measure (
	item_id INT(10) NOT NULL,
	size VARCHAR(50) NOT NULL,
	size_unit INT(10) NOT NULL,
	weight VARCHAR(50) NOT NULL,
	weight_unit INT(10) NOT NULL,
	remarks VARCHAR(255),
	PRIMARY KEY (item_id),
	FOREIGN KEY (size_unit)
		REFERENCES unit(id)
		ON DELETE CASCADE,
	FOREIGN KEY (weight_unit)
		REFERENCES unit(id)
		ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS item_point (
	item_id INT(10) NOT NULL,
	reorder_point INT(10) NOT NULL,
	reorder_quantity INT(10) NOT NULL,
	alert_point INT(10) NOT NULL,
	PRIMARY KEY (item_id),
	FOREIGN KEY (item_id)
		REFERENCES item(id)
		ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS supplier_item_price(
	item_id INT(10) NOT NULL,
	supplier_id INT(10) NOT NULL,
	reference_date TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
	price DECIMAL(10,2),
	PRIMARY KEY(item_id,supplier_id,reference_date),
	FOREIGN KEY (item_id)
		REFERENCES item(id)
		ON DELETE CASCADE,
	FOREIGN KEY (supplier_id)
		REFERENCES supplier(id)
		ON DELETE CASCADE
)ENGINE=InnoDB; 

CREATE TABLE IF NOT EXISTS item_price (
	item_id INT(10) NOT NULL,
	reference_date DATE NOT NULL,
	cost DECIMAL(10,2) NOT NULL,
	type VARCHAR(255),
	unit INT(10),
	PRIMARY KEY (item_id),
	FOREIGN KEY (item_id)
		REFERENCES item(id)
		ON DELETE CASCADE,
	FOREIGN KEY (unit)
		REFERENCES unit(id)
		ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS supplier_item(
	supplier_id INT(10) NOT NULL,
	item_id INT(10) NOT NULL,
	supplier_item_code VARCHAR(255),
	status INT(10) NOT NULL DEFAULT 1,
	PRIMARY KEY (supplier_id,item_id),
	FOREIGN KEY (supplier_id)
		REFERENCES supplier(id)
		ON DELETE CASCADE,
	FOREIGN KEY (item_id)
		REFERENCES item(id)
		ON DELETE CASCADE,
	FOREIGN KEY (status)
		REFERENCES supplier_item_status(id)
		ON DELETE CASCADE
)ENGINE=InnoDB;