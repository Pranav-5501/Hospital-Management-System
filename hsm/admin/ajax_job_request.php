<?php

include("../include/connection.php");

$query = "SELECT * FROM doctors WHERE status='Pending' ORDER BY data_reg ASC";
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
            <td class='text-center'>".$row['data_reg']."</td>
            <td class='text-center'>
                <div class='col-md-12'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <button id='".$row['id']."' class = 'btn btn-success approve' style = 'width: 90px;'>Approve</button>
                        </div>
                        <div class='col-md-6'>
                            <button id='".$row['id']."' class = 'btn btn-danger reject' style = 'width: 90px;'>Reject</button>
                        </div>
                    </div>
                </div>
            </td>
        </tr> ";
}

$output .= "

    </tr>
    </table>
";

echo $output ;
?>