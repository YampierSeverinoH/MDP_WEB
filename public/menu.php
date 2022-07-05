<?php

use JetBrains\PhpStorm\ArrayShape;

include("cabecera.php");


session_start();
$foto = $_SESSION['foto'];
$nombre = $_SESSION['nombre'];
$iduser=$_SESSION['idUsuario'];
?>
<script>
    //llamar a los permisos
</script>

<!DOCTYPE html>

<body>

    <div class="flex-shrink-0 p-3 bg-white ">
        <div class="container">
            <input type="hidden" name="idUser" id="idUser" value="<?php echo $iduser; ?>">
            <div class="row justify-content-between">
                <div class="col-3">
                    <div class="" id="FondoMenu">
                        <center>
                            <div class="bi pe-none me-0" width="30" height="24">
                                <img src="<?php echo PERFIL . $foto; ?>" alt="Munici" class="" height="100px">
                            </div>
                            <span class="fs-5 fw-semibold">
                                <font style="vertical-align: inherit;">
                                    <h4><?php echo $nombre ?></h4>
                                </font>
                            </span>
                        </center>
                        <button class="btn btn-outline-info btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#Marcarciones" aria-expanded="false">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    Asistencias
                                </font>
                            </font>
                        </button></br>
                        <div class="collapse" id="Marcarciones">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small" id="PadreA">
                                <li><a href="<?php echo PHP . '/MarAsistencia.php'; ?>" class="espacioado link-dark d-inline-flex text-decoration-none rounded">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Marcar </font>
                                        </font>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <button class="btn btn-outline-info btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    Gestion de personal
                                </font>
                            </font>
                        </button></br>
                        <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small  " id="PadreGP">
                                <li><a href="<?php echo PERSONAL . '/PerForm.php'; ?>" class="espacioado link-dark d-inline-flex text-decoration-none rounded">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Registrar </font>
                                        </font>
                                    </a>
                                </li>
                                <li><a href="<?php echo PERSONAL . '/PerLisForm.php'; ?>" class="espacioado  link-dark d-inline-flex text-decoration-none rounded">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Listar Personal</font>
                                        </font>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <button class="btn btn-outline-info btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#PerLivMenu" aria-expanded="true">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    Areas y Cargos
                                </font>
                            </font>
                        </button></br>
                        <div class=" collapse" id="PerLivMenu">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small  " id="PadreAC">
                                <li><a href="<?php echo AREA; ?>/AreCarVista.php" class="espacioado  link-dark d-inline-flex text-decoration-none rounded">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Registro </font>
                                        </font>
                                    </a>
                                </li>
                                <li><a href="<?php echo AREA; ?>/AreListar.php" class="espacioado  link-dark d-inline-flex text-decoration-none rounded">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Ver Areas</font>
                                        </font>
                                    </a>
                                </li>
                                <li><a href="<?php echo AREA; ?>/CarListar.php" class="espacioado  link-dark d-inline-flex text-decoration-none rounded">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Ver Cargos</font>
                                        </font>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <button class="btn btn-outline-info btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#ReportesMenu" aria-expanded="false">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    Reportes
                                </font>
                            </font>
                        </button></br>
                        <div class=" collapse" id="ReportesMenu">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small" id="PadreR">
                                <li><a href="#" class="espacioado  link-dark d-inline-flex text-decoration-none rounded">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Personal </font>
                                        </font>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo CABECERA ?>/logout.php" class=" link-dark d-inline-flex text-decoration-none rounded"><button class="btn btn-outline-info btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#PerLivMenu" aria-expanded="true">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        Salir
                                    </font>
                                </font>
                            </button></a></br>
                    </div>
                </div>