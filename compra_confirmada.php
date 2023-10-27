<?php
require "scripts/php/connection.php"; // Asegúrate de incluir tu archivo de conexión

// Verifica si se proporciona el ID de la venta (puedes pasarlo como parámetro en la URL)
if (isset($_GET['venta_id'])) {
    $venta_id = $_GET['venta_id'];

    // Consulta SQL para obtener los productos de una venta específica
    $consulta = "SELECT c.nombre AS nombre_cliente, p.titulo, pv.cantidad,
                pv.precio_unitario, (pv.cantidad * pv.precio_unitario) 
                AS subtotal, v.total AS total_venta
                FROM productos_vendidos pv
                INNER JOIN productos p ON pv.producto_id = p.id
                INNER JOIN ventas v ON pv.venta_id = v.venta_id
                INNER JOIN cliente c ON v.cliente_id = c.cliente_id
                WHERE pv.venta_id = ?;";

    // Prepara la consulta
    if ($stmt = $mysqli->prepare($consulta)) {
        // Enlaza el parámetro de venta_id
        $stmt->bind_param("i", $venta_id);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // Obtiene el resultado de la consulta
            $result = $stmt->get_result();
        } else {
            echo 'Error al ejecutar la consulta: ' . $stmt->error;
        }

        // Cierra la consulta
        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta: ' . $mysqli->error;
    }
} else {
    echo 'Falta el ID de la venta.';
}

// Cierra la conexión
$mysqli->close();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Venta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/confirm.css">
</head>

<body>
    <div class="wrapper">
        <main>
            <h2 class="titulo-principal">¡Venta realizada con éxito!</h2>
            <div class="contenedor-confirmacion">
                <h3 class="sub-titulo">Datos de la Venta</h3>
                <?php
                // Comprueba si se encontraron productos para la venta
                if ($result->num_rows > 0) {
                    echo '<table>';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Producto</th>';
                    echo '<th>Cantidad</th>';
                    echo '<th>Precio Unitario</th>';
                    echo '<th>Subtotal</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo 'No se encontraron productos para la venta.';
                }
                ?>
                <table>
                    <tbody>
                        <?php
                        $total=0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row['titulo'] . '</td>';
                                echo '<td>' . $row['cantidad'] . '</td>';
                                echo '<td>$' . number_format($row['precio_unitario'], 2) . '</td>';
                                echo '<td>$' . number_format($row['subtotal'], 2) . '</td>';
                                echo '</tr>';
                                $total+=$row['subtotal'];
                            }
                        } else {
                            echo 'No se encontraron productos para la venta.';
                        }
                        ?>
                        
                    </tbody>
                </table>
                <?php
                echo '<div class="subtexto">';
                echo "<p> Total: $" . number_format($total, 2) . "</p>";
                echo '</div>';
                ?>
                
                <a href="./index.php" class="boton-volver">Volver a la Tienda</a>
            </div>
        </main>
    </div>
</body>

</html>