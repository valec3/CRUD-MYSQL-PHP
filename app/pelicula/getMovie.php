
<?php
require_once("../config/database.php");
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$queryGetMovie = "SELECT nombre, descripcion, id_genero FROM pelicula WHERE id = $id LIMIT 1";

$resGetMovie = mysqli_query($conn, $queryGetMovie);
$dataMovie = mysqli_fetch_array($resGetMovie);
echo json_encode($dataMovie, JSON_UNESCAPED_UNICODE);
mysqli_close($conn);

?>