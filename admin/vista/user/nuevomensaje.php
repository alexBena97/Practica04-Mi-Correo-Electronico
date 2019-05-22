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
    <link href="../../../config/formulario.css" rel="stylesheet" type="text/css" />
    <link href="../../../config/paginas.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>

<body>
    <section>
        <ul id="button">
            <li><a href="index.php">INICIO</a></th>
            <li><a href="nuevomensaje.php">Nuevo Mensaje</a></th>
            <li><a href="mensajesenviados.php">Mensajes Enviados</a></th>
            <li><a href="MiCuenta.php">Mi cuenta</a></th>
            <li><a href="../../../config/cerrar_sesion_User.php" align = "right">Cerrar Sesion</a></li>
        </ul>
    </section>
    <br> 
    <br>
    <br>
    <br>
    <form method="POST" action="../../controladores/user/nuevomensaje.php">
        <fieldset>
            <legend>Enviar Nuevo Mensaje</legend>
            <label for="Destinatario">PARA(*)</label><input type="text" name="destinatario" required>
            <label for="Asunto">ASUNTO(*)</label><textarea name="asunto"></textarea>
            <label for="Mensaje">MENSAJE(*)</label> <textarea name="mensaje"></textarea>
            <input type="submit" value="Enviar Mensaje">
        </fieldset>
    </form>
</body>

</html>