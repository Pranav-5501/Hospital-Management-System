<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
</head>
<body>
    <?php
        include("include/header.php");
        include("include/connection.php");

        if (isset($_POST['login'])){

            $uname = $_POST['uname'];
            $password = $_POST['pass'];
    
            $error = array();

            $q = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
            $qq = mysqli_query($connect,$q);

            $row = mysqli_fetch_array($qq);

    
            if (empty($uname)) {
                $error['login'] = "Enter Username";
            }else if (empty($password)) {
                $error['login'] = "Enter Password";
            }else if($row['status'] == "Pending"){
                $error['login'] = "Please wait for admin to confirm";
            }else if($row['status'] == "Rejected"){
                $error['login'] = "Your application is rejected";
            }

            if (count($error) == 0){
                $query = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
                $res = mysqli_query($connect,$query);

                if (mysqli_num_rows($res)) {

                    echo "<script>alert('done')</script>";
                    $_SESSION['doctor'] = $uname;
                    header("Location:doctor/index.php");
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
                        <h4 class="text-center" style="color: white; margin-top: -10px;">DOCTOR</h4>
                        <img src="img/doc1.png" style="height: 150px; width: 150px;">
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
                    <p>Don't have an account ? <a href="apply.php" style="color: red;">Apply Now</a></p>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>

</body>
</body>
</html>