<?php
include("config.php");
$sql = "SELECT id, nombre, cantidad, precio FROM cliente";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
<?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Cantidad</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["cantidad"] . "</td><td>" . $row["precio"] . "</td>";
            echo "<td><a href='actualizar.php?id=" . $row["id"] . "'>Editar</a></td>";
            echo "<td><a href='eliminar.php?id=" . $row["id"] . "'>Eliminar</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 resultados";
    }
    ?>
</body>
</html>