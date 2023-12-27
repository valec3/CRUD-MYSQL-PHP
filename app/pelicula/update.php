<?php

require_once("../config/database.php");

$nombre = $_POST['name'];
$descripcion = $_POST['description'];
$id_genero = $_POST['genero'];
$id = $_POST['id'];
echo $id.' '.$nombre.' '.$descripcion.' '.$id_genero;
$queryUpdateMovie = "UPDATE pelicula 
SET nombre = '$nombre', descripcion = '$descripcion', id_genero = '$id_genero' 
WHERE id = '$id'";

$resUpdateMovie = $conn->query($queryUpdateMovie);
if ($resUpdateMovie) {
    header("Location: index.php");
} else {
    echo "Error al actualizar la pelicula: " . mysqli_error($conn);
}

?>