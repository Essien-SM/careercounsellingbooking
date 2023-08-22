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


  //import database
  include("connection.php");





  if ($_POST) {

    $email = $_POST['useremail'];
    $password = $_POST['userpassword'];

    $error = '<label for="promter" class="form-label"></label>';

    $result = $database->query("select * from webuser where email='$email'");
    if ($result->num_rows == 1) {
      $utype = $result->fetch_assoc()['usertype'];
      if ($utype == 's') {
        //TODO
        $checker = $database->query("select * from student where stuemail='$email' and stupassword='$password'");
        if ($checker->num_rows == 1) {


          //   Patient dashbord
          $_SESSION['user'] = $email;
          $_SESSION['usertype'] = 's';

          header('location: student/index.php');
        } else {
          $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
        }
      } elseif ($utype == 'a') {
        //TODO
        $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
        if ($checker->num_rows == 1) {


          //   Admin dashbord
          $_SESSION['user'] = $email;
          $_SESSION['usertype'] = 'a';

          header('location: admin/index.php');
        } else {
          $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
        }
      } elseif ($utype == 'c') {
        //TODO
        $checker = $database->query("select * from counsellor where counemail='$email' and counpassword='$password'");
        if ($checker->num_rows == 1) {


          //   counsellor dashbord
          $_SESSION['user'] = $email;
          $_SESSION['usertype'] = 'c';
          header('location: counsellors/index.php');
        } else {
          $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
        }
      }
    } else {
      $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.</label>';
    }
  } else {
    $error = '<label for="promter" class="form-label">&nbsp;</label>';
  }

  ?>

  <main class="form-signin">
    <form action="" method="POST">
      <div class="card shadow">
        <div class="card-body">
          <div class="text-center">
            <h1 class=" mb-3 fw-normal">Welcome Back!</h1>
            <p>Login with your details to continue</p>
          </div>

          <div class="form-group">
            <label for="usermail">Email address</label>
            <input type="email" class="form-control" name="useremail" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="userpassword">Password</label>
            <input type="Password" name="userpassword" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <?php echo $error ?>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
          <p class="mt-3 mb-3 text-muted">Already Have an Account?<a class="font-weight-bold" href="signup.php">Sign Up</a></p>
        </div>
      </div>

    </form>
  </main>



</body>

</html>