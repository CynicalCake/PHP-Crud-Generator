<?php
// Incluir el archivo de conexión a la base de datos
include('connection.php');

// Obtener la lista de tablas de la base de datos
$tables = array();
$result = $conn->query("SHOW TABLES");
while ($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

// Mostrar la lista de tablas y enlaces a los CRUD respectivos
echo '<h2>Tablas Disponibles</h2>';
foreach ($tables as $table) {
    echo '<a href="crud.php?table=' . $table . '">' . $table . '</a><br>';
}
?>