<?php
class Check {
  public function fields_filled_in($arr) {
    foreach($arr as $field) { // loop trough array
      if(!isset($_POST[$field]) || empty($_POST[$field])) { //  if fields are not set or empty
        return false; //  return false
      } // ed if empty check
    } // end foreach
  }
}
