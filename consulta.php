<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de registro</title>
    <link href="styleconsulta.css" rel="stylesheet" type="text/css">
</head>
<body>

<h1>Consulta los registros existentes</h1>

<?php

/* Creamos esta página ad hoc para el botón de consulta de registros que se
nos pide. La estructura es similar a la del archivo php anterior.
Hemos incluido previamente los argumentos de html porque vamos a querer
meterle estilos a esta página.*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "laboratorio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("¡La conexión falló!: " . $conn->connect_error);
}

$error = '';

/* Pasamos a realizar la consulta de los supuestos registros que
llevamos hasta ahora. Como vimos en masterclass, mostraremos todos los
campos salvo el de la contraseña por razones de seguridad. 
Si no, sería: "SELECT * FROM final. */

$sql = "SELECT ID, nombre, apellido1, apellido2, email, login FROM final";
$resultado = mysqli_query($conn, $sql);

/* Pasamos a verificar si existe algún registro hasta ahora. */

if (mysqli_num_rows($resultado) > 0) {

/* Si los hay, genera una tabla. */

    echo "<table>";
    echo "<tr><th>Nº</th><th>Nombre</th><th>Primer apellido</th>
    <th>Segundo apellido</th><th>Correo electrónico</th><th>Login</th></tr>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['ID'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['apellido1'] . "</td>";
        echo "<td>" . $fila['apellido2'] . "</td>";
        echo "<td>" . $fila['email'] . "</td>";
        echo "<td>" . $fila['login'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<div class='container'>";
    echo "<a href='index.html' class='button'>Volver al formulario</a>";
    echo "</div>";

/* Si no, muesta un mensaje de que no. */

} else {
    echo "No hay registros por el momento";
}

$conn->close();
?>

</body>
</html>