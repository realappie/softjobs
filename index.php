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
    <div class="container">
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
  </div>
  <div class="toggle_sidebar"><div class="button"></div></div>
  <div class="container"></div>
</body>
<script src='node_modules/jquery/dist/jquery.min.js'></script>
<script src='node_modules/bootstrap/dist/js/bootstrap.js'></script>
<script src='assets/js/script.js'></script>
</html>