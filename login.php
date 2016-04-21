<?php
  require_once 'init.php';
  $current_page = 'login.php';
  $user = new User();

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
<body style="background: url(img/employee.jpg)">
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
            <div class="form-group">
              <label for="username">Inlognaam</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Voer inlognaam in">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Voer wachtwoord aan  ">
            </div>
            <div class="form-group">
              <a href="register.php">Heb je nog geen account? Registreer je dan hier! </a>
            </div>
            <button type="submit" class="btn btn-default custombutton" name="submit">Submit</button>
          </form>
          <?php
            if(isset($_POST["submit"])) {
              $get_user = $user->get_single_user($_POST['username']);
              $login = $user->user_login($_POST['username'], $get_user['salt'], $_POST['password']);
              if($login > 0) {
                $_SESSION["user_login"] = 1;
                $_SESSION['username'] = $_POST["username"];
                echo '<script>location.href="."</script>';
              } elseif(empty($_POST['username']) || empty($_POST['password'])) {
                echo 'Zorg dat alle velden zijn ingevuld.';
              } else {
                echo 'Gebruikersnaam of wachtwoord fout.';
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
