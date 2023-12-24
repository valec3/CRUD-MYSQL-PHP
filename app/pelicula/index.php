<?php
require_once("../config/database.php");
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
        <h1 class="text-center">APP DBMS</h1>
    </head>
    <main class="px-4 py-4">
        <div class="text-blue">
            <h2 class="text-center">Facultades</h2>
        </div>
        <div>
            <a href="facultad/create.php" class="btn btn-primary col-auto gap-2" data-bs-toggle="modal" data-bs-target="#newModal" gran-julio-2="true">
                <i class="fa fa-circle-plus"></i>
                Crear 
            </a>
        </div>
        <table class="table table-sm table-striped table-hover table-primary mt-4" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Genero</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </main>
    <footer></footer>








    <?php 
    
    $queryGetGeneros = "SELECT * FROM genero";
    $resGetGeneros = mysqli_query($conn,$queryGetGeneros);
    ?>


    <?php include('./modal.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>