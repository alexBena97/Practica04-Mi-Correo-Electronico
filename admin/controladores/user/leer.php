<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="../../../config/formulario.css" rel="stylesheet" type="text/css" /> 
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $codigo_correo = $_GET["codigo_correo"];
    $sql = "SELECT * FROM correo WHERE correo_codigo = $codigo_correo";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
    $sql_remitente = "SELECT usu_correo FROM usuario WHERE usu_codigo =". $row['correo_remitente']; 
    $result2 = $conn->query($sql_remitente); 
    $row2 = $result2->fetch_assoc();
            ?>
            <form id="formulario01" method="POST" action="../../controladores/usuario/eliminar.php">
                <fieldset>
                    <legend>MENSAJE</legend>
                    <label for="remitente">REMITENTE(*)</label>
                    <input type="text" id="remitente" name="remitente" value="<?php echo $row2["usu_correo"]; ?>" disabled />
                    <br>
                    <label for="asunto">ASUNTO(*)</label>
                    <input type="text" id="asunto" name="asunto" value="<?php echo $row["correo_asunto"]; ?>" disabled />
                    <br>
                    <label for="mensaje">MENSAJE(*)</label>
                    <input type="text" id="mensaje" name="mensaje" value="<?php echo $row["correo_mensaje"]; ?>" disabled />
                    <br>
                </fieldset>
            </form>
        <?php
} else {
    echo "<p>Ha ocurrido un error inesperado !</p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>

</body>

</html>