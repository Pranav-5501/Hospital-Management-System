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
    <title>Send Report</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">

                        <?php
                            if (isset($_POST['send'])){

                                $title = $_POST['title'];
                                $message = $_POST['message'];

                                if (empty($title)){
                                    echo "<script>alert('Empty Title')</script>";
                                }else if(empty($message)){
                                    echo "<script>alert('Enter the Message')</script>";
                                }else{
                                    
                                    $user = $_SESSION['patient'];

                                    $query = "INSERT INTO report(title,message,username,date_send) VALUES('$title','$message','$user',NOW())";

                                    $res = mysqli_query($connect,$query);

                                    if ($res){
                                        echo "<script>alert('You have sent the Report')</script>";
                                    }
                                }
                            }
                        ?>

                                <div class="col-md-3"></div>
                            <div class="col-md-6">
                            <h5 class="my-4 text-center">Send a Report</h5>
                                    
                                    <div class="jumbotron" style="background-color: #FF9999;">
                                    <div class="text-center" style="align-items: center;">
                                        <img src="../img/rpt.png" style="height: 100px; width: 100px" >
                                    </div>
                                    <form method="post">
                                        <label>Title</label>
                                        <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter the Title">
                                        
                                        <label>Message</label>
                                        <input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter the Message">
                                        <br>
                                        <input type="submit" value="Send Report" name="send" class="btn btn-success my-2">
                                    </form>
                                    </div>
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