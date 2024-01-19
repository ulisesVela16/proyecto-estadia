<?php
session_start();

// Simula la autenticación (deberías usar una base de datos en un entorno de producción)
$users = [
    ['username' => 'admin', 'password' => 'adminpass', 'role' => 'admin'],
    ['username' => 'user', 'password' => 'userpass', 'role' => 'user']
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];

            // Redirige al usuario según su rol
            if ($user['role'] === 'admin') {
                header('Location: admin_dashboard.php');
            } else {
                header('Location: user_dashboard.php');
            }
            exit();
        }
    }

    // Si las credenciales no son válidas, muestra un mensaje de error
    echo "Credenciales incorrectas";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/login.css">
  <title>Invernaderos Poncho - Iniciar Sesión</title>
  <!-- Incluir Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">Invernaderos Poncho</h2>
        </div>
        <div class="card-body">
          <form action="#" method="post">
            <div class="form-group">
              <label for="username">Usuario:</label>
              <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="password">Contraseña:</label>
              <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
            </div>
          </form>
          <div class="text-center">
            <a href="#">¿Olvidaste tu contraseña?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Incluir Bootstrap JS y jQuery (opcional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
