<?php
class port{
   
    // Add navire
  public function addport($data)
  {
    extract($_POST);
    // Prepare Query
    $this->db->query('INSERT INTO `port` (id, user_id, body) 
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