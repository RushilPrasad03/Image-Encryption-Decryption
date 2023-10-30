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
    <!--header starts-->

    <section class="header">
        
        <a class="fa-solid fa-bars" id="hamburg-ico" onclick="change()"></a>

        <div class="page-title">
            <span>Pixis</span>
            <span style="font-size: 1.3rem;">IMAGE ENCRYPTION & DECRYPTION</span>
        </div>

        <a class="fa-solid fa-user" onclick="profile_on()"></a>

    </section>
    <!--header ends-->

    <?php
    if(empty($_SESSION['username'])){?>

        <div class="overlay"></div>
        <!--login starts-->
        <form action="dblogin.php" method="post" class="login-from">
            <section class="login" style="transform: translateY(0%);">
                <div class="login-box">
                    <h1 class="heading1"></h1>
                    <p class="title">LOGIN</p>

                    <label for="username">username</label>
                    <input type="text" name="username">

                    <label for="password">password</label>
                    <div>
                        <input type="password" id="login-pass" name="password">
                    </div>

                    <span style="display: flex; align-items: center; gap: 0.4rem;">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember Me</label>
                    </span>

                    <input type="submit" value="SUBMIT">

                    <span>
                        dont have an account ?<b onclick="signin()">Sign Up</b>
                    </span>
                </div>
            </section>
        </form>
        <!--login ends-->

        <!--signup starts-->
        <form action="dblogin.php" method="post" class="login-from">
            <section class="signup" style="transform: translateY(-105%);">
                <div class="login-box" id="login">
                    <h1 class="heading2"></h1>
                    <p class="title">SIGN UP</p>

                    <label for="username">username</label>
                    <input type="text" name="username">

                    <label for="password">password</label>
                    <div>
                        <input type="password" id="sign-pass" name="password">
                    </div>

                    <label for="email">email id</label>
                    <input type="text" name="email">

                    <span style="display: flex; align-items: center; gap: 0.4rem;">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember Me</label>
                    </span>

                    <input type="submit" value="SUBMIT">

                    <span>
                    already have an account ?<b onclick="login()">Login</b>
                    </span>
                </div>
            </section>
        </form>
        <!--signup ends-->
    <?php
    }
    ?>
    <?php
        $user = 'root';
        $password = ''; 
        $database = 'project'; 
        $servername='localhost:3306';
        $mysqli = new mysqli($servername, $user, $password, $database); 
        $namee=$_SESSION['username'];
        $sql = "SELECT * FROM `userinfo` where username='$namee'";
        $result = $mysqli->query($sql);
        $mysqli->close(); 
    ?>
    <!--profile starts-->
    <?php
        $rows=$result->fetch_assoc();
    ?>
        <section class="profile">
            <a class="fa-solid fa-xmark cross" onclick="profile_off()"></a>
            <div class="login-box" id="signin">
                <h1 class="heading1"></h1>
                <p class="title">ACCOUNT INFO</p>

                <label for="username">username</label>
                <input type="text" value="<?php echo $rows['username']; ?>" disabled>

                <label for="password">password</label>
                <div>
                    <input type="password" id="profile-pass" value="<?php echo $rows['password']; ?>" disabled><!--
                    --><a class="fa-solid fa-eye" onclick="show()"></a>
                </div>
                <label for="email">email id</label>
                <input type="text" value="<?php echo $rows['email'];?>" disabled>
                <input type="submit" value="LOGOUT" onclick="location.href = 'www.youtube.com';">
            </div>
        </section>
    <!--profile ends-->
    
    <!--sidemenu starts-->
    <section class="side-menu">
        <div>
            <div class="side-header">Encrypt image online</div>
            <div class="side-data">Image encryption tool help to protect your sensitive images while using online. This tool will make your image unrecognizable using the secret key.</div>
        </div>
        <div>
            <div class="side-header">Free To Use</div>
            <div class="side-data">Encrypt image tool is completely free to use and it is a full version, no hidden payments, no demo versions and no other limitations.</div>
        </div>
        <div>
            <div class="side-header">No Skills Required</div>
            <div class="side-data">No Special skills are required encrypt image using this tool. Upload your image in tool and click encrypt image button to scramble your image.</div>
        </div>
    </section>
    <!--sidemenu ends-->

    <!--body starts-->
    <form action="function.php" method="post" class="main-form" enctype="multipart/form-data">
        <section class="body">
            <div class="form-img">
                <input type="file" name="doc" id="doc"  accept="images/*" onchange="loadFile(event)" style="display:none;">
                <p id="upload-btn"><label for="doc">UPLOAD IMAGE</label></p>
                <img src="" id="output">
                <p style="display: none;" id="change-btn"><label for="doc">CHANGE IMAGE</label></p>
            </div>

            <div class="form-desc">
                    <select id="op" name="op" required>
                        <option value="none" disabled selected >Select</option>
                        <option value="encrypt">Encrypt</option>
                        <option value="decrypt">Decrypt</option>
                    </select>
                <div>
                    <p>Pin:</p>
                <span>
                    <input type="text" name="key1" id="key1" required maxlength="1" onkeyup="autoTab('key1', '1', 'key2')">
                    <input type="text" name="key2" id="key2" required maxlength="1" onkeyup="autoTab('key2', '1', 'key3')">
                    <input type="text" name="key3" id="key3" required maxlength="1" onkeyup="autoTab('key3', '1', 'key4')">
                    <input type="text" name="key4" id="key4" required maxlength="1" onkeyup="autoTab('key3', '1', 'submit')">
                </span>
                </div>
                <input type="submit" id="submit" value="SUBMIT">
            </div>
        </section>
    </form>
    <!--body ends-->

    <!--footer starts-->
    <footer class="footer">

    </footer>
    <!--footer ends-->
    <script src="lib/script.js"></script>
</body>
</html>