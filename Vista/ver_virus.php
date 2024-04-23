<head>
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        
        .titulo{
            background-image: url('Vista/img/virus.jpg');
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
    </style>
</head>
<body>
    <main class="container mb-5">
        <article class="blog-post d-flex flex-column justify-content-center">
            <div class="titulo text-white rounded p-4 mb-4  mt-5 pb-1 pr-1 row g-5">
                <h1 class=" display-4 fst-italic">Virus</h1>
            </div>
            <h2 class="blog-post-title mb-3">Lista de virus</h2>
            <hr>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col" class="col-2">Id</th>
                        <th scope="col" class="col-4">Tipo</th>
                        <th scope="col" class="col-4">Días de Incubación</th>
                        <th scope="col" class="col-1"><?php if($logged){echo 'Pacientes';}?></th>
                        <th scope="col" class="col-1"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                    while($virus = mysqli_fetch_assoc($viruses)){
                        echo '<tr>';
                        echo '<th scope="row">'.$virus['id'].'</th>';
                        echo '<td>'.$virus['tipo'].'</td>';
                        echo '<td>'.$virus['incubacion'].'</td>';
                        if($logged){
                            echo '  <td>
                                        <a class="bi bi-people" href="index.php?clase=virus&accion=ver_pacientes&id='.$virus['id'].'"></a>
                                    </td>
                                    <td>
                                        <a class="bi bi-pencil-square"></a>
                                        <a class="bi bi-trash link-danger"></a>
                                    </td>';
                        } else {
                            echo '<td></td><td></td>';
                        }
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
            <?php
                if ($logged){
                    echo '<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalAltaVirus">Añadir</button>';
                }
            ?>
        </article>
        
    </main>
    <!-- Modal Alta Virus -->
    <div class="modal fade" id="ModalAltaVirus" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formLogin" action="index.php?clase=virus&accion=alta" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Alta Virus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tipo">Tipo</label>
                            <input type="text" name="tipo" class="form-control" id="tipo_virus" placeholder="Introduce tipo" required>
                        </div>

                        <div class="mb-3">
                            <label for="incubacion">Incubación</label>
                            <input type="number" name="incubacion" class="form-control" id="incubacion_virus" placeholder="Introduce días incubacion" required>
                        </div>
                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" class="btn btn-success mx-auto w-100">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Modificar Virus -->
    <div class="modal fade" id="ModalModVirus" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formLogin" action="index.php?clase=virus&accion=modificar" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Modificar Virus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tipo">Tipo</label>
                            <input type="text" name="tipo" class="form-control" id="tipo_virus_mod" placeholder="Introduce tipo" required>
                            <input type="hidden" name="id" id="id_virus_mod">
                        </div>

                        <div class="mb-3">
                            <label for="incubacion">Incubación</label>
                            <input type="number" name="incubacion" class="form-control" id="incubacion_virus_mod" placeholder="Introduce días incubacion" required>
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
    <div class="modal fade" id="ModalDelVirus" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="index.php?clase=virus&accion=eliminar" method="post">
                    <div class="modal-body">
                        <div class="mb-3 text-center">
                            <input type="hidden" name="id" id="id_virus_del">
                            <h1>¿Estás seguro?</h1>
                            <h5>Si eliminas este virus no podras volver a recuperarlo</h5>
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

                var tipo_virus = document.getElementById('tipo_virus_mod');
                tipo_virus.value = celdas[0].innerText;

                var incubacion_virus = document.getElementById('incubacion_virus_mod');
                incubacion_virus.value = celdas[1].innerText;

                var ides = row.getElementsByTagName('th');
                var id_virus = document.getElementById('id_virus_mod');
                id_virus.value = ides[0].innerText;

                const ModalModVirus = new bootstrap.Modal('#ModalModVirus');
                ModalModVirus.show();

            })
        }

        const del_buttons =document.getElementsByClassName('bi bi-trash link-danger');
        for(let i = 0; i < del_buttons.length ;i++){
            del_buttons[i].addEventListener('click', () => {

                var row = del_buttons[i].parentElement.parentElement;
                var ides = row.getElementsByTagName('th');
                var id_virus = document.getElementById('id_virus_del');
                id_virus.value = ides[0].innerText;

                const ModalDelVirus = new bootstrap.Modal('#ModalDelVirus');
                ModalDelVirus.show();

            })
        }
    </script>
</body>