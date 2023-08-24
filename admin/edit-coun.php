<?php
    // Import database
    include("../connection.php");

    if ($_POST) {
        // Print received data
        // print_r($_POST);

        // Fetch webuser data
        $result = $database->query("SELECT * FROM webuser");
        $name = $_POST['name'];
        $idnum = $_POST['counidnum'];
        $oldemail = $_POST["oldemail"];
        $spec = $_POST['spec'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $id = $_POST['id00'];

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Invalid email
            $error = '5';
            header("location: counsellor.php?action=edit&error=".$error."&id=".$id);
            exit();
        }

        // Sanitize email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if ($password == $cpassword) {
            $error = '3';
            $result = $database->query("SELECT counsellor.counid FROM counsellor INNER JOIN webuser ON counsellor.counemail = webuser.email WHERE webuser.email = '$email';");

            if ($result->num_rows == 1) {
                $id2 = $result->fetch_assoc()["counid"];
            } else {
                $id2 = $id;
            }

            echo $id2."jdfjdfdh";
            if ($id2 != $id) {
                $error = '1';
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $sql1 = "UPDATE counsellor SET counemail='$email', counname='$name', counpassword='$hashedPassword', counidnum='$idnum', countel='$tel', specialties=$spec WHERE counid=$id;";
                $database->query($sql1);

                $sql1 = "UPDATE webuser SET email='$email' WHERE email='$oldemail';";
                $database->query($sql1);

                $error = '4';
            }
        } else {
            $error = '2';
        }
    } else {
        $error = '3';
    }

    header("location: counsellor.php?action=edit&error=".$error."&id=".$id);
?>