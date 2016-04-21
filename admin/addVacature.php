<?php
    require_once '../init.php';
    $company = new Company();
    $message = new Message();
    $vacature = new Vacature();
    $medewerker = new Medewerker();
    $branche = new Branche();
    $logged_in = $company->is_company_logged_in();
    if(!$logged_in) { // check if company is logged in
      echo '<script>location.href="../company.php"</script>'; // relocate user to login page
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Softjobs - Admin paneel</title>


    <!-- CK editor -->
    <script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom css  -->
    <link rel="stylesheet" href="../assets/css/admin.css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <!-- BEGIN NAVAR -->
        <?php include 'includes/navbar.php'; ?>
        <!-- END NAVBAR -->

        <!-- Begin sidebar -->
        <?php include 'includes/sidebar.php'; ?>
        <!-- End sidebar -->
        <div id="page-wrapper">

            <div class="container-fluid">
              <div class="intro">
                <h2>Vacature toevoegen</h2>
              </div>
              <div class="add_vacature">
                <form method="post">
                  <div class="form-group">
                    <label for="">Vul een titel in</label>
                    <input type="text" name="titel" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Vul een locatie in</label>
                    <input type="text" name="locatie" class="form-control">
                  </div>
                  <textarea name="new_vacature" rows="8" cols="40"></textarea>
                  <div class="form-group">
                    <label for="">Vul het minimale beschikbare uren in</label>
                    <input type="text" class="form-control" name="min-uren" placeholder="Vul het minimale uren in">
                    <label for="">Vul het maximale beschikbare uren in</label>
                    <input type="text" class="form-control" name="max-uren" placeholder="Vul het maximale uren in">
                  </div>
                  <div class="form-group">
                    <label>Kies opleiding</label>
                    <select class="form-control" name="opleiding">
                      <option value="VMBO">VMBO</option>
                      <option value="MBO">MBO</option>
                      <option value="HBO">HBO</option>
                      <option value="WO">WO</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Vul het minimale salaris in</label>
                    <input type="text"class="form-control" name="min-salaris" placeholder="Vul het minimale salaris in">
                    <label for="">Vul het maximale salaris in</label>
                    <input type="text" class="form-control" name="max-salaris" placeholder="Vul het maximale salaris in">
                  </div>
                  <div class="form-group">
                    <label>Kies categorie</label>
                    <select class="form-control" name="brancheID">
                      <?php
                        $get_branches = $branche->get_branche();
                        foreach($get_branches as $get_branche) {
                          echo '<option value="'.$get_branche['brancheID'].'">'.$get_branche['branchenaam'].'</option>';
                        }
                       ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Is de vacature beschikbaar?</label>
                    <input type="radio" name="active" value="1" checked>Ja
                    <input type="radio" name="active" value="0">Nee
                  </div>
                  <div class="form-group">
                    <label for="werknemer" style="display: block;">Toegevoegd door: </label>
                    <select class="form-control" id="werknemer" name="medewerkerID">
                      <?php
                        $get_medewerkers = $medewerker->get_medewerkers();
                        foreach($get_medewerkers as $get_medewerker) {
                          echo '<option value="'.$get_medewerker['medewerkerID'].'">'.$get_medewerker['voornaam'].' '.$get_medewerker['achternaam'].' </option>';
                        }
                       ?>
                    </select>
                  </div>
                  <button type="submit" name="add" class="custombutton">Plaats vacature</button>
                </form>
              </div>
            <!-- /vacature_overzicht -->
          </div>
            <!-- /.container-fluid -->
              <?php
              if(isset($_POST["add"])) {
                $commissie_per_vacature = ($_POST['min-salaris'] * 0.20);
                echo $commissie_per_vacature;
                // echo $_POST["new_vacature"] . '<br>'  .$_POST["min-uren"] . '<br>' . $_POST["max-uren"] . '<br>' . $_POST["min-salaris"]  . '<br>' . $_POST["max-salaris"] . '<br>' .$_POST["brancheID"] . '<br>' . $_POST["active"] . '<br>' . $_POST["medewerkerID"];
                $vacature->add_vacature($_POST["titel"], $_POST["locatie"], $_POST["min-uren"], $_POST["max-uren"], $_POST["min-salaris"], $_POST["max-salaris"], $_POST['opleiding'], $_POST["new_vacature"], $_POST["medewerkerID"], $commissie_per_vacature, $_POST["brancheID"]);
                echo 'vacature geplaats.';
               }

              ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>
<script type="text/javascript">
CKEDITOR.replace( 'new_vacature',
{
height: '400px'
} );
</script>
</html>
