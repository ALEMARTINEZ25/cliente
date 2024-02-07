<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clientes";

//crear la conexion 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("conexion fallida". $conn->connect_error);
};

?>