<?php 
session_start(); 
include '../../../config/conexionBD.php'; 

$codigo = $_SESSION['usuario']; 
$imagen = addslashes(file_get_contents($_FILES['fotoPerfil']["tmp_name"])); 

$sql = "UPDATE usuario SET usu_imagen = '$imagen' WHERE usu_codigo = $codigo" ; 
$result = $conn->query($sql); 
if($result === TRUE){ 
    echo "Se creo Correctamente";
} else{ 
    echo "Ha fallado algo a la hora de subir la image"; 
}
$conn->close();
?>