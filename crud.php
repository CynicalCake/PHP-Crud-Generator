<?php
// Incluir el archivo de conexión a la base de datos
include('connection.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRUD con Bootstrap</title>
    <!-- Agregar el enlace al CDN de Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .main-buttons {
            display: grid;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <?php
    // Obtener el nombre de la tabla de la URL
    $table = $_GET['table'];

    // Obtener la información de la tabla
    $result = $conn->query("DESCRIBE $table");
    $fields = $result->fetch_all(MYSQLI_ASSOC);
    ?>

    <h2><?php echo $table; ?> CRUD</h2>

    <div class="main-buttons">
        <a href="index.php" class="btn btn-secondary mb-3">Volver a la lista de tablas</a>

        <!-- Enlace para ir a la página de inserción -->
        <a href="insert_form.php?table=<?php echo $table; ?>" class="btn btn-success">Agregar nuevo registro</a>
    </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <?php foreach ($fields as $field): ?>
                <th scope="col"><?php echo $field['Field']; ?></th>
            <?php endforeach; ?>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>

        <?php
        // Mostrar los registros existentes
        $selectQuery = "SELECT * FROM $table";
        $selectResult = $conn->query($selectQuery);

        while ($row = $selectResult->fetch_assoc()): ?>
            <tr>
                <?php foreach ($fields as $field): ?>
                    <td><?php echo $row[$field['Field']]; ?></td>
                <?php endforeach; ?>
                <td>
                    <a href="edit.php?table=<?php echo $table; ?>&id=<?php echo $row['id']; ?>"
                       class="btn btn-warning btn-sm">Editar</a>
                    <a href="delete.php?table=<?php echo $table; ?>&id=<?php echo $row['id']; ?>"
                       class="btn btn-danger btn-sm ml-2">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>

        </tbody>
    </table>


</div>

<!-- Agregar el enlace al CDN de Bootstrap JS y jQuery (opcional) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>

