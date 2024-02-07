<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST ["nombre"];
    $cantidad = $_POST ["cantidad"];
    $precio = $_POST ["precio"];

    $sql = "INSERT INTO cliente (nombre,cantidad,precio) VALUES ('$nombre', '$cantidad','$precio')";

    if ($conn-> query($sql) === TRUE) {
        echo "producto agregado correctamente";
}
else {
    echo "error " . $sql . "<br>" . $conn->error;
}}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crear cliente</title>
</head>
<body>
    <form method="post" action="crear.php">
        Nombre:<input type="text" name="nombre" > <br>
        Cantidad:<input type="text" name="cantidad"> <br>
        Precio:<input type="text" name="precio"> <br>
        <input type="submit" value="Producto Agregado">
    </form>
</body>
</html>
