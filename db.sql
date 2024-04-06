-- Table `fjell`.`user`
CREATE TABLE IF NOT EXISTS `user` (
  `userID` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`userID`)
);

-- Table `fjell`.`Categories`
CREATE TABLE IF NOT EXISTS `fjell`.`Categories` (
  `CategoryID` INT(11) NOT NULL DEFAULT 1,
  `Category_name` VARCHAR(255) NOT NULL,
  `Category_description` TEXT NOT NULL,
  PRIMARY KEY (`CategoryID`)
);

-- Table `fjell`.`ticketsystem`
CREATE TABLE IF NOT EXISTS `ticketsystem` (
  `ticketID` INT(11) NOT NULL AUTO_INCREMENT,
  `userID` INT(11) NOT NULL,
  `CategoryID` INT(11) NOT NULL DEFAULT 1,
  `title` VARCHAR(255),
  `description` TEXT NULL,
  PRIMARY KEY (`ticketID`),
  FOREIGN KEY (`CategoryID`) REFERENCES `Categories` (`CategoryID`) -- Add foreign key reference to Categories table
);

INSERT INTO Categories (CategoryID, Category_name, Category_description) VALUES ('1', 'Not Taken', 'Ticket not assigned to any admin yet');
INSERT INTO Categories (CategoryID, Category_name, Category_description) VALUES ('2', 'Under Progress', 'Ticket currently being handled by an admin');
INSERT INTO Categories (CategoryID, Category_name, Category_description) VALUES ('3', 'Finished', 'Ticket has been resolved and closed');
