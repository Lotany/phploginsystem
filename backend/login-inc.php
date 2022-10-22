<?php
   

if (isset($_POST['login-submit'])){
    require 'dbConnect.php';
    $mailuid = $_POST['mailuid'];
    $password =$_POST['pwd'];

    if (empty($mailuid) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else{
     $sql = "SELECT * FROM users WHERE uidUsers=? OR  emailUsers=?;";
     //initialize the stmt
     $stmt = mysqli_stmt_init($conn);

     //check if it works in a database
     if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../index.php?error=sqlerror");
        exit();
     }
     else{
        mysqli_stmt_bind_param($stmt,"ss", $mailuid, $mailuid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
        
            //harsh the password the user entered and check wether they match with the harshed one in the database
            $passwordCheck = password_verify($password, $row['pwdUsers']);
            if ($passwordCheck== false){
                header("Location: ../index.php?error=wrongpassword");
                exit();
            }
            elseif($passwordCheck == true){
                session_start();
                $_SESSION['userId']=$row['idUsers'];
                $_SESSION['userUid']=$row['uidUsers'];
                header("Location: ../index.php?login=success");
                exit();
            }

            else{
                header("Location: ../index.php?error=wrongpassword");
                exit();
            }
        }
        else{
            header("Location: ../index.php?error=nouser");
            exit();
        }
     }

    }
    



}
 //send users back to index page if they access signup page
 else{
    header("Location: ../index.php");
                exit();
 }