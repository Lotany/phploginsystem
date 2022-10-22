<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Php Login System">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login System</title>
    </head>
    <body>
        <header>
            <nav>
                <a href="#">
                    <img src="" alt="logo">
                </a>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">About me</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div>
                    <form action="backend/login.php" method="post">
                        <input type="text" name="mailuid" id="" placeholder="Username/E-mail..">
                        <input type="password" name="pwd" placeholder="Password..">
                        <button name="login-submit" type="submit">Login</button>
                    </form>
                    <a href="signup.php">Signup</a>
                    <form action="backend/login.php" method="post">
                        <button name="login-submit" type="submit">Logout</button>
                    </form>
                </div>
            </nav>
        </header>
