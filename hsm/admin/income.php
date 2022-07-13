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
    <title>Total Income</title>
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
                    <h5 class="text-center my-4">Total Income</h5>

                    <?php



                        $query = "SELECT * FROM income";

                        $res = mysqli_query($connect,$query);

                        $output = "";

                        $output .= " 
                            
                            <table class='table table-bordered my-4'>
                                <tr>
                                    <th>ID</th>
                                    <th>Doctor</th>
                                    <th>Patient</th>
                                    <th>Discharge Date</th>
                                    <th>Total Amount</th>
                                </tr>
                            ";

                        if (mysqli_num_rows($res) < 1){
                            
                            $output .= " 

                                <tr>
                                    <td class='text-center' colspan='5'>No Patient Discharge Yet</td>
                                </tr>
                                ";
                        }

                        while ($row = mysqli_fetch_array($res)){

                            $output .= "
                            
                                <tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['doctor']."</td>
                                    <td>".$row['patient']."</td>
                                    <td>".$row['date_discharge']."</td>
                                    <td>".$row['amount_paid']."</td>
                                

                                ";
                        }

                        $output .= "</tr></table>";

                        echo $output;

                        
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>
</html>