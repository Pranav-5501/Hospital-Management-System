<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"> -->
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
            <!-- <img src="../img/headerlogo.png" style="height: 40px; width: 40px;"> -->
        <h5 style="font-family: 'Alata', sans-serif; font-size:x-larges;">Hospital Management System</h5>
        <div class="mr-auto"></div>

        <ul class="navbar-nav ml-auto">
            <?php
                if (isset($_SESSION['admin'])){
                    $user = $_SESSION['admin'];
                    echo '
                        <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                }else if(isset($_SESSION['doctor'])){
                        $user = $_SESSION['doctor'];

                        echo ' <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                }else if(isset($_SESSION['patient'])){
                        $user = $_SESSION['patient'];

                    echo ' <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                } else{

                    echo '  <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
                            <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
                            <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
                            <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>';

                }
            ?>
        </ul>
    </nav>

</body>
</html>