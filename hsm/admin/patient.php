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
    <title>Total Patients</title>
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
                    <div class="text-center">
                        <h5>Patient list</h5>
                    </div>
                    <?php
                        $query = "SELECT * FROM patient ORDER BY date_reg ASC";

                        $res = mysqli_query($connect,$query);

                        $output = "";

                         $output .= " 

                        <table class='table table-borderde'>
                        <tr>

                        <th class='text-center'>ID</th>
                        <th class='text-center'>Firstname</th>
                        <th class='text-center'>Lastname</th>
                        <th class='text-center'>Username</th>
                        <th class='text-center'>Email</th>
                        <th class='text-center'>Gender</th>
                        <th class='text-center'>Phone</th>
                        <th class='text-center'>Date Registered</th>
                        <th class='text-center'>Action</th>

                        </tr>

                        ";
                        if (mysqli_num_rows($res) < 1) {

                        $output .= "
                        <tr>
                            <td colspan ='9' class='text-center'> No application yet.</td>
                        </tr>
                        ";
                        }

                        while ($row = mysqli_fetch_array($res)){

                        $output .= "
    
                        <tr>
                            <td class='text-center'>".$row['id']."</td>
                            <td class='text-center'>".$row['firstname']."</td>
                            <td class='text-center'>".$row['lastname']."</td>
                            <td class='text-center'>".$row['username']."</td>
                            <td class='text-center'>".$row['email']."</td>
                            <td class='text-center'>".$row['gender']."</td>
                            <td class='text-center'>".$row['phone']."</td>
                            <td class='text-center'>".$row['date_reg']."</td>
                            <td class='text-center'>
                                <a href='view.php?id=".$row['id']."'>
                                <button class='btn btn-success'>View</button>
                            </td>
                        </tr> ";
                        }

                        $output .= "

                        </tr>
                        </table>
                        ";

                        echo $output ;
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>