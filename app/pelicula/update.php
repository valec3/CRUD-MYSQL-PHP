<?php

require_once("../config/database.php");

session_start();

$nombre = $_POST['name'];
$descripcion = $_POST['description'];
$id_genero = $_POST['genero'];
$id = $_POST['id'];
// echo $id.' '.$nombre.' '.$descripcion.' '.$id_genero;

$queryUpdateMovie = "UPDATE pelicula 
SET nombre = '$nombre', descripcion = '$descripcion', id_genero = '$id_genero' 
WHERE id = '$id'";

$resUpdateMovie = $conn->query($queryUpdateMovie);
if ($resUpdateMovie) {
    header("Location: index.php");
    $_SESSION['message'] = "Registro actualizado correctamente";

    $formatAllowed = array("image/jpeg", "image/png");
    if ($_FILES['poster-update']['error'] != 0) {
        return;
    }
    if (!in_array($_FILES['poster-update']['type'], $formatAllowed)) {
        $_SESSION['message'] = "Formato no permitido";
        return;
    }

    $path = "/posters/";
    $path = $path . basename($_FILES['poster-update']['name']);
    $format = explode(".", $path);
    // echo $format[1];
    if (!file_exists("posters")) {
        mkdir("posters");
    }

    if (!move_uploaded_file($_FILES['poster-update']['tmp_name'], "./posters/" . $id . "." . $format[1])) {
        $_SESSION['message'] = "Error al subir el archivo";
        return;
    }


} else {
    echo "Error al actualizar la pelicula: " . mysqli_error($conn);
}

?>