<?php
    require_once '../../init.php';
    $company = new Company();
    $message = new Message();
    $vacature = new Vacature();
    $user = new User();
    $branche = new Branche();
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

    <!-- CK editor -->
    <script type="text/javascript" src="../../assets/ckeditor/ckeditor.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom css  -->
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
        <?php include '../includes/navbar.php'; ?>
        <!-- END NAVBAR -->

        <!-- Begin sidebar -->
        <?php include '../includes/admin_sidebar.php'; ?>
        <!-- End sidebar -->
        <div id="page-wrapper">

            <div class="container-fluid">
              <div class="intro">
                <h2>Vacature overzicht</h2>
              </div>
              <div class="vacature_overzicht">
                <?php include '../includes/filters.php'; ?>
                <?php

                $get_sollicitanten = $user->get_users();
                foreach($get_sollicitanten as $get_sollicitant) {
                  $_GET['sollicitantID'] = $get_sollicitant['sollicitantID'];
                  echo '
                  <div class="item col-md-3"> <!--Begin of one item -->
                  <form method="post"><input type="hidden" name="sollicitantID" value="'.$get_sollicitant['sollicitantID'].'"><button style="background: none; border: none; position: absolute; top: 2em; right: 2em;"><i class="fa fa-times" aria-hidden="true"></i></button></form>
                    <div class="item-header "><!--Begin of item header shows titel, place and kind of employment  -->
                      <span class="item-titel"><h2>'.$get_sollicitant['voornaam']. ' ' .$get_sollicitant['achternaam'].'</h2></span>
                      <div class="item-info">
                        <span><i class="fa fa-map-marker"></i>'.$get_sollicitant['email'].'</span>
                      </div>
                    </div><!--End of item header -->
                    <div class="expand">
                      <span><a href="edit_sollicitant.php?sollicitantID='.$_GET['sollicitantID'].'">Wijzig User</a></span>
                    </div>
                  </div><!--End of one item -->
                  ';
                }
                if(isset($_POST['sollicitantID'])) {
                  $user->delete_user($_POST['sollicitantID']);
                  echo '<script>location.href="sollicitanten.php"</script>';
                }
                 ?>
              </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>
