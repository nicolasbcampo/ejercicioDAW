<!-- Modal Contagio Eliminado Correctamente -->
<div class="modal fade" id="ModalContagioDelCorrect" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="index.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminacion correcta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <h1>El contagio se ha eliminado con éxito!</h1>
                        <img src="Vista/img/corr_icon.png" alt="Correct Icon" style="height: 100px; width:100px">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const modalContagioDelCorr = new bootstrap.Modal('#ModalContagioDelCorrect');
    modalContagioDelCorr.show();
</script>