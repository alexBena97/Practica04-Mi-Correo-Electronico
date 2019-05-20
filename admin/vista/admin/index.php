<?php 
session_start();   
if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === FALSE){  
    header("Location: /SistemaDeGestion/public/vista/login.html"); 
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <link href="../../../config/paginas.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <ul id="button">
            <li><a>Inicio</a></li>
            <li><a>Usuarios</a></li> 
            <li><a href="../../../config/cerrar_sesion_Admin.php" style="float:right" >Cerrar Sesion</a></li>
        </ul>
    </header> 
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
            <th>Destinatario</th>
            <th>Asunto</th>
            <th></th>
        </tr> 
        <?php
        include "../../../config/conexionBD.php";
        $sql = "SELECT * FROM correo";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {    
                $codigo_remitente = $row['correo_remitente'];
                $sql_remitente = "SELECT usu_correo FROM usuario WHERE usu_codigo = $codigo_remitente"; 
                $result2 = $conn->query($sql_remitente); 
                $row_remitente = $result2->fetch_assoc();  
                 
                $codigo_destinatario = $row['correo_destinatario'];
                $sql_destinatario = "SELECT usu_correo FROM usuario WHERE usu_codigo = $codigo_destinatario"; 
                $result3 = $conn->query($sql_destinatario); 
                $row_destinatario = $result3->fetch_assoc(); 


                $codigo_correo = $row['correo_codigo'];
                echo "<tr>";
                echo "    <td>" . $row['correo_fecha_creacion'] . "</td>";
                echo "    <td>" . $row_remitente['usu_correo'] . "</td>";
                echo "    <td>" . $row_destinatario['usu_correo'] . "</td>"; 
                echo "    <td>" . $row['correo_asunto'] . "</td>";
                echo "    <td>" . "<a href ='eliminar.php?codigo_correo= ".$codigo_correo."&correo_remitente=".$row_remitente['usu_correo'] ."&correo_destinatario=".$row_destinatario['usu_correo']."'>" . "Eliminar</a>" . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>

</html>