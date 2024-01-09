<?php
// Incluir el archivo de conexión a la base de datos
include('connection.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nuevo Registro con Bootstrap</title>
    <!-- Agregar el enlace al CDN de Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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

    <h3>Nuevo Registro</h3>
    <form action="insert.php?table=<?php echo $table; ?>" method="POST">
        <?php foreach ($fields as $field): ?>
            <div class="form-group">
                <label for="<?php echo $field['Field']; ?>"><?php echo $field['Field']; ?></label>
                <input type="text" class="form-control" name="<?php echo $field['Field']; ?>" required>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Insertar</button>
    </form>
</div>

<!-- Agregar el enlace al CDN de Bootstrap JS y jQuery (opcional) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>

