<!-- Modal Mostrar Pacientes -->
<div class="modal fade" id="ModalPacientes" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pacientes con este virus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Fecha detección</th>
                            <th scope="col">Fecha fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            use Modelo\Contagio;
                            use Modelo\Paciente;

                            $contagios = Contagio::buscar_contagios_por_id_virus($id_virus);
                            while ($contagio = mysqli_fetch_assoc($contagios)) {
                                
                                echo '<th scope="row">'.$contagio['id_paciente'].'</th>';
                                echo '<td>'.Paciente::buscar_paciente_por_id($contagio['id_paciente'])['nombre'].'</td>';
                                echo '<td>'.Paciente::buscar_paciente_por_id($contagio['id_paciente'])['edad'].'</td>';
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
    const ModalPacientes = new bootstrap.Modal('#ModalPacientes');
    ModalPacientes.show();
</script>
