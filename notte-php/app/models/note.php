<?php

namespace Model;

require 'application_model.php';

class Note extends Application {
  public function getNote($id) {
    return $this->db->prepare('
      SELECT * FROM notes
      WHERE user_id = :user_id AND
      note.id = :note_id
    ')->execute(array(
      'user_id' => $this.userId(),
      'note_id' => $id
    ))->fetchObject();
  }

  public function getAllNotes() {
    return $this->db->prepare('
      SELECT * FROM notes
      WHERE user_id = :user_id
    ')->execute(
      array('user_id' => $this.userId())
    )->fetchAll();
  }
}