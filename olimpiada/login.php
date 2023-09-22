<?php
session_start();
require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare('SELECT id, email, password, tipo_usuario FROM usuario WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];

        // Redirige según el tipo de usuario
        if ($user['tipo_usuario'] == 'admin') {
            header("Location: admin.html");
        } else {
            header("Location: index.html");
        }
        exit; // Asegúrate de que el script se detenga después de redirigir
    } else {
        $message = 'Credenciales incorrectas';
    }
} else {
    $message = 'Por favor, completa todos los campos';
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/registrarse.css">
  </head>
  <body>
    <?php if(!empty($message)): ?>
    <?php endif; ?>

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
          <div class="title">Iniciar Sesión</div>
          <?php if (!empty($message)) : ?>
            <p> <?= $message ?></p>
          <?php endif; ?>
          <form action="login.php" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="email" type="text" placeholder="Introduce tu correo electrónico" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="Ingresa tu contraseña" required>
              </div>
              <div class="text0"><a href="index.php">Inicio</a></div>
              <div class="button input-box">
                <input type="submit" value="Enviar">
              </div>
              <div class="text sign-up-text">¿No tienes una cuenta? <a href="registrarse.php">Registrarse</a>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>