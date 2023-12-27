<?php
require_once("../config/database.php");
session_start();
$sqlGetDataMovies = "SELECT p.id, p.nombre, p.descripcion, g.nombre AS genero 
                    FROM pelicula AS p 
                    INNER JOIN genero AS g 
                    ON p.id_genero = g.id
                    Order BY p.id";
$dataMovies = $conn->query($sqlGetDataMovies);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    <link
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        crossorigin="anonymous"
    >
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-dark text-white">
    <head>
        <h1 class="text-center border-warning border-bottom border-3 py-3 fst-italic">APP DBMS</h1>
    </head>
    <main class="px-4 py-4">
        <div class="text-blue">
            <h2 class="text-center">Peliculas</h2>
        </div>
        <div>
            <a href="facultad/create.php" class="btn btn-primary col-auto gap-2" data-bs-toggle="modal" data-bs-target="#newModal">
                <i class="fa fa-circle-plus"></i>
                Crear 
            </a>
        </div>
        <table class="table table-hover table-striped table-dark mt-4 table-primary overflow-auto">
            <thead>
                <tr class="fs-5">
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Genero</th>
                    <th>Poster</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="registers">
                <?php while($rMovie = $dataMovies->fetch_assoc()){ ?>
                    <tr class="table-ligth" register-id=<?php echo $rMovie['id']?>>
                        <td><?php echo $rMovie["id"]; ?></td>
                        <td><?php echo $rMovie["nombre"]; ?></td>
                        <td><?php echo $rMovie["descripcion"]; ?></td>
                        <td><?php echo $rMovie["genero"]; ?></td>
                        <td></td>
                        <td>
                            <button class="btn btn-warning fw-bold" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id = "<?php echo $rMovie["id"]; ?>">
                                <i class="fa fa-pen-to-square"></i>
                                Editar
                            </button>
                            <button class="btn btn-danger fw-bold" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id = "<?php echo $rMovie["id"]; ?>">
                                    <i class="fa fa-trash"></i>
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
    <footer>
        <?php  if(isset($_SESSION['message'])){ ?>
            <div class="toast-container position-absolute top-0 end-0 p-3">
                <div class="toast align-items-center bg-success text-light show <?php echo 'bg-'.$_SESSION['message_type']?>" role="alert" aria-live="assertive" aria-atomic="true" id="toast" data-bs-animation="true" data-bs-delay="2000"> 
                    <div class="d-flex">
                        <h3 class="toast-body fw-bold fs-6 my-0">
                            <?php echo $_SESSION['message']; ?>
                        </h3>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php 
        unset($_SESSION['message']);
    } ?>
    </footer>






    <?php

    $queryGetGeneros = "SELECT id, nombre FROM genero";
    $resGetGeneros = $conn->query($queryGetGeneros);
    if (!$resGetGeneros) {
        die("Error en la consulta: " . mysqli_error($conn));
    }
    // mysqli_close($conn);
    ?>


    <?php include('./modal.php'); ?>
    <?php $resGetGeneros->data_seek(0); ?>
    <?php include('./editModal.php'); ?>
    <?php include('./deleteModal.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../assets/js/app.js"></script>
</body>
</html>