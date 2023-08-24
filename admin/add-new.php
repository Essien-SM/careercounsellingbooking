<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Doctor</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
<?php

session_start();

if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" || $_SESSION['usertype'] != 'a') {
        header("location: ../login.php");
    }
} else {
    header("location: ../login.php");
}

// Import database
include("../connection.php");

if ($_POST) {
    //print_r($_POST);
    $result = $database->query("SELECT * FROM webuser");
    $name = $_POST['name'];
    $idnum = $_POST['counidnum'];
    $spec = $_POST['spec'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = '1';
    } else {
        // Sanitize email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if ($password == $cpassword) {
            $error = '3';
            $result = $database->query("SELECT * FROM webuser WHERE email='$email';");
            if ($result->num_rows == 1) {
                $error = '2';
            } else {
                // TODO: Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $sql1 = "INSERT INTO counsellor(counemail, counname, counpassword, counidnum, countel, specialties) VALUES ('$email', '$name', '$hashedPassword', '$idnum', '$tel', $spec);";
                $sql2 = "INSERT INTO webuser VALUES ('$email', 'c')";
                $database->query($sql1);
                $database->query($sql2);

                //echo $sql1;
                //echo $sql2;
                $error = '4';
            }
        } else {
            $error = '2';
        }
    }
} else {
    $error = '3';
}

header("location: counsellor.php?action=add&error=" . $error);
?>
    
   

</body>
</html>