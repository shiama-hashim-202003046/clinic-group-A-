<?php
include 'doctor_header.php';
?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">


        <?php
        
if(isset($_GET['appoint_id']) && isset($_GET['patiant_id'])){


    $appoint_id = $_GET['appoint_id'];
    $patiant_id  = $_GET['patiant_id'];

    $sql = "SELECT * FROM `patient` p , `appointments` a , `doctors` d where a.doctor_id = d.doctor_id and a.patient_id = p.patient_id and a.appointment_id = $appoint_id ";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)){


        $appoint_data = mysqli_fetch_array($query);
    }

}
        
        ?>

<?php
if(isset($_GET['complete_id'])){
    

    $appoint_id = $_GET['complete_id'];

     $sql = "UPDATE appointments SET `status` = 'completed' where `appointment_id` = $appoint_id";

    if ($query = mysqli_query($conn,$sql)) {

        echo "<script>alert('Patiant Data Completed Successfully !!');window.location.href='appointment.php'</script>";
         

    } else {
        echo "Error: " . $sql . "<br>";
    }

}


?>


            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <strong>Patiant Details</strong>

                        </div>
                        <div class="card-body">

                            
                            Patiant Name : <?php echo $appoint_data['patient_name']; ?>
                            
                            <br>

                             Age : <?php echo $appoint_data['patient_age']; ?>

                            <br>
                             Gender : <?php echo $appoint_data['gender']; ?>
                             <br>
                             Phone : <?php echo $appoint_data['phone']; ?>
                             <br>
                             <br>

                             <a href="view.php?complete_id=<?php echo $appoint_data['appointment_id'];   ?>" class="btn btn-success">Complete</a>

                        </div>
                    </div>
                    <!-- /# card -->


                    <div class="card">
                        <div class="card-header">
                            <strong>Medical Record</strong>
                        </div>
                        <div class="card-body">

                            <!--  -->


                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>Records</h3>

                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                    diagnosis
                                                    </td>
                                                    <td>treatment</td>
                                                    <td>medication</td>

                                                    <td>visit_date</td>
                                                    
                                                </tr>
                                            </thead>
                                            <?php

                                        
                                        $sql = "SELECT * FROM `medical_records` where `patient_id` = $patiant_id";
                                        $query = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($query)){

                                        while($row = mysqli_fetch_array($query)){
                                        
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['diagnosis'];  ?></td>
                                                <td><?php echo $row['treatment'];  ?></td>
                                                <td><?php echo $row['medication'];  ?></td>
                                                <td><?php echo $row['visit_date'];  ?></td>
                                                
                                            </tr>
                                          <?php

                                       }

                                       }
                                      ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END USER DATA-->
 



                            <!--  -->

                        </div>
                    </div>

                </div>

              
                <?php

if(isset($_POST['add'])){


    $medication = $_POST['medication'];
    $treatment = $_POST['treatment'];
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $diagnosis = $_POST['diagnosis'];
    $appoint_id = $_POST['appoint_id'];
    
    

    $query_insert = "INSERT INTO `medical_records`(`patient_id`, `doctor_id`, `diagnosis`, `treatment`,`medication`) 
    VALUES ($patient_id,$doctor_id,'$diagnosis','$treatment','$medication')";
    if($result = mysqli_query($conn,$query_insert)){

        echo "<script>alert('Medical Record Added Successfully !!  ');window.location.href='appointment.php'</script>";


    }else{

        echo "<script>alert('Error In Saving Medical Record !!  ')</script>";


    }
}

?>




                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add Medical Record </strong>
                        </div>
                        <div class="card-body">

                        <div class="login-form">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>	Diagnosis</label>
                                    <input class="au-input au-input--full" type="text" required = 'required' name="diagnosis" >
                                </div>
                                <input type="hidden" name="doctor_id" value="<?php echo $appoint_data['doctor_id']; ?>">
                                <input type="hidden" name="patient_id" value="<?php echo $appoint_data['patient_id']; ?>">
                                <input type="hidden" name="appoint_id" value="<?php echo $appoint_data['appointment_id']; ?>">

                                
                                <div class="form-group">
                                    <label>Treatment</label>
                                    <input class="au-input au-input--full" type="text" required = 'required' name="treatment" >
                                </div>
                                <div class="form-group">
                                    <label>Medication</label>
                                    <input class="au-input au-input--full" type="text" required = 'required' name="medication" >
                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="add" type="submit">Save</button>
                                
                            </form>

                        </div>

                        </div>
                    </div>


                </div>
            </div>




            <?php
            include 'footer_doctor.php';
            ?>