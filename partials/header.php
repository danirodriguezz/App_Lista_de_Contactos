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
  <link rel="stylesheet" href="./static/css/index.css"/>
  <?php $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) ?>
  <?php if ($uri == '/Curso_web_PHP/' || $uri == '/Curso_web_PHP/index.php'): ?>
      <script defer src="./static/js/welcome.js"></script>
  <?php endif ?>

  <title>Contacts App</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">
        <img src="./static/img/Simbolo_fondo_rosa_negro-removebg-preview.png" alt="Logo" width="30"  class="d-inline-block align-text-top">
      </a>
      <a href="home.php" class="navbar-brand" id="navigation">Contacts App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Add.php">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>

<!-- Content hear -->
