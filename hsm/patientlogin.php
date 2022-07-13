<?php
session_start();

include("include/header.php");
include("include/connection.php");

if (isset($_POST['login'])){

    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if (empty($uname)) {
        $error['login'] = "Enter Username";
    }else if (empty($password)) {
        $error['login'] = "Enter Password";
    }   
    
    if (count($error) == 0){
        $query = "SELECT * FROM patient WHERE username='$uname' AND password='$password'";
        $res = mysqli_query($connect,$query);

        if (mysqli_num_rows($res)) {

            echo "<script>alert('done')</script>";
            $_SESSION['patient'] = $uname;
            header("Location:patient/index.php");
        }else{
            echo "<script>alert('Invalid Account')</script>";
        }
    }

}

if (isset($error['login'])){
    $l = $error['login'];

    $show = "<p class='alert alert-danger'>$l</p>";
}else{
    $show = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
</head>
<body style="background-image: url(img/adminloginbg.jpg); background-repeat: no-repeat; background-size: cover;">


    <div style="margin-top: 70px;"></div>

    <div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron" style="background-color: #FF9999;">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <h4 class="text-center" style="color: white; margin-top: -10px;">PATIENT</h4>
                        <img src="img/adminlogo.png" style="height: 150px; width: 150px;">
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <form method="post" class="my-2">

                    <div>
                        <?php

                        // if (isset($error['admin'])){
                        //     $sh = $error['admin'];

                        //     $show = "<p class='alert alert-danger'>$sh</p>";
                        // }else{
                        //     $show = "";
                        // }

                        echo $show;

                        ?> 
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Enter Password"> 
                    </div>
                    <input type="submit" name="login" class="btn btn-success" value="Login">
                    <p>Don't have an account ? <a href="account.php" style="color: red;">Create Now</a></p>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
</body>
</html>