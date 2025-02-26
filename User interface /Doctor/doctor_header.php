<?php 
include '../connection.php';
?>
<?php

if(!isset($_SESSION['doctor_id'])){

    echo "<script>window.location.href='index.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
<?php
//if($_SESSION['role'] == 'admin'){
?>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="home.php">
                                Add User</a>
                        </li>

                        <li>
                            <a href="manageusers.php">
                                Manage Users</a>
                        </li> -->
<?php //} ?>
                        <!-- <li>
                            <a href="add_doctor.php">
                                Add Doctor</a>
                        </li>


                        <li>
                            <a href="manage_doctor.php">
                                Manage Doctor</a>
                        </li> -->

                        <li>
                            <a href="appointment.php">
                                 Appointment</a>
                        </li>

                        <li>
                            <a href="completed.php">
                                 Completed </a>
                        </li>

                        
                        <li>
                            <a href="logout.php">
                                Logout </a>
                        </li>

                        <!-- <li>
                            <a href="reports.php">
                                Reports </a>
                        </li> -->

                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">

<?php
//if($_SESSION['role'] == 'admin'){
?>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="home.php">
                                Add User</a>
                        </li>

                        <li>
                            <a href="manageusers.php">
                                Manage Users</a>
                        </li> -->
<?php //} ?>
                        <!-- <li>
                            <a href="add_doctor.php">
                                Add Doctor</a>
                        </li>


                        <li>
                            <a href="manage_doctor.php">
                                Manage Doctor</a>
                        </li> -->

                        <li>
                            <a href="appointment.php">
                                 Appointments</a>
                        </li>

                        <li>
                            <a href="completed.php">
                                 Completed</a>
                        </li>


                        <!-- <li>
                            <a href="reports.php">
                                Reports </a>
                        </li> -->


                        <li>
                            <a href="logout.php">
                                Logout </a>
                        </li>




                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">

                            <div class="header-button">

Welcome <?php echo $_SESSION['name'];  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
