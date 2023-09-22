<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, email, password FROM usuario WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = null;
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Hospital</title>
  <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>

  <?php if (!empty($user)) : ?>
    <br> Bienvenido. <?= $usuario['email']; ?>
    <br>Has iniciado sesión correctamente
    <a href="logout.php">
      Cerrar sesión
    </a>

  <?php else : ?>
    <img class="wave" src="img/wave.png">
    <div class="container">
      <div class="img">
        <img src="https://www.pngkey.com/png/full/428-4285730_nuestro-compromiso-medical-doctor-vector.png">
      </div>
      <div class="login-content">
        <form action="index.html">
          <img src="img/74472.png">
          <h2 class="title">Bienvenido</h2>
          <a href="login.php"><input class="btn" value="Iniciar Sesión"></a>
          <a href="registrarse.php"><input class="btn" value="Registrarse"></a>
        </form>
      </div>
    </div>
  <?php endif; ?>
</body>

</html>