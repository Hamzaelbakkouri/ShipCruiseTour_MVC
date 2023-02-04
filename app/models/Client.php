<?php
  class Client {

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function displayReservations() {
      $results = $this->db->query('SELECT * FROM `cruise` JOIN `port` on port.idport = cruise.idport');

      return $results = $this->db->resultSet();
    }

    public function getRoomType() {
      $results = $this->db->query('SELECT * FROM `roomtype`');

      return $results = $this->db->resultSet();
    }

    public function addReservation($data) {
      $this->db->query('INSERT INTO reservation (type, capacity, price) VALUES(:type, :capacity, :price)');
      // Bind values
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':capacity', $data['capacity']);
      $this->db->bind(':price', $data['price']);

  
      // Execute
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }

    }

  }