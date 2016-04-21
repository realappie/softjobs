<?php
  class Branche extends Database {
    public function get_branche() {
      $q = $this->conn->prepare("select * from branches");
      $q->execute();
      return $q->fetchAll();
    }
  }
