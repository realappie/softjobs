<?php
    require_once '../../init.php';
    $company = new Company();
    $message = new Message();
    $vacature = new Vacature();
    $check = new Check();
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

    <title>Vacature - Admin paneel</title>
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
                <h2>Vacature Toevoegen</h2>
              </div>
              <?php
                $get_vacature_info = $vacature->get_single_vacature($_GET['vacatureID']);
               ?>
              <div class="vacature">
                <form method="post">
                  <div class="item col-md-12 vacature"> <!--Begin of vacancy -->
                    <button type="button" name="edit" class='edit_vacature'><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <div class="item-header "><!--Begin of item header shows titel, place and kind of employment  -->
                      <div class="edit_job_info">
                        <label>Titel<input type="text" name="titel" value="<?php echo $get_vacature_info['titel'] ?>" class="form-control"></label>
                      </div>
                      <span class="item-titel"><h2><?php echo $get_vacature_info['titel'] ?></h2></span>
                      <div class="job-info">
                        <div class="edit_job_info">
                          <div class="row">
                            <label>Locatie<input type="text" name="locatie" value="<?php echo $get_vacature_info['locatie'] ?>" class="form-control"></label>
                            <label>Dienstverband
                              <select name="dienstverband" class="form-control">
                                <option value="fulltime">Fulltime</option>
                                <option value="parttime">partime</option>
                                <option value="vakantiewerk">Vakantiewerk</option>
                                <option value="weekendwerk">Weekendwerk</option>
                              </select>
                          </label>
                          <label>Scholing
                            <select name="opleiding" class="form-control">
                              <option value="VMBO">VMBO</option>
                              <option value="MBO">MBO</option>
                              <option value="HBO">HBO</option>
                              <option value="WO">WO</option>
                            </select>
                          </label>
                        </div>
                        <div class="row">
                          <label>Minimale beschikbare uren<input type="text" name="min_uren" value="<?php echo $get_vacature_info['min-uren'] ?>" class="form-control"></label>
                          <label>Maximale beschikbare uren<input type="text" name="max_uren" value="<?php echo $get_vacature_info['max-uren'] ?>" class="form-control"></label>
                        </div>
                        <div class="row">
                          <label>Minimale salaris<input type="text" name="min_salaris" value="<?php echo $get_vacature_info['min-salaris'] ?>" class="form-control"></label>
                          <label>Maximale salaris<input type="text" name="max_salaris" value="<?php echo $get_vacature_info['max-salaris'] ?>" class="form-control"></label>
                        </div>
                        <div class="row">
                          <select name="branche" class="form-control">
                            <?php
                              $get_branches = $branche->get_branche();
                              foreach($get_branches as $get_branche) {
                                echo '<option value="'.$get_branche['brancheID'].'">'.$get_branche['branchenaam'].'</option>';
                              }
                             ?>
                          </select>
                        </div>
                        </div>
                        <span><?php echo $get_vacature_info['locatie'] ?> | Fulltime   | <?php echo $get_vacature_info['school'] ?></span>
                      </div> <!-- end /item-info -->
                    </div><!--End of item header -->
                    <div class="item-content "><!--Begin of item content, shows a preview of the vacany-->
                      <div class="desc">
                        <div class="info">
                          <?php echo $get_vacature_info['vacature'] ?>
                        </div>
                        <div class="edit">
                          <label for="">Vacature</label><textarea name="edit_vacature" id="edit_vacature"><?php echo $get_vacature_info['vacature'] ?></textarea>
                        </div>
                      </div>
                    </div><!--End of item content -->
                    <button type="submit" name="save_changes" class="custombutton">Wijzigingen opslaan</button>
                    <?php
                      $get_reacties = $message->get_sollicitaties($_GET['vacatureID']);
                      $arr = ['titel', 'locatie', 'min_uren', 'max_uren', 'min_salaris', 'max_salaris', 'opleiding',
                              'edit_vacature', 'branche'];
                      if(isset($_POST["save_changes"])) {
                        if($check->fields_filled_in($arr) == false) {
                          echo '<div class="alert alert-danger" role="alert"><b>Er is iets mis gegaan!</b> Zorg ervoor dat alle velden zijn ingevuld.</div>';
                        } else {
                          $commissie = ($_POST["min_salaris"] / 100) * 20;
                          $vacature->edit_vacature($_POST["titel"],
                                                   $_POST["locatie"],
                                                   $_POST["min_uren"],
                                                   $_POST["max_uren"],
                                                   $_POST["min_salaris"],
                                                   $_POST["max_salaris"],
                                                   $_POST["opleiding"],
                                                   $_POST["edit_vacature"],
                                                   $commissie,
                                                   $_POST["branche"],
                                                   $_GET['vacatureID']
                                                );
                         $vacatureID = $_GET['vacatureID'];
                         echo '<script>location.href = "vacature.php?vacatureID='.$vacatureID.'"</script>';
                        }
                       }
                     ?>
                  </div><!--End of one item -->

                </form>
              </div>
              <div class="reacties">
                <h2>Reacties: </h2>
                <?php
                  foreach($get_reacties as $get_reactie) {
                    echo '<div class="reactie">
                            <div class="naam">
                              <h2>'.$get_reactie['voornaam']. ' '.$get_reactie['achternaam'].'</h2>
                            </div>
                            <div class="motivatie">
                              '.$get_reactie['sollicitatie'].'
                              <a href="../profile.php?profileID='.$get_reactie['sollicitantID'].'">Bekijk profiel</a>
                            </div>
                          </div>';
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
    <script type="text/javascript" src="../../assets/js/script.js">

    </script>

</body>
<script type="text/javascript">
  CKEDITOR.replace( 'edit_vacature',
  {
  height: '400px'
  } );
</script>
</html>
