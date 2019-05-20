<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link href="../../../config/paginas.css" rel="stylesheet" type="text/css" />
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
        $sql = "SELECT * FROM usuario";
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