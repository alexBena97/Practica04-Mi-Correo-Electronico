<?php
session_start();  
if(!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE){  
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
    <li><a href="../../../config/cerrar_sesion_User.php" style="float:right" >Cerrar Sesion</a></li> 
  </ul>
  <br>
  <br>
  <br> 
  <input type="text" id="buscar" placeholder="Buscar por Remitente"  onkeyup="buscarPorCorreo()"> 
  <br> 
  <br>
  <table style="width:100%" border="1" id="informacion">
    <tr>
      <th>Fecha</th>
      <th>Remitente</th>
      <th>Asunto</th>
    </tr>
    <?php
    include '../../../config/conexionBD.php';
    $usuario = $_SESSION['usuario'];
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