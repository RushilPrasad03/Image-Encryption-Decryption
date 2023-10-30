<?php
    session_start();
    if(empty($_SESSION['username'])){
        header("Location:login.php");
    }
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
    <!-- Header Section Starts -->
    <header>
        <h3 class="title">
            IO
            <span>
                ImageOnline
            </span>
        </h3>
        <nav>
            <a href="index.php">home</a>
            <a id="tos-open">terms of service</a>
            <a id="policy-open">privacy policy</a>
            <a href="">contact</a>
            <a href="logout.php">logout</a>
        </nav>
    </header>
    <!-- Header Section Ends -->

    <!-- Nav Section Starts -->
    <div class="nav">
        <a id="a1" class="nav-link active" onclick="nav('a1');">encrypt image</a>
        <a id="a2" class="nav-link" onclick="nav('a2');">decrypt image</a>
        <a id="a3" class="nav-link" onclick="nav('a3');">encrypt video</a>
        <a id="a4" class="nav-link" onclick="nav('a4');">decrypt video</a>
        <a id="a5" class="nav-link" onclick="nav('a5');">encrypt file</a>
        <a id="a6" class="nav-link" onclick="nav('a6');">decrypt file</a>
    </div>
    <!-- Nav Section Ends -->

    <!-- Encrypt Section Starts -->
    <section>
        <div class="heading">
            <h2 id="title">encrypt image</h2>
            <h3>free online tool</h3>
        </div>
        <div class="row">
            <form class="input-wrapper" id="enc-form" action="function.php" method="post" enctype="multipart/form-data" onsubmit="document.querySelector('#loader-overlay').style.display = 'block';">
                <div class="input">
                    <label for="doc">+</label>
                    <input type="file" name="doc" id="doc" accept="image/*" required>
                    <img src="" class="display-img">
                    <video src="" class="display-vid" controls preload="none"></video>
                    <figure class="file-img">
                        <img src="images/file.png">
                        <figcaption></figcaption>
                    </figure>
                </div>
                <div class="input-submit">
                    <div class="password">
                        <h3>password</h3>
                        <input type="text" name="key" id="key" maxlength="15" required>
                    </div>
                    <input type="hidden" name="op" id="op" value="encrypt">
                    <input type="submit" id="submit" value="encrypt">
                </div>
            </form>
            <div class="input-wrapper">
                <video src="images/demo.mp4" controls preload="none" poster="images/poster.png"></video>
                <h4 id="demo">encrypt image with password - demo here</h4>
            </div>
        </div>
    </section>
    <!-- Encrypt Section Ends -->

    <!-- Popup Section Starts -->
    <div class="overlay"></div>

    <div class="tos" id="tos">
        <h3>terms and service of use <a class="fa-solid fa-xmark" id="tos-close"></a></h3>
        <div class="content">
            <h4>
                terms
                <span>By accessing this web site, you are agreeing to be bound by these web site Terms and Conditions of Use, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. These Terms of Service govern all of our Services, all of which are offered subject to your acceptance without modification of these Terms of Service.</span>
            </h4>
            <h4>
                disclaimer
                <span>The services provided on this web site are provided "as is". This web site makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</span>
            </h4>
            <h4>
                limitations
                <span>In no event shall this web site or its suppliers be liable for any damages (including, without limitation, damages for loss of data or due to business interruption) arising out of the use or inability to use the services on this Internet site, even if this web site has been notified of the possibility of such damage.</span>
            </h4>
            <h4>
                privacy policy
                <span>you can read the privacy policy <a href="">here</a></span>
            </h4>
        </div>
    </div>

    <div class="tos" id="policy">
        <h3>privacy policy <a class="fa-solid fa-xmark" id="policy-close"></a></h3>
        <div class="content">
            <h4>
                What personal information is collected from visitors?
                <span>We do not collect information from visitors of our site.</span>
            </h4>
            <h4>
                Do we use 'cookies'?
                <span>Yes. Cookies are small files that a site or its service provider transfers to your computer's hard drive through your Web browser (if you allow) that enables the site's or service provider's systems to recognize your browser and capture and remember certain information.</span>
            </h4>
            <h4>
                Third-party disclosure
                <span>We do not sell, trade, or otherwise transfer to outside parties your Personally Identifiable Information.</span>
            </h4>
            <h4>
                How does our site handle Do Not Track signals?
                <span>We honor Do Not Track signals and Do Not Track, plant cookies, or use advertising when a Do Not Track (DNT) browser mechanism is in place.</span>
            </h4>
            <h4>
                Does our site allow third-party behavioral tracking?
                <span>It's also important to note that we do not allow third-party behavioral tracking</span>
            </h4>
            <h4>
                Further clarification in privacy policy
                <span>In case of any additional clarifications on our privacy policy, please <a href="">Contact us</a></span>
            </h4>
        </div>
    </div>
    <!-- Popup Section Ends -->

    <!-- About Section Starts -->
    <section>
        <div class="heading">
            <h2>about us</h2>
            <h3>what we do</h3>
        </div>
        <div class="about">
            <article>
                <div class="about-icon">
                    <i class="fa-regular fa-image"></i>
                </div>
                <h3 class="about-heading">Encrypt image online</h3>
                <h4 class="about-description">Encrypt an image using secret password using this tool. Simply upload image in tool, set secret password, then click encrypt button. After image encryption is completed, image is displayed along with download button.</h4>
            </article>
            <article>
                <div class="about-icon">
                    <i class="fa-regular fa-copy"></i>
                </div>
                <h3 class="about-heading">How this tool working?</h3>
                <h4 class="about-description">The image encryption tool totally scramble the image making it unrecognizable. The secret password is key for scrambled image and it should be used when decrypt the image back to original.</h4>
            </article>
            <article>
                <div class="about-icon">
                    <i class="fa-solid fa-coins"></i>
                </div>
                <h3 class="about-heading">Is it free tool?</h3>
                <h4 class="about-description">The image encryption tool is completely free to use. It is a full version, no hidden payments, no sign up required, no demo versions and no other limitations. Easily encrypt any number of images without any restrictions.</h4>
            </article>
            <article>
                <div class="about-icon">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <h3 class="about-heading">Is this secure tool?</h3>
                <h4 class="about-description">Encryption tool is highly secured. The image uploaded in this tool for encryption are removed automatically from server directory, when the user session is expired.</h4>
            </article>
            <article>
                <div class="about-icon">
                    <i class="fa-regular fa-thumbs-up"></i>
                </div>
                <h3 class="about-heading">Any skills required?</h3>
                <h4 class="about-description">No special skills are required to encrypt an image. Simply upload image, set secure password and click encrypt button.</h4>
            </article>
            <article>
                <div class="about-icon">
                    <i class="fa-solid fa-lock-open"></i>
                </div>
                <h3 class="about-heading">Is there are any restrictions?</h3>
                <h4 class="about-description">This tool has no restriction and no limitations, user can encrypt any number of images with password, without any restriction.</h4>
            </article>
        </div>
    </section>
    <!-- About Section Ends -->
    <!-- Footer Section Starts -->
    <footer>
    </footer>
    <!-- Footer Section Ends -->
    <div id="loader-overlay">
        <div class="loader"></div>
    </div>
    <script src="lib/script.js"></script>
</body>
</html>