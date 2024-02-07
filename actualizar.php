<?php
include("config.php");

$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id === null) {
    // Manejar el caso en el que no se proporciona el ID
    echo "ID no proporcionado.";
    exit();
}

$sql = "SELECT id, nombre, cantidad, precio FROM cliente WHERE id=$id";
$result = $conn->query($sql);

if (!$result) {
    // Manejar el caso en que la consulta SQL falla
    echo "Error en la consulta: " . $conn->error;
    exit();
}

$row = $result->fetch_assoc();

if (!$row) {
    // Manejar el caso en que no se encuentra un registro con el ID dado
    echo "No se encontró el registro con ID: $id";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    

    $sql = "UPDATE cliente SET nombre='$nombre', cantidad='$cantidad', precio='$precio' WHERE id=$id";
    $conn->query($sql);

    header("Location: leer.php"); // Redirige a la página principal después de la actualización
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
</head>
<body>
    <h2>Editar Usuario</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        Nombre: <input type="text" name="nombre" value="<?php echo $row["nombre"]; ?>"><br>
        Cantidad: <input type="number" name="cantidad" value="<?php echo $row["cantidad"]; ?>"><br>
        precio: <input type="text" name="precio" value="<?php echo $row["precio"]; ?>"><br>
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
