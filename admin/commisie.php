<?php
    require_once '../init.php';
    $company = new Company();
    $message = new Message();
    $vacature = new Vacature();
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
                    Commisie pagina
                  </p>
                </div>
                <div class="commissie-overzicht">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <td>
                          Sollicitant naam
                        </td>
                        <td>
                          Vacature
                        </td>
                        <td>
                          email
                        </td>
                        <td>
                          Commissie
                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $get_company_id = $company->get_company_id($_SESSION['company_username']);
                        $show_sollicitanten = $vacature->show_commissie_per_sollicitant($get_company_id['bedrijfID']);
                        $commissie = 0;
                        foreach($show_sollicitanten as $show_sollicitant) {
                          echo '<tr>
                                  <td>'.$show_sollicitant['voornaam'].' ' .$show_sollicitant['achternaam']. '</td>
                                  <td>'.$show_sollicitant['titel'].'</td>
                                  <td>'.$show_sollicitant['email'].'</td>
                                  <td>'.$show_sollicitant['commissie_per_sollicitant'].'</td>
                                  <td><a href="../profile.php?profileID='.$show_sollicitant['sollicitantID'].'" target="_blank">Bekijk profiel</a></td>
                                </tr>';
                          $commissie+= $show_sollicitant['commissie_per_sollicitant'];
                        }
                        $get_commissie = $vacature->show_commissie($get_company_id['bedrijfID']);
                       ?>
                       <tr>
                         <td></td>
                         <td></td>
                         <td><b>Totaal: </b></td>
                         <td><?php echo $commissie; ?></td>
                         <td></td>
                       </tr>
                    </tbody>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
