<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Encryption</title>
    <link rel="stylesheet" href="font&css/style.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.css">
    <link rel="icon" href="images/icon.png">
</head>
<body>
    <section class="login-body">
        <section class="login">
            <div class="img-container">
                <img src="images/login.png">
            </div>

            <div class="login-container">
                <form action="dblogin.php" class="login-form">
                    <h3>member login</h3>
                    <div class="input-container">
                        <input type="text" name="username" placeholder="Username" required>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-container">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <input type="submit" value="LOGIN">
                    <input type="hidden" name="op" value="login">
                    <span>forgot username / passowrd?</span>
                    <a onclick="loginSwap()">create your account <i class="fa-solid fa-arrow-right"></i></a>
                </form>
    
                <form action="dblogin.php" class="login-form">
                    <h3>create account</h3>
                    <div class="input-container">
                        <input type="text" name="username" placeholder="Username" required>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" placeholder="Email ID" required>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="input-container">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <input type="submit" value="SIGN UP">
                    <input type="hidden" name="op" value="signup">
                    <span>already have an account?</span>
                    <a onclick="loginSwap()">login instead<i class="fa-solid fa-arrow-right"></i></a>
                </form>
            </div>
            
        </section>
    </section>
    <script>
        function loginSwap(){
            document.querySelector('.login-container').classList.toggle("login-swap");
        }
    </script>
</body>
</html>