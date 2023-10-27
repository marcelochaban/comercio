<?php 
require "connection.php";

// declaro la variables que recibo desde el formulario anterior
$name=$_POST['name'];
$lastName=$_POST['lastName'];
$email=$_POST['mail'];
$password=$_POST['password'];
$phone=$_POST['phone'];

// primer consulta para verificar si no existe un usuario con el mismo correo electronico
$consulta = "SELECT correo FROM cliente WHERE correo = '$email'";

if ($mysqli->query($consulta)->num_rows > 0) {
    // El correo electrónico ya existe en la base de datos.
    header("Location: register.php");
    exit;
} else {
    // El correo electrónico no existe en la base de datos.
    // Consulta para insertar un nuevo cliente en la base de datos
    $consulta = "INSERT INTO cliente (nombre, apellido, correo, contrasena, telefono, fecha_registro)
    VALUES ('$name', '$lastName', '$email', '$password', '$phone', NOW());";
    //
    if ($mysqli->query($consulta) === TRUE) {
        // Consulta para obtener el ID del usuario por su correo electrónico
        $consulta = "SELECT cliente_id FROM cliente WHERE correo = '$email' and contrasena = '$password'";
        $resultado = $mysqli->query($consulta);
        if ($resultado) {
            if ($resultado->num_rows > 0) {
                // Usuario autenticado, puedes obtener el ID
                $fila = $resultado->fetch_assoc();
                $id = $fila['id'];
                // Redirige a otra página con los parámetros
                setcookie("clienteID", $clienteID, time() + 3600, "/");
                setcookie("clienteNombre", $clienteNombre, time() + 3600, "/");
                header("Location: ../../index.php");
                exit; // Asegura que el script termine para evitar ejecución adicional
            } else {
                // No se encontró un usuario con el correo y contraseña proporcionados
                header("Location: ../../register.php");
                exit;
            }
            } else {
                // Error en la consulta
                echo "Error en la consulta: " . $mysqli->error;
                exit;
            }
    } else {
        echo "Error al registrar el cliente: " . $mysqli->error;
    }
}

?>
