<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Formulario HTML Contacto</title>
        <link rel="stylesheet" href="css/form.css">
    </head>

    <body>

        <?php 
            //primer paso: obtener los valores de los campos
            //del formulario
            //en php, para definir una variable usamos el prefijo '$'
            $nombre = $_POST['nombre'];
            $mail = $_POST['mail'];
            $codigocurso = $_POST['codigocurso'];
      //  $mensaje = $_POST['message']; 

            if(empty($nombre)){
                die("ERROR: por favor proporciona tu nombre, necio");
            }

            //en php para imprimir el valor de una variable
            //se utiliza el método echo, print
            // el punto (.) es para concatenar cadenas o caracteres
            //echo 'Nombre: ' . $nombre;
            //echo '<br> Correo: ' . $email;
            //echo '<br> Sitio web: ' . $website;
            //echo '<br> Mensaje: ' . $mensaje;

            //configurar los datos de conexión al servidor de base de datos
            $server = "localhost";
            $database = "institucion";
            $user = "root";
            $pass = "";

            //Crear conexión a la base de datos
            $conexion = mysqli_connect($server, $user, $pass, $database);
            //validar si la conexión se establecio exitosamente
            if(!$conexion){
                die("Conexión no fue exitosa: " . mysqli_connect_error());   
            }
            echo "Conexión exitosa";

            //crear la sentencia SQL para insertar datos
            $sql = "INSERT INTO alumnos(nombre, mail, codigocurso) VALUES ('$nombre','$mail','$codigocurso')";

            //Enviamos la consulta a ejecutar a través de la conexión a base de datos
            if(mysqli_query($conexion, $sql)){  
                echo "Nuevo contacto agregado exitosamente";
            }else{
                echo "ERROR: ". $sql . "<br>" . mysqli_error($conexion);
            }

            //cerramos la conexion a la BD

            mysqli_close($conexion);
        ?>
    </body>

</html>