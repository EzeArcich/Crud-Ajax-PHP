<?php

include("conexion.php");

$id = $_POST['id2'];
$sql = "DELETE FROM vehiculos WHERE id='$id'";
echo mysqli_query($con, $sql);