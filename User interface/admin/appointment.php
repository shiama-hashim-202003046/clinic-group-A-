<?php
include 'admin_header.php';
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
<?php
// Accept

if(isset($_GET['accept_id'])){
    
    $accept_id = $_GET['accept_id'];

     $sql = "UPDATE appointments SET `status` = 'accepted' where `appointment_id` = $accept_id ";

    if ($query = mysqli_query($conn,$sql)) {
        // echo "<script>
        //  alert('User Update Successfully');windows.location = 'manageusers.php';

        //  </script>";
         echo "<script>alert('Appointment Accepted Successfully');</script>";

    } else {
        echo "Error: " . $sql . "<br>";
    }

}

// canceled 


if(isset($_GET['cancel_id'])){
    
    $cancel_id = $_GET['cancel_id'];

     $sql = "UPDATE appointments SET `status` = 'canceled' where `appointment_id` = $cancel_id ";

    if ($query = mysqli_query($conn,$sql)) {
        // echo "<script>
        //  alert('User Update Successfully');windows.location = 'manageusers.php';

        //  </script>";
         echo "<script>alert('Appointment Canceled Successfully');</script>";

    } else {
        echo "Error: " . $sql . "<br>";
    }

}





?>

                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Doctor Name </th>
                                                <th>Appointment Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                              
                                            </tr>
                                        </thead>
                                        <?php
                                        
                                        $sql = "SELECT * FROM `patient` p , `appointments` a , `doctors` d where a.doctor_id = d.doctor_id and a.patient_id = p.patient_id ";
                                        $query = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($query)){

                                        while($row = mysqli_fetch_array($query)){
                                        
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['patient_name'];  ?></td>
                                                <td><?php echo $row['name'] . ' -- ' . $row['specialty'];  ?></td>
                                                <td><?php echo $row['appointment_date'];  ?></td>
                                                <td><?php echo $row['status'];  ?></td>

                                                <td>
                                                    <a href="appointment.php?accept_id=<?php echo $row['appointment_id']; ?>" class="btn btn-outline-primary"> Accept </a>
                                                    <a href="appointment.php?cancel_id=<?php echo $row['appointment_id']; ?>" class="btn btn-outline-danger"> Cancel </a>
                                                </td>
                                                
                                            </tr>
                                          <?php

                                       }

                                       }
                                      ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    
<?php  
 include 'footer_admin.php';
 ?>