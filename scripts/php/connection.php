<?php
require "datos.php";

$mysqli = new mysqli($nombre_del_servidor, $nombre_de_usuario, $contraseña, $nombre_de_la_base_de_datos);

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}


