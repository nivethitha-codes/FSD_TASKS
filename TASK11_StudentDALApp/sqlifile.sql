CREATE DATABASE student_dal_db;
USE student_dal_db;
CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    department VARCHAR(50),
    age INT
);
select * from students;