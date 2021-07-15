<?php
  require 'php/CheckUser.php';
  checkUser();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Sign Up</title>
    <style>
      .myBg {
        background: #24292e !important;
        color: #ffffff !important;
      }
    </style>
  </head>
  <body class="myBg">
    <div class="container">
      <div class="row">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
          <div class="col-5">
            <div class="border border-light rounded w-100 text-light">
              <h2 class="text-center mt-4">Sign Up</h2>
              <?php if (isset($_GET['status'])) { ?>
                <?php if ($_GET['status'] == "invalidusername") { ?>
                  <div class="alert alert-danger p-2 m-3">
                    Your username is already token :(
                  </div>
                <?php } ?>
              <?php } ?>
              <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger p-2 m-3">
                  <?php echo $_GET['error'] ?>
                </div>
              <?php } ?>
              <form class="" action="php/SignUp.php">
                <div class="p-3 pt-2">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" placeholder="Name..." name="username" id="username" required />
                </div>
                <div class="p-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" placeholder="Password..." name="password" id="password" required />
                </div>
                <div class="p-3">
                  <label for="" class="form-label">Profile Image</label>
                  <input type="file" class="form-control" name="userImg" id="userImg" />
                </div>
                <div class="p-3 d-grid">
                  <input type="submit" class="btn btn-primary" value="Sign Up" />
                </div>
                <div class="d-flex justify-content-center mb-3">
                  <a class="text-decoration-none" href="SignIn.php">Have an account. Sign in.</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>
