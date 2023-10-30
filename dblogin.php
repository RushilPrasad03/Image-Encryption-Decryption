<?php
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $op = $_REQUEST['op'];

    $con = mysqli_connect('localhost','root','');
    $db = mysqli_select_db($con,'project');
    $sql = "select * from user_info where username='$username' and password='$password'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);

    if($op=="login"){
        if($row == 1){
            echo"login successfully";
            session_start();
            $_SESSION['username']=$username;
            header("Location:index.php");
        }
        else{
            echo"error in login";
            header("Location:login.php");
        }
    }

    elseif($op=="signup"){
        $email = $_REQUEST['email'];
        if($row == 0){
            $sql1 = "INSERT INTO `user_info` (`username`, `password`, `email`, `user_id`) VALUES ('$username', '$password', '$email', NULL);";
            $res1=mysqli_query($con,$sql1);

            echo"registered successfully";
            session_start();
            $_SESSION['username']=$username;
            header("Location:index.php");
        }
        else{
            echo"error in login";
            header("Location:login.php");
        }
    }


?>