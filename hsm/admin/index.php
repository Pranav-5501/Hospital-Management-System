<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    
    <?php

    include("../include/header.php");

    include("../include/connection.php")

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                
                <?php
                include("sidenav.php");
                ?>

                </div>
                <div class="col-md-10">

                    <h4 class="my-2">Admin Dashboard</h4>

                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <?php
                                                $ad = mysqli_query($connect, "SELECT * FROM admin");

                                                $num = mysqli_num_rows($ad);
                                            ?>

                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admin</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="admin.php"><i class="fa fa-user-cog fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-danger mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <?php
                                                $doc = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Approved'");

                                                $num2 = mysqli_num_rows($doc);
                                            ?>

                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctors</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="doctor.php"><i class="fa fa-user-md fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <?php
                                                $doc = mysqli_query($connect,"SELECT * FROM patient");

                                                $num3 = mysqli_num_rows($doc);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num3; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patients</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="patient.php"><i class="fa fa-procedures fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                                $rep = mysqli_query($connect,"SELECT * FROM report");

                                                $num4 = mysqli_num_rows($rep)
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num4; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Report</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="report.php"><i class="fa fa-flag fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php

                                                $job = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Pending'");

                                                $num1 = mysqli_num_rows($job);

                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num1; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white" style="font-size:medium;">Application Request</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="job_request.php"><i class="fa fa-edit fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <?php
                                                $inc = mysqli_query($connect,"SELECT sum(amount_paid) as Profit FROM income");
                                                
                                                $row = mysqli_fetch_array($inc);

                                                $inc = $row['Profit'];
                                            ?>

                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo "₹ $inc"; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Income</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="income.php"><i class="fa fa-dollar-sign fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>