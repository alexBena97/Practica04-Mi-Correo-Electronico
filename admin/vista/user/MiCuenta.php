<?php
session_start();
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link href="../../../config/paginas.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <ul id="button">
        <li><a href="index.php">INICIO</a></th>
        <li><a href="nuevomensaje.php">Nuevo Mensaje</a></th>
        <li><a href="mensajesenviados.php">Mensajes Enviados</a></th>
        <li><a href="MiCuenta.php">Mi cuenta</a></th>
        <li><a href="../../../config/cerrar_sesion_User.php" style="float:right">Cerrar Sesion</a></li>
    </ul>
    <br>
    <br>
    <br>
    <br>
    <table style="width:100%" border="1">
        <tr>
            <th>Codigo</th>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
            <th>Eliminar</th>
            <th>Modificar</th>
            <th>Cambiar Contraseña</th>
        </tr>

        <?php
        include '../../../config/conexionBD.php';
        $codigo_usuario = $_SESSION['usuario'];
        $sql = "SELECT * FROM usuario WHERE usu_codigo =  $codigo_usuario ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "   <td>" . $row['usu_codigo'] . "</td>";
                echo "   <td>" . $row['usu_cedula'] . "</td>";
                echo "   <td>" . $row['usu_nombres'] . "</td>";
                echo "   <td>" . $row['usu_apellidos'] . "</td>";
                echo "   <td>" . $row['usu_direccion'] . "</td>";
                echo "   <td>" . $row['usu_telefono'] . "</td>";
                echo "   <td>" . $row['usu_correo'] . "</td>";
                echo "   <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                echo "   <td>" . "<a href = 'eliminar.php?codigo=" . $row['usu_codigo'] . "'>" . "Eliminar</a>" . "</td>";
                echo "   <td>" . "<a href = 'modificar.php?codigo=" . $row['usu_codigo'] . "'>" . "Actualizar</a>" . "</td>";
                echo "   <td>" . "<a href = 'cambiar_contraseña.php?codigo=" . $row['usu_codigo'] . "'>" . "Actualizar Contraseña</a>" . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "   <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }

        $conn->close();
        ?>
    </table>
</body>

</html>