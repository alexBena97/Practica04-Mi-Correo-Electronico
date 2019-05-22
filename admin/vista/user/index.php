<?php
session_start();
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
  header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="../../../config/paginas.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../js/ajax.js"></script>
  <title>Document</title>

</head>

<body>
  <ul id="button">
    <li><a href="">INICIO</a></li>
    <li><a href="nuevomensaje.php">Nuevo Mensaje</a></li>
    <li><a href="mensajesenviados.php">Mensajes Enviados</a></li>
    <li><a href="MiCuenta.php">Mi cuenta</a></li>
    <li><a href="../../../config/cerrar_sesion_User.php" style="text-align:right">Cerrar Sesion</a></li>
  </ul>
  <section id="fot">
    <?php
    include '../../../config/conexionBD.php';
    $usuario = $_SESSION['usuario'];
    $sql_usuario = "SELECT * FROM usuario WHERE usu_codigo = $usuario";
    $result_usuario = $conn->query($sql_usuario);
    $row_usuario = $result_usuario->fetch_assoc();
    $nombre_usuario = $row_usuario['usu_nombres'];
    $apellidos_usuario = $row_usuario['usu_apellidos'];
    ?>
    <div>
      <img id="imagen" class="imag" src="data:image/jpg;base64,<?php echo base64_encode($row_usuario['usu_imagen']) ?>" width="200" height="200">
      <p><?php echo $nombre_usuario ?>&nbsp<?php echo $apellidos_usuario ?></p>
    </div>
  </section>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>>
  <div align="center">
    <h1>Mensajes Recibidos</h1>
  </div>
  <input type="text" id="buscar" placeholder="Buscar por Remitente" onkeyup="buscarPorCorreo()">
  <br>
  <br>
  <table id="informacion">
    <tr>
      <th>Fecha</th>
      <th>Remitente</th>
      <th>Asunto</th>
      <th>Leer</th>
    </tr>
    <?php
    $sql = "SELECT * FROM correo WHERE correo_destinatario = $usuario AND correo_eliminado = 'N' ORDER BY correo_fecha_creacion DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $codigo_correo = $row['correo_codigo'];
        $correo_remitente = $row['correo_remitente'];
        $sql_correo = "SELECT usu_correo FROM usuario WHERE usu_codigo = '$correo_remitente'";
        $result2 = $conn->query($sql_correo);
        $row2 = $result2->fetch_assoc();
        echo "<tr>";
        echo "    <td>" . $row['correo_fecha_creacion'] . "</td>";
        echo "    <td>" . $row2['usu_correo'] . "</td>";
        echo "    <td>" . $row['correo_asunto'] . "</td>";
        echo "    <td>" . "<a href ='../../controladores/user/leer.php?codigo_correo=" . $codigo_correo . "'>" . "Leer</a>" . "</td>";
        echo "</tr>";
      }
    }
    ?>
</body>

</html>