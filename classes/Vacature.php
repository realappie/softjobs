<?php
  class Vacature extends Database {
    public function get_vacatures() { // get all vacancy's back
      $q = $this->conn->prepare('select * from vacatures');
      $q->execute();
      return $q->fetchAll();
    }
    public function get_single_vacature($id) { // get a single vacancy back
      $q = $this->conn->prepare("select * from vacatures where vacatureID = :1");
      $q->execute(array(":1" => $id));
      return $q->fetch();
    }
    public function get_vacatures_from_company($companyID) {
      $q = $this->conn->prepare("select * from vacatures where bedrijfID = :1");
      $q->execute(array(":1" => $companyID));
      return $q->fetchAll();
    }
    public function count_vacatures() { // row count for vacancy's
      $q = $this->conn->prepare('select * from vacatures');
      $q->execute();
      return $q->rowCount();
    }
    public function add_vacature($titel, $locatie, $min_uren, $max_uren, $min_salaris, $max_salaris, $school, $vacature, $medewerkerID, $commissie, $brancheID) { // add a vacancy
      $q = $this->conn->prepare('INSERT INTO vacatures
                                            (`titel`, `locatie`, `min-uren`, `max-uren`, `min-salaris`, `max-salaris`, `school`, `vacature`, `medewerkerID`, `commissie_per_sollicitant`, `brancheID`)
                                 VALUES(:1, :2, :3, :4, :5, :6, :7, :8, :9, :10, :11)');
      $q->execute(array(":1" => $titel,
                        ":2" => $locatie,
                        ":3" => $min_uren,
                        ":4" => $max_uren,
                        ":5" => $min_salaris,
                        ":6" => $max_salaris,
                        ":7" => $school,
                        ":8" => $vacature,
                        ":9" => $medewerkerID,
                        ":10" => $commissie,
                        ":11" => $brancheID ));
    }
    public function edit_vacature($titel, $locatie, $min_uren, $max_uren, $min_salaris, $max_salaris, $school, $vacature, $commissie, $brancheID, $vacatureID) {
      $q = $this->conn->prepare('UPDATE vacatures
                                 SET `titel` = :1,
                                     `locatie` = :2,
                                     `min-uren` = :3,
                                     `max-uren` = :4,
                                     `min-salaris` = :5,
                                     `max-salaris` = :6,
                                     `school` = :7,
                                     `vacature` = :8,
                                     `commissie_per_sollicitant` = :9,
                                     `brancheID` = :10
                                WHERE `vacatureID` = :11
                              ');
      $q->execute(array(":1" => $titel,
                        ":2" => $locatie,
                        ":3" => $min_uren,
                        ":4" => $max_uren,
                        ":5" => $min_salaris,
                        ":6" => $max_salaris,
                        ":7" => $school,
                        ":8" => $vacature,
                        ":9" => $commissie,
                        ":10" => $brancheID,
                        ":11" => $vacatureID));
    }


  public function new_sollicitatie($sollicitatie, $sollicitantID, $medewerkerID, $vacatureID) {
    $q = $this->conn->prepare("INSERT INTO berichten
                                (`sollicitatie`, `sollicitantID`, `medewerkerID`, `vacatureID`)
                              VALUES(:1, :2, :3, :4)");
    $q->execute(array(":1" => $sollicitatie,
                     ":2" => $sollicitantID,
                     ":3" => $medewerkerID,
                     ":4" => $vacatureID));
  }


  }

 ?>
