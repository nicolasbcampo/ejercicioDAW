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
        <div class="container-fluid  ">
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
                    <!-- Contacto -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?clase=contacto">Contacto</a>
                    </li>
                    <!-- Pacientes -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?clase=paciente&accion=ver">Pacientes</a>
                    </li>
                    <!-- Virus19 -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?clase=virus&accion=ver">Virus</a>
                    </li>
                    <!-- Contagios -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?clase=contagio&accion=ver">Contagios</a>
                    </li>
                </ul>
            </div>
            <div class="alert alert-secondary" role="alert" style="margin: 0px 0.75rem;padding: 0.4rem;">
                <b>Usuario:</b> <?php echo $_SESSION['usuario_logueado'] ?>
            </div>

        <a href="index.php?clase=usuario&accion=logout" type="button" class="btn btn-danger">Log Out</a>
        </div>
    </nav>
    
</body>