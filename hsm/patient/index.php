<?php 
session_start();
    include("../include/header.php");
    include("../include/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                        <h5 class="my-3">Patient Dashboard</h5>
                        <div class="col-md-12">
                            <div class="row">
                            
                                    <div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">My Profile</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 my-2 bg-warning mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">Book Appointment</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="appointment.php"><i class="fa fa-calendar fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 my-2 bg-danger mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">My Invoice</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="invoice.php"><i class="fa fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            
                            </div>
                        </div>

                        <?php
                        //     if (isset($_POST['send'])){

                        //         $title = $_POST['title'];
                        //         $message = $_POST['message'];

                        //         if (empty($title)){
                        //             echo "<script>alert('Empty Title')</script>";
                        //         }else if(empty($message)){
                        //             echo "<script>alert('Enter the Message')</script>";
                        //         }else{
                                    
                        //             $user = $_SESSION['patient'];

                        //             $query = "INSERT INTO report(title,message,username,date_send) VALUES('$title','$message','$user',NOW())";

                        //             $res = mysqli_query($connect,$query);

                        //             if ($res){
                        //                 echo "<script>alert('You have sent the Report')</script>";
                        //             }
                        //         }
                        //     }
                        // ?>

                        <!-- <div class="col-md-12">
                            <div class="row">     
                                <div class="col-md-4 my-5">
                                    
                                    <h5 class="my-2">Send a Report</h5>
                                    <br>
                                    <form method="post">
                                        <label>Title</label>
                                        <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter the Title">
                                        
                                        <label>Message</label>
                                        <input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter the Message">
                                        <br>
                                        <input type="submit" value="Send Report" name="send" class="btn btn-success my-2">
                                    </form>
            
                                </div>

                                <div class="col-md-4"></div>
                                
                                <div class="col-md-4"></div>
                            </div>
                        </div> -->

                </div>
            </div>
        </div>
    </div>
</body>
</html>