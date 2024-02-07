<?php
include("config.php");
$id = $_GET["id"];
$sql = "DELETE FROM cliente WHERE id=$id";
$conn->query($sql);

header("Location: leer.php");
exit();
?>