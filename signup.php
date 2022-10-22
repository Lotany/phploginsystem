<?php
 require 'header.php';
?>

   <main>
    <div>
        <section>
            <h1>Signup</h1>
            
            <!--display an error code-->
            <?php
            if (isset($_GET['error'])){
                if($_GET['error'] == "emptyfields"){
                    echo '<p>Fill in all the fields!</p>';
                }
                elseif($_GET['error'] == "invalidmailuid"){
                    echo '<p>Invalid Email Address!</p>';
                }
                elseif($_GET['error'] == "invalidmail"){
                    echo '<p>Invalid Email!</p>';
                }
                elseif($_GET['error'] == "usernametaken"){
                    echo '<p>Username has already been taken!</p>';
                }
                
            } 
            elseif($_GET['signup'] == "success"){
                echo '<p>Registration successfull!</p>';

            }

            ?>
            <form action="backend/signup-inc.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="email" name="mail" placeholder="Email">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat Password">
                <button type="submit" name="signup-submit">Signup</button>
            </form>
        </section>
    </div>
   </main>

<?php
 require 'footer.php';
 ?>