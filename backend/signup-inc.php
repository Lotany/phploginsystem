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
    header("Location: ../signup.php?error=empyfields$uid=".$username."&mail=".$email);
    exit();
   }

   //check valid email and a valid username
   elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: ../signup.php?error=invalidmailuid");
    exit();
   }

   //check if email is valid
   elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../signup.php?error=invalidmail$uid=".$username);
    exit();
   }
   
   //check for valid chracters
   elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: ../signup.php?error=invaliduid$mail=".$email);
    exit();
   }

   //check if passwords match
   elseif($password !== $passwordRepeat){
    header("Location: ../signup.php?error=passwordcheck$uid=".$username."&mail".$email);
    exit();
   }
 }