<?php
namespace Model;

require_once 'application_model.php';
require_once 'session.php';

class Note extends Application {
  public function getNote($id) {
    $stm = $this->db->prepare('
      SELECT * FROM notes
      WHERE user_id = :user_id AND
      note.id = :note_id
    ');
    $stm->execute(array(
      'user_id' => Session->userId(),
      'note_id' => $id
    ));
    return $stm->fetchObject();
  }

  public function getAllNotes() {
    $stm = $this->db->prepare('
      SELECT * FROM notes
      WHERE user_id = :user_id
    ');
    $stm->execute(array('user_id' => Session::userId()));
    return $stm->fetchAll();
  }
}