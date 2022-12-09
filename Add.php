<?php
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  return;
}

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"]) || empty($_POST["phone_number"])) {
    $error = "Por favor rellena todos los campos";
  } else if (strlen($_POST["phone_number"]) < 9) {
    $error = "El número tiene que tener al menos 9 dígitos";
  } else if (! ctype_digit($_POST["phone_number"])){
    $error = "Introduce un parametro numerico";
  } else if (ctype_digit($_POST["name"])) {
    $error = "No se damiten solo numeros en el apartado de nombre";
  } else {
    $mysqli = include_once "database.php";
    $name = $_POST["name"];
    $phoneNumber = $_POST["phone_number"];

    $statement = $mysqli->prepare("INSERT INTO contacts (user_id, name, phone_number) VALUES ({$_SESSION['user']['id']}, ?, ?)");
    $statement->bind_param('ss', $name, $phoneNumber);
    $statement->execute();
    header("Location: home.php");
  };
};

?>

<?php require "partials/header.php" ?> 

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Add New Contact</div>
        <div class="card-body">
          <?php if ($error): ?>
            <p class="text-danger">
              <?= $error ?>
            </p>
          <?php endif ?>  
          <form method="POST" action="Add.php">
            <div class="mb-3 row">
              <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>

              <div class="col-md-6">
                <input id="phone_number" type="tel" class="form-control" name="phone_number" required autocomplete="phone_number" autofocus>
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
