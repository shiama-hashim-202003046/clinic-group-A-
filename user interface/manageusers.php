<?php
include 'admin_header.php';
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
<?php
if(isset($_GET['del_id'])){
    

    $user_id = $_GET['del_id'];

     $sql = "DELETE FROM users  where `id` = $user_id ";

    if ($query = mysqli_query($conn,$sql)) {
        // echo "<script>
        //  alert('User Update Successfully');windows.location = 'manageusers.php';

        //  </script>";
         echo "<script>alert('User Deleted Successfully');</script>";

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
                                                <th>User Name</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                              
                                            </tr>
                                        </thead>
                                        <?php
                                        
                                        $sql = "SELECT * FROM users";
                                        $query = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($query)){

                                        while($row = mysqli_fetch_array($query)){
                                        
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['username'];  ?></td>
                                                <td><?php echo $row['role'];  ?></td>
                                                <td>
                                                    <a href="home.php?user_id=<?php echo $row['id']; ?>" class="btn btn-outline-primary"> Edit </a>
                                                    <a href="manageusers.php?del_id=<?php echo $row['id']; ?>" class="btn btn-outline-danger"> Delete </a>



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