  <?php

class Message extends Database {
  public function get_messages() {
    $q = $this->conn->prepare('select * from berichten');
    $q->execute();
    return $q->fetchAll();
  }
  public function count_messages() {
    $q = $this->conn->prepare('select * from berichten');
    $q->execute();
    return $q->rowCount();
  }
  public function get_sollicitaties($vacatureID) {
    $q = $this->conn->prepare("select voornaam, achternaam, sollicitatieID, sollicitant.sollicitantID, sollicitatie, vacatureID
                              from berichten
                              inner join sollicitant
                              on berichten.sollicitantID = sollicitant.sollicitantID
                              where vacatureID = :1");
    $q->execute(array(":1" => $vacatureID));
    return $q->fetchAll();
  }

}
