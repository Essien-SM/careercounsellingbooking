<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Signin Template · Bootstrap v5.0</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body>

  <?php

  session_start();

  $_SESSION["user"] = "";
  $_SESSION["usertype"] = "";

  // Set the new timezone
  date_default_timezone_set('Asia/Kolkata');
  $date = date('Y-m-d');

  $_SESSION["date"] = $date;

  // Import database
  include("connection.php");

  if ($_POST) {
    $result = $database->query("SELECT * FROM webuser");

    $name = $_POST['username'];
    $email = $_POST['newemail'];
    $idnum = $_POST['idnum'];
    $dob = $_POST['dob'];
    $tel = $_POST['tel'];
    $newpassword = $_POST['newpassword'];
    $cpassword = $_POST['cpassword'];

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Invalid email format</label>';
    } else {
      // Sanitize email
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);

      if ($newpassword == $cpassword) {
        $sqlmain = "SELECT * FROM webuser WHERE email = ?;";
        $stmt = $database->prepare($sqlmain);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
          $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        } else {
          // TODO: Hash the password
          $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);

          $database->query("INSERT INTO student(stuemail, stuname, stupassword, studidnum, studob, stutel) VALUES ('$email', '$name', '$hashedPassword', '$idnum', '$dob', '$tel');");
          $database->query("INSERT INTO webuser VALUES ('$email', 's');");

          $_SESSION["user"] = $email;
          $_SESSION["usertype"] = "s";
          $_SESSION["username"] = $name;

          header('Location: student/index.php');
          $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
      } else {
        $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Confirmation Error! Reconfirm Password</label>';
      }
    }
  } else {
    $error = '<label for="promter" class="form-label"></label>';
  }
  ?>

  <main class="form-signin">
    <form action="" method="POST">
      <div class="card shadow">
        <div class="card-body">
          <div class="text-center">
            <h1 class=" mb-3 fw-normal">Let's Get Started!</h1>
            <p>Login with your details to continue</p>
          </div>

          <div class="form-group">
            <label for="usermail">Name:</label>
            <input type="text" class="form-control" name="username" placeholder="Fullname">
          </div>
          <div class="form-group">
            <label for="usermail">Email:</label>
            <input type="email" class="form-control" name="newemail" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="usermail">ID:</label>
            <input type="text" class="form-control" name="idnum" placeholder="ID Number">
          </div>
          <div class="form-group">
            <label for="usermail">Date of Birth:</label>
            <input type="date" class="form-control" name="dob">
          </div>
          <div class="form-group">
            <label for="usermail">Mobile Number:</label>
            <input type="text" class="form-control" name="tel" pattern="[0]{1}[0-9]{9}" placeholder="Telephone Number">
          </div>
          <div class="form-group">
            <label for="userpassword">Password</label>
            <input type="Password" name="newpassword" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="userpassword">Confirm Password</label>
            <input type="Password" name="cpassword" class="form-control" placeholder="Confrim Password">
          </div>
          <div class="form-group">
            <?php echo $error ?>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
          <p class="mt-3 mb-3 text-muted">Already Have an Account?<a href="login.php">Sign In</a></p>
        </div>
      </div>

    </form>
  </main>



</body>

</html>