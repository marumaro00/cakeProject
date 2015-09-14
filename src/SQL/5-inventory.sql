CREATE TABLE IF NOT EXISTS adjustment_type(
	id INT(10) NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (name)
)ENGINE=InnoDB;
INSERT INTO adjustment_type VALUES(NULL, 'initial'),(NULL, 'increase'),(NULL, 'decrease');

CREATE TABLE IF NOT EXISTS inventory(
	item_id INT(10) NOT NULL,
	reference_date TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
	location_id INT(10),
	previous_quantity INT(10) NOT NULL DEFAULT 0,
	quantity INT(10) NOT NULL DEFAULT 0,
	adjustment INT(10) NOT NULL DEFAULT 0,
	adjustment_type INT(10) NOT NULL DEFAULT 1,
	PRIMARY KEY (item_id,reference_date),
	FOREIGN KEY (item_id)
		REFERENCES item(id)
		ON DELETE CASCADE,
	FOREIGN KEY (location_id)
		REFERENCES location(id)
		ON DELETE CASCADE,
	FOREIGN KEY (adjustment_type)
		REFERENCES adjustment_type(id)
		ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS inventory_waste_type(
	id INT(10) NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (name)
)ENGINE=InnoDB;

INSERT INTO inventory_waste_type VALUES(NULL,'Damaged'),(NULL,'Returned');

CREATE TABLE inventory_waste(
	item_id INT(10) NOT NULL,
	reference_date TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
	quantity INT(10) NOT NULL DEFAULT 0,
	waste_type INT(10) NOT NULL DEFAULT 1,
	PRIMARY KEY (item_id,reference_date),
	FOREIGN KEY (item_id)
		REFERENCES item(id)
		ON DELETE CASCADE,
	FOREIGN KEY (waste_type)
		REFERENCES inventory_waste_type(id)
		ON DELETE CASCADE
)ENGINE=InnoDB;
	
DELIMITER ;;

CREATE TRIGGER inventory_trigger
BEFORE INSERT ON inventory
FOR EACH ROW
	BEGIN
		DECLARE tmp_qty INT DEFAULT 0;
		SELECT quantity FROM inventory
			WHERE item_id = NEW.item_id
			ORDER BY reference_date DESC
			LIMIT 1
			INTO tmp_qty;
		IF NEW.adjustment_type = 1 THEN
			SET NEW.quantity = NEW.adjustment;
		ELSEIF NEW.adjustment_type = 2 THEN
			SET NEW.quantity = tmp_qty + NEW.adjustment;
		ELSEIF NEW.adjustment_type = 3 THEN
			SET NEW.quantity = tmp_qty - NEW.adjustment;
		END IF;
		SET NEW.previous_quantity = tmp_qty;
	END;;
	
CREATE TRIGGER inventory_waste_trigger
BEFORE INSERT ON inventory_waste
FOR EACH ROW
	BEGIN
		DECLARE tmp_prev INT DEFAULT 0;
		DECLARE tmp_qty INT DEFAULT 0;
		DECLARE tmp_adj INT DEFAULT 0;
		SET tmp_adj = NEW.quantity;
		IF NEW.waste_type = 1 THEN
			INSERT INTO inventory VALUES(NEW.item_id,NULL,NULL,0,0,tmp_adj,3);
		END IF;
	END;;
	
DELIMITER ;