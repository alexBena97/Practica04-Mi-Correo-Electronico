<?php
session_start();
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
  <div id="total">
    <ul id="button">
      <li><a href="">INICIO</a></th>
      <li><a href="nuevomensaje.html">Nuevo Mensaje</a></th>
      <li><a href="mensajesenviados.php">Mensajes Enviados</a></th>
      <li><a href="MiCuenta.php">Mi cuenta</a></th>
    </ul>
  </div>
  <br>
  <br>
  <br>
  <table style="width:100%" border="1" id="informacion">
    <tr>
      <th>Fecha</th>
      <th>Remitente</th>
      <th>Asunto</th>
      <th><a href="">Leer</a></th>
    </tr>
    <input type="text" id="buscar" onkeyup="buscarPorCorreo()">
    <?php
    include '../../../config/conexionBD.php';
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT * FROM correo WHERE correo_destinatario = $usuario ORDER BY correo_fecha_creacion DESC";
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