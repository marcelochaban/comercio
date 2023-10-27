<?php
require "connection.php";
$id = $_GET['param1'];
echo $id;

$consulta = "SELECT nombre , apellido FROM cliente WHERE id = '$id'";
$resultado = $mysqli->query($consulta);

if ($resultado) {
    // Verifica si la consulta arrojó resultados
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];
        echo "Nombre: " . $nombre . "<br>";
        echo "Apellido: " . $apellido . "<br>";
        if (isset($_COOKIE['mi_cookie'])) {
            $valor = $_COOKIE['mi_cookie'];
            echo "El valor de mi_cookie es: " . $valor;
        } else {
            echo "La cookie 'mi_cookie' no está definida.";
        }
    } else {
        echo "No se encontraron resultados para el ID: $id";
    }
} else {
    echo "Error en la consulta: " . $mysqli->error;
}

echo "nombre : $nombre apellido : $apellido"
?>




