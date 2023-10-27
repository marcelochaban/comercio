<?php
require "connection.php";

// Consulta SQL para obtener los productos desde la base de datos
$sql = "SELECT id, titulo, imagen, categoria,detalle, precio FROM productos";
$result = $mysqli->query($sql);

$productos = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

$mysqli->close();

// Devuelve los datos en formato JSON
header("Content-Type: application/json");
echo json_encode($productos);
?>
