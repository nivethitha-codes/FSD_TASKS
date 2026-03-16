CREATE DATABASE payment_system;

USE payment_system;

CREATE TABLE users(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100),
password VARCHAR(100),
balance INT DEFAULT 5000
);

CREATE TABLE merchants(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
balance INT DEFAULT 10000
);

CREATE TABLE transactions(
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
merchant_id INT,
amount INT,
status VARCHAR(20),
date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO merchants(name,balance)
VALUES
('Amazon Store',10000),
('Flipkart Store',12000),
('Apple Store',20000);