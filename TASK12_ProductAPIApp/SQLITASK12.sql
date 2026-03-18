create database productdb;
use productdb;

create table product(
    product_id int auto_increment primary key,
    product_name varchar(100),
    product_cost double,
    product_company varchar(100)
);
select * from product;