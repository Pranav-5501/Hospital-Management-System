<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    include("../include/header.php");
    include("../include/connection.php");
?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("sidenav.php")
                    ?>

                            <?php
                                $doc = $_SESSION['doctor'];
                                $query = "SELECT * FROM doctors WHERE username='$doc'";

                                $res = mysqli_query($connect,$query);

                                $row = mysqli_fetch_array($res);



                            ?>
                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="my-3">
                                    <table class="table table-bordered">
                                        <tr>
                                           <th class="text-center" colspan="2">Details</th> 
                                        </tr>
                                        <tr>
                                            <td>Firstname</td>
                                            <td><?php echo $row['firstname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Lastname</td>
                                            <td><?php echo $row['lastname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td><?php echo $row['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $row['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td><?php echo $row['phone']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td><?php echo $row['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Salary</td>
                                            <td><?php echo "₹".$row['salary'].""; ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">

                           
                                <h5 class="text-center my-4">Update Profile</h5>
                                <form method="post" enctype="multipart/form-data">
                                    <?php
                                        echo "<img src='img/".$row['profile']."' class='col-md-12' style='height: 300px;'>";


                                        if (isset($_POST['update'])){
                                            $img = $_FILES['img']['name'];
        
                                            if (empty($img)){
        
                                            }else {
                                                $query = "UPDATE doctors SET profile='$img' WHERE username='$doc'";
        
                                                $result = mysqli_query($connect,$query);
        
                                                if ($result) {
                                                        move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                                }
                                            }
                                        }
                                    ?>
                                    <br><br>
                                    <div class="form-group">
                                        
                                        <input type="file" name="img" class="form-control">
                                    </div><br>
                                    <input type="submit" name="update" value="UPDATE" class="btn btn-success">
                                </form>

                            </div>
                            <div class="col-md-4">
                                <h5 class="text-center" style="margin-top: 10px;">Change Username</h5>
                                <form method="post">

                                <?php
                                if(isset($_POST['change_uname'])){
                                    $uname = $_POST['uname'];

                                    if(empty($uname)) {

                                    }else{
                                        $query = "UPDATE doctors SET username='$uname' WHERE username='$doc'";

                                        $res = mysqli_query($connect,$query);

                                        if ($res){
                                            $_SESSION['doctor'] = $uname;
                                        }
                                    }
                                }

                                ?>

                                    <label>Change Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                                    <br>
                                    <input type="submit" value="Update" name="change_uname" class="btn btn-success">
                                </form>
                                <br><br>


                                <?php
                                    if(isset($_POST['change_pass'])){

                                        $old_pass = $_POST['old_pass'];
                                        $new_pass = $_POST['new_pass'];
                                        $con_pass = $_POST['con_pass'];

                                        $error = array();

                                        $old = mysqli_query($connect,"SELECT * FROM doctors WHERE username = '$doc'");

                                        $row = mysqli_fetch_array($old);
                                        $pass = $row['password'];

                                        if (empty($old_pass)) {
                                            $error['p'] = "Enter old password";
                                        }else if (empty($new_pass)) {
                                            $error['p'] = "Enter new password";
                                        }else if(empty($con_pass)) {
                                            $error['p'] = "Confirm Password";
                                        }else if($old_pass != $pass){
                                            $error['p'] = "Invalid old password";
                                        }else if($new_pass != $con_pass){
                                            $error['p'] = "Password not matching";
                                        }

                                        if(count($error)==0){

                                            $query = "UPDATE doctors SET password='$new_pass' WHERE username='$doc'";
                                            mysqli_query($connect,$query);
                                        }

                                    }
                
                                    

                                    if (isset($error['p'])){
                                                
                                        $e = $error['p'];
                                        
                                        $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                                    }else{
                                        $show = "";
                                    }
                                ?>


                                <h5 class="text-center my-4">Change Password</h5>
                                <div>
                                    <?php echo $show ?>
                                </div>
                                <form method="post">

                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control">
                                    </div>
                                    
                                    <input type="submit" name="change_pass" value="Update Password" class="btn btn-success">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>