<?php
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === FALSE) {
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
            <li><a href="../../../config/cerrar_sesion_Admin.php" style="float:right">Cerrar Sesion</a></li>
        </ul>
    </header> 
    <br> 
    <br> 
    <br> 
    <?php 
    include "../../../config/conexionBD.php";  
    $codigo_correo = $_GET['codigo_correo'];  
    
    ?> 

</body>

</html>