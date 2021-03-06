CREATE TABLE IF NOT EXISTS supplier (
	id INT(10) NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	phone VARCHAR(50) NOT NULL,
	email VARCHAR(255) NOT NULL,
	remarks VARCHAR(255),
	PRIMARY KEY (id),
	UNIQUE (email)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS supplier_detail (
	supplier_id INT(10) NOT NULL,
	street VARCHAR(255) NOT NULL,
	city VARCHAR(50) NOT NULL,
	country VARCHAR(100),
	postal_code VARCHAR(16),
	PRIMARY KEY (supplier_id),
	FOREIGN KEY (supplier_id)
		REFERENCES supplier(id)
		ON DELETE CASCADE
)ENGINE=InnoDB;
