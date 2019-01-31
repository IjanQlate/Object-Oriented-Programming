<?php
include_once 'include/class.user.php';  $user = new User(); // Checking for user logged in or not

 if (isset($_REQUEST['submit'])){
 extract($_REQUEST);
 $register = $user->reg_user($fullname, $uname,$upass, $uemail);
 if ($register) {
 // Registration Success
 echo 'Registration successful <a href="login.php">Click here</a> to login';
 } else {
 // Registration Failed
 echo 'Registration failed. Email or Username already exits please try again';
 }
 }
 
 ?>
