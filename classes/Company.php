<?php
class Company extends Database {

  public function is_company_logged_in() {//check if user is logged in
    if($_SESSION['company_login'] == 1) {
      return true;
    } elseif($_SESSION['company_login'] == 0) {
      return false;
    }
  }

  public function get_companies() {
    $q = $this->conn->prepare("select * from bedrijven where active = 1");
    $q->execute();
    return $q->fetchAll();
  }

  public function get_company_id($username) {
    $q = $this->conn->prepare("select bedrijfID from bedrijven where username = :1");
    $q->execute(array(":1" => $username));
    return $q->fetch();
  }

  public function get_single_company($username) {
    $q = $this->conn->prepare("select * from bedrijven where username = :1");
    $q->execute(array(":1" => $username));
    return $q->fetch();
  }
  public function get_company_by_id($company_id) {
    $q = $this->conn->prepare("select * from bedrijven where bedrijfID = :1");
    $q->execute(array(":1" => $company_id));
    return $q->fetch();
  }
  public function get_company_email($email) {//retrieve single user from database
    $q = $this->conn->prepare("select * from bedrijven where email = :1");
    $q->execute(array(":1" => $email));
    return $q->fetch();
  }
  public function get_company_username($username) {
    $q = $this->conn->prepare("select * from bedrijven where username = :1");
    $q->execute(array(":1" => $username));
    return $q->fetch();
  }

  // company login method
  public function company_login($username, $salt, $password) {//check if login cred. are correct
    $q = $this->conn->prepare("select * from bedrijven where username = :1 AND password = :2");
    $q->execute(array(":1" => lcfirst($username), ":2" => hash('sha256', $salt.$password)));
    return $q->rowCount();
  }
  // register company method
  public function register_company($bedrijfsnaam, $address, $postcode, $city, $owner, $email, $role, $username, $salt, $password) {
    $q = $this->conn->prepare("INSERT INTO bedrijven (bedrijfsnaam, adres, postcode, plaats, eigenaar, email, role, username, salt, password)
                               VALUES (:1, :2, :3, :4, :5, :6, :7, :8, :9, :10)");
    $q->execute(array(":1" => $bedrijfsnaam,
                      ":2" => $address,
                      ":3" => $postcode,
                      ":4" => $city,
                      ":5" => $owner,
                      ":6" => lcfirst($email),
                      ":7" => $role, // bedrijven roll is 2
                      ":8" => lcfirst($username),
                      ":9" => $salt,
                      ":10" => hash('sha256', $salt . $password)));
  }
  public function edit_company_profile($naam, $adres, $postcode, $plaats, $email, $username, $company_id) {
    $q = $this->conn->prepare("UPDATE bedrijven
                               SET `bedrijfsnaam` = :1,
                                   `adres` = :2,
                                   `postcode` = :3,
                                   `plaats` = :4,
                                   `email` = :5,
                                   `username` = :6
                              WHERE `bedrijfID` = :7");
    $q->execute(array(":1" => $naam, ":2" => $adres, ":3" => $postcode, ":4" => $plaats, ":5" => $email, ":6" => $username, ":7" => $company_id));
  }


  }
