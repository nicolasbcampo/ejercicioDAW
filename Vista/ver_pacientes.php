<head>
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                <h1 class=" display-4 fst-italic">Pacientes</h1>
            </div>
            <h2 class="blog-post-title mb-3">Lista de pacientes</h2>
            <hr>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col" class="col-2">Id</th>
                        <th scope="col" class="col-4">Nombre</th>
                        <th scope="col" class="col-4">Edad</th>
                        <th scope="col" class="col-1">Virus</th>
                        <th scope="col" class="col-1"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                    while($paciente = mysqli_fetch_assoc($pacientes)){
                        echo '<tr>';
                        echo '<th scope="row">'.$paciente['id'].'</th>';
                        echo '<td>'.$paciente['nombre'].'</td>';
                        echo '<td>'.$paciente['edad'].'</td>';
                        if($logged){
                            echo '  <td>
                                        <a class="bi bi-virus" href="index.php?clase=paciente&accion=ver_virus&id='.$paciente['id'].'"></a>
                                    </td>
                                    <td>
                                        <a class="bi bi-pencil-square"></a>
                                        <a class="bi bi-trash link-danger"></a>
                                    </td>';
                        }
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
            <?php
                if ($logged){
                    echo '<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalAltaPaciente">Añadir</button>';
                }
            ?>
        </article>
        
    </main>
    <!-- Modal Alta Paciente -->
    <div class="modal fade" id="ModalAltaPaciente" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formLogin" action="index.php?clase=paciente&accion=alta" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Alta Paciente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre_paciente" placeholder="Introduce nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="edad">Edad</label>
                            <input type="number" name="edad" class="form-control" id="edad_paciente" placeholder="Introduce edad" required>
                        </div>
                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" class="btn btn-success mx-auto w-100">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Modificar Paciente -->
    <div class="modal fade" id="ModalModPaciente" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formLogin" action="index.php?clase=paciente&accion=modificar" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Modificar Paciente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre_paciente_mod" placeholder="Introduce nombre" required>
                            <input type="hidden" name="id" id="id_paciente_mod">
                        </div>

                        <div class="mb-3">
                            <label for="edad">Edad</label>
                            <input type="number" name="edad" class="form-control" id="edad_paciente_mod" placeholder="Introduce edad" required>
                        </div>
                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" class="btn btn-primary mx-auto w-100">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar Paciente -->
    <div class="modal fade" id="ModalDelPaciente" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="index.php?clase=paciente&accion=eliminar" method="post">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 text-center">
                            <input type="hidden" name="id" id="id_paciente_del">
                            <h1>¿Estás seguro?</h1>
                            <h5>Si eliminas al paciente no podras volver a recuperarlo</h5>
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

                var nombre_paciente = document.getElementById('nombre_paciente_mod');
                nombre_paciente.value = celdas[0].innerText;

                var edad_paciente = document.getElementById('edad_paciente_mod');
                edad_paciente.value = celdas[1].innerText;

                var ides = row.getElementsByTagName('th');
                var id_paciente = document.getElementById('id_paciente_mod');
                id_paciente.value = ides[0].innerText;

                const ModalModPaciente = new bootstrap.Modal('#ModalModPaciente');
                ModalModPaciente.show();

            })
        }

        const del_buttons =document.getElementsByClassName('bi bi-trash link-danger');
        for(let i = 0; i < del_buttons.length ;i++){
            del_buttons[i].addEventListener('click', () => {

                var row = del_buttons[i].parentElement.parentElement;
                var ides = row.getElementsByTagName('th');
                var id_paciente = document.getElementById('id_paciente_del');
                id_paciente.value = ides[0].innerText;

                const ModalDelPaciente = new bootstrap.Modal('#ModalDelPaciente');
                ModalDelPaciente.show();

            })
        }
    </script>
</body>