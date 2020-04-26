CREATE DATABASE vacation_db;

USE vacation_db;

CREATE TABLE `User` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `password_hash` varchar(255),
  `email` varchar(255) UNIQUE,
  `type` enum('employee', 'admin')
);

CREATE TABLE `Application` (
   `id` int PRIMARY KEY AUTO_INCREMENT,
   `date_submitted` date,
   `date_from` date,
   `date_to` date,
   `Reason` varchar(255),
   `days_requested` int(8),
   `user_id` int,
   `status` enum('pending', 'approved', 'rejected'),
   FOREIGN KEY (user_id) REFERENCES USER(id)
);

INSERT INTO user (first_name, last_name, password_hash, email, type)  VALUES ('alex', 'k', 'adadadadadadaa', 's', 'employee')
INSERT INTO application (date_submitted, date_from, date_to, Reason, days_requested, user_id, status) VALUES (NOW(), DATE_ADD(now(), INTERVAL 2 DAY), DATE_ADD(now(), INTERVAL 12 DAY), 'tired', 10, 1, 'pending');