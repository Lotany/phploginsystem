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
   else{
    $sql ="SELECT uidUsers FROM users WHERE uidUsers=?";
    //initialize create prepared statements
    $stmt = mysqli_stmt_init($conn);

    //check if it works
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../signup.php?error=sqlerror"); 
         exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck>0){
            header("Location: ../signup.php?error=usernametaken&mail".$email);
            exit();
        }

        else{
            $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?);";
            //create a stmt statement
            $stmt = mysqli_stmt_init($conn);
            //check the stmt
            if (!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../signup.php?error=sqlerror"); 
                exit();
            }
            else {
                //encrypt password
                $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?signup=success");
                exit();
            }
        }
    }
   }
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
 }

 //send users back to index page if they access signup page
 else{
    header("Location: ../signup.php");
                exit();
 }