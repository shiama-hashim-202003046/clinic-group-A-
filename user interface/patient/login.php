<?php  
include 'header.php';
?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


<?php

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $query_check = "SELECT * FROM `patient` WHERE `username` = '$username' and `password` = '$password'";
    $result = mysqli_query($conn,$query_check);
    if(mysqli_num_rows($result)){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['patient_name'] = $row['patient_name'];
        $_SESSION['patient_id'] = $row['patient_id'];

        // header('location:index.php');

        echo "<script>window.location.href='index.php'</script>";


    }else{

        echo "<script>alert('Wrong User Name or Password !!  ')</script>";


    }
}

?>


    
    <!-- Appointment Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Login</p>
                    <h1 class="mb-4">Sign into Your Account Now !! </h1>
                    <p class="mb-4"></p>
                    <div class="bg-light rounded d-flex align-items-center p-5 mb-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Call Us Now</p>
                            <h5 class="mb-0">+97146650000</h5>
                        </div>
                    </div>
                    <div class="bg-light rounded d-flex align-items-center p-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-envelope-open text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Mail Us Now</p>
                            <h5 class="mb-0">info@ehs.gov.ae</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                        <form method="post" action="login.php">
                            <h1>Login</h1>
                            <br>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" required  name="username" placeholder="User Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="password" class="form-control border-0" required  name="password" placeholder="******" style="height: 55px;">
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="login" type="submit">Login</button>
                                </div>

                                <div class="col-12">
                                    <a href="registration.php" class="btn btn-link">Create an Account !!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->
        
    <?php
include 'footer.php';
?>