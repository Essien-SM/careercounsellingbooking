<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Signin Template · Bootstrap v5.0</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
  <link href="login.css" rel="stylesheet">
</head>

<body class="m-0">

  <main class="form-signin card">
    <form>
        <div class="text-center">
            <h1 class=" mb-3 fw-normal">Let's Get Started!</h1>
            <p>Login with your details to continue</p>
        </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Name:</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group mb-3">
        <label for="exampleInputPassword1">Email:</label>
        <input type="email" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group mb-3">
        <label for="exampleInputPassword1">ID number:</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group mb-3">
        <label for="exampleInputPassword1">Password:</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group mb-3">
        <label for="exampleInputPassword1">Conform Password:</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
      <p class="mt-3 mb-3 text-muted">Already Have an Account?<a href="login.php">Sign In</a></p>
    </form>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>