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

    <title>Sign In</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
          <div class="col-5">
            <div class="border border-primary rounded w-100 text-primary">
              <h2 class="text-center mt-4">Sign In</h2>
              <?php if (isset($_GET['status'])) { ?>
                <?php if ($_GET['status'] == "notfound") { ?>
                  <div class="alert alert-danger p-2 m-3">
                    Username and Password doesn't match :(
                  </div>
                <?php } ?>
              <?php } ?>
              <form class="" action="php/SignIn.php">
                <div class="p-3 pt-2">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="p-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="p-3 d-grid">
                  <input type="submit" class="btn btn-primary" value="Sign Up">
                </div>
                <div class="d-flex justify-content-center my-3">
                  <input type="checkbox" name="rememberme" id="rememberme">
                  <label class="mx-2" for="rememberme">Remember Me</label>
                </div>
                <div class="d-flex justify-content-center mb-3">
                  <a class="text-decoration-none" href="SignUp.php">Have not an account. make one.</a>
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
