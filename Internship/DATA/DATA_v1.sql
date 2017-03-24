-- DATA_TB2
CREATE TABLE `DATA`.`DATA_TB2` (
	`idx`     INT          NOT NULL, -- idx
	`country` VARCHAR(100) NOT NULL, -- country
	`code`    CHAR(3)      NOT NULL, -- code
	`jan`     FLOAT        NOT NULL, -- jan
	`feb`     FLOAT        NOT NULL, -- feb
	`mar`     FLOAT        NOT NULL, -- mar
	`apr`     FLOAT        NOT NULL, -- apr
	`may`     FLOAT        NOT NULL, -- may
	`jun`     FLOAT        NOT NULL  -- jun
);

-- DATA_TB2
ALTER TABLE `DATA`.`DATA_TB2`
	ADD CONSTRAINT `PK_DATA_TB3` -- DATA_TB2 �⺻Ű
		PRIMARY KEY (
			`idx` -- idx
		);

ALTER TABLE `DATA`.`DATA_TB2`
	MODIFY COLUMN `idx` INT NOT NULL AUTO_INCREMENT;
