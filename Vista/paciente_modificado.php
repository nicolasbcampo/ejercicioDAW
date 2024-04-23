<!-- Modal Paciente Modificado Correctamente -->
<div class="modal fade" id="ModalPacienteModCorrect" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="index.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Modificación realizada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <h1>El paciente se ha modificado con éxito!</h1>
                        <img src="Vista/img/corr_icon.png" alt="Correct Icon" style="height: 100px; width:100px">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const modalPacienteModCorr = new bootstrap.Modal('#ModalPacienteModCorrect');
    modalPacienteModCorr.show();
</script>