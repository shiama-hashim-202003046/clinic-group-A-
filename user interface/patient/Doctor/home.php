<?php
include 'admin_header.php';
?>

<?php

if(isset($_GET['user_id'])){

    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM  `users` where `id` = $user_id ";
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
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $user_id = $_POST['user_id'];

     $sql = "UPDATE users SET  `username` = '$username' , `passwored_hash` = '$password', `role` = '$role'  where `id` = $user_id ";

    if ($query = mysqli_query($conn,$sql)) {
        // echo "<script>
        //  alert('User Update Successfully');windows.location = 'manageusers.php';

        //  </script>";
         echo "<script>alert('User Update Successfully');windows.location = 'manageusers.php';</script>";

    } else {
        echo "Error: " . $sql . "<br>";
    }

}





// add User 

if(isset($_POST['add_user'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];


     $sql_check = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn,$sql_check);
    if (mysqli_num_rows($result)) {
        // echo "User already exists";
        echo "<script> alert('User already exists'); </script>";
        
    }else{

     $sql = "INSERT INTO users (`username`, `passwored_hash`, `role`) VALUES ('$username', '$password', '$role')";

    if ($query = mysqli_query($conn,$sql)) {
        echo "<script> alert('User Added Successfully'); </script>";
    } else {
        echo "Error: " . $sql . "<br>";
    }


}
}

?>
                                <div class="card">
                                    <div class="card-header"> <?php if(isset($_GET['user_id'])) echo "Edit User"; else echo "Add User";  ?></div>
                                    <div class="card-body">
                                        <form action="home.php" method="POST" >
                                            <div class="form-group">
                                                <label for="username" class="control-label mb-1">User Name</label>
                                                <input id="cc-pament" required= "required" value="<?php if(isset($user_date['username'])) echo $user_date['username'];else echo "";  ?>"  name="username" type="text" class="form-control"  >
                                            </div>

                                            <div class="form-group">
                                                <label for="password" class="control-label mb-1">Password</label>
                                                <input id="password" name="password"  value="<?php if(isset($user_date['passwored_hash'])) echo $user_date['passwored_hash'];else echo "";  ?>" required= "required" type="password" class="form-control">
                                            </div>

                                            <input type="hidden" value="<?php if(isset($user_date['id'])) echo $user_date['id'];else echo "";  ?>" name="user_id">

                                            <div class="form-group">
                                                <label for="role" class="control-label mb-1">Role</label>
                                                <select name="role"  required = "required" id="select" class="form-control">
                                                        <option value="<?php if(isset($user_date['role'])) echo $user_date['role'];else echo "";  ?>"> <?php if(isset($user_date['role'])) echo $user_date['role'];else echo "Please Select Role";  ?></option>
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                    </select>
                                            </div>
                                            
                                            <div class="card-footer">

                                        <input type="submit" name="<?php if(isset($_GET['user_id'])) echo "edit_user"; else echo "add_user";  ?>" value="<?php if(isset($_GET['user_id'])) echo "Update"; else echo "Save";  ?>" class="btn btn-success btn-sm">
                                             
                                        
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