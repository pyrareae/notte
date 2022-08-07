<?php
namespace Model;

class Application {
  protected $db;

  public function __construct() {
    $this->db = require '/app/lib/db.php';
  }
}