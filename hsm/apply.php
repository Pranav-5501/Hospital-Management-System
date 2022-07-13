<?php

use LDAP\Result;

include("include/header.php");
include("include/connection.php");

if(isset($_POST['apply'])){

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];

    $error = array();

    if(empty($firstname)){
        $error['apply'] = "Enter Firstname";
    }else if(empty($lastname)){
        $error['apply'] ="Enter Lastname";
    }else if(empty($username)){
        $error['apply'] = "Enter Username";
    }else if(empty($email)){
        $error['apply'] = "Enter Email";
    }else if($gender == ""){
        $error['apply'] = "Select Gender";
    }else if(empty($phone)){
        $error['apply'] = "Enter Phone";
    }else if(empty($password)){
        $error['apply'] = "Enter Password";
    }else if($confirm_password != $password){
        $error['apply'] = "Both Password Not Matching";
    }

    if (count($error) == 0){
        $query = "INSERT INTO doctors(firstname,lastname,username,email,
        gender,phone,password,salary,data_reg,status,profile) VALUES('$firstname',
        '$lastname','$username','$email','$gender','$phone','$password','0',NOW(),'Pending','doctor.jpg')";
    
        $result = mysqli_query($connect,$query);

        if($result) {
            echo "<script>alert('You have Successfully Registered')</script>";

            header("Location: doctorlogin.php");
        }else{
            echo "<script>alert('Registration Failed')</script>";
        }
    }

}

if(isset($error['apply'])){
    $s = $error['apply'];

    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
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
    <title>Doctor Apply</title>
</head>
<body style="background-image: url(img/adminloginbg.jpg); background-repeat: no-repeat; background-size: cover;">

    <div style="margin-top: 20px;"></div>

    <div class="container-fluid" style=>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 jumbotron" style="background-color: #FF9999;">
                    <h4 class="text-center my-4">Doctor Registration</h4>
                    <div>
                        <?php echo $show; ?>
                    </div>
                    <div class="col-md-12">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <!-- <form method="post"> -->
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="fname" class="form-control" autocomplete="off" 
                                        value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>" placeholder="Enter Firstname">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" class="form-control" autocomplete="off" 
                                        value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>" placeholder="Enter Lastname">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off"
                                        value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>" placeholder="Enter Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" autocomplete="off"
                                        value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Enter Email">
                                    </div>
                                <!-- </form> -->
                            </div>
                            <div class="col-md-5">
                            <!-- <form method="post"> -->
                                <div class="form-group">
                                    <label>Select Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" name="phone" class="form-control" autocomplete="off"
                                    value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>" placeholder="Enter Phone Number">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
                                </div>
                            <!-- </form> -->
                            </div>
                            <div class="col-md-1"></div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <!-- <form method="post"> -->
                                    
                                    <input type="submit" name="apply" value="Apply Now" class="btn btn-success" style="width: 150px;">
                                    <p>I already have an account <a href="doctorlogin.php" style="color: red;">Click here</a></p>
                                <!-- </form> -->
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    
</body>
</html>