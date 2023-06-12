<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de registro</title>
    <link href="styleformulario.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php

/* Esto es por si queremos saber la información de PHP que estamos usando:
phpinfo(); */

/* Esto es para que muestre errores. */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Conexión con PDO. Son las variables necesarias para iniciar. Como estoy
trabajando con mamp, me hace falta poner el password. */

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "laboratorio";

/* Creamos conexión con los datos que requiere PHP. Creamos una variable
con los parámetros necesarios para establecerla. */

$conn = new mysqli($servername, $username, $password, $dbname);

/* Comprobamos conexión. */

if ($conn->connect_error) {
    die("¡La conexión falló!: " . $conn->connect_error);
}

$error = '';

/* Ponemos las variables de la base de datos. */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $password = $_POST["password"];

/* Agrega esta línea para comprobar fallos, como me ha pasado a mí, y quítala
para que no se enseñe de forma fea la variables en los echo.
var_dump($nombre, $apellido1, $apellido2, $email, $login, $password); */

if (empty($nombre) || empty($apellido1) || empty($apellido2) || empty($email) ||
    empty($login) || empty($password)) {
    $error = 'Por favor, rellena todos los campos para completar el registro';

/* En las siguientes líneas ponemos las validaciones que se nos piden también desde php:
la extensión máxima de la contraseña, formato email, etc. */

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El formato del correo electrónico no es válido";
    } elseif (strlen($password) < 4 || strlen($password) > 8) {
    echo "La contraseña debe tener entre 4 y 8 caracteres";
    } else {
   
/* También se nos pide consultar si el email que se va a introducir ya existe en nuestra
base de datos. Para ello, tendremos que comprobarlo. De ser "nuevo", estará todo bien.
Si no, devolvemos a la página de inicio. */

$sql = "SELECT * FROM final WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $mensajecorreo = "Esta dirección de correo electrónico ya está registrada. Por favor, inténtalo con una nueva";
    echo "<script>alert('$mensajecorreo'); window.location.href = 'index.html';</script>";
    exit();
}  

/* Aquí hacemos la query. */

    $sql = "INSERT INTO final (nombre, apellido1, apellido2, email, login, password)
    VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login', '$password')";

/* Si todo va bien, sale un mensaje de éxito. Si no, se pide que se repita el proceso con un error. 
Le metemos aquí css puro porque desde el archivo css no lo cogía bien y tampoco queremos 
meterle mucho más. */

if ($conn->query($sql) === TRUE) {
    echo "<div class='success-message'>";
    echo "¡Comprueba tus datos de registro!<br /><br />";
    echo "<span class='info'>Nombre: " . $nombre . "</span><br />";
    echo "<span class='info'>Primer apellido: " . $apellido1 . "</span><br />";
    echo "<span class='info'>Segundo apellido: " . $apellido2 . "</span><br />";
    echo "<span class='info'>Correo electrónico: " . $email . "</span><br />";
    echo "<span class='info'>Usuario: " . $login . "</span><br />";
    echo "<span class='info'>Contraseña: " . $password . "</span><br /><br />";
    echo "</div>";

/* Aquí ponemos un echo y un hipervínculo para volver al formulario. 
Como ya se ha creado el registro, habilitamos la opción de que aparezca un botón
de consulta de los datos (menos la contraseña) que han entrado hasta ahora. */   

    echo "<div class='container'>";
    echo "<a href='index.html' class='button'>Volver al formulario<br /></a>";
    echo "<a href='consulta.php' class='button'>Consultar los registros<br /></a>";
    echo "</div>";

/* Y si no ocurre lo anterior, pues sale un mensaje de error con estilo. */ 

} else {
    echo "¡Error!: " . $sql . "<br>" . $conn->error . "<br /><br />";
    echo "<a href='index.html' class='button'>Volver al formulario</a>";
}

/*Generamos código JavaScript para mostrar un mensaje de alerta en el navegador. */

$mensaje = "¡Registro creado con éxito!";

echo "<script>alert('$mensaje');</script>";

/* Cerramos la conexión. Lo ideal es ponerla, aunque las versiones recientes ya lo hacen solo. */

$conn->close();
}
}
?>

</body>
</html>