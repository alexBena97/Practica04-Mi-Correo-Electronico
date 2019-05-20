<?php
$db_servername = "localhost"; 
$db_username = "root"; 
$db_password = ""; 
$db_name = "hipermedial";  

//Crear conexion  
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);  
$conn->set_charset("utf8");
//Verificar connexion 
if($conn->connect_error){ 
   die("Conexion fallida: ". $conn->connect_error);
}
?>