CREATE DATABASE IF NOT EXISTS product_app;

USE product_app;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    product_name VARCHAR(100),
    price DECIMAL(10,2),
    total_sold INT
);
