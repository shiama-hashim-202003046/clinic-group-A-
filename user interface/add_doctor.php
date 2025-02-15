<?php
include 'admin_header.php';
?>

<?php

if(isset($_GET['doctor_id'])){

    $doctor_id = $_GET['doctor_id'];

    $sql = "SELECT * FROM  `doctors` where `doctor_id` = $doctor_id ";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)){


        $user_date = mysqli_fetch_array($query);
    }

}

?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8">
                                                        
<?php

if(isset($_POST['edit_user'])){
    
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];
    $doctor_id = $_POST['doctor_id'];

     $sql = "UPDATE `doctors` SET `name`='$name',`specialty`='$specialty',`phone`='$phone',`username`='$username',`password`= '$password' WHERE `doctor_id` = '$doctor_id' ";

    if ($query = mysqli_query($conn,$sql)) {
        echo "<script>
         alert('Doctor Update Successfully');windows.location = 'add_doctor.php';

         </script>";
        //  echo "<script>alert('Doctor Update Successfully');";

    } else {
        echo "Error: " . $sql . "<br>";
    }

}





// add User 

if(isset($_POST['add_user'])){

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];


    $sql_check = "SELECT * FROM doctors WHERE username = '$username'";
    $result = mysqli_query($conn,$sql_check);
    if (mysqli_num_rows($result)) {
        // echo "User already exists";
        echo "<script> alert('Doctor already exists'); </script>";
        
    }else{

     $sql = "INSERT INTO `doctors`( `name`, `specialty`, `phone`, `username`, `password`) VALUES ('$name','$specialty','$phone','$username','$password')";

    if ($query = mysqli_query($conn,$sql)) {
        echo "<script> alert('Doctor Added Successfully'); </script>";
    } else {
        echo "Error: " . $sql . "<br>";
    }


}
}

?>
                                <div class="card">
                                    <div class="card-header"> <?php if(isset($_GET['doctor_id'])) echo "Edit Doctor"; else echo "Add Doctor";  ?></div>
                                    <div class="card-body">
                                        <form action="add_doctor.php" method="POST" >

                                        <div class="form-group">
                                                <label for="username" class="control-label mb-1">Doctor Name</label>
                                                <input id="cc-pament" required= "required" value="<?php if(isset($user_date['name'])) echo $user_date['name'];else echo "";  ?>"  name="name" type="text" class="form-control"  >
                                            </div>

                                            <div class="form-group">
                                                <label for="username" class="control-label mb-1">
                                                Specialization</label>
                                                <input id="cc-pament" required= "required" value="<?php if(isset($user_date['specialty'])) echo $user_date['specialty'];else echo "";  ?>"  name="specialty" type="text" class="form-control"  >
                                            </div>

                                            <div class="form-group">
                                                <label for="username" class="control-label mb-1">
                                                Phone</label>
                                                <input id="cc-pament" required= "required" value="<?php if(isset($user_date['phone'])) echo $user_date['phone'];else echo "";  ?>"  name="phone" type="text" class="form-control"  >
                                            </div>

                                            <div class="form-group">
                                                <label for="username" class="control-label mb-1">User Name</label>
                                                <input id="cc-pament" required= "required" value="<?php if(isset($user_date['username'])) echo $user_date['username'];else echo "";  ?>"  name="username" type="text" class="form-control"  >
                                            </div>

                                            <div class="form-group">
                                                <label for="password" class="control-label mb-1">Password</label>
                                                <input id="password" name="password"  value="<?php if(isset($user_date['password'])) echo $user_date['password'];else echo "";  ?>" required= "required" type="password" class="form-control">
                                            </div>

                                            <input type="hidden" value="<?php if(isset($user_date['doctor_id'])) echo $user_date['doctor_id'];else echo "";  ?>" name="doctor_id">
                                            
                                            <div class="card-footer">

                                        <input type="submit" name="<?php if(isset($_GET['doctor_id'])) echo "edit_user"; else echo "add_user";  ?>" value="<?php if(isset($_GET['doctor_id'])) echo "Update"; else echo "Save";  ?>" class="btn btn-success btn-sm">
                                             
                                        
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>





 <?php  
 include 'footer_admin.php';
 ?>