<?php
include("include/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&family=Goldman&display=swap" rel="stylesheet">

</head>
<body style="background-image:url(img/herobg.jpg);">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <!-- For Slogan -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4"></div>
                                <div class="col-md-4" style="margin-top: 30px; margin-left: 225px;">
                                    <h3 style="font-family: 'Goldman', cursive; font-size: large;"> <span style="font-size: xx-large; color: goldenrod;">" </span>THE <span style="color: red;font-size: x-large;">HEART</span> OF YOUR</h3>
                                    <h1 style="font-family: 'Goldman', cursive; font-size: 35px; color: cornflowerblue; font-weight: bold;">HEALTHCARE <span style="font-size: xx-large; color: goldenrod;">"</span> </h1>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                        <!-- Slogan End -->

                        <div class="row">
                            <div class="col-md-6">
                                
                                <div class="extra" style="margin-top: 50px;"></div>

                                <div class="doctor" style="margin-left: 30px;">
                                        <img src="img/doc_home.png" style="height:300px">
                                        <p>Click bellow button to register <br> <span style="margin-left: 60px;">As a Doctor</span></p>
                                        <a href="apply.php"> 
                                            <button style="margin-left: 55px; width: 100px;" type="button" class="btn btn-info">Doctor</button>
                                        </a>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="extra" style="margin-top: 50px;"></div>

                                <div class="doctor" style="margin-left: 30px;">
                                        <img src="img/ptn_home.png" style="height:300px">
                                        <p style="margin-left: 40px;">Click bellow button to register <br><span style="margin-left: 60px;">As a Patient</span> </p>
                                        <a href="account.php">
                                            <button style="margin-left: 95px; width: 100px;" type="button" class="btn btn-success">Patient</button>
                                        </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</body>
</html>