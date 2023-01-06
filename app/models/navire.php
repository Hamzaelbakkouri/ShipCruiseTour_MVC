<?php
class navire{
  protected $db;

    // Add navire
  public function addNavire($data)
  {
    extract($_POST);
    // Prepare Query
    $this->db->query('INSERT INTO `navire` (title, user_id, body) 
      VALUES (:title, :user_id, :body)');

    // Bind Values
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':body', $data['body']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
?>