<?php

$db = require '/app/lib/db.php';

$statements = [
  'CREATE TABLE users(
    id INT AUTO_INCREMENT,
    username VARCHAR(255),
    password_digest varchar(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
  )',
  'CREATE TABLE notes(
    id INT AUTO_INCREMENT,
    note TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP,
    user_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
  )',
  'CREATE TABLE user_sessions(
    id INT AUTO_INCREMENT,
    token VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP,
    user_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
  )'
];

foreach($statements as $statement) {
  $db->exec($statement);
}