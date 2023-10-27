<?php

require "connection.php";

$id_cliente = $_COOKIE["clienteID"];
echo "" . $id_cliente . "";

// Decodificar el JSON en un array asociativo
$data = json_decode($_POST['productosEnCarrito'], true);

$total = 0;
if (!empty($data)) {
    // Crear la consulta SQL
    $consulta = "INSERT INTO ventas (fecha_venta, cliente_id) VALUES (NOW(), $id_cliente)";

    // Preparar la consulta
    if ($stmt = $mysqli->prepare($consulta)) {
        if ($stmt->execute()) {
            // La venta se creó con éxito
            $venta_id = $mysqli->insert_id; // Obtener el ID de la última venta creada
            // Iterar a través de los items y guardar datos en variables o realizar operaciones
            foreach ($data as $item) {
                $id = $item['id'];
                $titulo = $item['titulo'];
                $imagen = $item['imagen'];
                $categoria = $item['categoria'];
                $detalle = $item['detalle'];
                $precio = $item['precio'];
                $cantidad = $item['cantidad'];

                $total += $precio * $cantidad;

                $consulta = "INSERT INTO productos_vendidos (venta_id, producto_id, cantidad, precio_unitario)
                            VALUES ('$venta_id', '$id', '$cantidad', '$precio');";
                $resultado = $mysqli->query($consulta);
            }
            $consulta = "UPDATE ventas SET total= $total WHERE venta_id = $venta_id";
            $resultado = $mysqli->query($consulta);

            header("Location: ../../compra_confirmada.php?venta_id=$venta_id");
        } else {
            echo "Error al crear la venta: " . $stmt->error;
        }
        // Cerrar la consulta
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $mysqli->error;
    }

    // Cerrar la conexión
    $mysqli->close();
} else {
    echo "El JSON está vacío o no se pudo decodificar.";
}
echo "<br>";
echo "total: $total<br>";
