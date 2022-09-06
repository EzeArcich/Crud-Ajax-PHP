<?php
include("conexion.php");

$id = $_POST['id2'];
$marca = $_POST['marca2'];
$modelo = $_POST['modelo2'];
$color = $_POST['color2'];

$sql= "UPDATE vehiculos SET marca='$marca', modelo='$modelo', color='$color' WHERE id='$id'";
echo mysqli_query($con, $sql);