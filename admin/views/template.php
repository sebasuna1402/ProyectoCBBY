<?php
session_start();



$routesArray = explode("/",$_SERVER['REQUEST_URI']);

$routesArray = array_filter($routesArray);

foreach ($routesArray as $key => $value) {
   
    $value = explode("?", $value)[0];
    $routesArray[$key] = $value;
   

}


?>








<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Corredor Biologico Bosques del Yaguarundì </title>

  <base href="<?php echo TemplateController::path() ?>">

  <link rel="icon" href="views/assets/img/template/logo.cbpc.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="views/assets/plugins/select2/css/select2.min.css">
  
  <link rel="stylesheet" href="views/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Material Preloader -->
    <link rel="stylesheet" href="views/assets/plugins/material-preloader/material-preloader.css">
  <!-- Notie Alert -->
  <link rel="stylesheet" href="views/assets/plugins/notie/notie.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/assets/plugins/adminlte/css/adminlte.min.css">
  <!-- Template css para login and register -->
  <link rel="stylesheet" href="views/assets/custom/template/template.css">
  <!-- librerias para las tablas -->
  

  <!-- jQuery -->
<script src="views/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="views/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="views/assets/plugins/adminlte/js/adminlte.min.js"></script>
<!-- Bootstrap Switch -->
<script src="views/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script src="views/assets/plugins/select2/js/select2.full.min.js"></script>
  <!-- Material Preloader -->
  <!-- https://www.jqueryscript.net/loading/Google-Inbox-Style-Linear-Preloader-Plugin-with-jQuery-CSS3.html -->
  <script src="views/assets/plugins/material-preloader/material-preloader.js"></script>
  <!-- Notie Alert -->
  <!-- https://jaredreich.com/notie/ -->
  <!-- https://github.com/jaredreich/notie -->
  <script src="views/assets/plugins/notie/notie.min.js"></script>
  <!-- Sweet Alert -->
  <!-- https://sweetalert2.github.io/ -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php if (!empty($routesArray[1]) && !isset($routesArray[2])): ?>
  <?php if ($routesArray[1] == "admins" || 
            $routesArray[1] == "users" || 
            $routesArray[1] == "donations" ||
            $routesArray[1] == "volunteers" ||
            $routesArray[1] == "reports" ||
            $routesArray[1] == "documentation"): ?>
<!-- DataTables  & Plugins -->
  <!-- daterange picker -->
  <link rel="stylesheet" href="views/assets/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="views/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="views/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="views/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->

<!-- date-range-picker -->

<script src="views/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="views/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="views/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="views/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="views/assets/plugins/jszip/jszip.min.js"></script>
<script src="views/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="views/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<?php endif ?>
<?php endif ?>

<script src="views/assets/custom/alerts/alerts.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">


<?php

if(!isset($_SESSION["admin"])){



include "views/pages/login/login.php";

echo '</body></head>';

return;
}
?>




<?php if(isset($_SESSION["admin"])): ?>

<!-- Site wrapper -->
<div class="wrapper">


  <!-- Navbar -->
 <?php include "views/modules/navbar.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include "views/modules/sidebar.php";?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <?php

if (!empty($routesArray[1])) {

if ($routesArray[1] == "admins" || 
    $routesArray[1] == "users" || 
    $routesArray[1] == "donations" ||
    $routesArray[1] == "volunteers" ||
    $routesArray[1] == "reports" ||
    $routesArray[1] == "documentation"||
    $routesArray[1] == "logout" ) {

include "views/pages/".$routesArray[1]."/".$routesArray[1].".php";
  
}else{

    include "views/pages/404/404.php";

}


}else {


    include "views/pages/home/home.php";
  


}

?>


    <!-- Content Header (Page header) -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

include "views/modules/footer.php";


?>


</div>
<!-- ./wrapper -->


<?php endif ?>



<script src="views/assets/custom/forms/forms.js"></script>
</body>
</html>
