<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">
      <img src="./static/img/Simbolo_fondo_rosa_negro-removebg-preview.png" alt="Logo" width="30"  class="d-inline-block align-text-top">
    </a>
    <a href="home.php" class="navbar-brand" id="navigation">Contacts App</a>
    <button 
      class="navbar-toggler" 
      type="button" 
      data-bs-toggle="collapse" 
      data-bs-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" 
      aria-expanded="false" 
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="d-flex justify-content-between w-100">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if (isset($_SESSION["user"])): ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./Add.php">Add Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./logout.php">Log-out</a>
            </li>
        <?php else: ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
        <?php endif ?>
        </ul>
        <?php if (isset($_SESSION["user"])): ?>
          <div class="p-2">
            <?= $_SESSION["user"]["email"] ?>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</nav>
