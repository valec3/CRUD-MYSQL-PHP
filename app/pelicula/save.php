<?php

require_once("../config/database.php");

$nombre = $conn ->real_escape_string($_POST["name"]);
$description = $conn ->real_escape_string($_POST["description"]);
$genero = $conn ->real_escape_string($_POST["genero"]);

$query = "INSERT INTO pelicula (nombre,descripcion,id_genero,fecha_alta) 
    VALUES ('$nombre','$description',$genero,NOW())";
if($conn->query($query)){
    header("Location: index.php");
    // ALERT TOAST
}else{
    echo "";
}
?>