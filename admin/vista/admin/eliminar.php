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
    <link href="../../../config/formulario.css" rel="stylesheet" type="text/css" />
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
    $correo_remitente  = $_GET['correo_remitente'];
    $correo_destinatario = $_GET['correo_destinatario'];
    $sql = "SELECT * FROM correo WHERE correo_codigo = $codigo_correo";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <form id="formulario01" method="POST" action="../../controladores/user/modificar.php">
                <fieldset>
                    <legend>Eliminar Correo</legend> 
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $row['correo_codigo']?>" />
                    <label for="fecha_creacion">fecha de Creacion(*)</label><input type="text" id="fechaCreacion" value="<?php echo  $row['correo_fecha_creacion'] ?>" disabled>
                    <label for="remitente">Remitente(*)</label><input type="text" id="Remitente" value=" <?php echo $correo_remitente ?>" disabled>
                    <label for="destinatario">Destinatario(*)</label><input type="text" id="Destinatario" value=" <?php echo $correo_destinatario ?>" disabled>
                    <label for="Asunto">Asunto(*)</label><input type="text" id="Asunto" value=" <?php echo $row['correo_asunto'] ?>" disabled>
                    <input type="submit" value="ELIMINAR CORREO">
                </fieldset>
            </form>
        <?php
    }
}

?>
</body>

</html>