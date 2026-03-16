-- Database: task6_logging
CREATE DATABASE IF NOT EXISTS task6_logging;
USE task6_logging;

DROP TABLE IF EXISTS activity_log;
DROP TABLE IF EXISTS users;

CREATE TABLE users(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100)
);

CREATE TABLE activity_log(
log_id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
action_type VARCHAR(50),
action_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
--INSERT Trigger
DELIMITER $$

CREATE TRIGGER user_insert_log
AFTER INSERT ON users
FOR EACH ROW
BEGIN
INSERT INTO activity_log(user_id,action_type)
VALUES(NEW.id,'INSERT');
END$$

DELIMITER ;
--UPDATE Trigger
DELIMITER $$

CREATE TRIGGER user_update_log
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
INSERT INTO activity_log(user_id,action_type)
VALUES(NEW.id,'UPDATE');
END$$

DELIMITER ;
--- Create a view to summarize daily activity
CREATE OR REPLACE VIEW daily_activity_report AS
SELECT 
DATE(action_time) AS activity_date,
action_type,
COUNT(*) AS total_actions
FROM activity_log
GROUP BY DATE(action_time), action_type;