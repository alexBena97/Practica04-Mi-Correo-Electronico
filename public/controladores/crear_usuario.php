<!DOCTYPE html>
<html lang="es">
<head>
    <title>Document</title>
</head>
<body>
   <?php 
   /*echo"<p>HOLA MUNDO</p>";
   $codigo= $_POST['codigo']; 
   echo "<p>Codigo:$codigo</p>";
   $cedula = $_POST['cedula']; 
   echo "<p>Cedula:$cedula</p>"; 
   $nombres = $_POST['nombres']; 
   echo "<p>Nombres:$nombres</p>"; 
   $apellidos = $_POST['apellidos']; 
   echo "<p>Apellidos:$apellidos</p>";   
   $direccion = $_POST['direccion']; 
   echo "<p>Direccion:$direccion</p>";  
   $telefono = $_POST['telefono']; 
   echo "<p>Telefono:$telefono</p>";  
   $correo = $_POST['correo']; 
   echo "<p>Correo:$correo</p>";  
   $fechaDeNacimiento = $_POST['FechaDeNacimiento']; 
   echo "<p>Fecha de Nacimiento:$fechaDeNacimiento</p>";*/
   
   include '../../config/conexionBD.php';    
   $codigo = isset($_POST['codigo'])?strtoupper(trim($_POST["codigo"])):null; 
   $cedula = isset($_POST['cedula'])?strtoupper(trim($_POST["cedula"])):null;  
   $nombres = isset($_POST['nombres'])?strtoupper(trim($_POST["nombres"])):null; 
   $apellidos = isset($_POST['apellidos'])?strtoupper(trim($_POST["apellidos"])):null;   
   $direccion = isset($_POST['direccion'])?strtoupper(trim($_POST["direccion"])):null;  
   $telefono = isset($_POST['telefono'])?strtoupper(trim($_POST["telefono"])):null;  
   $correo = isset($_POST['correo'])?strtoupper(trim($_POST["correo"])):null;   
   $contraseña = isset($_POST['contraseña'])?(trim($_POST["contraseña"])):null; 
   $FechaDeNacimiento = isset($_POST['FechaDeNacimiento'])?strtoupper(trim($_POST["FechaDeNacimiento"])):null;   
   $contra = MD5($contraseña); 
   echo $contraseña;
   echo "Se han creado los datos personales correctamente <br>"; 
   $sql = "INSERT INTO usuario VALUES (null,'$cedula','$nombres','$apellidos','$direccion','$telefono','$correo','$contra','$FechaDeNacimiento','N',null,null,'user')";
  if($conn->query($sql) === TRUE){ 
   echo "Se han creado los datos personales correctamente <br>";
  }else{ 
      if($conn->errno == 1862){  
        echo "La persona con la cedula $cedula ya esta registrada en el sistema";
      }else{ 
          echo "Error:" . $sql . "<br>" . $conn->errno . "<br>";
      } 
      echo "Error:" . $sql . "<br>" . $conn->errno . "br";
  }
  echo"<a href='../vista/crear_usuario.html'>Regresar</a>";
  $conn->close();
  ?>
</body>
</html>