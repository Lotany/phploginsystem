<?php
     

//check if the user clicked a signup button using a super global variable post
 if (isset($_POST['signup-submit'])){

    require 'dbConnect.php';

//adding variable from the form
   $username = $_POST['uid'];
   $email = $_POST['mail'];
   $password = $_POST['pwd'];
   $passwordRepeat = $_POST['pwd-repeat'];
//error handler checking if the texx boxes are empty
   if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
    header("Location: ../signup.php?error=empyfields$uid".$username."&mail".$email."$");
   }
 }