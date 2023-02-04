<?php
  class Admin {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }


    public function addport($data)
    {
      $this->db->query('INSERT INTO port (name, country) VALUES(:portname, :country)');
      // Bind values
      $this->db->bind(':portname', $data['portname']);
      $this->db->bind(':country', $data['country']);
  
      // Execute
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
    public function addRoom($data)
    {
      $this->db->query('INSERT INTO room (roomNumber,idship, idtype) VALUES(:roomnumber, :shipname, :roomtype)');
      // Bind values
      $this->db->bind(':shipname', $data['shipname']);
      $this->db->bind(':roomnumber', $data['roomnumber']);
      $this->db->bind(':roomtype', $data['roomtype']);
  
      // Execute
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }


    public function addship($data)
    {
      $this->db->query('INSERT INTO ship (name, rooms, places) VALUES(:name, :rooms, :places)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':rooms', $data['rooms']);
      $this->db->bind(':places', $data['places']);
  
      // Execute
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }


    public function addtype($data)
    {
      $this->db->query('INSERT INTO roomtype (type, capacity, price) VALUES(:type, :capacity, :price)');
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

    
    public function addcruise($data)
    {
      $this->db->query('INSERT INTO cruise (image, title, duration, itinerary, departuredate, destination, idship, idport) VALUES(:image, :title, :duration, :itinerary, :departuredate, :destination, :ship, :departureport)');
      // Bind values
      $this->db->bind(':image', $data['image']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':duration', $data['duration']);
      $this->db->bind(':departureport', $data['departureport']);
      $this->db->bind(':itinerary', $data['itinerary']);
      $this->db->bind(':departuredate', $data['departuredate']);
      $this->db->bind(':destination', $data['destination']);
      $this->db->bind(':ship', $data['ship']);
  
      // Execute
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }


    public function getcruise() {
      $results = $this->db->query('SELECT * FROM `cruise` JOIN `port` on port.idport = cruise.idport ');

      return $results = $this->db->resultSet();
    }


    public function getport() {
      $results = $this->db->query('SELECT * FROM `port`'); 
      return $results = $this->db->resultSet();
    }


    public function getship() {
      $results = $this->db->query('SELECT * FROM `ship`'); 
      return $results = $this->db->resultSet();
    }


    public function getroom() {
      $results = $this->db->query('SELECT * FROM `room`'); 
      return $results = $this->db->resultSet();
    }


    public function getType() {
      $results = $this->db->query('SELECT * FROM `roomtype`'); 
      return $results = $this->db->resultSet();
    }


    public function deletecruise($idcruise)
    {
      $this->db->query('DELETE FROM `cruise` WHERE `cruise`.`idcruise` = :idcruise');
      $this->db->bind(':idcruise', $idcruise);
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }


  }