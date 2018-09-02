CREATE SCHEMA `test2`;


CREATE TABLE `contacts`.`contact` (
  `conid` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL DEFAULT 'contact name',
  `phone` VARCHAR(45) NOT NULL DEFAULT 'contact phone',
  `email` VARCHAR(255) NULL DEFAULT 'contact mail',
  PRIMARY KEY (`conid`));
