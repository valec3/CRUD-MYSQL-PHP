<?php
session_start();
require_once("../config/database.php");

$nombre = $conn ->real_escape_string($_POST["name"]);
$description = $conn ->real_escape_string($_POST["description"]);
$genero = $conn ->real_escape_string($_POST["genero"]);

$query = "INSERT INTO pelicula (nombre,descripcion,id_genero,fecha_alta) 
    VALUES ('$nombre','$description',$genero,NOW())";
if($conn->query($query)){
    $id = $conn->insert_id;
    header("Location: index.php");
    $_SESSION['message'] = "Registro creado correctamente";
    $_SESSION['message_type'] = "success";

    $formatAllowed = array("image/jpeg","image/png");
    if($_FILES['poster']['error'] != 0){
        return;
    }
    if(!in_array($_FILES['poster']['type'],$formatAllowed)){
        $_SESSION['message'] = "Formato no permitido";
        return;
    }
    $path = "/posters/";
    $path = $path . basename($_FILES['poster']['name']);
    if(!file_exists("posters")){
        mkdir("posters");
    }

    if(!move_uploaded_file($_FILES['poster']['tmp_name'],"./posters/".$id.".jpg")){
        $_SESSION['message'] = "Error al subir el archivo";
        return;
    }

    
    // ALERT TOAST
    
}else{
    echo "Error al crear el registro";
}
?>