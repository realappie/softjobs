<?php
  require_once 'init.php';
  $current_page = 'register-company.php';
  $user = new User();
  $date = new DateTime();
  $company = new Company();
  $timestamp = $date->getTimestamp();
  $filled_in = true;
  $_SESSION['login'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bedrijf registeren | Softjobs</title>
  <link href='https://fonts.googleapis.com/css?family=Walter+Turncoat' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Kreon:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Hind:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <!-- Start  header -->
  <?php include 'assets/includes/header.php'; ?>
  <!-- End  header -->

  <!-- Begin sidebar -->
  <?php //include 'assets/includes/sidebar.php'; ?>
  <!-- End sidebar -->

  <!-- <button type="button" name="button" class='open' style="display: none;"><i class="fa fa-sliders"></i></button> -->
  <div class='container'>
    <div class='wrapper'>
        <div class="register col-md-6 col-md-offset-3">  <!-- Start of showing vacancy's -->
          <div class="intro-text">
            <h2>Hoi! Welkom bij Softjobs!</h2>
            <p>
              Om te beginnen registreren wij een account voor uw bedrijf. Als u uw bedrijf heeft geregistreerd
              kunt u beginnen met het plaatsen van vacatures!
            </p>
          </div>
          <form method="post">
            <div class="form-group">
              <label for="bedrijfsnaam">Bedrijfsnaam</label>
              <input type="text" name="bedrijfsnaam" class="form-control" id="bedrijfsnaam" placeholder="Voer je bedrijfsnaam in">
            </div>
            <div class="form-group">
              <label for="adres">Adres</label>
              <input type="text" name="adres" class="form-control" id="adres" placeholder="Voer je adres in">
            </div>
            <div class="form-group">
              <label for="postcode">Postcode</label>
              <input type="text" name="postcode" class="form-control" id="postcode" placeholder="Voer je postcode in">
            </div>
            <div class="form-group">
              <label for="woonplaats">Woonplaats</label>
              <input type="text" name="woonplaats" class="form-control" id="woonplaats" placeholder="Voer je woonplaats in">
            </div>
            <div class="form-group">
              <label for="eigenaar">Eigenaar</label>
              <input type="text" name="eigenaar" class="form-control" id="eigenaar" placeholder="Voer de bedrijseigenaar in">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Voer je email in">
            </div>
            <div class="form-group">
              <label for="gebruikersnaam">Gebruikersnaam</label>
              <input type="text" name="gebruikersnaam" class="form-control" id="gebruikersnaam" placeholder="Voer je gebruikersnaam in">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Voer wachtwoord aan  ">
            </div>
            <div class="form-group">
              <label for="password-repeat">Voer nog een keer je wachtwoord in</label>
              <input type="password" name="password-repeat" class="form-control" id="password-repeat" placeholder="Voer nog een keer je wachtwoord in ">
            </div>
            <div class="form-group">
              <a href="login.php">Heb je al een account? Klik dan hier om aan te melden.</a>
            </div>
            <button type="submit" class="btn btn-default custombutton" name="submit">Submit</button>
          </form>
          <?php
            if(isset($_POST["submit"])) {
              $get_company_username = $company->get_company_username($_POST['gebruikersnaam']);
              $get_email = $company->get_company_email($_POST['email']);
               if($get_email > 0 ) { // check  if email already exists
                echo '<div class="alert alert-danger" role="alert"><b>Er is iets mis gegaan!</b> Er is al een account geregistreerd met het ingevoerde e-mail adres.</div>';
              } else if($get_company_username > 0) { // check if username already exists
                echo '<div class="alert alert-danger" role="alert"><b>Er is iets mis gegaan!</b> Er is al een account geregistreerd met de ingevoerde gebruikersnaam. Vul een andere gebruikersnaam in en probeer het opnieuw.</div>';
              } else {
                $required = ['bedrijfsnaam', 'adres', 'postcode', 'woonplaats', 'eigenaar', 'email', 'gebruikersnaam', 'password', 'password-repeat']; // array with required fields
                foreach($required as $field) { // loop trough array
                  if(!isset($_POST[$field]) || empty($_POST[$field])) { //  if fields are not set or empty
                    $filled_in = false; //  set var to false
                  } // ed if empty check
                } // end foreah
              } // end else
              if(!$filled_in) { //  of var is valse echo error message
                echo '<div class="alert alert-danger" role="alert"><b>Er is iets mis gegaan!</b> Zorg ervoor dat alle velden zijn ingevuld.</div>';
              } else if($_POST['password'] != $_POST['password-repeat']) {
                echo '<div class="alert alert-danger" role="alert"><b>Er is iets mis gegaan!</b> Zorg ervoor dat de wachtwoorden identiek zijn.</div>';
              } else {
                $company->register_company (
                                      $_POST["bedrijfsnaam"],
                                      $_POST["adres"],
                                      $_POST["postcode"],
                                      $_POST["woonplaats"],
                                      $_POST['eigenaar'],
                                      $_POST["email"],
                                      3,
                                      $_POST["gebruikersnaam"],
                                      $timestamp,
                                      $_POST["password"]
                                    );
                echo '<div class="alert alert-success" role="alert"><b>Gefeliciteerd</b>, je account is aangemaakt! Klik <a href="company.php">hier</a> om in te loggen</div>';
              }
            } // end submit if

           ?>
      </div>
  </div>
</div>
</body>
<script src='node_modules/jquery/dist/jquery.min.js'></script>
<script src='node_modules/bootstrap/dist/js/bootstrap.js'></script>
<script src='assets/js/script.js'></script>
</html>
