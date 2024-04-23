<!-- Modal Mostrar Virus -->
<div class="modal fade" id="ModalVirus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Virus del Paciente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Fecha detección</th>
                            <th scope="col">Fecha fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            use Modelo\Contagio;
                            use Modelo\Virus;

                            $contagios = Contagio::buscar_contagios_por_id_paciente($id_paciente);
                            while ($contagio = mysqli_fetch_assoc($contagios)) {
                                
                                echo '<th scope="row">'.$contagio['id_virus'].'</th>';
                                echo '<td>'.Virus::buscar_virus_por_id($contagio['id_virus'])['tipo'].'</td>';
                                echo '<td>'.$contagio['fecha_detec'].'</td>';
                                echo '<td>'.$contagio['fecha_fin'].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    const ModalVirus = new bootstrap.Modal('#ModalVirus');
    ModalVirus.show();
</script>
