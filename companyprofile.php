<?php
  require_once 'init.php';
  $current_page = 'index.php';
  $user = new User();
  $vacature = new Vacature();
  $company = new Company();
  $branche = new Branche();
  if(!isset($_SESSION["user_login"]))
    $_SESSION["user_login"] = 0;

  $user_logged_in = $user->is_user_logged_in();
  $company_logged_in = $company->is_company_logged_in();

  if($user_logged_in == false && $company_logged_in == false) {
    echo '<script>location.href= "."</script>';
  }
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
<body>
  <!-- Start  header -->
  <?php
  if($user_logged_in) {
    include 'assets/includes/header_logged_in.php';
  } else if($user_logged_in == false) {
    include 'assets/includes/header.php';
  }

  ?>
  <!-- End  header -->

  <!-- Begin sidebar -->
  <?php //include 'assets/includes/sidebar.php'; ?>
  <!-- End sidebar -->

  <button type="button" name="button" class='open' style="display: none;"><i class="fa fa-sliders"></i></button>
  <div class='container'>
    <div class='wrapper'>
      <!-- <div class=" titel">
        <div class="col-md-12">
            <h2 class='text-right'>Vacatures</h2>
        </div>
      </div>
      <div class="">
        <div class="sort col-md-2 pull-right">
          <form class="sorteer overzicht" method="post">
            <label for="">Sorteer op:</label>
            <select class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            <button type="submit" name="button" class='btn btn-default'>Sorteer</button>
          </form>
        </div>
      </div> -->
      <div class="profile">
        <div class="profile-header">
          <div class="row">
            <div class="col-xs-6 col-md-3">
              <?php $get_user = $company->get_company_by_id($_GET['profileID']); ?>
                <img src="img/<?php echo $get_user['profielfoto'] ?>" alt="..." class="img-thumbnail">
                <h4><?php echo $get_user['bedrijfsnaam'];?></h4>
            </div>
            <div class="col-cx-6 col-md-9 user-info">
              <h2>Profiel informatie</h2>
              <div class="blok1">
                <span><b>Naam:</b> <?php echo $get_user['bedrijfsnaam']; ?></span>
                <span><b>Email:</b> <?php echo $get_user['email'] ?></span>
                <span><b>Username: </b> <?php echo $get_user['username'] ?></span>
              </div>
              <div class="blok2">
                <span><b>Postcode: </b> <?php echo $get_user['postcode'] ?></span>
                <span><b>Woonplaats: </b><?php echo $get_user['plaats'] ?></span>
              </div>
            </div>
        </div>
        </div>
        <div class="profile-desc">
          <div class="row">
              <div class="col-md-8">
                <h2>Over het bedrijf</h2>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                  laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                  non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                  laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                  non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
              </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
<script src='node_modules/jquery/dist/jquery.min.js'></script>
<script src='node_modules/bootstrap/dist/js/bootstrap.js'></script>
<script src='assets/js/script.js'></script>
</html>
