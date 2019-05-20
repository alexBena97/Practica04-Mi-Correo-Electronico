<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body> 
<?php 
include "../../../config/conexionBD.php"; 
$codigo_de_Correo = $_POST['codigo']; 
echo "El codigo es : " . $codigo_de_Correo; 
date_default_timezone_set("America/Guayaquil"); 
$fecha = date('Y-m-d H:i:s', time());  
$sql = "UPDATE correo SET correo_eliminado = 'S', correo_fecha_modificacion = '$fecha' WHERE correo_codigo = $codigo_de_Correo"; 
if ($conn->query($sql) === TRUE) {
    echo "<p>Se ha eliminado el correo correctamemte!!!</p>";
} else {
    echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
}
echo "<a href='../../vista/admin/index.php'>Regresar</a>";
$conn->close();
?>
    
</body>
</html>