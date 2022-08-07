<?php
namespace Model;

require_once 'application_model.php';

class Session extends Application {
  public function createSession($username, $email) {
    $token = random_bytes(255);
    
  }

  public function findSession($token) {
    return $this->db->prepare('
      SELECT * FROM user_sessions
      WHERE token = :token
    ')->execute(array(
      'token' => $token
    ))->fetchObject();
  }

  public function destroySession($token) {
    return $this->db->prepare('
      DELETE from user_sessions
      WHERE token = :token
    ')->execute(array(
      'token' => $token
    ));
  }

  public function destroyAllSessionsForUser($user_id) {
    return $this->db->prepare('
      DELETE from user_sessions
      WHERE user_id = :user_id
    ')->execute(array(
      'user_id' => $user_id
    ));
  }


  public function getCurrentUser() {
    if (!isset($_SESSION['token'])) return;

    return (new Session)->findSession($_SESSION['token']);
  }

  static public function userId() {
    if(!isset($_SESSION['authorization'])) return;
    $token = $_SESSION['authorization'];
    if(is_null($token)) return;
    
    $session = new Session();
    return $session->findSession($token)['id'];
  }
}