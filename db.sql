-- -----------------------------------------------------
-- Table `fjell`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `userID` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`userID`)
);

-- -----------------------------------------------------
-- Table `fjell`.`ticketsystem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ticketsystem` (
  `ticketID` INT(11) NOT NULL AUTO_INCREMENT,
  `userID` INT(11) NOT NULL,
  `navn` VARCHAR(255) NULL,
  `epost` VARCHAR(255) NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`ticketID`),
  FOREIGN KEY (`userID`) REFERENCES `user` (`userID`)
);

-- -----------------------------------------------------
-- Table `fjell`.`Categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fjell`.`Categories` (
  `CategoryID` INT(11) NOT NULL AUTO_INCREMENT,
  `Category_name` VARCHAR(255) NOT NULL,
  `Category_description` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`CategoryID`)
);

-- Add a default category with ID 1 if not already present
INSERT IGNORE INTO `fjell`.`Categories` (`CategoryID`, `Category_name`, `Category_description`) VALUES (1, 'Default Category', 'Default Category Description');
