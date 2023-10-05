#
# Table structure for table 'Editable'
#

DROP TABLE IF EXISTS `Editable`;

CREATE TABLE `Editable` (
  `email` VARCHAR(255) NOT NULL, 
  `name` VARCHAR(255),
  INDEX (`email`), 
  PRIMARY KEY (`email`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

INSERT INTO `Editable` (`name`,`email`) VALUES ('Hansen','bjorn.hansen@yahoo.no');
INSERT INTO `Editable` (`name`,`email`) VALUES ('Tremblay','ftremblay@gmail.com');
INSERT INTO `Editable` (`name`,`email`) VALUES ('Gruber','astrid.gruber@apple.at');

