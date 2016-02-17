<?php
  require_once 'init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Vacature overzicht | Softjobs</title>
  <link href='https://fonts.googleapis.com/css?family=Clicker+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Arimo:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <!-- Start  header -->
  <?php include 'assets/includes/header.php'; ?>
  <!-- End  header -->

  <!-- Begin sidebar -->
  <?php include 'assets/includes/sidebar.php'; ?>
  <!-- End sidebar -->

  <button type="button" name="button" class='open'><i class="fa fa-sliders"></i></button>
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
        <div class="item col-md-12"> <!--Begin of one item -->
          <div class="item-header "><!--Begin of item header shows titel, place and kind of employment  -->
            <span class='item-titel'><h2 class='col-md-6'>Job assistant gezocht</h2></span>
            <div class="item-info">
              <span><i class="fa fa-clock-o"></i>Amsterdam</span>
              <span><i class="fa fa-map-marker"></i>Fulltime</span>
            </div>

          </div><!--End of item header -->
          <div class="item-content "><!--Begin of item content, shows a preview of the vacany-->
            <div class="desc">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
              non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
          </div><!--End of item content -->
        </div><!--End of one item -->
        <div class="item col-md-12"> <!--Begin of one item -->
          <div class="item-header "><!--Begin of item header shows titel, place and kind of employment  -->
            <span class='item-titel'><h2 class='col-md-6'>Job assistant gezocht</h2></span>
            <div class="item-info">
              <span><i class="fa fa-clock-o"></i>Amsterdam</span>
              <span><i class="fa fa-map-marker"></i>Fulltime</span>
            </div>

          </div><!--End of item header -->
          <div class="item-content "><!--Begin of item content, shows a preview of the vacany-->
            <div class="desc">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
              non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
          </div><!--End of item content -->
        </div><!--End of one item -->
        <div class="item col-md-12"> <!--Begin of one item -->
          <div class="item-header "><!--Begin of item header shows titel, place and kind of employment  -->
            <span class='item-titel'><h2 class='col-md-6'>Job assistant gezocht</h2></span>
            <div class="item-info">
              <span><i class="fa fa-clock-o"></i>Amsterdam</span>
              <span><i class="fa fa-map-marker"></i>Fulltime</span>
            </div>

          </div><!--End of item header -->
          <div class="item-content "><!--Begin of item content, shows a preview of the vacany-->
            <div class="desc">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
              non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
          </div><!--End of item content -->
        </div><!--End of one item -->
        <div class="item col-md-12"> <!--Begin of one item -->
          <div class="item-header "><!--Begin of item header shows titel, place and kind of employment  -->
            <span class='item-titel'><h2 class='col-md-6'>Job assistant gezocht</h2></span>
            <div class="item-info">
              <span><i class="fa fa-clock-o"></i>Amsterdam</span>
              <span><i class="fa fa-map-marker"></i>Fulltime</span>
            </div>

          </div><!--End of item header -->
          <div class="item-content "><!--Begin of item content, shows a preview of the vacany-->
            <div class="desc">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
              non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
          </div><!--End of item content -->
        </div><!--End of one item -->
        <div class="item col-md-12"> <!--Begin of one item -->
          <div class="item-header "><!--Begin of item header shows titel, place and kind of employment  -->
            <span class='item-titel'><h2 class='col-md-6'>Job assistant gezocht</h2></span>
            <div class="item-info">
              <span><i class="fa fa-clock-o"></i>Amsterdam</span>
              <span><i class="fa fa-map-marker"></i>Fulltime</span>
            </div>

          </div><!--End of item header -->
          <div class="item-content "><!--Begin of item content, shows a preview of the vacany-->
            <div class="desc">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
              non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
          </div><!--End of item content -->
        </div><!--End of one item -->

      </div><!-- End of showing vacancy's -->
      <div class="filters">
        <div class="dienstverband filterfield">
          <h2>Diensverband</h2>
          <div class="filtergroup">
            <div class="form-group">
              <label><input type="checkbox" name='categorie' value='ICT'>ICT</label>
              <label><input type="checkbox" name='categorie' value='horeca'>Horeca</label>
              <label><input type="checkbox" name='categorie' value='facilitair'>Facilitair</label>
              <label><input type="checkbox" name='categorie' value='festivals'>Festivals</label>
              <label><input type="checkbox" name='categorie' value='ICT'>ICT</label>
            </div>
          </div>
        </div>
        <div class="sector filterfield">
          <h2>Sector</h2>
          <div class="filtergroup">
            <div class="form-group">
              <label><input type="checkbox" name='categorie' value='ICT'>ICT</label>
              <label><input type="checkbox" name='categorie' value='horeca'>Horeca</label>
              <label><input type="checkbox" name='categorie' value='facilitair'>Facilitair</label>
              <label><input type="checkbox" name='categorie' value='festivals'>Festivals</label>
              <label><input type="checkbox" name='categorie' value='ICT'>ICT</label>
            </div>
          </div>
        </div>
        <div class="opleidingsniveau filterfield">
          <h2>Opleidingsniveau</h2>
          <div class="filtergroup">
            <div class="form-group">
              <label><input type="checkbox" name='categorie' value='ICT'>ICT</label>
              <label><input type="checkbox" name='categorie' value='horeca'>Horeca</label>
              <label><input type="checkbox" name='categorie' value='facilitair'>Facilitair</label>
              <label><input type="checkbox" name='categorie' value='festivals'>Festivals</label>
              <label><input type="checkbox" name='categorie' value='ICT'>ICT</label>
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
