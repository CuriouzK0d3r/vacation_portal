CREATE DATABASE vacation_db;

USE vacation_db;

DROP TABLE Application;
DROP TABLE User;

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

INSERT INTO user (first_name, last_name, password_hash, email, type)  VALUES ('Curiouz', 'K0d3r', '13d249f2cb4127b40cfa757866850278793f814ded3c587fe5889e889a7a9f6c', 'my@mail.gr', 'admin');
