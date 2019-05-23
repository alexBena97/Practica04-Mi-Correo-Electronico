# Practica04-Mi-Correo-Electronico 
1.	Creacion de la pagina index.php del usuario. Donde creamos una lista donde se encuentre el menú  
de la página nuevomensaje, mensajesenviados, Mi Cuenta y finalmente el cerrar sesión.  

   


1.2.	 Hacemos una consulta sql para poder cargar la foto que se ecuentra en la base del usuario que este dentro de la pagina, en donde utilizamos una etiqueta img para poder ver la imagen del usuario. 



   









1.3.	 Creamos otra consulta para que en la pagina index se me visualize los mensajes que han enviado. En donde utilizo la variable session para poder obtener el codigo del usuario que se encuentra dentro de la pagina, y asi poder obtener los mensajes que han enviado a este usuario. En la sentencia sql pongo una condición, que es que me muestre que el correo no este eliminado, es decir si el correo tiene el valor N en la columna correo_eliminado es que se encuentra eliminado. Y finalmente que me muestre los mensajes mas recientes, para lo cual utilize ORDER BY DESC. Para que se me visualice el correo electrónico del remitente utilizo denteo del while otra sentencia sql para poder obtener el correo  del remitente en cada iteración del while, y finalmente lo muestro en la tabla. 


    

1.3.1.	Para poder leer los mensajes utilice una etiqueta a dentro de la tabla que me permitirá leer el correo que ha enviado el remitente. Para esto utilizo el método get para pasar el código del correo a la pagina leer.php. En la pagina leer.php  hacemos una consulta sql donde obtenemos todo de un correo en especifico mediante el código del correo , el cual lo obtenemos de la pagina index.php mediante el método GET. Después obtenemos el correo del remitente mediante otra consulta sql , donde obtenemos el correo del remitente mediante el código de dicho remitente, para ello utilizamos el resultado del anterior secuencia sql. A  continuación creo un formulario html , en donde en el value de cada input de doy el valores de las sentencias sql



 


1.4.	En la pagina mensajes enviados para obtener los mensajes que el usuario ha enviado utilizo la variable SESSION, para asi obtener el código del usuario y con este preguntar en una sentencia sql si el código del destinatario sea igual al código del usuario que se encuentra en la pagina web. Dentro del while hago otra consulta sql para poder obtener el correo del destinatario y visualizarlo en la tabla. Para visualizar utilizamos una tabla para que nos muestre los mensajes y al final una opción leer para poder leer el mensaje. Para Poder leer el mensaje accedemos al pagina leer.php de los controladores , y hacemos el mismo procedimiento que en la página index para los mensajes recibidos. 



    





1.5.	Para poder mandar  un correo a otro usuario creamos un formulario para poder escribir el asunto , el mansaje y el destinatario a quien queremos escribir. Después  mediante el formulario accedemos a la pagina nuevomensaje.php mediante un action y el método $_POST.  

 
1.6.	 Despues obtenemos el valor de las cajas del formulario con el método POST y hacemos una sentencia sql para poder insertar en la base de datos los valores, donde también hacemos otra sentencias para obtener el código del destinatario y poder asignarlo a la base. 
  

1.7.	Para buscar el mensaje electrónico utilizamos ajax. Para realizar la búsqueda utilizamos onkeyup en el input de la página index. Donde utilizamos una función que la hemos llamado buscarPorCorreo. Donde si lo utilizamos nos mandara a la página buscar.php , y donde también utilizaremos el método GET para poder enviar el correo electrónico para que nos pueda buscar mediante el correo. 
 
   

1.7.1.	En la página buscar php   utilizamos el método get para poder obtener el correo de la persona que queremos buscar en los mensajes enviados. Hacemos una sentencia sql para obtener el correo del remitente en donde utilizamos la Palabra LIKE para poder obtener el correo del usuario mediante las primeras letras ingresadas para buscar. Después creamos otras dos sentencias para obtener los correos que tengan un mismo destinatario y un mismo remitente. Y el ultimo para obtener el correo del destinatario y ponerlo en la tabla. 

   
1.8.	Para buscar el mensaje electrónico enviados utilizamos ajax. Para realizar la busqueda utilizamos onkeyup en el input de la página mensajesenviados.php. Donde utilizamos una función que la hemos llamado buscarPorCorreoOtro. Donde al utilizarla nos mandara a la pagina buscar2.php , y donde también utilizaremos el método GET para poder enviar el correo electrónico para que nos pueda buscar mediante el correo.  
  
    

1.8.1.	En la pagina buscar2 php   utilizamos el metodo get para poder obtener el correo de la persona que queremos buscar en los mensajes enviados. Hacemos una sentencia sql para obtener el correo del destinatario en donde utilizamos la Palabra LIKE para poder obtener el correo del usuario mediante las primeras letras ingresadas para buscar. Después creamos otras dos sentencias para obtener los correos que tengan un mismo remitente y un mismo destinatario. Y el ultimo para obtener el correo del remitente y ponerlo en la tabla.   

 
1.9.	Para poder modificar los datos creamos un formulario , en donde primeramente creamos una sentencia sql para obtener los datos del usuario , donde utilizamos la variable sesión para obtener el código del usuario. Después procedemos a pasar todos los datos del usuario al formulario. Cuando demos click al botón modificar nos llevará a la página modificar.php del controlador.   

  
  
1.10.	En la página modificar.php del controlador utilizamos el metodo post para obtener los valores de la las cajas del formulario. A continuación hacemos un update para actualizar los campos del usuario. En el update ponemos la hora que se ha ejecutado la actualización. 

   

1.11.	Para poder modificar la contraseña del usuario creamos un formulario para poder ingresar la contraseña actual y la nueva contraseña. Mediante este formulario accederemos a la pagina cambiar_contraseña de los controladores mediante un action , y con el metodo post enviar los valores.
  


1.12.	 En la página cambiarcontraseña.php de controladores obtenemos lo que se encuentra en los campos con el método POST , después hacemos una sentencia sql para obtener todo del usuario que tiene la contraseña actual. Después hacemos un update de este mismo usuario en donde le damos la nueva contraseña obtenida del campo del formulario. 

   

2.10	. Para que el usuario pueda obtener una imagen en su cuenta utilizamos un input de tipo file par que puede obtener la foto y un input de tipo submit pra poder guardarla en la base.   

  


2.11	 Para que se pueda subir a la base la imagen y darle la imagen  a un usuario creamos un método que lo hemos llamado enviarImagen. Donde hacemos un update para dar la imagen del usuario y subirla a la base, para ello utilizamos la variable $_SESSION para obtener el código del usuario que se encuentra en la pagina. Para subirla a la base hay q cambiar el formato de la imagen al que se encuentra en la base y después se procederá a subirla. 
  
 

2.	Para que un administrador no reciba un correo preguntamos en la pagina login.php si el rol de usuario es igual a user se pueda ingresar los datos a la tabla correo de la base.    

  

2.2.	Para poder obtener todos los mensajes electrónicos  de la base hacemos un select de todos los correos siempre y cuando no este eliminado el correo es decir que la columna correo_eliminado no sea igual a N. Después hacemos dos sentencias sql dentro del while para poder obtener el correo del destinatario y del remitente y poder visualizarlo en la tabla.  


   











2.3.	Para poder eliminar los correos electronicos, creamos un formulario donde obtendremos la fecha. El remitente , el destinatario y el asunto. En este formulario ya tendremos puesto todos los valores en los inputs ya que hemos utilizado el metodo get para obtener mediante la url los datos del correo.  Después accedemos al metodo eliminar de la carpeta controladores mediante un action y pasamos los valores a esta  pagina mediante el metodo POST.


 












2.4.	 En la página eliminar.php obtenemos el código del correo electrónico con el método POST , después hacemos un update donde ponemos que este correo esta eliminado, para lo cual la columna correo_eliminado sea igual a S. 

   

2.5.	Para que el administrador pueda  eliminar el usuario , mandamos los datos del usuario a un formulario, en este formulario que se llama eliminarUsuario.php obtenemos el código del usuario al cual queremos eliminar , donde utilizaremos el método GET  para obtener el código del usuario que le hemos pasado en la url . Después obtenemos todos los valores de la tabla usuario donde el código del usuario sea la variable que le hemos asignado al metogo Get.   

  

 

2.6.	, desde ese formulario al hacer click en el botón eliminar nos llevara a la página eliminar.php, de los controladores. Donde pasamos el correo del usuario con el método POST , después hacemos un update para hacer que este usuario en la base de datos parezco como eliminado. Donde hacemos que la columna usu_eliminado sea igual a S , y también obtenemos la fecha de modificación y procedemos también a ingresarla a la base.
  
2.7.	Para que el administrador pueda modificar el usuario pasamos los datos del usuario a un formulario, en donde utilizamos el método get para poder obtener el código del usuario que hemos mandado mediante la url y cuando demos click en modificar, nos llevara a la página modificar.php del controlador.  
  
 
2.8.	 En la página modificar.php obtenemos los valores de los inputs mediante el metodo POST , a continuación hacemos un update al usuario que tenga el código obtenido con el POST. En el Update cambiamos la fecha de modificación.


  












2.9.	Para poder modificar la contraseña del usuario usamos un formulario para poder ingresar la contraseña actual y la nueva contraseña. En donde utilizamos el método GET para poder obtener el codigo de el usuario que hemos enviado mediante la url. Después accedemos a la pagina cambiar_contraseña.php mediante action y mandamos los valores mediante el método POST. 


  












2.10.	En la página cambiarcontraseña.php de controladores obtenemos lo que se encuentra en los campos con el método POST , después hacemos una sentencia sql para obtener todo del usuario que tiene la contraseña actual. Después hacemos un update de este mismo usuario en donde le damos la nueva contraseña obtenida del campo del formulario.  
 

3.	Para poder verificar que un usuario sea user o admin y pueda ingresar a ciertas páginas de la página web utilizamos la variable $_SESSION en el login.php. En donde si es rol user se cree la variable $_SESSION[‘isAdmin´]= TRUE ; y no es user que se cree la variable $_SESSION[‘isAdmin´]= TRUE ;. De esta manera sabremos si es un administrador o un usuario.
 

  

3.2.	En cada pagina que sea user agregamos el siguiente codigo para que no permita ingresar a la pagina si no esta con la session user. 
  
3.3.	Cuando damos cerrar sesion nos manda al archivo cerrar_sesion_User y nos Cierra la session con el siguiente codigo: 
  

3.4.	En cada pagina que sea Admin agregamos el siguiente codigo para que no permita ingresar a la pagina si no esta con la session Admin.  
 
 
3.5.	Cuando damos cerrar session nos manda al archive cerrar_sesion_Admin y nos Cierra la session con el siguiente codigo: 
 
