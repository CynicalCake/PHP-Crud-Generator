<?php
// Configuración de la BD
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'crud';

// Conexión con la BD
$conn = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}