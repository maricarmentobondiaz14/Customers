use customers;
CREATE TABLE customer(
    customerID int PRIMARY KEY AUTO_INCREMENT,
    customerName varchar(30) NOT NULL,
    contactName varchar(30) NOT NULL,
    address varchar(50) NOT NULL,
    city varchar(40) NOT NULL,
    postalCode varchar(5) NOT NULL,
    country varchar(40) NOT NULL
);