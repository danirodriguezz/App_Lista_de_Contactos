<?php

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"]) || empty($_POST["password"])) {
    $error = "Por favor rellena todos los campos";
  } else {
    $mysqli = include_once "database.php";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    
    $statement = $mysqli->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
    $statement->bind_param("s", $email);


    $statement->execute();
    $statement->store_result();
    $num = $statement->num_rows;
    $statement->close();

    if ($num == 0) {
      $error = "This email doesn't exist";
    } else {
      $statement = $mysqli->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
      $statement->bind_param("s", $email);
      $statement->execute();
      $result = $statement->get_result();
      $user = $result->fetch_assoc();

      if (!password_verify($_POST["password"], $user["password"])) {
        $error = "Invalid credentials";
      } else {
        session_start();

        unset($user["password"]);
        $_SESSION["user"] = $user;

        header("Location: home.php");
      }
    }
  }
};
?>

<?php require "partials/header.php" ?> 

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
          <?php if ($error): ?>
            <p class="text-danger">
              <?= $error ?>
            </p>
          <?php endif ?>  
          <form method="POST" action="login.php">

            <div class="mb-3 row">
              <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required autocomplete="password" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require "partials/footer.php" ?>
