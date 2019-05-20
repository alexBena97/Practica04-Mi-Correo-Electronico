<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <table style="width:100%" border="1">
        <tr>
            <th>Fecha</th>
            <th>Remitente</th>
            <th>Asunto</th>
            <th><a href="">Leer</a></th>
        </tr>
        <?php

        session_start();
        include '../../../config/conexionBD.php';
        $codigo_destinatario = $_SESSION['usuario'];
        $correo = $_GET['correo'];
        $sql = "SELECT * FROM usuario WHERE usu_correo LIKE '$correo%'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $codigo = $row['usu_codigo'];

        $sql_destinatario = "SELECT * FROM correo WHERE correo_remitente = $codigo_destinatario AND correo_destinatario = $codigo ORDER BY correo_fecha_creacion DESC ";
        $result2 = $conn->query($sql_destinatario);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $sql_correo = "SELECT * FROM usuario WHERE usu_codigo = $codigo";
                $result3 = $conn->query($sql_correo);
                $row3 = $result3->fetch_assoc();
                echo "<tr>";
                echo "    <td>" . $row2['correo_fecha_creacion'] . "</td>";
                echo "    <td>" . $row3['usu_correo'] . "</td>";
                echo "    <td>" . $row2['correo_asunto'] . "</td>";
                echo "    <td>" . "<a href ='../../controladores/user/leer.php?codigo_correo= " . $row2['correo_codigo'] . "'>Leer</a>" . "</td>";
                echo "</tr>";
            }
        } else {  
            echo "El usuario que intenta buscar no existe";
        }
        ?>
    </table>
</body>

</html>