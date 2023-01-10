<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add User / Register
    public function register($data){
      // Prepare Query
      $this->db->query('INSERT INTO user (Fname,email,pass,role) 
      VALUES (:name, :email, :password , :role)');

      // Bind Values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':role', '1');
      
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
      
     }
    // Login / Authenticate User
    public function login($email, $password){
      $this->db->query("SELECT * FROM `user` WHERE `email` = :email and `role` = 1");
      $this->db->bind(':email', $email);

      $row = $this->db->single();
      
      $hashed_password = $row->pass;
      if(password_verify($password, $hashed_password)){
        return $row;
      }
      else {
        return false;
      }
    }
  }