<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Cambiar Contraseña</title>
  <link href="../../../config/formulario.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <?php
  session_start();
  if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
  }
  ?>

  <?php
  $codigo = $_GET["codigo"];
  ?>
  <form id="formulario01" method="POST" action="../../controladores/user/cambiar_contraseña.php">
    <fieldset>
      <legend>Cambiar contraseña</legend>
      <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
      <label for="cedula">Contraseña Actual (*)</label>
      <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..." />
      <br>
      <label for="cedula">Contraseña Nueva (*)</label>
      <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contraseña nueva ..." />
      <br>

      <input type="submit" id="modificar" name="modificar" value="Modificar" />
      <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
    </fieldset>
  </form>
</body>

</html>