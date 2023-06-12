# laboratorio-samsung-dev
Crearemos un formulario de alta a una página web, una base de datos con una tabla y los campos necesarios para guardar la información y un script PHP que valide los datos, los guarde en dicha tabla y permita su consulta.
<br>
Se requiere crear los scripts html, css, sql y PHP listados a continuación:
<br>
<br>
*En el front-end*
<br>
-Crearemos un formulario con los siguientes campos: Nombre, Primer apellido, Segundo apellido, Email, Login y Password.
<br>-En este ejercicio se debe implementar una doble validación, tanto desde html como desde PHP. Se comprobará que todos los campos estén correctamente llenos antes de enviar los datos a una base de datos MySQL.
<br>
-El campo email deberá tener el formato de correo electrónico válido.
<br>
-El campo password deberá tener una extensión entre 4-8 caracteres.
<br>
-Si los datos están correctamente introducidos, al darle a enviar se creará un registro en nuestra BBDD con los datos introducidos. De lo contrario se avisará al usuario con un mensaje claro sobre el problema y se volverá a ejecutar de nuevo el formulario de registro.
<br>
-El estilo CSS del formulario es totalmente personal. En este punto se deja margen al criterio artístico de la alumna.
<br>
<br>
*BBDD*
<br>-Se deberá crear una BBDD con la tabla y los campos necesarios para guardar la información recibida.
<br>-Una vez que hemos creado la base de datos, podemos comenzar a trabajar en el script PHP que se encargará de validar el formulario y realizar las operaciones de consulta en la base de datos.<br><br>
*En el Back-end*
<br>
-Se deberá crear el script PHP necesario para validar los datos recibidos desde front-end.
<br>
-Si el mail del usuario introducido ya estaba en nuestra BBDD se avisará al usuario con un mensaje claro sobre el problema y se volverá a ejecutar de nuevo el formulario de registro.
<br>
-Si los datos son correctos y el usuario introducido no está ya dado de alta, aparecerá un mensaje que nos muestre la frase “Registro completado con éxito”, los datos se guardarán en la tabla de nuestra BBDD y aparecerá un botón “consulta” que, al pulsarlo, nos dará una lista de los usuarios registrados en nuestra BBDD.
<br>
-En resumen, el ejercicio de programación en PHP consiste en crear una página que permita el registro de datos en un formulario HTML, validar los datos ingresados, almacenarlos en una base de datos MySQL y permitir la consulta de los registros.
<br><br>
Adicionalmente se adjunta también la tabla en sql resultante con algunos registros, también en formato .txt.
<br><br>La ruta del proyecto se iniciaría como: http://localhost/laboratorio/index.html
