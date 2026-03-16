CREATE DATABASE studentsdb;
USE studentsdb;

CREATE TABLE studentsnew (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    department VARCHAR(50),
    age INT
);

SELECT * FROM studentsnew;