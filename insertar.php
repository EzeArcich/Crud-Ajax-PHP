<?php

include "conexion.php";


$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];

$sql = "INSERT INTO vehiculos (marca, modelo, color) VALUES ('$marca', '$modelo', '$color')";
echo mysqli_query($con, $sql);

?>
