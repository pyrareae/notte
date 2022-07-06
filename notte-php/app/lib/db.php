<?php

function connect() {
  try {
    $db_name = $_SERVER['MYSQL_DATABASE'];
    return new PDO(
      "mysql:host=mysql;dbname=$db_name;charset=UTF8", 
      $_SERVER['MYSQL_USER'], 
      $_SERVER['MYSQL_PASSWORD']
    );
  } catch (PDOExcpetion $e) {
    die($e->getMessage());
  }
}

return connect();