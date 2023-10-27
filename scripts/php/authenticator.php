<?php
require "connection.php";

// declaro la variables que recibo desde el formulario anterior
$username = $_POST['correo'];
$password = $_POST['clave'];

// Consulta para obtener el ID del usuario por su correo electrónico
$consulta = "SELECT cliente_id,nombre FROM cliente WHERE correo = '$username' and contrasena = '$password'";
$resultado = $mysqli->query($consulta);

if ($resultado) {
    // Verifica si la consulta arrojó al menos una fila
    if ($resultado->num_rows > 0) {
        // Usuario autenticado, puedes obtener el ID
        $fila = $resultado->fetch_assoc();
        $idcrudo= $fila['cliente_id'];
        $id=(int)$fila['cliente_id'];
        $nombre = $fila['nombre'];
        // Define el nombre, valor y duración de la cookie
        // Establecer una cookie con un valor entero
        $clienteID = $id; // Esta función debería devolver el ID del cliente
        $clienteNombre = $nombre; // Esta función debería devolver el nombre del cliente
        // Establecer la cookie
        setcookie("clienteID", $clienteID, time() + 3600, "/");
        setcookie("clienteNombre", $clienteNombre, time() + 3600, "/");
        // Redirige a otra página con los parámetros
        header("Location: ../../index.php");


        exit; // Asegura que el script termine para evitar ejecución adicional
    } else {
        // No se encontró un usuario con el correo y contraseña proporcionados
        header("Location: login.php");
        exit;
    }
} else {
    // Error en la consulta
    echo "Error en la consulta: " . $mysqli->error;
}
