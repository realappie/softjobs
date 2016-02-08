<?php 
  require_once 'init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Vacature overzicht | Softjobs</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="sidebar">
      <nav>
        <h2>Filters: </h2>
        <form action="">
          <h3>Dienstverband</h3>
          <div class="form-group">
            <label><input type="checkbox" name='categorie' value='ICT'>ICT</label>
            <label><input type="checkbox" name='categorie' value='horeca'>Horeca</label>
            <label><input type="checkbox" name='categorie' value='facilitair'>Facilitair</label>
            <label><input type="checkbox" name='categorie' value='festivals'>Festivals</label>
            <label><input type="checkbox" name='categorie' value='ICT'>ICT</label>
          </div>

          <h3>Beroepsgroepen</h3>
          <div class="form-group">
            <label><input type="checkbox" name='categorie' value='ICT'>ICT</label>
            <label><input type="checkbox" name='categorie' value='horeca'>Horeca</label>
            <label><input type="checkbox" name='categorie' value='facilitair'>Facilitair</label>
            <label><input type="checkbox" name='categorie' value='festivals'>Festivals</label>
            <label><input type="checkbox" name='categorie' value='ICT'>ICT</label>
          </div>

          <h3>Opleidingsniveau</h3>
          <div class="form-group">
            <label><input type="checkbox" name='categorie' value='ICT'>MBO</label>
            <label><input type="checkbox" name='categorie' value='horeca'>HBO</label>
            <label><input type="checkbox" name='categorie' value='facilitair'>WO</label>
            <label><input type="checkbox" name='categorie' value='festivals'>VMBO</label>
          </div>
        </form>
      </nav>
  </div>
<!--   <div class="toggle_sidebar">
    <a href="Hide sidebar"></a>
  </div> -->
  <div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">My Project</a>
        </div>
        <div class="navbar-collapse collapse" id="searchbar">
         
          <ul class="nav navbar-nav navbar-right">
            <li><a href="about.html">About</a></li>
            <li id="userPage">
              <a href="#@userpage"><i class="icon-user"></i> My Page</a>
            </li>
            <li><a href="#logout" data-prevent="">Logout</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" title="Start a new search">Clear</a></li>
          </ul>
         
         
         
         <form class="navbar-form">
            <div class="form-group" style="display:inline;">
              <div class="input-group" style="display:table;">
                <span class="input-group-addon" style="width:1%;"><span class="glyphicon glyphicon-search"></span></span>
                <input class="form-control" name="search" placeholder="Search Here" autocomplete="off" autofocus="autofocus" type="text">
              </div>
            </div>
          </form>

        </div><!--/.nav-collapse -->
      </div>
    </div>
    <h2></h2>
  </div>
</body>
<script src='node_modules/jquery/dist/jquery.min.js'></script>
<script src='node_modules/bootstrap/dist/js/bootstrap.js'></script>
<script src='assets/js/script.js'></script>
</html>