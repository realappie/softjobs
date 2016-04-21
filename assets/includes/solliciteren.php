<?php
  $get_vacature_id = $_GET['vacatureID'];
  $get_vacature = $vacature->get_single_vacature($get_vacature_id);
 ?>
<div class="col-md-12 vac-name">
  <span><b>Vacature: <?php echo $get_vacature['titel'] ?></b></span>
</div>
<div class="solliciteren">  <!-- Start of showing vacancy's -->
  <form method="post">
    <textarea name="sollicitatie_form" id="sollicitatie_form"></textarea>
    <button type="submit" name="submit" class="custombutton">Verstuur Sollicitatie</button>
  </form>
  <?php
    $get_sollicitant_id = $user->get_user_id($_SESSION["username"]);
    if(isset($_POST["submit"])) {
      if(!empty($_POST["sollicitatie_form"])) {
        $vacature->new_sollicitatie($_POST['sollicitatie_form'], $get_sollicitant_id['sollicitantID'], $_SESSION["medewerkerID"], $_GET['vacatureID']);
        echo '<div class="alert alert-success" role="alert"><b>Gelukt!</b> De vacature is geplaatst. Je krijgt spoedig antwoord.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert"><b>Er is wat mis gegaan!<b> Zorg ervoor dat alle velden zijn ingevuld.</div>';
      }

     }
   ?>
</div><!-- End of showing vacancy's -->
