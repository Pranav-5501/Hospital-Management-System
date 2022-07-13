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
    <title>Report</title>
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
                <div class="col-md-10 my-4">
                    <h5 class="text-center">Total Reports</h5>
                        
                        <?php
                        $query = "SELECT * FROM report";
                        $res = mysqli_query($connect,$query);

                        $output = "";

                        $output .= "<table class='tablr table-bordered text-center' style='width: 100%;'>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Username</th>
                                            <th>Date Send</th>
                                        </tr>
                                    ";

                        if (mysqli_num_rows($res) < 1){

                            $output .= "
                            <tr>
                            <td class='text-center' colspan='5'>No Report Yet</td>
                            </tr>
                            ";
                        }

                        while ($row = mysqli_fetch_array($res)){

                            $output .= "
                                <tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['title']."</td>
                                    <td>".$row['message']."</td>
                                    <td>".$row['username']."</td>
                                    <td>".$row['date_send']."</td>
                                </tr>
                                ";
                        }
                        
                        $output .= "</tr>
                                    </table>";
                        
                        echo $output;
                    ?>
                
                    
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>