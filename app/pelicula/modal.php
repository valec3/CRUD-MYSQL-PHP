<div class="modal fade text-black" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="save.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Nombre:
                            <input type="text" name="name" id="name" required class="form-control">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">
                            Descripcion:
                        </label>
                        <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Genero</label>
                        <select name="genero" id="genero" class="form-control">
                            <option value="">Seleccionar...</option>
                            <?php while($row = mysqli_fetch_array($resGetGeneros)){ ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Poster:</label>
                        <input type="file" name="poster" id="poster"  class="form-control" accept="image/jpeg">
                    </div>
                    <div>   
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>