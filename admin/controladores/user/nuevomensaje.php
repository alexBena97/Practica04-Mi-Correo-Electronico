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
    <title>Document</title>
</head>

<body>
    <?php
    include '../../../config/conexionBD.php';
    $codigo_usuario = $_SESSION['usuario'];
    $destinatario = isset($_POST["destinatario"]) ? trim($_POST["destinatario"]) : null;
    $asunto = isset($_POST["asunto"]) ? trim($_POST["asunto"]) : null;
    $mensaje = isset($_POST["mensaje"]) ? trim($_POST["mensaje"]) : null;
    $sql_des = "SELECT * FROM usuario WHERE usu_correo = '$destinatario'";
    $result = $conn->query($sql_des);
    $row = $result->fetch_assoc();
    $codigo_des = $row['usu_codigo'];
    $sql = "INSERT INTO correo VALUES (null, $codigo_usuario,$codigo_des,'$asunto','$mensaje',null)";
    if ($conn->query($sql) === TRUE) {
        echo "Se ha mandado el correo correctamente <br>";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->errno . "br";
    }
    echo "<a href='../../vista/user/nuevomensaje.php'>Regresar</a>";
    $conn->close();
    ?>

</body>

</html>