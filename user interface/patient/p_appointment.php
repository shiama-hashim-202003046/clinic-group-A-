<?php include 'header.php'; ?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Last Appointments</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Last Appointment</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table  table-data3">
                                        <thead>
                                            <tr>
                                                <th>Appointment Data</th>
                                                <th>Doctor Name</th>
                                                <th>status</th>
 
                                            </tr>
                                        </thead>
                                        <?php
                                        $query = "SELECT * FROM `appointments` WHERE `patient_id` = '$_SESSION[patient_id]' ORDER BY `appointment_id` DESC";
                                        $result = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['appointment_date'];  ?></td>
                                                <td><?php
                                                $query_doctor = "SELECT * FROM `doctors` WHERE `doctor_id` = '$row[doctor_id]'";
                                                $result_doctor = mysqli_query($conn,$query_doctor);
                                                $row_doctor = mysqli_fetch_assoc($result_doctor);
                                                echo $row_doctor['name'] . ' --- ' . $row_doctor['specialty'];
                                                ?></td>
                                                <td><?php echo $row['status'];  ?></td>

                                            </tr>
                                         <?php } ?>                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                




            </div>
        </div>
    </div>
    <!-- About End -->


        
<?php include 'footer.php'; ?>