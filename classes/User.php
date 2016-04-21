<?php

class User extends Database {

  public function is_user_logged_in() {//check if user is logged in
    if($_SESSION['user_login'] === 1) {
      return true;
    } elseif($_SESSION['user_login'] === 0) {
      return false;
    }
  }
  public function get_user_email($email) {//retrieve single user from database
    $q = $this->conn->prepare("select * from sollicitant where email = :1");
    $q->execute(array(":1" => $email));
    return $q->fetch();
  }
  public function count_user_email($email) {//retrieve single user from database
    $q = $this->conn->prepare("select * from sollicitant where email = :1");
    $q->execute(array(":1" => $email));
    return $q->rowCount();
  }
  public function get_username($username) {
    $q = $this->conn->prepare("select * from sollicitant where username = :1");
    $q->execute(array(":1" => $username));
    return $q->fetch();
  }
  public function get_user_by_id($id) {
    $q = $this->conn->prepare("SELECT * FROM sollicitant where sollicitantID = :1");
    $q->execute(array(":1" => $id));
    return $q->fetch();
  }
  public function count_username($username) {
    $q = $this->conn->prepare("select * from sollicitant where username = :1");
    $q->execute(array(":1" => $username));
    return $q->rowCount();
  }
  public function get_user_id($username) {
    $q = $this->conn->prepare("select sollicitantID from sollicitant where username = :1");
    $q->execute(array(":1" => $username));
    return $q->fetch();
  }
  //login method
  public function user_login($username, $salt, $password) {//check if login cred. are correct
    // $hashedPassword = hash("sha256", $salt, $password);

    $q = $this->conn->prepare("select * from sollicitant where username = :1 AND password = :2");
    $q->execute(array(":1" => lcfirst($username), ":2" => hash('sha256', $salt.$password)));
    // $row = $q->fetch(PDO::FETCH_ASSOC);
    // $q->execute(array(":1" => $username, ":2" => $password));
    //return number of rows that match query
    return $q->rowCount();
  }

  public function register_user($voornaam, $achternaam, $email, $address, $postcode, $city, $role, $username, $salt, $password) {
    $q = $this->conn->prepare("INSERT INTO sollicitant (voornaam, achternaam, email, adres, postcode, woonplaats, role, username, salt, password)
                               VALUES (:1, :2, :3, :4, :5, :6, :7, :8, :9, :10)");
    $q->execute(array(":1" => $voornaam,
                      ":2" => $achternaam,
                      ":3" => lcfirst($email),
                      ":4" => $address,
                      ":5" => $postcode,
                      ":6" => $city,
                      ":7" => $role,
                      ":8" => lcfirst($username),
                      ":9" => $salt,
                      ":10" => hash('sha256', $salt . $password)));
    return hash('sha256', $salt . $password);
  }
  public function register_company($voornaam, $achternaam, $email, $address, $postcode, $city, $role, $username, $salt, $password) {
    $q = $this->conn->prepare("INSERT INTO sollicitant (voornaam, achternaam, email, adres, postcode, woonplaats, role, username, salt, password)
                               VALUES (:1, :2, :3, :4, :5, :6, :7, :8, :9, :10)");
    $q->execute(array(":1" => $voornaam,
                      ":2" => $achternaam,
                      ":3" => lcfirst($email),
                      ":4" => $address,
                      ":5" => $postcode,
                      ":6" => $city,
                      ":7" => $role,
                      ":8" => lcfirst($username),
                      ":9" => $salt,
                      ":10" => hash('sha256', $salt . $password)));
    return hash('sha256', $salt . $password);
  }

  public function get_users() {//retrieve all users form database(for admin)
    $q = $this->conn->prepare("select sollicitantID, email, password, role from sollicitant");
    $q->execute();
    return $q->fetchAll();
  }
  public function get_single_user($username) {
    $q = $this->conn->prepare("select * from sollicitant where username = :1");
    $q->execute(array(":1" => $username));
    return $q->fetch();
  }

  public function get_user_role($email) {
    $q = $this->conn->prepare("select role from klant where email = :1");
    $q->execute(array(":1" => $email));
    while($row = $q->fetch(PDO::FETCH_ASSOC)) {
      return $row['role'];
    }
  }

  public function update_password($id, $salt, $password) {//update password
    //new password method

    $q = $this->conn->prepare("UPDATE klant
                               SET password = :1, salt = :2
                               WHERE ID = :3
                              ");
    $q->execute(array(":1" => hash('sha256', $salt . $password), ":2" =>$salt, ":3" => $id));
  }
}
