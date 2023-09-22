<?php

require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && !empty($_POST['genero'])) {
  $sql = "INSERT INTO usuario (email, password, dni, nombre, apellido, telefono, genero) VALUES (:email, :password, :dni, :nombre, :apellido, :telefono, :genero)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(':password', $password);
  $stmt->bindParam(':dni', $_POST['dni']);
  $stmt->bindParam(':nombre', $_POST['nombre']);
  $stmt->bindParam(':apellido', $_POST['apellido']);
  $stmt->bindParam(':telefono', $_POST['telefono']);
  $stmt->bindParam(':genero', $_POST['genero']);

  // Ejecutar la consulta
  try {
    $stmt->execute();
    // La inserción en la base de datos se realizó con éxito
  } catch (PDOException $e) {
    // Manejar cualquier error que pueda ocurrir durante la ejecución de la consulta
    echo "Error: " . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Registrarse</title>
  <link rel="stylesheet" href="assets/css/registrarse.css">
</head>

<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="https://fondosmil.com/fondo/6726.jpg" alt="">
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Registrarse</div>
          <?php if (!empty($message)) : ?>
            <p> <?= $message ?></p>
          <?php endif; ?>
          <form action="registrarse.php" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="email" type="text" placeholder="Introduce tu correo electrónico" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="Ingresa tu contraseña" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="dni" type="text" placeholder="Introduce su DNI" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="nombre" type="text" placeholder="Nombre" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="apellido" type="text" placeholder="Apellido" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="telefono" type="text" placeholder="Introduce su Teléfono " required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="genero" type="text" placeholder="Hombre o Mujer" required>
              </div>
              <div class="text0"><a href="index.php">Inicio</a></div>
              <div class="button input-box">
                <input type="submit" value="Enviar">
              </div>
              <div class="text sign-up-text">¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>