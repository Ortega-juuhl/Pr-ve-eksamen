-- -----------------------------------------------------
-- Table `fjell`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fjell`.`user` (
  `userID` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`userID`))

-- -----------------------------------------------------
-- Table `fjell`.`ticketsystem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fjell`.`ticketsystem` (
  `ticketID` INT(11) NOT NULL AUTO_INCREMENT,
  `navn` VARCHAR(255) NULL,
  `epost` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `userID` INT(11) NOT NULL,
  `CategoryID` INT(11) NOT NULL,
  PRIMARY KEY (`ticketID`),
  FOREIGN KEY (`userID`)
  REFERENCES `fjell`.`user` (`userID`));
  FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)

-- -----------------------------------------------------
-- Table `fjell`.`Categori`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fjell`.`Categories` (
  `CategoryID` INT(11) NOT NULL AUTO_INCREMENT,
  `Category_name` VARCHAR(255) NOT NULL,
  `Category_description` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`CategoryID`));