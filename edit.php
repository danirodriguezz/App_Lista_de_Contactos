<?php

$mysqli = include_once "database.php";
$id = $_GET["id"];

$statement = $mysqli->prepare("SELECT * FROM contacts WHERE id = ? ");
$statement->bind_param('i', $id);
$statement->execute();
$result = $statement->get_result();
$contact = $result->fetch_assoc();

if (!$contact) {
    http_response_code(404);
    echo("HTTP 404 NOT FOUND");
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
    $name = $_POST["name"];
    $phoneNumber = $_POST["phone_number"];

    $statement = $mysqli->prepare("UPDATE contacts SET name = ?, phone_number = ? WHERE id = ?");
    $statement->bind_param('ssi', $name, $phoneNumber, $id);
    $statement->execute();
    header("Location: index.php");
   };
 };

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap  -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/darkly/bootstrap.min.css"
    integrity="sha512-8RiGzgobZQmqqqJYja5KJzl9RHkThtwqP1wkqvcbbbHNeMXJjTaBOR+6OeuoxHhuDN5h/VlgVEjD7mJu6KNQXA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <script
    defer
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"
  ></script>
  <!-- Static content  -->
  <link rel="stylesheet" href="./static/css/index.css">

  <title>Contacts App</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php">
        <img src="./static/img/Simbolo_fondo_rosa_negro-removebg-preview.png" alt="Logo" width="30"  class="d-inline-block align-text-top">
      </a>
      <a href="./index.php" class="navbar-brand" id="navigation">Contacts App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Add.php">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Edit Your Contact</div>
            <div class="card-body">
              <?php if ($error): ?>
                <p class="text-danger">
                  <?= $error ?>
                </p>
              <?php endif ?>
              <form method="POST" action="edit.php?id=<?= $contact["id"] ?>">
                <div class="mb-3 row">
                  <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                  <div class="col-md-6">
                    <input value="<?= $contact["name"] ?>" id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>

                  <div class="col-md-6">
                    <input value="<?= $contact["phone_number"] ?>" id="phone_number" type="tel" class="form-control" name="phone_number" required autocomplete="phone_number" autofocus>
                  </div>
                </div>

                <div class="mb-3 row">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
