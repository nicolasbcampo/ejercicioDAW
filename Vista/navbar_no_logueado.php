<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Covid-19</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="Vista/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="Vista/img/logo.jpg" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <!-- Inicio -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?clase=inicio">Inicio</a>
                    </li>
                    <!-- Virus -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?clase=virus&accion=ver">Virus</a>
                    </li>
                </ul>
            </div>
        <button type="button" class="btn link-secondary" data-bs-toggle="modal" data-bs-target="#ModalRegister" style="text-decoration: underline; font-weight: 400">Registrarse</button>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalLogIn">Log In</button>
        </div>
    </nav>
    <!-- Modal Login -->
    <div class="modal" id="ModalLogIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formLogin" action="index.php?clase=usuario&accion=comprobar" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Inicia Sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Username">Usuario<span class="text-danger">*</span></label>
                            <input type="text" name="nombre" class="form-control" id="username_login" placeholder="Introduce usuario" required>
                            <div class="invalid-feedback">
                                No existe un usuario con ese nombre...
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="Password">Contraseña<span class="text-danger">*</span></label>
                            <input type="password" name="contrasenha" class="form-control" id="password_login" placeholder="Introduce contraseña" required>
                            <div class="invalid-feedback">
                                Contraseña incorrecta!
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" class="btn btn-success mx-auto w-100">Log In</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Modal Registro -->
    <div class="modal" id="ModalRegister" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="index.php?clase=usuario&accion=alta" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Regístrate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Username">Usuario<span class="text-danger">*</span></label>
                            <input type="text" name="nombre" class="form-control" id="username_reg" placeholder="Introduce usuario" required>
                            <div class="invalid-feedback">
                                Este nombre ya existe! Prueba con otro distinto...
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="Password">Contraseña<span class="text-danger">*</span></label>
                            <input type="password" name="contrasenha" class="form-control" id="password_reg" placeholder="Introduce contraseña" required>
                        </div>
                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" class="btn btn-success mx-auto w-100">Registrarse</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>