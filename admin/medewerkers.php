<?php
    require_once '../init.php';
    $company = new Company();
    $message = new Message();
    $vacature = new Vacature();
    $date = new DateTime();
    $timestamp = $date->getTimestamp();
    $medewerker = new Medewerker();
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
                <div class="well">
                  <p>
                    Medewerkers pagina
                  </p>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn custombutton" data-toggle="modal" data-target="#myModal">Voeg medewerker toe</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Voeg medewerker toe</h4>
                      </div>
                      <div class="modal-body">
                        <form method="post">
                          <div class="form-group">
                            <label for="">Voornaam</label>
                            <input type="text" name="voornaam" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">achternaam</label>
                            <input type="text" name="achternaam" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">E - mail</label>
                            <input type="email" name="email" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">Adres</label>
                            <input type="text" name="adres" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">postcode</label>
                            <input type="text" name="postcode" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">Plaats</label>
                            <input type="text" name="plaats" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="submit">Voeg medewerker toe</button>
                        </div> <!-- End modal-footer -->
                      </form> <!-- End form -->
                      <?php
                        $get_company = $company->get_company_id($_SESSION["company_username"]);

                        if(isset($_POST["submit"])) {
                          $medewerker->add_medewerker($_POST["voornaam"], $_POST["achternaam"], $_POST["email"], $_POST["adres"], $_POST["postcode"], $_POST["plaats"], $_POST["username"], $timestamp, $_POST["password"], $get_company['bedrijfID']);
                         }

                       ?>
                    </div>
                  </div>
                </div>
                <div class="medewerker-overzicht">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <td><b>Voornaam</b></td>
                        <td><b>Achternaam</b></td>
                        <td><b>E-mail</b></td>
                        <td><b>Username</b></td>
                        <td><b>Password</b></td>
                        <td><b>Bekijk profiel</b></td>
                        <td><b>Verwijder profiel</b></td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $get_company_id = $company->get_company_id($_SESSION['company_username']);
                        $get_company_id = $get_company_id['bedrijfID'];
                        $get_medewerkers = $medewerker->get_medewerkers_from_company($get_company_id);

                        foreach($get_medewerkers as $get_medewerker) {
                          echo '<tr>
                                  <td>' . $get_medewerker['voornaam'] . '</td>
                                  <td>' . $get_medewerker['achternaam'] . '</td>
                                  <td>' . $get_medewerker['email'] . '</td>
                                  <td>' . $get_medewerker['username'] . '</td>
                                  <td><form><input type="hidden" name="medewerkerID" value="'.$get_medewerker['medewerkerID'].'"><button type="submit" class="btn btn-info" name="change_pass">Wijzig wachtwoord</button></form></td>
                                  <td><a href="#">Bekijk profiel</a></td>
                                  <td class="verwijder_medewerker"><a href="#">Klik hier om medewerker te verwijderen.</a><form><input type="hidden" name="medewerkerID" value="'.$get_medewerker['medewerkerID'].'"><button type="submit" class="btn btn-danger" name="delete">Verwijder medewerker</button></form></td>
                                </tr>';
                        }
                      ?>
                    </tbody>
                    <?php
                      if(isset($_POST["delete"])) {

                       }
                     ?>
                </table>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/script.js">

    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
