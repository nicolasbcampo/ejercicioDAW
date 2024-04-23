<head>
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <style>
        
        .titulo{
            background-image: url('Vista/img/pacientes.jpg');
            height: 40vh;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-position: center;
        }
        .blog-post-title{
            font-family: "Playfair Display", Georgia, "Times New Roman", serif;
        }
        .pequeño{
            font-size: 12px;
        }
        h1{
            color: black;
        }
    </style>
</head>
<body>
    <main class="container mb-5">
        <article class="blog-post d-flex flex-column justify-content-center">
            <div class="titulo text-white rounded p-4 mb-4  mt-5 pb-1 pr-1 row g-5">
                <h1 class=" display-4 fst-italic">Contagios</h1>
            </div>
            <h2 class="blog-post-title mb-3">Lista de contagios</h2>
            <hr>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col" class="col-1">Id</th>
                        <th scope="col" class="col-2">Fecha detección</th>
                        <th scope="col" class="col-2">Fecha fin</th>
                        <th scope="col" class="col-1">Id Paciente</th>
                        <th scope="col" class="col-2">Paciente</th>
                        <th scope="col" class="col-1">Id Virus</th>
                        <th scope="col" class="col-2">Virus</th>
                        <th scope="col" class="col-1"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php

                    use Modelo\Paciente;
                    use Modelo\Contagio;
                    use Modelo\Virus;

                    while($contagio = mysqli_fetch_assoc($contagios)){
                        echo '<tr>';
                        echo '<th scope="row">'.$contagio['id'].'</th>';
                        echo '<td>'.$contagio['fecha_detec'].'</td>';
                        echo '<td>'.$contagio['fecha_fin'].'</td>';
                        echo '<td>'.Paciente::buscar_paciente_por_id($contagio['id_paciente'])['id'].'</td>';
                        echo '<td>'.Paciente::buscar_paciente_por_id($contagio['id_paciente'])['nombre'].'</td>';
                        echo '<td>'.Virus::buscar_virus_por_id($contagio['id_virus'])['id'].'</td>';
                        echo '<td>'.Virus::buscar_virus_por_id($contagio['id_virus'])['tipo'].'</td>';
                        echo '  <td>
                                    <a class="bi bi-pencil-square"></a>
                                    <a class="bi bi-trash link-danger"></a>
                                </td>';
                        
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalAltaContagio">Añadir</button>          
        </article>
        
    </main>
    <!-- Modal Alta Contagio -->
    <div class="modal fade" id="ModalAltaContagio" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formLogin" action="index.php?clase=contagio&accion=alta" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Alta Contagio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="fecha_detec">Fecha detección</label>
                            <input type="date" name="fecha_detec" class="form-control" id="fecha_detec_contagio" placeholder="Introduce fecha detección" required>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_fin">Fecha fin</label>
                            <input type="date" name="fecha_fin" class="form-control" id="fecha_fin_contagio" placeholder="Introduce fecha fin" required>
                        </div>

                        <div class="mb-3">
                            <label for="id_paciente">Paciente</label>
                            <select class="form-select" name="id_paciente" id="id_paciente_contagio">
                                <?php
                                    $pacientes = Paciente::verbd();
                                    while($paciente = mysqli_fetch_assoc($pacientes)){
                                        echo '<option value="'.$paciente['id'].'">'.$paciente['id'].': '.$paciente['nombre'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_virus">Virus</label>
                            <select class="form-select" name="id_virus" id="id_virus_contagio">
                                <?php
                                    $viruses = Virus::verbd();
                                    while($virus = mysqli_fetch_assoc($viruses)){
                                        echo '<option value="'.$virus['id'].'">'.$virus['id'].': '.$virus['tipo'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" class="btn btn-success mx-auto w-100">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Modificar Contagio -->
    <div class="modal fade" id="ModalModContagio" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formLogin" action="index.php?clase=contagio&accion=modificar" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Modificar Contagio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="fecha_detec">Fecha detección</label>
                            <input type="date" name="fecha_detec" class="form-control" id="fecha_detec_contagio_mod" placeholder="Introduce fecha detección" required>
                            <input type="hidden" id="id_contagio_mod" name="id">
                        </div>

                        <div class="mb-3">
                            <label for="fecha_fin">Fecha fin</label>
                            <input type="date" name="fecha_fin" class="form-control" id="fecha_fin_contagio_mod" placeholder="Introduce fecha fin" required>
                        </div>

                        <div class="mb-3">
                            <label for="id_paciente">Paciente</label>
                            <select class="form-select" name="id_paciente" id="id_paciente_contagio_mod">
                                <?php
                                    $pacientes = Paciente::verbd();
                                    while($paciente = mysqli_fetch_assoc($pacientes)){
                                        echo '<option value="'.$paciente['id'].'">'.$paciente['id'].': '.$paciente['nombre'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_virus">Virus</label>
                            <select class="form-select" name="id_virus" id="id_virus_contagio_mod">
                                <?php
                                    $viruses = Virus::verbd();
                                    while($virus = mysqli_fetch_assoc($viruses)){
                                        echo '<option value="'.$virus['id'].'">'.$virus['id'].': '.$virus['tipo'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" class="btn btn-primary mx-auto w-100">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar Contagio -->
    <div class="modal fade" id="ModalDelContagio" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="index.php?clase=contagio&accion=eliminar" method="post">
                    <div class="modal-body">
                        <div class="mb-3 text-center">
                            <input type="hidden" name="id" id="id_contagio_del">
                            <h1>¿Estás seguro?</h1>
                            <h5>Si eliminas este contagio no podras volver a recuperarlo</h5>
                        </div>
                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" class="btn btn-danger mx-auto w-100">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const edit_buttons = document.getElementsByClassName('bi-pencil-square');
        for(let i = 0; i < edit_buttons.length ;i++){
            edit_buttons[i].addEventListener('click',()=>{
               
                var row = edit_buttons[i].parentElement.parentElement;
                var celdas = row.getElementsByTagName('td');

                var fecha_detec_contagio = document.getElementById('fecha_detec_contagio_mod');
                fecha_detec_contagio.value = celdas[0].innerText;

                var fecha_fin_contagio = document.getElementById('fecha_fin_contagio_mod');
                fecha_fin_contagio.value = celdas[1].innerText;

                var id_paciente = document.getElementById('id_paciente_contagio_mod');
                id_paciente.value = celdas[2].innerText;

                var id_virus = document.getElementById('id_virus_contagio_mod');
                id_virus.value = celdas[4].innerText;

                var ides = row.getElementsByTagName('th');
                var id_contagio = document.getElementById('id_contagio_mod');
                id_contagio.value = ides[0].innerText;

                const ModalModContagio = new bootstrap.Modal('#ModalModContagio');
                ModalModContagio.show();

            })
        }

        const del_buttons =document.getElementsByClassName('bi bi-trash link-danger');
        for(let i = 0; i < del_buttons.length ;i++){
            del_buttons[i].addEventListener('click', () => {

                var row = del_buttons[i].parentElement.parentElement;
                var ides = row.getElementsByTagName('th');
                var id_contagio = document.getElementById('id_contagio_del');
                id_contagio.value = ides[0].innerText;

                const ModalDelContagio = new bootstrap.Modal('#ModalDelContagio');
                ModalDelContagio.show();

            })
        }
    </script>
</body>