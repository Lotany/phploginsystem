<?php
 require 'header.php';
?>

   <main>
    <div>
        <section>
            <h1>Signup</h1>
            <form action="backend/signup-inc-.php" method="post">
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