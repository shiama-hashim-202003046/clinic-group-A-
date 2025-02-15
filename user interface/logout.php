<?php 

// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
session_start();

// 2. Unset all the session variables
unset( $_SESSION['username'] );
unset( $_SESSION['id'] );
unset( $_SESSION['role'] );

// 4. Destroy the session
// session_destroy();

// 3. Redirect to a login page

header('location:index.php');
?>