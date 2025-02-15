<?php  
include 'header.php';
?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Registration</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Registration</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Appointment Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Registration</p>
                    <h1 class="mb-4">Registration Now !</h1>
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
                        <form method="post" action="registration.php">
                            <h1>Registration</h1>
                            <?php

                            if(isset($_POST['register'])){
                                $name = $_POST['name'];
                                $age = $_POST['age'];
                                $phone = $_POST['phone'];
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $gender = $_POST['gender'];

                                $query_check = "SELECT * FROM `patient` WHERE `patient_name` = '$username'";
                                $result = mysqli_query($conn,$query_check);
                                if(mysqli_num_rows($result)){

                                    echo "<script>alert('  User Already Exist !!  ')</script>";

                                }else{

                                $query = "INSERT INTO `patient`(`patient_name`, `patient_age`, `phone`, `username`, `password`, `gender`) VALUES ('$name','$age','$phone','$username','$password','$gender')";
                                $result = mysqli_query($conn,$query);
                                if($result){
                                    echo "<script>alert('Registration Successfully')</script>";
                                }else{
                                    echo "<script>alert('Registration Failed')</script>";
                                }
                            }
                        }
                            
                            ?>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Name"  name="name" required style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" class="form-control border-0"  min = "15"  max = "99"  placeholder="Age" name="age" required style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="phone" required  placeholder="Your Mobile" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                
                                <label for="male">Male</label>
                                <input type="radio" id="male" checked  name="gender" value="male">
        
                                <label for="female">Female</label>

                               <input type="radio" id="female"   name="gender" value="female">

                                </div>
                                <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" name="username" required  placeholder="User Name" style="height: 55px;">
                                    
                                </div>
                                <div class="col-12 col-sm-6">
                                <input type="password" class="form-control border-0" name="password" required  placeholder="****" style="height: 55px;">
                                    
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="register" type="submit">Registration</button>
                                </div>
                                <div class="col-12">
                                    <a href="login.php" class="btn btn-link">I Have Account !! </a>
                            </div>
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