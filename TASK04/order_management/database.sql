CREATE TABLE customers(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100)
);

CREATE TABLE products(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
price INT
);

CREATE TABLE orders(
id INT AUTO_INCREMENT PRIMARY KEY,
customer_id INT,
product_id INT,
quantity INT,
order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO customers(name,email) VALUES
('John','john@mail.com'),
('Alice','alice@mail.com'),
('David','david@mail.com');

INSERT INTO products(name,price) VALUES
('Laptop',55000),
('Mouse',1200),
('Keyboard',2500),
('Monitor',12000),
('Smart Watch',7000),
('Headphones',3000),
('Tablet',20000),
('Speaker',1800),
('Router',2500),
('Microphone',4000),
('Camera',35000),
('Tripod',1500),
('Gaming Chair',9000),
('Desk Lamp',1200),
('SSD',6000),
('External HDD',5000),
('USB Cable',300),
('Cooling Pad',1200),
('Laptop Bag',1800),
('Webcam',2200),
('Smart Bulb',700),
('VR Headset',15000),
('Gaming Controller',3500),
('Projector',9000),
('Stylus Pen',1400),
('Graphics Tablet',8000),
('Office Chair',7500),
('Power Bank',1500),
('Bluetooth Speaker',2500),
('Phone Stand',400);