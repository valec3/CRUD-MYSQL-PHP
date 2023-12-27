<?php
require_once("../config/database.php");
session_start();
$id = $_POST['id'];
$queryDelete = "DELETE FROM pelicula WHERE id = $id";
$resDeleteAction = $conn->query($queryDelete);
if($resDeleteAction){
    header("Location: index.php");
    $_SESSION['message'] = "Registro eliminado correctamente";
    $_SESSION['message_type'] = "danger";
}else{
    echo "";
}
?>