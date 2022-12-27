<?php
class admin{
    public function loginadmin($email, $password){
        $this->db->query("SELECT * FROM users WHERE `Email` = :email");
        $this->db->bind(':email', $email);
    
        $row = $this->db->single();
        
        $hashed_password = $row->Password;
        if(password_verify($password, $hashed_password)){
          return $row;
        } 
        else {
          return false;
        }
      }
}


?>