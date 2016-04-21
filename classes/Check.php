<?php
class Check {
  public function fields_filled_in($arr) {

    foreach($arr as $field) { // loop trough array
      $filled_in = true;
      if(!isset($_POST[$field]) || empty($_POST[$field])) { //  if fields are not set or empty
        $filled_in = false; //  return false
        break;
      }
    }// ed if empty check
      return $filled_in;
  } // end function
}
