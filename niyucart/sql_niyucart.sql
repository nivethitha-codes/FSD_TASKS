use niyucart;
SELECT * FROM users;
SELECT * FROM products;
SELECT * FROM cart;
SELECT * FROM orders;
SELECT * FROM order_items;

SELECT 
o.id AS order_id,
u.name AS user,
p.name AS product,
oi.quantity,
oi.price
FROM orders o
JOIN users u ON o.user_id = u.id
JOIN order_items oi ON o.id = oi.order_id
JOIN products p ON oi.product_id = p.id
ORDER BY o.id DESC;


SELECT c.user_id, p.name, c.quantity
FROM cart c
JOIN products p ON c.product_id = p.id;

