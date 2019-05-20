<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Cambiar Contraseña</title>
  <link href="../../../config/paginas.css" rel="stylesheet" type="text/css" />
  <link href="../../../config/formulario.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <header>
    <ul id="button">
      <li><a href="index.php">Inicio</a></li>
      <li><a href="usuarios.php">Usuarios</a></li>
      <li><a href="../../../config/cerrar_sesion_Admin.php" style="float:right">Cerrar Sesion</a></li>
    </ul>
  </header>
  <br>
  <br>
  <br>
  <br>
  <?php
  $codigo = $_GET["codigo"];
  ?>
  <form id="formulario01" method="POST" action="../../controladores/admin/cambiar_contraseña.php">
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