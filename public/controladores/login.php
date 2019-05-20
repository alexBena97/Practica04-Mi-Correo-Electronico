<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Document</title>
</head>

<body>
   <?php
   include '../../config/conexionBD.php';

   $usuario = isset($_POST['correo']) ? trim($_POST['correo']) : null;
   $contraseña = isset($_POST['contraseña']) ? trim($_POST['contraseña']) : null;
   echo $contraseña;
   $pass = MD5($contraseña);
   echo $pass;
   $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = '$pass'";
   $result = $conn->query($sql);
   $rows = $result->fetch_assoc();
   if ($result->num_rows > 0) {
      if ($rows['usu_rol'] == 'user') {
         $_SESSION['isUser'] = TRUE;
         $_SESSION['usuario'] = $rows['usu_codigo'];
         header("Location:../../admin/vista/user/index.php");
      } else if ($rows['usu_rol'] == 'admin') {
         $_SESSION['isAdmin'] = TRUE;
         $_SESSION['usuario'] = $rows['usu_codigo']; 
         header("Location:../../admin/vista/admin/index.php");
      }
   } else {
      header("Location:../vista/login.html");
   }

   $conn->close();
   ?>
</body>

</html>