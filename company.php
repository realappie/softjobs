<?php
  require_once 'init.php';
  $current_page = 'company.php';
  $company = new Company();
  $_SESSION['company_login'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Vacature overzicht | Softjobs</title>
  <link href='https://fonts.googleapis.com/css?family=Walter+Turncoat' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Kreon:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Hind:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="background: url(img/company.jpg)">
  <!-- Start  header -->
  <?php include 'assets/includes/header.php'; ?>
  <!-- End  header -->

  <!-- Begin sidebar -->
  <?php //include 'assets/includes/sidebar.php'; ?>
  <!-- End sidebar -->

  <!-- <button type="button" name="button" class='open' style="display: none;"><i class="fa fa-sliders"></i></button> -->
  <div class='container'>
    <div class='wrapper'>
        <div class="login col-md-6 col-md-offset-3">  <!-- Start of showing vacancy's -->
          <form method="post">
            <div class="intro">
              <p>
                <h2>Hoi! Welkom bij Softjobs voor bedrijven.</h2>
               Log in of maak een account aan om snel aan nieuwe werknemers te komen!
              </p>
            </div>
            <div class="form-group">
              <label for="username">Inlognaam</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Voer inlognaam in">
            </div>
            <div class="form-group">
              <label for="password">Wachtwoord</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Voer wachtwoord aan  ">
            </div>
            <div class="form-group">
              <a href="register-company.php">Heb je nog geen bedrijfsaccount? Registreer je dan hier! </a>
            </div>
            <button type="submit" class="btn btn-default custombutton" name="submit">Submit</button>
          </form>
          <?php
            if(isset($_POST["submit"])) {
              $get_company = $company->get_single_company($_POST['username']); // retrieve a single company
              $company_login = $company->company_login($_POST['username'], $get_company['salt'], $_POST['password']); // company login method
              if($company_login > 0) { // if rowcount is more than 1
                $_SESSION["company_login"] = 1; // set login session to one
                $_SESSION['company_username'] = $_POST["username"];
                echo '<script>location.href="admin/"</script>'; // change to admin pages
              } elseif(empty($_POST['username']) || empty($_POST['password'])) { // if username or password are empty
                echo 'Zorg dat alle velden zijn ingevuld.';
              } else {
                echo 'Gebruikersnaam of wachtwoord fout.'; // else the username ore password don't exist
             }
           }

           ?>
      </div>
  </div>
</div>
</body>
<script src='node_modules/jquery/dist/jquery.min.js'></script>
<script src='node_modules/bootstrap/dist/js/bootstrap.js'></script>
<script src='assets/js/script.js'></script>
</html>
