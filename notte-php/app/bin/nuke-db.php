<?php

$db = require '/app/lib/db.php';

$statements = [
  'DROP TABLE users',
  'DROP TABLE user_sessions',
  'DROP TABLE notes',
];

foreach($statements as $statement) {
  $db->exec($statement);
}