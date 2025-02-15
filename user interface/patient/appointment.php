<?php  
include 'header.php';
?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Appointment</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Appointment</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

<?php

if(isset($_POST['book'])){

    $doctor_id = $_POST['doctor_id'];
    $patient_id = $_POST['patient_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $appointment_date = $date . ' ' . $time;


    $query_check = "SELECT * FROM `appointments` WHERE `doctor_id` = '$doctor_id' and `appointment_date` = '$appointment_date' and `status` = 'pending' and `patient_id` = '$patient_id'";
    $result = mysqli_query($conn,$query_check);
    if(mysqli_num_rows($result)){
        echo "<script>alert('You Already Booked Appointment for this Date and Time !!')</script>";
        // exit();
    }else{
    $query = "INSERT INTO `appointments`(`doctor_id`, `patient_id`, `appointment_date`,`status`) VALUES ('$doctor_id','$patient_id','$appointment_date','pending')";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "<script>alert('Appointment Booked Successfully !!')</script>";
    }else{
        echo "<script>alert('Failed to Book Appointment !!')</script>";
    }


    }
}


?>









    <!-- Appointment Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Appointment</p>
                    <h1 class="mb-4">Make An Appointment To Visit Our Doctor</h1>
                    <p class="mb-4">We’re here to help you achieve optimal health and well-being. Booking an appointment with one of our experienced doctors is quick and easy. Simply follow the steps below to secure your visit.</p>
                    <div class="bg-light rounded d-flex align-items-center p-5 mb-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Call Us Now</p>
                            <h5 class="mb-0">+012 345 6789</h5>
                        </div>
                    </div>
                    <div class="bg-light rounded d-flex align-items-center p-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-envelope-open text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Mail Us Now</p>
                            <h5 class="mb-0">info@example.com</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded h-80 d-flex align-items-center p-5">
                        <form action="appointment.php" method="post">
                            <div class="row g-3">
  
  
                                <div class="col-12">
                                    <select required name="doctor_id" required class="form-select border-0" style="height: 55px;">
                                        <option value="" selected>Choose Doctor</option>
                                        <?php   
                                        $query = "SELECT * FROM `doctors`";
                                        $result = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($result)){                              
                                        ?>
                                        <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['name'] . ' --- ' . $row['specialty'] ; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <?php
if(isset($_SESSION['patient_id'])){
    echo '<input type="hidden" name="patient_id" value="'.$_SESSION['patient_id'].'">';
}
?>
 

                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="date"
                                            class="form-control border-0 datetimepicker-input"
                                            placeholder="Choose Date" required  require name="date" data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time" data-target-input="nearest">
                                        <input type="time"
                                            class="form-control border-0 datetimepicker-input"
                                            placeholder="Choose Time" require name="time" data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>

<?php
if(isset($_SESSION['patient_id'])){
?>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="book" type="submit">Book Appointment</button>
                                </div>
<?php }else{ ?>

                              <div class="col-12">
                                    <a href="login.php" class="btn btn-primary w-100 py-3"  type="submit">You Must Login First !!</a>
                                </div>

    <?php } ?>


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