

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content text-danger" action="delete.php" method="POST">
            <div class="modal-header">
                <h5 class="modal-title fs-3">Aviso</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="number" name="id" id="id" class="d-none">
                <div class="container-fluid text-center fw-bold">
                    ¿Está seguro de eliminar el registro?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger" id="btnDelete">Eliminar</button>
            </div>
        </form>
    </div>
</div>

<script>
    const deleteModal = document.querySelector('#deleteModal');
    deleteModal.addEventListener('shown.bs.modal', function (event) {
        const btnClicked = event.relatedTarget;
        const id = btnClicked.getAttribute('data-bs-id');
        deleteModal.querySelector('#id').value = id;
    });
</script>