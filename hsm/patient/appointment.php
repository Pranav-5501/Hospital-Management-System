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
    <title>Book Appointment</title>
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
                    <h5 class="text-center my-4">Book Appointment</h5>

                    <?php
                        $pat = $_SESSION['patient'];
                        $sel = mysqli_query($connect,"SELECT * FROM patient WHERE username='$pat'");

                        $row = mysqli_fetch_array($sel);

                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $gender = $row['gender'];
                        $phone = $row['phone'];
                    
                        if(isset($_POST['book'])){

                            $date = $_POST['date'];
                            $sym = $_POST['sym'];

                            if(empty($sym)){
                                
                            }else{
                                $query = "INSERT INTO appointment(firstname,lastname,gender,phone,appointment_date,symptoms,status,date_booked) 
                                VALUES('$firstname','$lastname','$gender','$phone','$date','$sym','Pending',NOW())";

                                $res = mysqli_query($connect,$query);

                                if($res){
                                    echo "<script>alert('You have booked an appointment')</script>";
                                }
                            }
                        }
                    ?>

                    

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron my-4" >
                                <form method="post">
                                    <label>Appointment Date</label>
                                    <input type="date" name="date" class="form-control">
                                    
                                    <label>Symptoms</label>
                                    <input type="text" name="sym" class="form-control" autocomplete="off" placeholder="Enter Symptoms">
                                    <input type="submit" value="Book Appointment" name="book" class="btn btn-info my-2">
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>