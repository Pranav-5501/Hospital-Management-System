<?php
    session_start();
    include("../include/connection.php");
    include("../include/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                        include("sidenav.php")
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center" style="margin-top: 10px;">Patient Details</h5>
                    
                    <?php
                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $query = "SELECT * FROM patient WHERE id='$id'";
                        $res = mysqli_query($connect,$query);

                        $row = mysqli_fetch_array($res);
                    }
                    ?>

                    <div class="col-md-12">
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-md-2"></div>
                            <div class="col-md-4" style="margin-top: 5%;">

                                <?php
                                        echo "<img src='../patient/img/".$row['profile']."' class='col-md-12' height='250px'>";
                                ?>
                                
                                <h5 class="text-center" style="margin-top: 10px;">Profile Photo</h5>

                            </div>
                            <div class="col-md-4">
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
                                        <td>Date Registered</td>
                                        <td><?php echo $row['date_reg']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>