<div class="modal fade text-black" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg shadow-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar registro</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" data-bs-target="#editModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="update.php" method="post" enctype="multipart/form-data">

                    <input type="number" name="id" id="id" class="d-none">
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Nombre:
                        </label>
                        <input type="text" name="name" id="name" required class="form-control">
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
                            <option value="null">Seleccionar...</option>
                            <?php echo 'Hola' ?>
                            <?php while ($row = mysqli_fetch_array($resGetGeneros)) { ?>
                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['nombre']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="poster" class="form-label">Poster:</label>
                        <input type="file" name="poster" id="poster"  class="form-control" accept="image/jpeg">
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const editModal = document.querySelector('#editModal');

    editModal.addEventListener('shown.bs.modal',async function (event) {
        const btnClicked = event.relatedTarget;
        const id = btnClicked.getAttribute('data-bs-id');
        const dataRegister = document.querySelectorAll(`tr[register-id="${id}"] td`);
        const urlGetMovie = `getMovie.php`;
        const getdataMovie = async ()=>{
            const response = await fetch(`${urlGetMovie}?id=${id}`);
            const data = await response.json();
            return data;
        }
        const dataMovies = await getdataMovie();
        editModal.querySelector('#id').value = id;
        editModal.querySelector('#name').value = dataMovies.nombre;
        editModal.querySelector('#description').value = dataMovies.descripcion;
        editModal.querySelector('#genero').value = dataMovies.id_genero;
    })
</script>


