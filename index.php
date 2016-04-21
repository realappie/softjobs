<?php
  require_once 'init.php';
  $current_page = 'index.php';
  $user = new User();
  $vacature = new Vacature();
  $branche = new Branche();
  $company = new Company();
  if(!isset($_SESSION["user_login"]))
    $_SESSION["user_login"] = 0;

  $user_logged_in = $user->is_user_logged_in();
  $company_logged_in = $company->is_company_logged_in();
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
  if($user_logged_in || $company_logged_in) {
    include 'assets/includes/header_logged_in.php';
  } else if($user_logged_in == false || $company_logged_in == false) {
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
      <div class="vacatures">  <!-- Start of showing vacancy's -->

        <?php
        $get_vacatures = $vacature->get_vacatures();
        foreach($get_vacatures as $get_vacature) {
          $_GET['vacatureID'] = $get_vacature['vacatureID'];
          echo '
          <div class="item col-md-12"> <!--Begin of one item -->
            <div class="item-header "><!--Begin of item header shows titel, place and kind of employment  -->
              <span class="item-titel"><h2>'.$get_vacature['titel'].'</h2></span>
              <div class="item-info">
                <span><i class="fa fa-map-marker"></i>'.$get_vacature['locatie'].'</span>
                <span><i class="fa fa-clock-o"></i>'.$get_vacature['min-uren'].' tot '.$get_vacature['max-uren'].' uur</span>
              </div>
            </div><!--End of item header -->
            <div class="item-content "><!--Begin of item content, shows a preview of the vacany-->
              <div class="desc">
                <p>
                  '.substr($get_vacature['vacature'], 0, 350).'...
                </p>
              </div>
            </div><!--End of item content -->
            <div class="expand">
              <span><a href="vacature.php?vacatureID='.$_GET['vacatureID'].'">Bekijk vacature</a></span>
            </div>
          </div><!--End of one item -->
          ';
        }
         ?>
      </div><!-- End of showing vacancy's -->
      <?php
        include 'assets/includes/filters.php';
       ?>
    </div>
  </div>
</body>
<script src='node_modules/jquery/dist/jquery.min.js'></script>
<script src='node_modules/bootstrap/dist/js/bootstrap.js'></script>
<script src='assets/js/script.js'></script>
</html>
