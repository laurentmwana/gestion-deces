CREATE TABLE `category` (
	`id` INT(11) NOT NULL,
	`categorie` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`createdate` DATETIME NOT NULL,
	`updatedate` DATETIME NOT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;
