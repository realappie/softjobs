<?php
  class Medewerker extends Database {
    public function get_medewerkers() {
      $q = $this->conn->prepare('select * from medewerker');
      $q->execute();
      return $q->fetchAll();
    }
    public function get_single_medewerker($id) {
      $q = $this->conn->prepare('select * from medewerker where medewerkerID = :1');
      $q->execute(array(":1" => $id));
      return $q->fetch();
    }
    public function get_medewerkers_from_company($companyID) {
      $q = $this->conn->prepare("select * from medewerker where bedrijfID = :1");
      $q->execute(array(":1" => $companyID));
      return $q->fetchAll();
    }
    public function count_medewerkers() {
      $q = $this->conn->prepare('select * from medewerker');
      $q->execute();
      return $q->rowCount();
    }
    public function add_medewerker($voornaam, $achternaam, $email, $adres, $postcode, $plaats, $username, $salt, $password, $bedrijfID) {
      $q = $this->conn->prepare("insert into medewerker (`voornaam`, `achternaam`, `email`, `adres`, `postcode`, `plaats`, `username`, `salt`, `password`, `bedrijfID`)
                                 values(:1, :2, :3, :4, :5, :6, :7, :8, :9, :10)");
      $q->execute(array(":1" => $voornaam,
                        ":2" => $achternaam,
                        ":3" => $email,
                        ":4" => $adres,
                        ":5" => $postcode,
                        ":6" => $plaats,
                        ":7" => $username,
                        ":8" => $salt,
                        ":9" => $password,
                        ":10" => $bedrijfID
                       ));
    }
  }

 ?>
